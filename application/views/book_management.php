<?php $title = "Translate Mode"; include "include_files/head.php" ?>
<?php include "include_files/header.php" ?>

	<div class="col-sm-12" style="margin-top: 20px" >

		<div class="row">
			<div class="col-sm-8 color-white" id="show-panel" >
        <h3>Book Management</h3>
        <hr style="border: 1px solid #fff">
        <div class="col-md-12 bg-color-white color-black">
          <table class="table">
            <tr>
              <th>No</th>
              <th>Code</th>
              <th>Title</th>
              <th>Author Name</th>
              <th>Publisher</th>
              <th>Category</th>
              <th>Year</th>
              <th>Action</th>
            </tr>
            <tr>
              <td>1</td>
              <td>CIB001</td>
              <td>The end  of the world</td>
              <td>Janm dina</td>
              <td>Sonat Solla</td>
              <td>Technology</td>
              <td>2004</td>
              <td>Delete Edit</td>
            </tr>
            <tr>
              <td>2</td>
              <td>CIB002</td>
              <td>រឿងទំទាវ</td>
              <td>គ្មាន</td>
              <td>រោងពុម្ពស្មោះស្នេហ៍</td>
              <td>រៀងប្រឡោបលោក</td>
              <td>1970</td>
              <td>Delete Edit</td>
            </tr>
          </table>
        </div>
			</div>
			<div class="col-sm-4 panel-body coe-panel-right" id="search-panel" >
	            <input type="text" name="keyword" class="form-control" placeholder="សរសេរដើម្បីស្វែងរក" oninput="search(this.value)" >
	            <hr>
	            <div class="color-white" id="word-result-list " style="height: 60%" >
								<button class="btn btn-coe-white"> បន្ថែមថ្មី </button>
                <button class="btn btn-coe-white">ព្រីនកាតសមាជិក </button>
	            </div>
			</div>
		</div>

	</div>

<?php //include "include_files/footer.php" ?>
