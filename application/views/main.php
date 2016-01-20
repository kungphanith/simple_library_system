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
				<!-- <a href="<?= base_url() ?>equipment/" >
					<div class="col-md-4 menu-box">
						<div class="menu-item text-center">
							<img class="icon" src="assets/images/no-image.jpg" />
							<i class="fa fa-cubes" style="font-size: 60px; color:white;"></i>
							<br>
							<span class="title">គ្រប់គ្រងឧបករណ៍ប្រើប្រាស់</span>
						</div>
					</div>
				</a> -->
				<!-- <a href="<?= base_url() ?>user/" >
					<div class="col-md-4 menu-box">
						<div class="menu-item text-center">
							 <img class="icon" src="assets/images/no-image.jpg" />
							<i class="fa fa-user" style="font-size: 60px; color:white;"></i>
							<br>
							<span class="title">គ្រប់គ្រងអ្នកប្រើប្រាស់</span>
						</div>
					</div>
				</a> -->
			</div>
			<div class="col-sm-4 panel-body coe-panel-right" id="search-panel" >
	            <h3 class="color-white">ផ្ទាំងជម្រើសកម្មវិធី</h3>
	            <hr>
	            <div class="color-white" id="word-result-list " style="height: 60%" >
								<br>
								<br>
								<?php include("application/views/include_files/_clock.php") ?>
	            </div>
	            <div class="color-white" >
	            	រក្សាសិទ្ធ &copy; 2016 បង្កើតដោយ លោក គង់ ផាណីត
	            </div>
			</div>
		</div>

	</div>
<?php include "include_files/foot.php" ?>
