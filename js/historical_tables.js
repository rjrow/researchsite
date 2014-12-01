jQuery(document).ready(function($) {
	$.ajax({
		url: "http://research.wpcarey.asu.edu/seidman/wp-content/themes/Avada/historical_db_connect.php",
		success: function(data){
			alert(data);
		}
	});
});


