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

						$querya = mysql_query("SELECT * FROM customer_details, p_invoice_mst WHERE p_invoice_mst.P_CUSTOMER_ID = '".$_SESSION['p_cust']."' AND customer_details.CUSTOMER_ID = '".$_SESSION['p_cust']."' AND p_invoice_mst.M_FLAG = '0'");
						$a = mysql_fetch_array($querya);
						
						$queryor = mysql_query("SELECT * FROM photography_mst WHERE PHOTO_ID = '".$a['P_ORDER_ID']."'");
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
						<td colspan="8"><div style="margin-left:25px; margin-top:12px;">Shree Ganeshay Namah</div></td>
					  <td width="21%"><div align="right" style="margin-right:25px; margin-top:12px;">Jay Swami Narayana</div></td>
					</tr>
					
					<tr>
					  	<td colspan="9">
							<h2 class="text-center text-danger">Shreeji Digital Studio</h2>
							<h6 class="text-center">
								<span class="text-danger"> 101 Sky Mall, Ten Road, Bardoli - 394601</span>
								<span> Jignesh Patel Mo : 9909594409 </span>						
							</h6>					  
						</td>
				 	</tr>
					
					<tr>
						<td colspan="9">
					  		<div class="pull-left" style="margin-left:25px;">
								<address>
									<h5> &nbsp;<b class="text-danger"><?php echo $a['CUSTOMER_NAME']; ?></b></h5>
									<p class="text-muted m-l-5"><?php echo $a['CUSTOMER_ADDRESS']?>,
										<br/> <?php echo $a['CUSTOMER_CONTACT']?></p>
								</address>
							</div>
							<div class="pull-right text-right" style="margin-right:25px;">
								<address>
									<h4 class="font-bold"></h4><strong>Bill No :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> <?php echo $bill_no = $a['P_BILL_NO']; ?></h4>
									<p class="m-t-30"><b>Order Id : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> <?php echo $a['P_ORDER_ID'] ?>
									<br /><strong>Invoice Date : &nbsp;&nbsp;&nbsp;&nbsp;</strong> <?php echo $a['P_BILL_DATE'] ?></p>
								</address>
							</div>						
						</td>
			      </tr>
					
						<tr>
							<th class="text-left" colspan="3" ><strong><font style="margin-left:25px;">Album Name</strong></th>
							<th class="text-left" colspan="2"><strong>Paper Name</strong></th>
							<th width="10%" class="text-center"><strong>Size</strong></th>
							<th width="8%" class="text-center"><strong>Qty</strong></th>
							<th width="6%" class="text-center"><strong>Rate</strong></th>
							<th width="21%" class="text-center"><strong>Total </strong></th>
						</tr>
					<tbody>
						<?php
						$photo_cust = $_SESSION['p_cust'];
						$orderid = $_SESSION['p_orderid'];
						$orderdate = $_SESSION['p_date'];
						$query1 = mysql_query("SELECT * FROM p_invoice_mst where P_CUSTOMER_ID = '".$photo_cust."' AND P_ORDER_ID = '".$orderid."' AND M_FLAG = '0'");
						while($prow = mysql_fetch_array($query1))	
						{
										$sel_type = mysql_query("SELECT * FROM type_mst WHERE TYPE_ID = '".$prow['ALBUM_NAME']."'");
										$type = mysql_fetch_array($sel_type);
										
										$sel_stype = mysql_query("SELECT * FROM subtype_mst WHERE SUBTYPE_ID = '".$prow['PAPER_NAME']."'");
										$stype = mysql_fetch_array($sel_stype);
							
						?>
						<tr>
							<td colspan="3"><font style="margin-left:25px;"><?php echo $type['TYPE_NAME']?></font></td>
							<td class="text-left" colspan="2"><?php echo $stype['SUBTYPE_NAME'];?></td>
							<td  width="10%" class="text-center"><?php echo $prow['A_SIZE']?></td>
							<td  width="8%" class="text-center"><?php echo $pqty = $prow['A_QTY']?></td>
							<td class="text-center"><?php echo $prate = $prow['A_PRICE']?></td>
							<td width="21%"class="text-center">
								<?php
									$tot_photo = $prow['A_TOTAL'];
									echo $total = $tot_photo;
								?>							</td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
				
				<br />		
				<?php
					$sum_query = mysql_query("SELECT SUM(A_TOTAL) FROM p_invoice_mst WHERE  P_CUSTOMER_ID = '".$photo_cust."' AND P_ORDER_ID = '".$orderid."' AND M_FLAG = '0'");
					$sq = mysql_fetch_array($sum_query);
					
					$a = $sq['SUM(A_TOTAL)'];
				?>	
				<table style="width:30%; float:right;" border="1px;">
					<tr>
						<th style="text-align:center;" colspan="2">GST Summary</th>
					</tr>
					
					<tr>
						<td class="text-left"><strong>Net Total</strong></td>
						<td class="text-right"><?php echo $f = $a; ?></td>
					</tr>
					<tr>
						<td class="text-left"><strong>CGST (9%)</strong></td>
						<td class="text-right"><?php $cgst = $f * 9 / 100; echo round($cgst,2); ?></td>
					</tr>
					<tr>
						<td class="text-left"><strong>SGST (9%)</strong></td>
						<td class="text-right"><?php $sgst = $f * 9 / 100; echo round($sgst,2);?></td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td class="text-left"><strong>Total Amount</strong></td>
						<td class="text-right"><strong><?php echo $f + $cgst + $sgst;?></strong></td>
					</tr>
				</table>
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