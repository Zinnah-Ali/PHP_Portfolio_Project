<?php
	if( basename(__DIR__) !== "wp-admin" ){
		$baseUrl = "../";
		$wpUrl = false;
	}else{
		$baseUrl = "./";
		$wpUrl = true;
	}
?>
<?php include('../include/head.php'); ?>
<?php require('../controller/dbConfig.php');?>
<body>
	<!-- Main navbar -->
	<?php include('../include/headNav.php'); ?>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
		<?php include('../include/sidebarNav.php'); ?>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"> Edite Banner</li>
						</ul>

						<ul class="breadcrumb-elements">
							<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear position-left"></i>
									Settings
									<span class="caret"></span>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
									<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
									<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

				<!-- Default options -->
				<div class="row">
					<div class="col-md-12">

						<!-- Basic examples -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Edite Services</h5>
								<div class="heading-elements">
									<ul class="icons-list">
										<li><a data-action="collapse"></a></li>
									</ul>
								</div>
							</div>

							<div class="panel-body">
							<?php
									if ( isset( $_GET['msg']) ) {
								?>
								<div class="alert alert-info no-border">
									<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
									<span class="text-semibold"></span> <?php echo $_GET['msg']; ?>
								</div> 
								<?php } ?>
								<?php 
									$services_id = $_GET['services_id'];
									$updateSelectQry = "SELECT * FROM services WHERE id = '{$services_id}'";
									$updateServicesList = mysqli_query($dbCon, $updateSelectQry);
								?>
								<?php
									foreach ($updateServicesList as $key => $services) {
								?>
									<form class="form-horizontal" action="../controller/servicesConfig.php?services_id=<?php echo $services['id'];?>" method="POST">
										<fieldset class="content-group">

											<div class="form-group">
												<label class="control-label col-lg-2" for="services_name">Services Name</label>
												<div class="col-lg-10">
													<input type="text" class="form-control" name="services_name" value= "<?= $services['services_name']; ?>" id="services_name">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-lg-2" for="services_details">Services Details</label>
												<div class="col-lg-10">
													<textarea rows="5" cols="5" class="form-control" name="services_details"  id="details"><?= $services['services_details']; ?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-lg-2" for="services_icon">Services Icon</label>
												<div class="col-lg-10">
													<input type="text" class="form-control" name="services_icon"  value= "<?= $services['services_icon']; ?>" id="services_icon">
												</div>
											</div>

										</fieldset>

										<div class="text-right">
											<a href="servicesList.php" class="btn btn-default">Back To Banner List</a>
											<button type="submit" class="btn btn-primary" name="update_services"> Update Banner </button>
										</div>
									</form>
								<?php } ?>
						</div>
					</div>
						</div>
						<!-- /basic examples -->

					</div>

				</div>
				<!-- /default options -->

				<!-- Footer -->
				<div class="footer text-muted">
					&copy; 2015. <a href="#">Limitless Web App Kit</a> by Zinnah Ali Eugene Kopyov</a>
				</div>
				<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

<?php include('../include/script.php'); ?>

</body>
</html>
