<?php include "header.php"; ?>
<main class="main-wrapper clearfix">
	<div class="row page-title clearfix">
			<div class="page-title-left">
				<h5 class="mr-0 mr-r-5">Marraige Invoice</h5>
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Marraige Order Invoice</li>
				</ol>
			</div>
  </div>
     <!-- /.page-title-right -->
<?php
	$querya = mysql_query("SELECT * FROM customer_details, p_invoice_mst WHERE p_invoice_mst.P_CUSTOMER_ID = '".$_SESSION['p_cust']."' AND p_invoice_mst.P_ORDER_ID = '".$_SESSION['p_orderid']."' AND p_invoice_mst.M_FLAG = '0'");
	$a = mysql_fetch_array($querya);
						
	$queryor = mysql_query("SELECT * FROM photography_mst WHERE PHOTO_ID = '".$a['P_ORDER_ID']."' AND photography_mst.FLAG = '0'");
	$or = mysql_fetch_array($queryor);
?>
<div class="widget-list">
	<div class="row">
		<div class="col-md-12 widget-holder">
			<div class="widget-bg">
			<div class="widget-body clearfix">
				<div class="ecommerce-invoice printableArea" style="border:1px solid black;">
				<table style="width:100%;" border="0">
					<tr>
						<td colspan="7"><div style="margin-left:25px; margin-top:12px;">Shree Ganeshay Namah</div></td>
						<td><div align="right" style="margin-right:25px; margin-top:12px;">Jay Swami Narayana</div></td>
					</tr>
					
					<tr>
					  	<td colspan="8">
							<h2 class="text-center text-danger">Photo Digital Studio</h2>
							<h6 class="text-center">
								<span class="text-danger"> 101 Sky Mall, Ten Road, Bardoli - 394601</span>
								<span> Jignesh Patel Mo : 9909594409 </span>						
							</h6>					  
						</td>
				 	</tr>
					
					<tr>
						<td colspan="8">
					  		<div class="pull-left" style="margin-left:25px;">
								<address>
									<h5> &nbsp;<b class="text-danger"><?php echo $a['CUSTOMER_NAME']; ?></b></h5>
									<p class="text-muted m-l-5"><?php echo $a['CUSTOMER_ADDRESS']?>,
										<br/> <?php echo $a['CUSTOMER_CONTACT']?></p>
								</address>
							</div>
							<div class="pull-right text-right" style="margin-right:25px;">
								<address>
									<h4 class="font-bold"></h4><strong>Bill No :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> <?php echo $bill_no =  $a['P_BILL_NO']; ?></h4>
									<p class="m-t-30"><b>Order Id : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> <?php echo $a['P_ORDER_ID'] ?>
									<br /><strong>Invoice Date : &nbsp;&nbsp;&nbsp;&nbsp;</strong> <?php echo $a['P_BILL_DATE'] ?></p>
								</address>
							</div>						
						</td>
			      </tr>
					
					<tr>
						<th width="19%" class="text-left" ><strong style="margin-left:25px;">Album Name</strong></th>
						<th width="7%" class="text-center"><strong>Size</strong></th>
						<th width="6%" class="text-center"><strong>Qty</strong></th>
						<th width="10%" class="text-center"><strong>Rate</strong></th>
						<th width="23%" class="text-center"><strong>Frame Name</strong></th>
						<th width="7%" class="text-center"><strong>Qty</strong></th>
						<th width="3%" class="text-center"><strong>Rate</strong></th>
						<th width="25%" class="text-center"><strong>Total </strong></th>
				  	</tr>
				  	
					<tbody>
						<?php
						$ftot = 0;
						$photo_cust = $_SESSION['p_cust'];
						$orderid = $_SESSION['p_orderid'];
						$orderdate = $_SESSION['p_date'];
						$query1 = mysql_query("SELECT * FROM p_invoice_mst where P_CUSTOMER_ID = '".$photo_cust."' AND P_ORDER_ID = '".$orderid."' AND M_FLAG = '0'");
						while($prow = mysql_fetch_array($query1))	
						{
						?>
						<tr>
							<td><font style="margin-left:25px;"><?php echo $prow['ALBUM_NAME']?></font></td>
							<td class="text-center"><?php echo $prow['A_SIZE']?></td>
							<td class="text-center"><?php echo $pqty = $prow['A_QTY']?></td>
							<td class="text-center"><?php echo $prate = $prow['A_PRICE']?></td>
							<td class="text-center"><?php echo strtoupper($prow['FRAME_NAME']);?></td>
							<td class="text-center"><?php echo $fqty = $prow['F_QTY']?></td>
							<td class="text-center"><?php echo $frate = $prow['F_PRICE']?></td>
							<td class="text-center">
								<?php
									$tot_photo = $prow['A_TOTAL'];
									$tot_frame = $prow['F_TOTAL'];
									echo $total = $tot_photo + $tot_frame;
								?>
							</td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
				
				<br />		
				<?php/*
					$sum_query = mysql_query("SELECT SUM(A_TOTAL) FROM p_invoice_mst WHERE  P_CUSTOMER_ID = '".$photo_cust."' AND P_ORDER_ID = '".$orderid."' AND M_FLAG = '0'");
					$sq = mysql_fetch_array($sum_query);
					
					$sum_query1 = mysql_query("SELECT SUM(F_TOTAL) FROM p_invoice_mst WHERE  P_CUSTOMER_ID = '".$photo_cust."' AND P_ORDER_ID = '".$orderid."' AND M_FLAG = '0'");
					$sq1 = mysql_fetch_array($sum_query1);
					
					$a = $sq['SUM(A_TOTAL)'];
					$b = $sq1['SUM(F_TOTAL)'];*/
				?>	
				<!--<table style="width:30%; float:right;" border="1px;">
					<tr>
						<th style="text-align:center;" colspan="2">GST Summary</th>
					</tr>
					
					<tr>
						<td class="text-left"><strong>Net Total</strong></td>
						<td class="text-right"><?php //echo $f = $a + $b; ?></td>
					</tr>
					<tr>
						<td class="text-left"><strong>CGST (9%)</strong></td>
						<td class="text-right"><?php //$cgst = $f * 9 / 100; echo round($cgst,2); ?></td>
					</tr>
					<tr>
						<td class="text-left"><strong>SGST (9%)</strong></td>
						<td class="text-right"><?php //$sgst = $f * 9 / 100; echo round($sgst,2);?></td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td class="text-left"><strong>Total Amount</strong></td>
						<td class="text-right"><strong><?php //echo $f + $cgst + $sgst;?></strong></td>
					</tr>
				</table>-->
				</div>
				<!-- /.ecommerce-invoice -->
				<br /><br /><br /><br /><br /><br /><br /><br />
				<form method="post">
				<div class="text-right">
					<button id="print" class="btn btn-danger" type="submit" name="btnData"> <span><i class="fa fa-print"></i> Print</span> </button>
				</div>
				</form>
			</div>
			
			</div>
		</div>
	</div>
<!-- /.row -->
</div>
</main>
<?php include "footer.php";?>
<script src="js/jquery.PrintArea.js" type="text/JavaScript"></script>
<?php
	if(isset($_POST['btnData']))
	{
		$query = mysql_query("UPDATE p_invoice_mst SET M_FLAG = '1' WHERE P_BILL_NO='".$bill_no."'");
		$query1 = mysql_query("UPDATE photography_mst SET FLAG = '1' WHERE CUSTOMER_ID = '".$_SESSION['p_cust']."' AND ORDER_ID = '".$_SESSION['p_orderid']."'");
		
		if(($query)&&($query1))
		{
?>
<script>
$(document).ready(function() {
	//("#print").load(function() {
		var mode = 'iframe'; //popup
		var close = mode == "popup";
		var options = {
			mode: mode,
			popClose: close
		};
		$("div.printableArea").printArea(options);
	//});
});
</script>
<?php
		}
	}
?>