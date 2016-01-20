<?php $title = "Book Management"; include ("application/views/include_files/head.php") ?>
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
							<th>ឈ្មោះសៀវភៅ</th>
							<th>អ្នកនិពន្ធ</th>
              <th>អ្នកបោះពុម្ព</th>
              <th>ឆ្នាំ</th>
              <th>ប្រភេទ</th>
              <th>ចំនួន</th>
							<th>បញ្ជារ</th>
            </tr>
          </thead>
          <tbody id="book-list">
					<?php foreach ($books as $key=>$book) { ?>
						<tr class="book-row" id="book-row-<?= $book->id ?>" >
		          <td class="book-no" ><?= $key+1 ?></td>
							<td><?= $book->code ?></td>
		          <td><?= $book->title ?></td>
		          <td><?= $book->author_name ?></td>
		          <td><?= $book->publisher ?></td>
		          <td><?= $book->year ?></td>
		          <td><?= $book->book_category_name ?></td>
		          <td><?= $book->quantity ?></td>
							<td>
								<span class="link" onclick="editBook(<?= $book->id ?>, '<?= $book->title ?>', '<?= $book->author_name ?>', '<?= $book->publisher ?>', '<?= $book->year ?>', '<?= $book->category_id ?>', '<?= $book->other ?>', '<?= $book->quantity ?>' )" ><i class="fa fa-edit" ></i></span>
								<span class="link" onclick="showBook(<?= $book->id ?>, '<?= $book->title ?>', '<?= $book->author_name ?>', '<?= $book->publisher ?>', '<?= $book->year ?>', '<?= $book->category_id ?>', '<?= $book->other ?>', '<?= $book->code ?>', '<?= $book->book_category_name ?>', '<?= $book->quantity ?>' )" ><i class="fa fa-eye" ></i></span>
								<span class="link" onclick="confirm('Are you sure to delete?', 'deleteBook(<?= $book->id ?>)')" ><i class="fa fa-times-circle" ></i></span>
							</td>
		        </tr>
					<?php } ?>
					</tbody>
					<tbody id="book-search-list" class="hide">						
					</tbody>
          </table>
        </div>
			</div>

			<div class="col-sm-4 panel-body coe-panel-right" id="search-panel" >
				<h4 class="color-white" ><i class="fa fa-group" ></i> គ្រប់គ្រងពត៌មានសិស្ស</h4>
        <hr style="border: 1px solid #fff">
	            <input type="text" name="keyword" class="form-control" placeholder="ស្វែងរក....." oninput="searchBook(this.value)" >
	            <hr>
	            <div class="color-white" id="word-result-list " style="height: 60%" >
								<div style="height: 30%">
									<button class="btn btn-coe-white" onclick="newBook()"><i class="fa fa-plus" ></i> បន្ថែមថ្មី </button>
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
