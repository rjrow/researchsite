jQuery(document).ready(function()
{
	$(window).bind("load", function() {

		$(".row_state").hide();
		var radio_type = $('form input[type=radio]:checked').val();

		if(radio_type == "ann" || radio_type == "ytd")
		{
		$('.Month_id_field').hide();
		$('.Year_id_field').hide();
		}
		else
		{
		$('.Month_id_field').show();
		$('.Year_id_field').show();
		}
	});

});



jQuery(document).ready(function()
{
	$(".arealist").change(function(){
		$(".row_industry").show();
	});

	$(".industrylist").change(function(){
		$(".row_month").show();
	});
});


// jQuery(document).ready(function()
// {
// 	var month_value = $( ".monthlist option:selected").val();
// 	$(".monthlist").val(month_value);
// });
