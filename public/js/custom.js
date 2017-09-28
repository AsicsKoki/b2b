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

    $('input:radio[name="office_out_country"]').change(

    function(){
    	$('.office_out_country_section').removeClass('none');
        if (this.checked && this.value == 'yes') {
            $('.office_out_country_no').removeClass('none');
            $('.location_comp_reg').addClass('none');
        } else {
        	$('.office_out_country_no').addClass('none');
        	$('.location_comp_reg').removeClass('none');
        }
    });

    // Success Registration Popup
    $('.loginRegFormSubmitFinal').on('click', function(e){
    	e.preventDefault();
    	$('.popup_confirmation_register').fadeIn(200);
    });

    $('.popup_confirmation_register_btn button').on('click', function(e){
    	e.preventDefault();
    	$('.popup_confirmation_register').fadeOut(200);
    });

	// Business sector form selection
	$('.selectSector').click(function() {
     return !$('.selectSector option:selected').remove().appendTo('.selectSectorSelected');
    });
    $('.selectSectorSelected').click(function() {
     return !$('.selectSectorSelected option:selected').remove().appendTo('.selectSector');
    });
	// End business sector form selection
});

