$(document).ready(function(){
	$('.job_search_option_triger').on('click',function(){
		console.log('ok')
		$(this).toggleClass('open').next('.options_checkbox').toggle();
	});

	$('.filter_search_triger').on('click', function(){
		$(this).toggleClass('open');
		$('.search_job_filters_holder').slideToggle(200);
	});
});