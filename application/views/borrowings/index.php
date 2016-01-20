<?php $title = "Borrowing Management"; include ("application/views/include_files/head.php") ?>
<?php include "application/views/include_files/header.php" ?>
	<div class="col-sm-12" style="margin-top: 20px" >

		<div class="row">
			<div class="col-sm-8 color-white" id="show-panel" >
        <div class="col-md-12 bg-color-white color-black" style=" height: 450px; ;overflow: auto;" >
          <table class="table">
         	<thead>
            <tr style="white-space: nowrap;">
              <th>លរ</th>
							<th>ឈ្មោះសៀវភៅ</th>
							<th>ឈ្មោះសិស្ស</th>
							<th>អ្នកឱ្យខ្ចី</th>
              <th>អ្នកទទួល</th>
              <th>ថ្ងៃខ្ចី</th>
              <th>ថ្ងៃសង</th>
              <th>ស្ថានភាព</th>
							<th>បញ្ជារ</th>
            </tr>
          </thead>
          <tbody id="borrowing-list">
					<?php foreach ($borrowings as $key=>$borrowing) { ?>
						<tr class="borrowing-row list-row" id="borrowing-row-<?= $borrowing->id ?>" >
		          <td class="borrowing-no" ><?= $key+1 ?></td>
							<td><?= $borrowing->book_title ?></td>
		          <td><?= $borrowing->student_name ?></td>
		          <td><?= $borrowing->lender_name ?></td>
		          <td><?= $borrowing->reciever_name ?></td>
		          <td><?= $this->date->format_date($borrowing->borrow_at) ?></td>
		          <td><?= $this->date->format_date($borrowing->returned_at) ?></td>
		          <td id="borrowing-status-<?= $borrowing->id ?>" ><?php if ($borrowing->is_returned) echo "<span class='label label-info'>សងរួច</span>"; else echo "<span class='btn label label-warning' onclick='returnBook($borrowing->id)' >មិនទាន់សង</span>"; ?></td>
							<td>
								<span class="link" onclick="showBorrowing(<?= $borrowing->id ?>, '<?= $borrowing->book_title ?>', '<?= $borrowing->student_name ?>', '<?= $borrowing->lender_name ?>', '<?= $borrowing->reciever_name ?>', '<?= $this->date->format_date($borrowing->borrow_at) ?>', '<?= $this->date->format_date($borrowing->returned_at) ?>', '<?= $borrowing->recieved_at ?>', '<?= $borrowing->is_inroom ?>', '<?= $borrowing->is_returned ?>')" ><i class="fa fa-eye" ></i></span>								
							</td>
		        </tr>
					<?php } ?>
					</tbody>
					<tbody id="borrowing-search-list" class="hide">						
					</tbody>
          </table>
        </div>
			</div>

			<div class="col-sm-4 panel-body coe-panel-right" id="search-panel" >
				<h4 class="color-white" ><i class="fa fa-group" ></i> គ្រប់គ្រងពត៌មានសិស្ស</h4>
        <hr style="border: 1px solid #fff">
	            <input type="text" name="keyword" class="form-control" placeholder="ស្វែងរក....." oninput="searchBorrowing(this.value)" >
	            <hr>
	            <div class="color-white" id="word-result-list " style="height: 60%" >
								<div style="height: 30%">
									<button class="btn btn-coe-white" onclick="newBorrowing()"><i class="fa fa-plus" ></i> បន្ថែមថ្មី </button>
									<a href="<?= base_url() ?>" class="btn btn-coe-white"> <i class="fa fa-dashboard" ></i> ទៅផ្ទាំងដើម </a>
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
