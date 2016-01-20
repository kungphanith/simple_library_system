<div id="book-form" class="modal fade coe-modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ទម្រង់ពត៌មានសៀវភៅ</h4>
      </div>
      <div class="modal-body">
        <!-- body -->
      <div class="row">
        <div class="col-sm-6">

          <div class="form-group">
            <label for="title" >ចំណងជើង</label>
            <input type="hidden"  id="id" >
            <input type="text" class="form-control" id="title" tabindex="1" required >
          </div>

          <div class="form-group">
            <label for="title" >អ្នកបោះពុម្ព</label>
            <input type="text" id="publisher" tabindex="3" class="form-control" required />
          </div>

          <div class="form-group">
            <label for="title" >ប្រភេទ</label>
            <select type="text" class="form-control" id="category_id" tabindex="5" >
            <?php foreach ($book_categories as $book_category) {
              echo "<option value='$book_category->id' >$book_category->name</option>";
            } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="title" >ចំនួន</label>
            <input type="number" id="quantity" tabindex="7" class="form-control" required />
          </div>

        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="title" >ឈ្មោះអ្នកនិពន្ធ</label>
            <input type="text" class="form-control" id="author_name" tabindex="2" required >
          </div>

          <div class="form-group">
            <label for="title" >ឆ្នាំ</label>
            <input type="text" class="form-control" id="year" tabindex="4" required >
          </div>

          <div class="form-group">
            <label for="title" >ផ្សេងៗ</label>
            <input type="text"  class="form-control" id="other" tabindex="8" />
          </div>

        </div>
      </div>

      </div>
      <div class="modal-footer">
        <p class="pull-left" id="book-form-result" ><!-- Hello --></p>
        <button type="button" class="btn btn-coe-white" id="book-form-save" >Save</button>
        <button type="button" class="btn btn-coe-white" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript" >

  function newBook(){
    $('#book-form-save').attr("onclick", "createBook()");
    $('#book-form').modal();
  }
  function createBook(){
    if ($('input[required]').val() == ""){
      $('#book-form-result').html('Please select required field');
      $('input[required]').css('border', "1px solid red");
      return;
    }
    else{
      $('input[required]').css('border', "1px solid #bbb");
    }
    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>book/create",
      data: {
        title: $('#title').val(),
        author_name: $('#author_name').val(),
        publisher: $('#publisher').val(),
        year: $('#year').val(),
        category_id: $('#category_id').val(),
        quantity: $('#quantity').val(),
        other: $('#other').val()
      },
      beforeSend: function()
      {
        $('#book-form-result').html('Saving Please Waiting...');
      },
      success: function(data)
      {
        if (data.charAt(0) == "<"){
          $('#book-form-result').html('Save faild please Login');
          window.location = "<?= base_url() ?>";
        }
        else{
          data = JSON.parse(data);
          $.each(data, function(i, book){
            $('#book-list').append("<tr id='book-row-"+book.id+"' > <td class='book-no' >"+ (parseInt($('.book-no:last').html())+1) +"</td> <td>"+book.code+"</td> <td>"+book.title+"</td> <td>"+book.author_name+"</td> <td>"+book.publisher+"</td> <td>"+book.year+"</td> <td>"+book.book_category_name+"</td> <td>"+book.quantity+"</td> <td><span class='link' onclick='editBook(" + book.id + ", \"" + book.title + "\", \""+ book.author_name + "\", \"" + book.publisher + "\", \""+ book.year + "\", \""+ book.category_id +"\", \""+ book.other +"\", \""+ book.quantity +"\" )' ><i class='fa fa-edit' ></i></span> <span class='link' onclick='showBook(" + book.id + ", \"" + book.title + "\", \""+ book.author_name + "\", \"" + book.publisher + "\", \""+ book.year + "\", \""+ book.category_id +"\", \""+ book.other +"\", \""+ book.code +"\", \""+ book.book_category_name +"\", \""+ book.quantity +"\" )' ><i class='fa fa-eye' ></i></span> <span class='link' onclick='confirm(\"Are you sure to delete?\", \"deleteBook("+book.id +")\")' ><i class='fa fa-times-circle' ></i></span> </td> </tr>")
          });
          $('#book-form-result').html('Save Completed');
        }
      }
    });
    $('.form-control').val('');
  }

  function searchBook(keyword){
    if (keyword.length <2){
      $("#book-list").show('');
      $("#book-search-list").hide('');
      return;
    }
    $("#book-list").hide('');
    $("#book-search-list").show('').removeClass("hide");
    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>book/search",
      data: {
        keyword: keyword
      },
      beforeSend: function()
      {
        $('#book-search-list').html("<tr> <td colspan='8'> Searching .... </td> </tr>")
      },
      success: function(data)
      {
        if (data=="[]"){
          $('#book-search-list').html("<tr> <td colspan='8'> No result found for your keyword </td> </tr>")
        }
        else{
          $('#book-search-list').html("");
          data = JSON.parse(data);
          $.each(data, function(i, book){
            $('#book-search-list').append("<tr id='book-row-"+book.id+"' > <td class='book-no' >"+ (parseInt($('.book-no:last').html())+1) +"</td> <td>"+book.code+"</td> <td>"+book.title+"</td> <td>"+book.author_name+"</td> <td>"+book.publisher+"</td> <td>"+book.year+"</td> <td>"+book.book_category_name+"</td> <td>"+book.quantity+"</td> <td><span class='link' onclick='editBook(" + book.id + ", \"" + book.title + "\", \""+ book.author_name + "\", \"" + book.publisher + "\", \""+ book.year + "\", \""+ book.category_id +"\", \""+ book.other +"\", \""+ book.quantity +"\" )' ><i class='fa fa-edit' ></i></span> <span class='link' onclick='showBook(" + book.id + ", \"" + book.title + "\", \""+ book.author_name + "\", \"" + book.publisher + "\", \""+ book.year + "\", \""+ book.category_id +"\", \""+ book.other +"\", \""+ book.code +"\", \""+ book.book_category_name +"\", \""+ book.quantity +"\" )' ><i class='fa fa-eye' ></i></span> <span class='link' onclick='confirm(\"Are you sure to delete?\", \"deleteBook("+book.id +")\")' ><i class='fa fa-times-circle' ></i></span> </td> </tr>")
          });  
        }
      }
    });
  }

  function editBook(id, title, author_name, publisher, year, category_id, other, quantity){
    $('#book-form-save').attr("onclick", "updateBook("+id+")");
    $('#id').val(id);
    $('#title').val(title);
    $('#author_name').val(author_name);
    $('#publisher').val(publisher);
    $('#year').val(year);
    $('#category_id').val(category_id);
    $('#quantity').val(quantity);
    $('#other').val(other);
    $('#book-form').modal();
  }
  function updateBook(id){
    if ($('input[required]').val() == ""){
      $('#book-form-result').html('Please select required field');
      $('input[required]').css('border', "1px solid red");
      return;
    }
    else{
      $('input[required]').css('border', "1px solid #bbb");
    }
    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>book/update",
      data: {
        id: $('#id').val(),
        title: $('#title').val(),
        author_name: $('#author_name').val(),
        publisher: $('#publisher').val(),
        year: $('#year').val(),
        category_id: $('#category_id').val(),
        quantity: $('#quantity').val(),
        dob: $('#dob').val(),
        school_name: $('#other').val(),
        other: $('#other').val()
      },
      beforeSend: function()
      {
        $('#book-form-result').html('Saving Please Waiting...');
      },
      success: function(data)
      {
        if (data.charAt(0) == "<"){
          $('#book-form-result').html('Fail to save, please Login');
          window.location = "<?= base_url() ?>";
        }
        else{
          data = JSON.parse(data);
          $.each(data, function(i, book){
            $('#book-row-'+id).html("<td class='book-no' >"+ (parseInt($('#book-row-'+id+' .book-no').html())) +"</td> <td>"+book.code+"</td> <td>"+book.title+"</td> <td>"+book.author_name+"</td> <td>"+book.publisher+"</td> <td>"+book.year+"</td> <td>"+book.book_category_name+"</td> <td>"+book.quantity+"</td> <td><span class='link' onclick='editBook(" + book.id + ", \"" + book.title + "\", \""+ book.author_name + "\", \"" + book.publisher + "\", \""+ book.year + "\", \""+ book.category_id +"\", \""+ book.other +"\", \""+ book.quantity +"\" )' ><i class='fa fa-edit' ></i></span> <span class='link' onclick='showBook(" + book.id + ", \"" + book.title + "\", \""+ book.author_name + "\", \"" + book.publisher + "\", \""+ book.year + "\", \""+ book.category_id +"\", \""+ book.other +"\", \""+ book.code +"\", \""+ book.book_category_name +"\", \""+ book.quantity +"\" )' ><i class='fa fa-eye' ></i></span> <span class='link' onclick='confirm(\"Are you sure to delete?\", \"deleteBook("+book.id +")\")' ><i class='fa fa-times-circle' ></i></span> </td>");
          });
          $('#book-form-result').html('Save Completed');
          $('#book-search-list').hide();
          $('#book-list').show();

        }
      }
    });
    $('.form-control').val('');
  }
  function deleteBook(id){
    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>book/delete",
      data: {
        id: id
      },
      beforeSend: function()
      {

      },
      success: function(data)
      {
        $('#book-row-'+id).remove();
      }
    });
  }
</script>
