<div id="student-show" class="modal fade coe-modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ពត៌មានលម្អិតសិស្ស</h4>
      </div>
      <div class="modal-body">
        <!-- body -->
        <table class="table-student-info">
          <tr>
            <th>លេខកូដសម្គាល់</th>
            <th id="show-code" ></th>
          </tr>
          <tr>
            <th>ឈ្មោះជាភាសារខ្មែរ</th>
            <th id="show-name-khmer" >: Your Name</th>
          </tr>
          <tr>
            <th>ឈ្មោះជាអក្សរឡាតាំង</th>
            <th id="show-latin-name" >: Your Name</th>
          </tr>
          <tr>
            <th>ភេទ</th>
            <th id="show-gender" >: Your Name</th>
          </tr>
          <tr>
            <th>លេខទូរស័ព្ទ</th>
            <th id="show-phone" >: Your Name</th>
          </tr>
          <tr>
            <th>សារអេឡិចត្រូនិច</th>
            <th id="show-email" >: Your Name</th>
          </tr>
          <tr>
            <th>ថ្ងៃខែឆ្នាំកំណើត</th>
            <th id="show-dob" >: Your Name</th>
          </tr>
          <tr>
            <th>ឈ្មោះសាលា</th>
            <th id="show-school-name" >: Your Name</th>
          </tr>
          <tr>
            <th>ផ្សេងៗ</th>
            <th id="show-other" >: Your Name</th>
          </tr>
        </table>
        <!-- print area -->
        <div id="print-area" class="hide">
          <div class="print-content" style="border:2px double #000; text-align: center; width: 500px; height: 420px; padding: 5px;" >
            <div style="width: 235px; height: 405px; border: 1px solid #000; float: left" >
              <h3>Title of Organization</h3>
              <hr>
              <div style="width: 90px; height: 100px; border: 1px solid #000; margin-left: 70px" >
                4 X 6
              </div>
              <h3 id="print-latin-name">Kung Phanith </h3>
              <p id= "print-code"></p>
            </div>
            <div style="width: 235px; height: 405px; border: 1px solid #000; float: right" >
              Some Text
            </div>
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-coe-white" id="button-print-card" >Print Card</button>
        <button type="button" class="btn btn-coe-white" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
<script type="text/javascript" >
  function showStudent(id, name_khmer, latin_name, gender, phone, email, dob, school_name, other, code){
    $('#show-name-khmer').html(name_khmer);
    $('#show-latin-name').html(latin_name);
    $('#show-gender').html(gender);
    $('#show-phone').html(phone);
    $('#show-email').html(email);
    $('#show-dob').html(dob);
    $('#show-school-name').html(school_name);
    $('#show-other').html(other);
    $('#show-code').html(code);
    $('#button-print-card').attr('onclick', "printCard()" );

    $('#student-show').modal();
    // for print
    $('#print-name-khmer').html(name_khmer);
    $('#print-latin-name').html(latin_name);
    $('#print-gender').html(gender);
    $('#print-phone').html(phone);
    $('#print-email').html(email);
    $('#print-dob').html(dob);
    $('#print-school-name').html(school_name);
    $('#print-other').html(other);
    $('#print-code').html(code);
  }
  function printCard(){
    var divContents = $("#print-area").html();
    var printWindow = window.open('', '', 'height=400,width=800');
    printWindow.document.write('<html><head><title>Invoice Print</title>');
    printWindow.document.write('</head><body >');
    printWindow.document.write(divContents);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
    return 0;
  }
</script>
