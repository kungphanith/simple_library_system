<div id="borrowing-show" class="modal fade coe-modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ពត៌មានពីការខ្ចីសៀវភៅ របស់សិស្ស</h4>
      </div>
      <div class="modal-body">
        <!-- body -->
        <table class="table-info">
          <tr>
            <th>សៀវភៅ</th>
            <th id="show-book-title" ></th>
          </tr>
          <tr>
            <th>ឈ្មោះសិស្ស</th>
            <th id="show-student-name" >: Your Name</th>
          </tr>
          <tr>
            <th>អ្នកឱ្យខ្ចី</th>
            <th id="show-lender-name" >: Your Name</th>
          </tr>
          <tr>
            <th>អ្នកទទួល</th>
            <th id="show-reciever-name" >: Your Name</th>
          </tr>
          <tr>
            <th>កាលបរិច្ឆេទខ្ចី</th>
            <th id="show-borrow-at" >: Your Name</th>
          </tr>
          <tr>
            <th>កាលបិរិច្ឆេទទួល</th>
            <th id="show-returned-at" >: Your Name</th>
          </tr>
          <tr>
            <th>កាលបរិច្ឋេទបានទទួល</th>
            <th id="show-recieved-at" >: Your Name</th>
          </tr>
          <tr>
            <th>ស្ថានភាព</th>
            <th id="show-borrowing-status" >: Your Name</th>
          </tr>
          <tr>
            <th>អំពីការខ្ចី</th>
            <th id="show-is-inroom" >: Your Name</th>
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
  function showBorrowing(id, book_title, student_name, lender_name, reciever_name, borrow_at, returned_at, recieved_at, is_inroom, is_returned){
    
    if(is_inroom=="1"){
      is_inroom = "សម្រាប់អានក្នុងបណ្ណាល័យ";
    }
    else{
      is_inroom = "ខ្ចីទៅផ្ទះ";
    }
    if(is_returned == "1"){
      is_returned = "<span class ='label label-info'>បានសងរួចរាល់ </span>";
    }
    else{
      is_returned = "<span class ='label label-warning'>មិនទាន់សង </span>";
    }
    $('#show-book-title').html(book_title);
    $('#show-student-name').html(student_name);
    $('#show-lender-name').html(lender_name);
    $('#show-reciever-name').html(reciever_name);
    $('#show-borrow-at').html(borrow_at);
    $('#show-returned-at').html(returned_at);
    $('#show-recieved-at').html(recieved_at);
    $('#show-is-inroom').html(is_inroom);
    $('#show-borrowing-status').html(is_returned);

    $('#borrowing-show').modal();
  }  
</script>
