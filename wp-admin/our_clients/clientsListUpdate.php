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
							<li class="active"> Edite Project</li>
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
								<h5 class="panel-title">Edite Project</h5>
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
									$client_id = $_GET['client_id'];
									$updateSelectQry = "SELECT * FROM our_clients WHERE id={$client_id}";
									$updateclientstList = mysqli_query($dbCon, $updateSelectQry);
								?>
								<?php
									foreach ($updateclientstList as $key => $client) {
								?>
									<form class="form-horizontal" action="../controller/clientsConfig.php?client_id=<?php echo $client['id']; ?>" method="POST" enctype="multipart/form-data">
										<fieldset class="content-group">

											<div class="form-group">
												<label class="control-label col-lg-2" for="client_name">Client Name</label>
												<div class="col-lg-10">
													<input type="text" class="form-control" name="client_name" value= "<?= $client['client_name']; ?>"  id="client_name">
												</div>
											</div>

											
											<div class="form-group">
												<label for="" class="control-label col-lg-2" for="client_img">Projects Image</label>
												<div class="col-lg-10">

													<input type="file" class="file-input" multiple="multiple" name="client_img" value="<?= $client['client_img']; ?>" id="client_img">
													
													<div class="file-preview">
														<div class="close fileinput-remove text-right">×</div>
														<div class="file-preview-thumbnails">
														<div class="file-preview-frame" id="preview-1657084120586">
														<img src="../uploads/clientsImg/<?= $client['client_img']; ?>" class="file-preview-image" title="<?= $client['client_img']; ?>" alt="<?= $client['client_img']; ?>" style="width:auto;height:160px;">
														</div>
														</div>
														<div class="clearfix"></div>   <div class="file-preview-status text-center text-success"></div>
														<div class="kv-fileinput-error file-error-message" style="display: none;"></div>
													</div>
												</div>
											</div>

											<!-- <div class="form-group">
												<label class="control-label col-lg-2" for="client_img">Client Image</label>
												<div class="col-lg-10">
													<input type="text" class="form-control" name="client_img" value= "<?= $client['client_img']; ?>" id="client_img">
												</div>
											</div> -->

											<div class="form-group">
												<label class="control-label col-lg-2" for="client_review">Client Review</label>
												<div class="col-lg-10">
													<textarea rows="5" cols="5" class="form-control" name="client_review" id="client_review"><?= $client['client_review']; ?></textarea>
												</div>
											</div>
										</fieldset>

										<div class="text-right">
											<a href="clientsList.php" class="btn btn-default">Back To Client List List</a>
											<button type="submit" class="btn btn-primary" name="update_client"> Update Staff </button>
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
