<div class="timmer" id="display-time">
	<!-- time -->
</div>
<div class="dater" id="display-date">
	<!-- Date -->
</div>
<script type="text/javascript">
	var myVar = setInterval(myTimer, 1000);
	function myTimer() {
	    var d = new Date();
	    $('#display-time').html(d.toLocaleTimeString());
	    $('#display-date').html(d.toLocaleDateString());
	}
	// function load_time(){
	// 	var date = new Date();
	// 	var shift = "";
	// 	var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Satuday"];
	// 	var hour = date.getHours() ;
	// 	if(hour>=12){
	// 		shift = "PM";
	// 	}
	// 	else{
	// 		shift = "AM";
	// 	}
	// 	if (hour>12){
	// 		hour = hour-12;
	// 	}
	// 	$('#display-time').html(hour+":"+date.getMinutes()+":"+date.getSeconds()+"  "+shift);
	// 	$("#display-date").html(weekday[date.getDay()] +" "+date.getDate() +" / "+(date.getMonth()+1) +" / "+date.getFullYear());
	// }	
	
</script>