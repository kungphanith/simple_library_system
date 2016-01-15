<?php $title = "Library Management System"; include "include_files/head.php" ?>
<?php include "include_files/header.php" ?>
	<div class="col-sm-12" style="margin-top: 20px" >

		<div class="row">
			<div class="col-sm-8 " id="show-panel" >

				<a href="<?= base_url() ?>student/" >
					<div class="col-md-4 menu-box">
						<div class="menu-item text-center">
							<!-- <img class="icon" src="assets/images/no-image.jpg" /> -->
							<i class="fa fa-group" style="font-size: 60px; color:white;"></i>
							<br>
							<span class="title">គ្រប់គ្រងពត៌មានសិស្ស</span>
						</div>
					</div>
				</a>
				<a href="<?= base_url() ?>book/" >
					<div class="col-md-4 menu-box">
						<div class="menu-item text-center">
							<!-- <img class="icon" src="assets/images/no-image.jpg" /> -->
							<i class="fa fa-book" style="font-size: 60px; color:white;"></i>
							<br>
							<span class="title">គ្រប់គ្រងសៀវភៅ</span>
						</div>
					</div>
				</a>
				<a href="<?= base_url() ?>borrowing/" >
					<div class="col-md-4 menu-box">
						<div class="menu-item text-center">
							<!-- <img class="icon" src="assets/images/no-image.jpg" /> -->
							<i class="fa fa-calendar" style="font-size: 60px; color:white;"></i>
							<br>
							<span class="title">គ្រប់គ្រងការខ្ចី</span>
						</div>
					</div>
				</a>
				<a href="<?= base_url() ?>equipment/" >
					<div class="col-md-4 menu-box">
						<div class="menu-item text-center">
							<!-- <img class="icon" src="assets/images/no-image.jpg" /> -->
							<i class="fa fa-cubes" style="font-size: 60px; color:white;"></i>
							<br>
							<span class="title">គ្រប់គ្រងឧបករណ៍ប្រើប្រាស់</span>
						</div>
					</div>
				</a>
				<a href="<?= base_url() ?>user/" >
					<div class="col-md-4 menu-box">
						<div class="menu-item text-center">
							<!-- <img class="icon" src="assets/images/no-image.jpg" /> -->
							<i class="fa fa-user" style="font-size: 60px; color:white;"></i>
							<br>
							<span class="title">គ្រប់គ្រងអ្នកប្រើប្រាស់</span>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-4 panel-body coe-panel-right" id="search-panel" >
	            <input type="text" name="keyword" class="form-control" placeholder="សរសេរដើម្បីស្វែងរក" oninput="search(this.value)" >
	            <hr>
	            <div class="color-white" id="word-result-list " style="height: 60%" >
								<h4>System Status</h4>
								<table border="0px" class="color-white" >
									<tr>
										<td>Total Student</td>
										<td>: 340 student</td>
									</tr>
									<tr>
										<td>Total Books</td>
										<td>: 43340</td>
									</tr>
									<tr>
										<td>Total Borowed</td>
										<td>: 443340</td>
									</tr>
								</table>
								<br>
								<br>
								<?php include("application/views/include_files/_clock.php") ?>
	            </div>
			</div>
		</div>

	</div>
<?php include "include_files/foot.php" ?>
