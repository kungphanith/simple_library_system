<?php $title = "Student Management"; include ("application/views/include_files/head.php") ?>
<?php include "application/views/include_files/header.php" ?>
	<div class="col-sm-12" style="margin-top: 20px" >

		<div class="row">
			<div class="col-sm-8 color-white" id="show-panel" >
        <div class="col-md-12 bg-color-white color-black coe-scroll" style=" height: 450px; ;overflow-y: auto;" >
          <table class="table">
         	<thead>
            <tr>
              <th>លរ</th>
							<th>លេខកូដ</th>
              <th>ឈ្មោះខ្មែរ</th>
              <th>ឈ្មោះឡាតាំង</th>
              <th>ភេទ</th>
              <th>លេខទូរស័ព្ទ</th>
              <th>ថ្ងៃខែឆ្នាំកំណើត</th>
							<th>សកម្មភាព</th>
            </tr>
          </thead>
          <tbody id="student-list">
					<?php foreach ($students as $key=>$student) { ?>
						<tr class="student-row" id="student-row-<?= $student->id ?>" >
		          <td class="student-no" ><?= $key+1 ?></td>
							<td><?= $student->code ?></td>
		          <td><?= $student->name_khmer ?></td>
		          <td><?= $student->latin_name ?></td>
		          <td><?= $student->gender ?></td>
		          <td><?= $student->phone ?></td>
							<td><?= $student->dob ?></td>
							<td>
								<span class="link" onclick="editStudent(<?= $student->id ?>, '<?= $student->name_khmer ?>', '<?= $student->latin_name ?>', '<?= $student->gender ?>', '<?= $student->phone ?>', '<?= $student->email ?>', '<?= $student->dob ?>', '<?= $student->school_name ?>', '<?= $student->other ?>' )" ><i class="fa fa-edit" ></i></span>
								<span class="link" onclick="showStudent(<?= $student->id ?>, '<?= $student->name_khmer ?>', '<?= $student->latin_name ?>', '<?= $student->gender ?>', '<?= $student->phone ?>', '<?= $student->email ?>', '<?= $student->dob ?>', '<?= $student->school_name ?>', '<?= $student->other ?>' )" ><i class="fa fa-eye" ></i></span>
								<span class="link" onclick="confirm('Are you sure to delete?', 'deleteStudent(<?= $student->id ?>)')" ><i class="fa fa-times-circle" ></i></span>
							</td>
		        </tr>
					<?php } ?>
					</tbody>
					<tbody id="student-search-list" style="display:none" >
						
					</tbody>
          </table>
        </div>
			</div>

			<div class="col-sm-4 panel-body coe-panel-right" id="search-panel" >
				<h4 class="color-white" ><i class="fa fa-group" ></i> គ្រប់គ្រងពត៌មានសិស្ស</h4>
        <hr style="border: 1px solid #fff">
	            <input type="text" name="keyword" class="form-control" placeholder="ស្វែងរក....." oninput="search(this.value)" >
	            <hr>
	            <div class="color-white" id="word-result-list " style="height: 60%" >
								<div style="height: 30%">
									<button class="btn btn-coe-white" onclick="newStudent()"><i class="fa fa-plus" ></i> បន្ថែមថ្មី </button>
									<button class="btn btn-coe-white"> <i class="fa fa-print" ></i> ព្រីនកាតសមាជិក </button>
								</div>

								<br>
								<br>
								<?php include("application/views/include_files/_clock.php") ?>
	            </div>
			</div>
		</div>
	</div>

<?php include "_form.php" ?>
<?php include "_show.php" ?>
<?php include "application/views/include_files/foot.php" ?>
