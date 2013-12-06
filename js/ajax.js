	$("#submit").click(function(e) {
		e.preventDefault();
var data_string = $("form#contact").serializeArray();

$.ajax({
	type: "POST",
	url: "/database.php",
	data: data_string,
	success: function(){
	}
});
return false;
	});
