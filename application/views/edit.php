<?php $title = "Edit Mode"; include "include_files/head.php" ?>
<?php include "include_files/header.php" ?>

	<div class="col-sm-12" style="margin-top: 20px" >
		<div class="row">
			<div class="col-sm-8 " id="show-panel" >
				<div class="col-sm-8" >
					<div class="form-group" >
						<input type="hidden" id="id" name="id" class="form-control" placeholder="" >
						<input type="text" id="word" name="word" class="form-control" placeholder="ពាក្យ" >
					</div>
					<div class="form-group" >
						<select id="pos" name="pos" class="form-control" >
							<option>ជ្រើសរើសថ្នាកពាក្យ</option>
							<?php
							foreach ($pos as $pos) {
								echo "<option value=".$pos->id."> ".$pos->pos_name." ($pos->abbraviation) </option>";
							}
							 ?>
						</select>
					</div>
					<div class="form-group" >
						<textarea id="description" name="description" class="form-control" placeholder="បកស្រាយ" style="height: 120px;"></textarea>
					</div>
					<br>
					<p id="scr-result" ></p>
				</div>
				<div class="col-sm-4" >
					<div onclick="addWord()" class="btn btn-primary full" >បន្ថែម</div><br><br>
					<div onclick="editWord()" class="btn btn-info full" >កែប្រ</div><br><br>
					<div onclick="deleteWord()" class="btn btn-warning full" >លុប</div><br><Br>
				</div>
			</div>
			<div class="col-sm-4 panel-body coe-panel-has-background" id="search-panel" >
	            <input type="text" name="keyword" class="form-control" placeholder="សរសេរដើម្បីស្វែងរក" oninput="search_word(this.value)" >
	            <hr>
	            <div class="word-result-list coe-scroll" id="word-result-list" style="height: 60%" >

	            </div>
			</div>
		</div>
	</div>


	<div id="confirm-yes-no" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title" id="confirm-title" ></h4>
	      </div>
	      <div class="modal-body" id="confirm-body">
	      </div>
	      <div class="modal-footer">
	        <button type="button" id="confirm-yes" class="btn btn-default" data-dismiss="modal">Yes</button>
	        <button type="button" id="confirm-no" class="btn btn-default" data-dismiss="modal">No</button>
	      </div>
	    </div>
	  </div>
	</div>


	<script type="text/javascript">
		function addWord(){
			var word = $('#word').val();
			var pos = $('#pos').val();
			var description = $('#description').val();

			$.ajax({
		      type: "POST",
		      url: "<?= base_url() ?>dictionary/do_add",
		      data: {
		        word: word,
		        pos: pos,
		        description: description
		      },
		      beforeSend: function()
		      {
		      },
		      success: function(data)
		      {
		      	if(data == "1"){
		      		clear_form();
		      		show_result("<i class='fa fa-check-circle-o'> </i> "+word + " was add successfully!");
		      	}
		      	else if(data == "2"){
		      		show_result("<i class='fa fa-flash'> </i> "+word + " is ready in database!")	;
		      	}
		      	else{
		      		show_result("Can't not add new word.");
		      	}
		      	// console.log(data);
		      }
		    });
		}
		function editWord(){
			var id = $('#id').val();
			var word= $('#word').val();
			var pos= $('#pos').val();
			var description= $('#description').val();
			if (id == "" || word == "" || pos == "" || description == ""){
				return 0;
			}
			$.ajax({
		      type: "POST",
		      url: "<?= base_url() ?>dictionary/do_edit",
		      data: {
		      	id: id,
		        word: word,
		        pos: pos,
		        description: description
		      },
		      beforeSend: function()
		      {
		      },
		      success: function(data)
		      {
		      	if(data == "1"){
		      		$('#word-'+id).attr('onclick','');
		      		clear_form();
		      		show_result("<i class='fa fa-check-circle-o'> </i> "+word + " was update successfully!");
		      	}
		      	else if(data == "2"){
		      		show_result("<i class='fa fa-flash'> </i> "+word + " is ready in database")	;
		      	}
		      	else{
		      		show_result("Please fill all of required field.");
		      	}
		      	// console.log(data);
		      }
		    });

		}
		function deleteWord(){
			var id = $('#id').val();
			if(id==""){
				return 0;
			}
			$.ajax({
		      type: "POST",
		      url: "<?= base_url() ?>dictionary/do_delete",
		      data: {
		      	id: id
		      },
		      success: function(data){
		      	$('#word-'+id).remove();
		      	clear_form();
		      	show_result("<i class='fa fa-check-circle-o'> </i> Delete successfully!");
		      }
		    });
		}
		function show_result(_result){
			$('#scr-result').html(_result);
		}
		function clear_form(){
			$('#word').focus()
			$('.form-control').val('');
		}
		function search_word(_key){
			if(_key == ""){
				$('#word-result-list').html("");
				return 0;
			}
		    $.ajax({
		      type: "POST",
		      url: "<?= base_url() ?>dictionary/search",
		      data: {
		        key: _key
		      },
		      beforeSend: function()
		      {

		      },
		      success: function(data)
		      {
		      	data = JSON.parse(data);
		      	$('#word-result-list').html("");
		      	$.each(data, function(i, word){
		      		$('#word-result-list').html($('#word-result-list').html()+"<p id='word-"+word.id+"' onclick='display_word("+word.id+", \""+word.word+"\","+word.pos_id+", \""+word.description+"\"  )' >"+word.word+" <i>("+word.abbraviation+")</i> </p>");
          });
		      }
		    });
		}
		function display_word(_id,_word,_posId,_description){
			$('#id').val(_id);
			$('#word').val(_word);
			$('#pos').val(_posId );
			$('#description').val(_description );
		}

		function confirm_yes_no(_title, _body){
			$('#confirm-title').html(_title);
			$('#confirm-body').html(_body);
			$('#confirm-yes-no').modal();
		}

	</script>
<?php include "include_files/footer.php" ?>
