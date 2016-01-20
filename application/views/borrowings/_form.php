<div id="borrowing-form" class="modal fade coe-modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-book_id">ទម្រង់ពត៌មានការខ្ចីសៀវភៅ</h4>
      </div>
      <div class="modal-body">
        <!-- body -->
      <div class="row">
        <div class="col-sm-6">

          <div class="form-group">
            <label>សៀវភៅ</label>
            <input type="hidden"  id="id" >
            <select class="form-control" id="book-id" tabindex="1" required >
            	<?php foreach ($books as $key => $book) {
            		echo "<option value='$book->id'>$book->title - $book->code </option>";
            	}?>
            </select>
          </div>

          <div class="form-group">
            <label for="book_id" >ថ្ងៃខ្ចី</label>
            <input type="text" id="borrow-at" tabindex="3" class="form-control datepicker" required />
          </div>
         	<div class="form-group">
            <label for="is_inroom" >
	            <input type="checkbox" class="" id="is_inroom"  required >
	            អានក្នុងបណ្ណាល័យ
            </label>
            
          </div>

         
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="book_id" >សិស្ស</label>
            <select class="form-control" id="student-id" tabindex="1" required >
            	<?php foreach ($students as $key => $student) {
            		echo "<option value='$student->id'>$student->name_khmer - $student->code </option>";
            	}?>
            </select>
          </div>

          <div class="form-group">
            <label for="book_id" >ថ្ងៃសង</label>
            <input type="text" class="form-control datepicker" id="returned-at" tabindex="4" required >
          </div>

        </div>
      </div>

      </div>
      <div class="modal-footer">
        <p class="pull-left" id="form-result" ><!-- Hello --></p>
        <button type="button" class="btn btn-coe-white" id="borrowing-form-save" >Save</button>
        <button type="button" class="btn btn-coe-white" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="return-book-form" class="modal fade coe-modal" role="dialog">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-book_id">បំពេញការសងសៀវភៅ</h4>
      </div>
      <div class="modal-body">
        <!-- body -->
	      <div class="row">
	        <div class="col-sm-8">
	          <div class="form-group">
	            <label for="return-book-date" >កាលបរិច្ឆេប្រគល់</label>
	            <input type="text" id="return-book-date" tabindex="3" class="form-control datepicker" required />
	          </div>
	        </div>
	      </div>

      </div>
      <div class="modal-footer">
        <p class="pull-left" id="return-book-form-result" ><!-- Hello --></p>
        <button type="button" class="btn btn-coe-white" id="return-book-form-save" >OK</button>
        <button type="button" class="btn btn-coe-white" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript" >

  function newBorrowing(){
    $('#borrowing-form-save').attr("onclick", "createBorrowing()");
    $('#borrowing-form').modal();
  }
  function createBorrowing(){
    if ($('input[required]').val() == ""){
      $('#form-result').html('Please input required field');
      $('input[required]').css('border', "1px solid red");
      return;
    }
    else{
      $('input[required]').css('border', "1px solid #bbb");
    }
    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>borrowing/create",
      data: {
        book_id: $('#book-id').val(),
        student_id: $('#student-id').val(),
        borrow_at: $('#borrow-at').val(),
        returned_at: $('#returned-at').val(),
        is_inroom: $('#is-inroom').val()
      },
      beforeSend: function()
      {
        $('#form-result').html('Saving Please Waiting...');
      },
      success: function(data)
      {
        if (data.charAt(0) == "<"){
          $('#form-result').html('Save faild please Login');
          window.location = "<?= base_url() ?>";
        }
        else{
          data = JSON.parse(data);
          $.each(data, function(i, borrowing){
          	var borrowing_status;
          	if(borrowing.is_returned == "1"){
          		borrowing_status = "<span class='label label-info'>សងរួច</span>";
          	}
          	else{
          		borrowing_status = "<span class='btn label label-warning' onclick='returnBook("+borrowing.id+")' >មិនទាន់សង</span>"
          	}
            $('#borrowing-list').append("<tr id='borrowing-row-"+borrowing.id+"' class='borrowing-row list-row' > <td class='borrowing-no' >"+ (parseInt($('.borrowing-no:last').html())+1) +"</td> <td>"+borrowing.book_title+"</td> <td>"+borrowing.student_name+"</td> <td>"+borrowing.lender_name+"</td> <td></td> <td>"+borrowing.borrow_at+"</td> <td>"+borrowing.returned_at+"</td> <td id='borrowing-status-"+borrowing.id +"'>"+borrowing_status+"</td> <td> <span class='link' onclick='showBorrowing(" + borrowing.id + ", \"" + borrowing.book_title + "\", \""+ borrowing.student_name + "\", \"" + borrowing.lender_name + "\", \""+ borrowing.reciever_name + "\", \""+ borrowing.borrow_at +"\", \""+ borrowing.returned_at+"\", \""+ borrowing.is_inroom +"\")' ><i class='fa fa-eye' ></i></span> </td></tr>")
          });
          $('#form-result').html('Save Completed');
        }
      }
    });
    $('.form-control').val('');
  }

  function searchBorrowing(keyword){
    if (keyword.length <2){
      $("#borrowing-list").show('');
      $("#borrowing-search-list").hide('');
      return;
    }
    $("#borrowing-list").hide('');
    $("#borrowing-search-list").show('').removeClass("hide");
    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>borrowing/search",
      data: {
        keyword: keyword
      },
      beforeSend: function()
      {
        $('#borrowing-search-list').html("<tr> <td colspan='8'> Searching .... </td> </tr>")
      },
      success: function(data)
      {
        if (data=="[]"){
          $('#borrowing-search-list').html("<tr> <td colspan='8'> No result found for your keyword </td> </tr>")
        }
        else{
        	$('#borrowing-search-list').html("");
          data = JSON.parse(data);
          $.each(data, function(i, borrowing){
          	var borrowing_status;
          	if(borrowing.is_returned == "1"){
          		borrowing_status = "<span class='label label-info'>សងរួច</span>";
          	}
          	else{
          		borrowing_status = "<span class='btn label label-warning' onclick='returnBook("+borrowing.id+")' >មិនទាន់សង</span>"
          	}
            $('#borrowing-search-list').append("<tr id='borrowing-row-"+borrowing.id+"' class='borrowing-row list-row' > <td class='borrowing-no' >"+ (parseInt($('.borrowing-no:last').html())+1) +"</td> <td>"+borrowing.book_title+"</td> <td>"+borrowing.student_name+"</td> <td>"+borrowing.lender_name+"</td> <td></td> <td>"+borrowing.borrow_at+"</td> <td>"+borrowing.returned_at+"</td> <td id='borrowing-status-"+borrowing.id +"'>"+borrowing_status+"</td> <td> <span class='link' onclick='showBorrowing(" + borrowing.id + ", \"" + borrowing.book_title + "\", \""+ borrowing.student_name + "\", \"" + borrowing.lender_name + "\", \""+ borrowing.reciever_name + "\", \""+ borrowing.borrow_at +"\", \""+ borrowing.returned_at+"\", \""+ borrowing.is_inroom +"\")' ><i class='fa fa-eye' ></i></span> </td></tr>")
          });  
        }
      }
    });
  }

  function deleteBorrowing(id){
    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>borrowing/delete",
      data: {
        id: id
      },
      beforeSend: function()
      {

      },
      success: function(data)
      {
        $('#borrowing-row-'+id).remove();
      }
    });
  }

  function returnBook(id){
  	$('#return-book-form-save').attr('onclick', "doReturnBook("+id+")");
  	$('#return-book-form').modal();
  }
  function doReturnBook(id){
  	$.ajax({
      type: "POST",
      url: "<?= base_url() ?>borrowing/do_return_book",
      data: {
        id: id,
        returned_at: $('#return-book-date').val()
      },
      beforeSend: function()
      {

      },
      success: function(data)
      {
        $('#borrowing-status-'+id).html("<span class='label label-info'>សងរួច</span>");
      }
    });
    $('#return-book-form').modal('hide');
  }

</script>
