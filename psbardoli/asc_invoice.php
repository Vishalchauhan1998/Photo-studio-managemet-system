<?php include "header.php"; ?>
<main class="main-wrapper clearfix">
	<div class="row page-title clearfix">
			<div class="page-title-left">
				<h5 class="mr-0 mr-r-5">Asseccories Invoice</h5>
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Asseccories Order Invoice</li>
				</ol>
			</div>
  </div>
     <!-- /.page-title-right -->
<?php
	$querya = mysql_query("SELECT * FROM customer_details, accessories_mst WHERE accessories_mst.CUSTOMER_ID = '".$_SESSION['asc_cust']."' AND accessories_mst.ORDER_REF_NO = '".$_SESSION['asc_orderid']."' AND accessories_mst.FLAG = '2'");
	$a = mysql_fetch_array($querya);
						
	$queryor = mysql_query("SELECT * FROM accessories_details WHERE ASC_ID = '".$a['ASC_ID']."'");
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
									<h4 class="font-bold"></h4><strong>Bill No :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> <?php echo $bill_no =  $a['BILL_NO']; ?></h4>
									<p class="m-t-30"><b>Order Id : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> <?php echo $a['ORDER_REF_NO'] ?>
									<br /><strong>Invoice Date : &nbsp;&nbsp;&nbsp;&nbsp;</strong> <?php echo $a['DATE'] ?></p>
								</address>
							</div>						
						</td>
			      </tr>
					
					<tr>
						<th class="text-left"><strong> <font style="margin-left:25px;">Order Id</strong></th>
						<th class="text-center" colspan="2"><strong>Accessory Name</strong></th>
						<th class="text-center" colspan="2"><strong>Qty</strong></th>
						<th class="text-center" colspan="2"><strong>Rate</strong></th>
						<th class="text-right"><strong> <font style="margin-right:25px;">Total </strong></th>
					</tr>
					<tbody>
						<?php
						$ftot = 0;
						$photo_cust = $_SESSION['asc_cust'];
						$orderid = $_SESSION['asc_orderid'];
						$orderdate = $_SESSION['asc_date'];
						$query1 = mysql_query("SELECT * FROM accessories_mst where CUSTOMER_ID = '".$photo_cust."' AND ORDER_REF_NO = '".$orderid."' AND FLAG = '2'");
						while($prow = mysql_fetch_array($query1))	
						{
						?>
						<tr>	
							<td> <font style="margin-left:25px;"><?php echo $prow['ORDER_REF_NO']?></td>
							<td class="text-center"  colspan="2"><?php echo $or['ASC_NAME']?></td>
							<td class="text-center"  colspan="2"><?php echo $fqty = $prow['QTY']?></td>
							<td class="text-center"  colspan="2"><?php echo $frate = $prow['RATE']?></td>
							<td class="text-right"> <font style="margin-right:25px;"> <?php echo $frate = $prow['TOTAL']?></td>
							
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
				
				<br />		
				<?php
				
					/*$sum_query = mysql_query("SELECT SUM(TOTAL) FROM accessories_mst WHERE CUSTOMER_ID = '".$photo_cust."' AND ORDER_REF_NO= '".$orderid."' AND FLAG = '2'");
					$sq = mysql_fetch_array($sum_query);
					
					
					$a = $sq['SUM(TOTAL)'];*/
				?>	
				<!--<table style="width:30%; float:right;" border="1px;">
					<tr>
						<th style="text-align:center;" colspan="2">GST Summary</th>
					</tr>
					
					<tr>
						<td class="text-left"><strong>Net Total</strong></td>
						<td class="text-right"><?php //echo $f = $a; ?></td>
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
		$query = mysql_query("UPDATE accessories_mst SET FLAG = '1' WHERE BILL_NO='".$bill_no."'");		
		if(($query))
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