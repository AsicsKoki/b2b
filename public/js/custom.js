$(document).ready(function(){

	$('.job_search_option_triger').on('click',function(){

		console.log('ok')

		$(this).toggleClass('open').next('.options_checkbox').toggle();

	});



	$('.filter_search_triger').on('click', function(){

		$(this).toggleClass('open');

		$('.search_job_filters_holder').slideToggle(200);

	});



	// Check PIB Company - Show Second Part Of Form

	$('.btn_check_company_pib').on('click', function(e){

		e.preventDefault();

		$('.first_part_companies_reg').toggleClass('none');

		$('.second_part_companies_reg').toggleClass('none');

	});



	// Check 







	$('input:radio[name="authorized_person"]').change(

    function(){

        if (this.checked && this.value == 'No') {

            $('.authorized_person_for_contact_company').removeClass('none');

        } else {

        	$('.authorized_person_for_contact_company').addClass('none');

        }

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