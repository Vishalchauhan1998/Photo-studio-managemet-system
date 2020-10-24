<?php include "header.php"; ?>
	<div id="insert">
		<i class="fa fa-check" style="color:#00CC66;"></i> RECORD ADDED SUCCESSFULLY !!!
	</div>
	
	<div id="fail">
		<i class="fa fa-fw fa-warning" style="color:#FF3333;"></i> ERROR!!! PLEASE TRY AGAIN....
	</div>
		
		<?php
			if(!empty($_GET['msg']))
			{
				$msg = $_GET['msg'];
				if($msg == "Inserted")
				{
		 			echo '
				   <script type="text/javascript">
					 function hideMsg()
					 {
						document.getElementById("insert").style.visibility = "hidden";
					 }
			
					 document.getElementById("insert").style.visibility = "visible";
					 window.setTimeout("hideMsg()", 4000);
				   </script>';
		 		} 
				else
				{
					echo '
				   <script type="text/javascript">
					 function hideMsg()
					 {
						document.getElementById("fail").style.visibility = "hidden";
					 }
			
					 document.getElementById("fail").style.visibility = "visible";
					 window.setTimeout("hideMsg()", 4000);
				   </script>';
				}
			}
	if(isset($_GET['edt_id']))
	{
		$query = mysql_query("SELECT * FROM image_mst WHERE IMAGE_ID = '".$_GET['edt_id']."'");
		$row = mysql_fetch_array($query);
?>
		<main class="main-wrapper clearfix">
			<!-- Page Title Area -->
				<div class="row page-title clearfix">
					<div class="page-title-left">
						<h5 class="mr-0 mr-r-5">Edit Image Details</h5>
					</div>
						<!-- /.page-title-left -->
					<div class="page-title-right d-inline-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Edit Image</li>
						</ol>
					</div>
				</div>
			 <!-- /.page-title-right -->
					<div class="widget-list">
					<div class="row">
					
						<div class="col-md-12 widget-holder">
							<div class="widget-bg">
								<div class="widget-body clearfix">
								<h3 class="box-title mr-b-0">
									Update Image Details Here....
								</h3>
									<br /><br />
									<form method="POST" action="image_save.php" enctype="multipart/form-data">
											<div class="row mr-b-50">
												<div class="col-md-4 mb-3">
													<label for="validationServer01">Select Image</label>
													<span class="input-group-btn">
													<span class="btn btn-default btn-file">
														<input type="hidden" name="textprofile" value="<?php echo $row['IMAGE']?>" /> 
														<input type="file" id="profile" name="profile"  value="<?php echo $row['IMAGE'];?>" onchange="readURL(this);" >
													</span>
													</span>
													<img id="blah" style="margin-left:15px; margin-top:10px;" src="<?php echo $row['IMAGE']; ?>" id="img-edit" height="180" width="180"/>
													<input type="hidden" name="id" value="<?php echo $row['IMAGE_ID']?>" />
													
												</div>
											
												<div class="col-md-4 mb-3">
												<label for="validationServer01">Select Year </label>
												<select name="year_id" id="year_id" class="form-control" required>
													<option selected="selected" disabled="disabled"> Select Year</option>
													<?php
														$query = mysql_query("SELECT * FROM year_mst");
														while($year = mysql_fetch_array($query))
														{
													?>	
														<option value="<?php echo $year['YEAR_ID']?>" <?php if($year['YEAR_ID'] == $row['YEAR_ID']){echo "selected='selected'";}?>><?php echo $year['YEAR']?></option>
													<?php
														}
													?>
												</select>
												</div>
												
												<div class="col-md-4 mb-3">
												<label for="validationServer01"> Select Album </label>
												<select name="album_id" id="album_id" class="form-control" required>
													<option selected="selected" disabled="disabled"> Select Album </option>
													<?php
														$query = mysql_query("SELECT * FROM album_mst");
														while($year = mysql_fetch_array($query))
														{
													?>	
														<option value="<?php echo $year['ALBUM_ID']?>" <?php if($year['ALBUM_ID'] == $row['ALBUM_ID']){echo "selected='selected'";}?>><?php echo $year['ALBUM_NAME']?></option>
													<?php
														}
													?>
												</select>
												</div>
												
											</div>
										
											<div class="form-actions">
												<div class="form-group row"  style="float:right;">
													<div class="col-md-12 ml-md-auto btn-list">
														<button class="btn btn-primary" type="submit" name="btnUpdate">Update Data</button>
														<button class="btn btn-outline-default" type="reset">Cancel</button>
													</div>
												</div>
											</div>
											</form>
								</div>
							</div>
						</div>
						  
			</div>
			<!-- /.page-title -->
		</main>
		<!-- /.main-wrappper -->
		<?php include "footer.php"; ?>
<?php
	}
	else
	{
?>
		<main class="main-wrapper clearfix">
				<!-- Page Title Area -->
					<div class="row page-title clearfix">
						<div class="page-title-left">
							<h5 class="mr-0 mr-r-5">Add Image Details</h5>
						</div>
							<!-- /.page-title-left -->
						<div class="page-title-right d-inline-flex">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Insert Images</li>
							</ol>
						</div>
					</div>
				 <!-- /.page-title-right -->
					<div class="widget-list">
							<div class="row">
							
								<div class="col-md-12 widget-holder">
									<div class="widget-bg">
										<div class="widget-body clearfix">
										<h3 class="box-title mr-b-0">
											Enter Image Details Here....
											<font style="float:right"> <a href="view_image_details.php">View Image Details</a> </font>
										</h3>
										
											<br /><br />
											<form method="POST" action="image_save.php" enctype="multipart/form-data">
											<div class="row mr-b-50">
												<div class="col-md-4 mb-3">
													<label for="validationServer01">Select Image</label>
													<input type="file" id="profile" name="profile" onchange="readURL(this);" >
													<img id="blah" style="margin-left:15px; margin-top:10px;" src="" id="img-edit" height="180" width="180"/>
												</div>
											
												<div class="col-md-4 mb-3">
												<label for="validationServer01">Select Year </label>
												<select name="year_id" id="year_id" class="form-control" required>
													<option selected="selected" disabled="disabled"> Select Year</option>
													<?php
														$query = mysql_query("SELECT * FROM year_mst");
														while($year = mysql_fetch_array($query))
														{
													?>	
														<option value="<?php echo $year['YEAR_ID']?>"><?php echo $year['YEAR']?></option>
													<?php
														}
													?>
												</select>
												</div>
												
												<div class="col-md-4 mb-3">
												<label for="validationServer01"> Select Album </label>
												<select name="album_id" id="album_id" class="form-control" required>
													<option selected="selected" disabled="disabled"> Select Album </option>
												</select>
												</div>
												
											</div>
										
											<div class="form-actions">
												<div class="form-group row"  style="float:right;">
													<div class="col-md-12 ml-md-auto btn-list">
														<button class="btn btn-primary" type="submit" name="btnInsert">Insert Data</button>
														<button class="btn btn-outline-default" type="reset">Cancel</button>
													</div>
												</div>
											</div>
											</form>
										</div>
									</div>
								</div>
							</div>
					</div>
				<!-- /.page-title -->
			</main>
		<!-- /.main-wrappper -->
		<?php include "footer.php"; ?>
<?php
	}
?>
<script type="text/javascript">
	$(document).ready(function()
	{
		$("#year_id").change(function()
		{
			var id = $("#year_id").val();
			var dataString = 'id='+ id;
			$.ajax
			({
				type: "POST",
				url: "ajax_album.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$("#album_id").html(html);
				} 
			});
		});
	});
</script>
<script type="text/javascript">
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(180)
                        .height(180);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>