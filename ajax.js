var data_string = $("form").serialize();
$.ajax({
	type: "POST",
	url: "database.php",
	data: data_string,
	success: console.log("data_string");

});