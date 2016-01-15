<div id="student-form" class="modal fade coe-modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ទម្រង់ចុះពត៌មានសិស្ស</h4>
      </div>
      <div class="modal-body">
        <!-- body -->
      <div class="row">
        <div class="col-sm-6">

          <div class="form-group">
            <label for="name-khmer" >ឈ្មោះខ្មែរ</label>
            <input type="text" class="form-control" id="name-khmer" tabindex="1" >
          </div>

          <div class="form-group">
            <label for="name-khmer" >ភេទ</label>
            <input type="text" class="form-control" id="gender" tabindex="3" >
          </div>

          <div class="form-group">
            <label for="name-khmer" >សារអេឡិចត្រូនិច</label>
            <input type="text" class="form-control" id="email" tabindex="5" >
          </div>

          <div class="form-group">
            <label for="name-khmer" >ឈ្មោះសាលា</label>
            <input type="text" class="form-control" id="school-name" tabindex="7" >
          </div>

          <!-- <div class="form-group">
            <label for="name-khmer" >រូបភាព</label>
            <input type="file" class="form-control" >
          </div> -->

        </div>
        <div class="col-sm-6">

          <div class="form-group">
            <label for="name-khmer" >ឈ្មោះជាអក្សរឡាតាំង</label>
            <input type="text" class="form-control" id="latin-name" tabindex="2" >
          </div>

          <div class="form-group">
            <label for="name-khmer" >លេខទូរស័ព្ទ</label>
            <input type="text" class="form-control" id="phone" tabindex="4" >
          </div>

          <div class="form-group">
            <label for="name-khmer" >ថ្ងៃខែឆ្នាំកំណើត</label>
            <input type="text" class="form-control" id="dob" tabindex="6" >
          </div>
          <div class="form-group">
            <label for="name-khmer" >ផ្សេងៗ</label>
            <textarea class="form-control" id="other" tabindex="8" ></textarea>
          </div>

        </div>
      </div>

      </div>
      <div class="modal-footer">
        <p class="pull-left" id="student-form-result" ><!-- Hello --></p>
        <button type="button" class="btn btn-coe-white" id="student-form-save" >Save</button>
        <button type="button" class="btn btn-coe-white" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript" >
  function newStudent(){
    $('#student-form-save').attr("onclick", "createStudent()");
    $('#student-form').modal();
  }
  function createStudent(){
    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>student/create",
      data: {
        name_khmer: $('#name-khmer').val(),
        latin_name: $('#latin-name').val(),
        gender: $('#gender').val(),
        phone: $('#phone').val(),
        email: $('#email').val(),
        dob: $('#dob').val(),
        school_name: $('#school-name').val(),
        other: $('#other').val()
      },
      beforeSend: function()
      {
        $('#student-form-result').html('Saving Please Waiting...');
      },
      success: function(data)
      {
        if (data.charAt(0) == "<"){
          $('#student-form-result').html('Save faild please Login');
          window.location = "<?= base_url() ?>";
        }
        else{
          // console.log(data);
          data = JSON.parse(data);
          $.each(data, function(i, student){
            // $('#student-list').html($('#word-result-list').html()+"<p id='word-"+word.id+"' onclick='display_word("+word.id+", \""+word.word+"\","+word.pos_id+", \""+word.description+"\"  )' >"+word.word+" <i>("+word.abbraviation+")</i> </p>");
            $('#student-list').append("<tr id='student-row-"+student.id+"' > <td class='student-no' >"+ (parseInt($('.student-no:last').html())+1) +"</td> <td>"+student.code+"</td> <td>"+student.name_khmer+"</td> <td>"+student.latin_name+"</td> <td>"+student.gender+"</td> <td>"+student.phone+"</td> <td>"+student.dob+"</td> <td><span class='link' onclick='editStudent(" + student.id + ", \"" + student.name_khmer + "\", \""+ student.latin_name + "\", \"" + student.gender + "\", \""+ student.phone + "\", \""+ student.email +"\", \""+ student.dob +"\", \"" + student.school_name + "\", \""+ student.other +"\" )' ><i class='fa fa-edit' ></i></span> <span class='link' onclick='showStudent(" + student.id + ", \"" + student.name_khmer + "\", \""+ student.latin_name + "\", \"" + student.gender + "\", \""+ student.phone + "\", \""+ student.email +"\", \""+ student.dob +"\", \"" + student.school_name + "\", \""+ student.other +"\" )' ><i class='fa fa-eye' ></i></span> <span class='link' onclick='confirm(\"Are you sure to delete?\", \"deleteStudent("+student.id +")\")' ><i class='fa fa-times-circle' ></i></span> </td> </tr>")
          });
          $('#student-form-result').html('Save Completed');
        }

        // data = JSON.parse(data);
        // data = data[0];
        // $('#word-result-show').html("<h4>"+data.word+" <i> ("+data.abbraviation+") </i> </h4><p style='color: black' >"+data.description+"</p><br><img src='<?= base_url() ?>public/images/"+ data.image +"' width='150px' /> ");
      }
    });
    $('.form-control').val('');
  }

  function search(keyword){
    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>student/search",
      data: {
        keyword: keyword
      },
      beforeSend: function()
      {
  
      },
      success: function(data)
      {
        data = JSON.parse(data);
        $.each(data, function(i, student){          
          $('#student-list').append("<tr id='student-row-"+student.id+"' > <td class='student-no' >"+ (parseInt($('.student-no:last').html())+1) +"</td> <td>"+student.code+"</td> <td>"+student.name_khmer+"</td> <td>"+student.latin_name+"</td> <td>"+student.gender+"</td> <td>"+student.phone+"</td> <td>"+student.dob+"</td> <td><span class='link' onclick='editStudent(" + student.id + ", \"" + student.name_khmer + "\", \""+ student.latin_name + "\", \"" + student.gender + "\", \""+ student.phone + "\", \""+ student.email +"\", \""+ student.dob +"\", \"" + student.school_name + "\", \""+ student.other +"\" )' ><i class='fa fa-edit' ></i></span> <span class='link' onclick='showStudent(" + student.id + ", \"" + student.name_khmer + "\", \""+ student.latin_name + "\", \"" + student.gender + "\", \""+ student.phone + "\", \""+ student.email +"\", \""+ student.dob +"\", \"" + student.school_name + "\", \""+ student.other +"\" )' ><i class='fa fa-eye' ></i></span> <span class='link' onclick='confirm(\"Are you sure to delete?\", \"deleteStudent("+student.id +")\")' ><i class='fa fa-times-circle' ></i></span> </td> </tr>")
        });
      }
    });
  }

  function editStudent(id, name_khmer, latin_name, gender, phone, email, dob, school_name, other){
    $('#name-khmer').val(name_khmer);
    $('#latin-name').val(latin_name);
    $('#gender').val(gender);
    $('#phone').val(phone);
    $('#email').val(email);
    $('#dob').val(dob);
    $('#school-name').val(school_name);
    $('#other').val(other);
    $('#student-form').modal();
  }
  function updateStudent(){
    
  }
  function deleteStudent(id){
    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>student/delete",
      data: {
        id: id
      },
      beforeSend: function()
      {
        
      },
      success: function(data)
      {
        $('#student-row-'+id).remove(); 
      }
    });
  }
</script>
