<html>
	<head>
		<meta charset="UTF-8" ></meta>
		<title> <?= $title ?> Dictionary COE</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>components/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>components/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/coe_style.css">
		<script type="text/javascript" src="<?= base_url() ?>components/jquery.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>components/bootstrap.min.js"></script>
		<script type="text/javascript">
			$('document').ready(function(){
				$('#search-panel').hide().fadeIn().slideDown();
			});
			function translate_word(_id){
				$.ajax({
			      type: "POST",
			      url: "<?php base_url() ?>dictionary/translate_word",
			      data: {
			        id: _id
			      },
			      beforeSend: function()
			      {

			      },
			      success: function(data)
			      {
			      	data = JSON.parse(data);
			      	data = data[0];
			      	$('#word-result-show').html("<h4>"+data.word+" <i> ("+data.abbraviation+") </i> </h4><p style='color: black' >"+data.description+"</p><br><img src='<?= base_url() ?>public/images/"+ data.image +"' width='150px' /> ");
			      }
			    });
			}

			function search(_key){
				if(_key == ""){
					$('#word-result-list').html("");
					return 0;
				}
			    $.ajax({
			      type: "POST",
			      url: "<?php ?>dictionary/search",
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
			      		$('#word-result-list').html($('#word-result-list').html()+"<p onclick='translate_word("+word.id+")' >"+word.word+" ("+word.abbraviation+") </p>");
              });
			      }
			    });
			}
			function about(){
				$('#about').modal();
			}
		</script>
	</head>
	<body class="coe-bg-classic" >
