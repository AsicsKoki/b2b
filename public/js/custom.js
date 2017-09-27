$(document).ready(function(){
	$('.job_search_option_triger').on('click',function(){
		console.log('ok')
		$(this).toggleClass('open').next('.options_checkbox').toggle();
	});

	$('.filter_search_triger').on('click', function(){
		$(this).toggleClass('open');
		$('.search_job_filters_holder').slideToggle(200);
	});

	// Business sector form selection
	$("#business_sector_select option").click(function () {           
	  	var selectedVal = $(this).text();

	  	$('ul').append(this)
	  	$(this).remove();
	}); 

	$("li").click(function () {           
	  	var selectedVal = $(this).text();

	  	$('#business_sector_select').append('<option>'+selectedVal+'</option>');
	  	$(this).remove();
	}); 
	// End business sector form selection
});