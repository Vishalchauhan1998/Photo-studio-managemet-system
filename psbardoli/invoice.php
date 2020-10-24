<?php include "header.php"; ?>
<main class="main-wrapper clearfix">
	<div class="row page-title clearfix">
			<div class="page-title-left">
				<h5 class="mr-0 mr-r-5">Order Invoice</h5>
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Order Invoice</li>
				</ol>
			</div>
  </div>
     <!-- /.page-title-right -->
	<?php
	
		$querya = mysql_query("SELECT * 
		FROM invoice_mst, photo_albumdetails, order_mst, customer_details
		WHERE invoice_mst.ORDER_NO = order_mst.ORDER_NO
		AND order_mst.ORDER_NO = photo_albumdetails.ORDER_NO
		AND photo_albumdetails.CUSTOMER_ID = customer_details.CUSTOMER_ID
		AND photo_albumdetails.FLAG = '1' AND invoice_mst.INVOICE_ID = '".$_GET['getid']."'");
		$a = mysql_fetch_array($querya);
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
					  <td width="38%"><div align="right" style="margin-right:25px; margin-top:12px;">Jay Swami Narayana</div></td>
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
									<h5><b class="text-danger"><?php echo $a['CUSTOMER_NAME']; ?></b></h5>
									<p class="text-muted m-l-5"><?php echo $a['CUSTOMER_ADDRESS']?>,
										<br/> <?php echo $a['CUSTOMER_CONTACT']?></p>
								</address>
							</div>
							<div class="pull-right text-right" style="margin-right:25px;">
								<address>
									<h4 class="font-bold"></h4><strong>Bill No :</strong> <?php echo $a['BILL_NO']; ?></h4><br>
									<strong>Bill Date :</strong> <i class="fa fa-calendar"></i> <?php echo $date = date('d-m-Y'); ?>
									<br /><strong>Invoice Date :</strong> <i class="fa fa-calendar"></i> <?php echo $a['BILL_DATE'] ?></p>
								</address>
							</div>						</td>
			      </tr>
					
					<tr>
					  <td colspan="8"><div align="center"><strong>ALBUM SUMMARY </strong></div></td>
				  </tr>
				  
					
					<tr>
					  <td class="text-left" colspan="2"><font style="margin-left:25px;"><strong>PARTICULAR</strong></td>
				      <td class="text-left" colspan="2"><strong>QTY</strong></td>
				      <td class="text-right" colspan="2"><strong>RATE</strong></td>
				      <td class="text-right" colspan="2"><font style="margin-right:25px;"><strong>TOTAL</strong></td>
				  	</tr>
				  	
					<tbody>
					<tr>
						<td colspan="8"><h6><font style="margin-left:25px;">ALBUM</h6></td>
					</tr>
					<?php
						$final_inv = mysql_query("SELECT * FROM type_mst, subtype_mst, photo_albumdetails WHERE photo_albumdetails.CUSTOMER_ID = '".$_GET['custid']."' AND	subtype_mst.SUBTYPE_ID = photo_albumdetails.SUBTYPE_ID AND type_mst.TYPE_ID = photo_albumdetails.TYPE_ID AND type_mst.TYPE_NAME = 'ALBUM'");
						while($finv = mysql_fetch_array($final_inv))
						{
					?>
					<tr>
						<td colspan="2">
							<font style="margin-left:25px;">
							<?php 
								echo $finv['SUBTYPE_NAME']; echo "&nbsp;&nbsp;&nbsp;&nbsp;";
								if($finv['SIZE'] > 0)
								{
									echo $finv['SIZE'];
								}
								else
								{
									
								}
							?>
						</td>
						<td colspan="2" class="text-left"><?php echo $finv['QTY']; ?></td>
						<td colspan="2" class="text-right"><?php echo $finv['PRICE']; ?></td>
						<td colspan="2" class="text-right" ><font style="margin-right:25px;"><?php echo $finv['TOTAL']; ?></td>
					</tr>
					<?php
						}
					?>
					
					<tr>
						<td colspan="8"><h6><font style="margin-left:25px;">MOVIE</h6></td>
					</tr>
					<?php
						$final_inv = mysql_query("SELECT * FROM type_mst, subtype_mst, photo_albumdetails WHERE photo_albumdetails.CUSTOMER_ID = '".$_GET['custid']."' AND	subtype_mst.SUBTYPE_ID = photo_albumdetails.SUBTYPE_ID AND type_mst.TYPE_ID = photo_albumdetails.TYPE_ID AND type_mst.TYPE_NAME = 'MOVIE'");
						while($finv = mysql_fetch_array($final_inv))
						{
					?>
					<tr>
						<td colspan="2">
							<font style="margin-left:25px;">
							<?php 
								echo $finv['SUBTYPE_NAME']; echo "&nbsp;&nbsp;&nbsp;&nbsp;";
								if($finv['SIZE'] > 0)
								{
									echo $finv['SIZE'];
								}
								else
								{
									
								}
							?>
							</font>
						</td>
						<td colspan="2" class="text-left"><?php echo $finv['QTY']; ?></td>
						<td colspan="2" class="text-right"><?php echo $finv['PRICE']; ?></td>
						<td colspan="2" class="text-right"><font style="margin-right:25px;"><?php echo $finv['TOTAL']; ?></td>
					</tr>
					<?php
						}
					?>
					
					<tr>
						<td colspan="8"><h6><font style="margin-left:25px;">LIVE</h6></td>
					</tr>
					<?php
						$final_inv = mysql_query("SELECT * FROM type_mst, subtype_mst, photo_albumdetails WHERE photo_albumdetails.CUSTOMER_ID = '".$_GET['custid']."' AND	subtype_mst.SUBTYPE_ID = photo_albumdetails.SUBTYPE_ID AND type_mst.TYPE_ID = photo_albumdetails.TYPE_ID AND type_mst.TYPE_NAME = 'LIVE'");
						while($finv = mysql_fetch_array($final_inv))
						{
					?>
					<tr>
						<td colspan="2">
							<font style="margin-left:25px;">
							<?php 
								echo $finv['SUBTYPE_NAME']; echo "&nbsp;&nbsp;&nbsp;&nbsp;";
								if($finv['SIZE'] > 0)
								{
									echo $finv['SIZE'];
								}
								else
								{
									
								}
							?>
							</font>
						</td>
						<td colspan="2" class="text-left"><?php echo $finv['QTY']; ?></td>
						<td colspan="2" class="text-right"><?php echo $finv['PRICE']; ?></td>
						<td colspan="2" class="text-right"><font style="margin-right:25px;"><?php echo $finv['TOTAL']; ?></td>
					</tr>
					<?php
						}
					?>
					
					<tr>
						<td colspan="8"><h6><font style="margin-left:25px;">PRINT PAPER FOR ALBUM</h6></td>
					</tr>
					<?php
						$final_inv = mysql_query("SELECT * FROM type_mst, subtype_mst, photo_albumdetails WHERE photo_albumdetails.CUSTOMER_ID = '".$_GET['custid']."' AND	subtype_mst.SUBTYPE_ID = photo_albumdetails.SUBTYPE_ID AND type_mst.TYPE_ID = photo_albumdetails.TYPE_ID AND type_mst.TYPE_NAME = 'PP ALBUM'");
						while($finv = mysql_fetch_array($final_inv))
						{
					?>
					<tr>
						<td colspan="2">
							<font style="margin-left:25px;">
							<?php 
								echo $finv['SUBTYPE_NAME']; echo "&nbsp;&nbsp;&nbsp;&nbsp;";
								if($finv['SIZE'] > 0)
								{
									echo $finv['SIZE'];
								}
								else
								{
									
								}
							?>
						</td>
						<td colspan="2" class="text-left"><?php echo $finv['QTY']; ?></td>
						<td colspan="2" class="text-right"><?php echo $finv['PRICE']; ?></td>
						<td colspan="2" class="text-right"><font style="margin-right:25px;"><?php echo $finv['TOTAL']; ?></td>
					</tr>
					<?php
						}
					?>
				</tbody>
									
					<tr>
						<td colspan="8">&nbsp;</td>
					</tr>
					<tr>
					  <td colspan="8" style="margin-top:125px;"><div align="center"><strong>CAMERA SUMMARY </strong></div></td>
				  	</tr>
					<?php	
						$query_cam = mysql_query("SELECT * FROM order_mst WHERE ORDER_NO = '".$a['ORDER_NO']."'");
						$fetch_cam = mysql_fetch_array($query_cam);
					?>
					
					<tr>
						<td colspan="2"><font style="margin-left:25px;">CAMERA</td>
						<td class="text-left" colspan="2"><?php echo $cam = $fetch_cam['NO_of_CAM'] ?></td>
						<td class="text-right" colspan="2"><?php echo $p_cam = $fetch_cam['RATE_CAM'] ?></td>
						<td class="text-right" colspan="2"><font style="margin-right:25px;"><?php echo $totcam = $cam * $p_cam; ?></td>
					</tr>
					
					<tr>
						<td colspan="2"><font style="margin-left:25px;">VIDEO</td>
						<td class="text-left" colspan="2"><?php echo $vid = $fetch_cam['NO_of_DSLR'] ?></td>
						<td class="text-right" colspan="2"><?php echo $p_vid = $fetch_cam['RATE_DSLR'] ?></td>
						<td class="text-right" colspan="2"><font style="margin-right:25px;"><?php echo $totvid = $vid * $p_vid; ?></td>
					</tr>
					
					<tr>
						<td colspan="2"><font style="margin-left:25px;">DSLR</td>
						<td class="text-left" colspan="2"><?php echo $dslr = $fetch_cam['NO_of_VIDEO'] ?></td>
						<td class="text-right" colspan="2"><?php echo $p_dslr = $fetch_cam['RATE_VIDEO'] ?></td>
						<td class="text-right" colspan="2"><font style="margin-right:25px;"><?php echo $totdslr = $dslr * $p_dslr; ?></td>
					</tr>
					<tr>
						<td colspan="8">&nbsp;</td>
					</tr>
					<?php
					$sum = mysql_query("SELECT SUM(TOTAL) FROM photo_albumdetails WHERE ORDER_NO = '".$a['ORDER_NO']."'");
					$rsum = mysql_fetch_array($sum);
					$n_cam = $totcam + $totvid + $totdslr;
					$n_amt = $rsum['SUM(TOTAL)'];
					?>
					<tr>
						<td class="text-right" colspan="7"><strong> Grand Total</strong></td>
						<td class="text-right" colspan="1"><font style="margin-right:25px;"><strong><?php echo $tot = $n_cam + $n_amt; ?></strong></td>
					</tr>
				</table>
				<br />		
			</div>
				<!-- /.ecommerce-invoice -->
				<br /><br /><br /><br /><br /><br /><br /><br />
				<form method="post">
				<div class="text-right">
					<button id="print" class="btn btn-danger" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
				</div>
				</form>
			</div>
			</div>
		</div>
	</div>
<!-- /.row -->
</div>
</main>
<?php include "footer.php"; 
?>
<script src="js/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>