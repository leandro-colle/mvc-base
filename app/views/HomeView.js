var url = "http://localhost:4500/home/list";

$.ajax({
	method: "GET",
	url: url,
	dataType: 'json'
}).done(function(response) {
	console.log(response['data']);
});