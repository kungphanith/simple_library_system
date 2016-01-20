<div id="book-show" class="modal fade coe-modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ពត៌មានលម្អិតលើសៀវភៅ</h4>
      </div>
      <div class="modal-body">
        <!-- body -->
        <table class="table-info">
          <tr>
            <th>លេខកូដ</th>
            <th id="show-code" ></th>
          </tr>
          <tr>
            <th>ចំណងជើង</th>
            <th id="show-title" >: Your Name</th>
          </tr>
          <tr>
            <th>អ្នកនិពន្ធ</th>
            <th id="show-author-name" >: Your Name</th>
          </tr>
          <tr>
            <th>អ្នកបោះពុម្ព</th>
            <th id="show-publisher" >: Your Name</th>
          </tr>
          <tr>
            <th>ឆ្នាំ</th>
            <th id="show-year" >: Your Name</th>
          </tr>
          <tr>
            <th>ប្រភេទ</th>
            <th id="show-category-name" >: Your Name</th>
          </tr>
          <tr>
            <th>ផ្សេងៗ</th>
            <th id="show-other" >: Your Name</th>
          </tr>
        </table>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-coe-white" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
<script type="text/javascript" >
  function showBook(id, title, author_name, publisher, year, category_id, other, code, category_name ){
    $('#show-title').html(title);
    $('#show-author-name').html(author_name);
    $('#show-publisher').html(publisher);
    $('#show-year').html(year);
    $('#show-category-name').html(category_name);
    $('#show-other').html(other);
    $('#show-code').html(code);

    $('#book-show').modal();
  }  
</script>
