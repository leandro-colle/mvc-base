$.ajax({
	method: "GET",
	url: "index.php",
	dataType: 'json',
	data: {
		controller: "home",
		action: "list"
	}
}).done(function(response) {
	console.log(response['data']);
});