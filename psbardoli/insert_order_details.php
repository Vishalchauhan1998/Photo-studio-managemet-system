<?php include "header.php"; ?>
<main class="main-wrapper clearfix">
	<!-- Page Title Area -->
		<div class="row page-title clearfix">
			<div class="page-title-left">
				<?php
					if(isset($_GET['edtid']))
					{
				?>
				<h5 class="mr-0 mr-r-5">Update Order Details</h5>
				<?php
					}
					else
					{
				?>
				<h5 class="mr-0 mr-r-5">Insert Order Details</h5>
				<?php
					}
				?>
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
					<?php
						if(isset($_GET['edtid']))
						{
					?>
                    <li class="breadcrumb-item active">Update Order</li>
					<?php
						}
						else
						{
					?>
					<li class="breadcrumb-item active">Insert Order</li>
					<?php
						}
					?>
				</ol>
			</div>
		</div>
	
	 
	 <!-- /.page-title-right -->
			<div class="widget-list">
			
			<!-- Insert -->
			<div class="row">
                    <!-- Tabs Justified -->
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <div class="tabs">
                                    <ul class="nav nav-tabs nav-justified" id="myTab">
                                        <li class="nav-item active">
											<a class="nav-link" href="#profile-tab2" data-toggle="tab" aria-expanded="true">OUTDOOR ORDER
											</a>
										</li>
                                        <li class="nav-item">
											<a class="nav-link" href="#messages-tab2" data-toggle="tab" aria-expanded="true">FUNCTION ORDER
											</a>
										</li>
                                    </ul>
                                    <!-- /.nav-tabs -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="profile-tab2">
                                            <?php include "outdoor_order.php"; ?>
                                        </div>
										
                                        <div class="tab-pane" id="messages-tab2">
                                            <?php include "function_order.php"; ?>
                                        </div>
                                    </div>
                                    <!-- /.tab-content -->
                                </div>
                                <!-- /.tabs -->
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                </div>
                
			<!-- /.page-title -->
			</div>
</main>
<!-- /.main-wrappper -->
</div>
<!-- /.content-wrapper -->
<?php include "footer.php"; ?>
<script type="text/javascript">
$(document).ready(function(){
	$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
		localStorage.setItem('activeTab', $(e.target).attr('href'));
	});
	var activeTab = localStorage.getItem('activeTab');
	if(activeTab){
		$('#myTab a[href="' + activeTab + '"]').tab('show');
	}
});
</script>