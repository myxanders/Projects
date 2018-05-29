$('#search').on('submit', function() {
	var that = $(this),
		contents = that. serialize();

	$.ajax({
		url: 'JSON_API.php',
		dataType: 'json',
		type: 'post',
		data: contents,
		success: function(data) {
			console.log("jin jin");
		}
	});
		return false;

} );