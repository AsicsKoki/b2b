$(document).ready(function(){

	$('.job_search_option_triger').on('click',function(){
		console.log('ok')
		$(this).toggleClass('open').next('.options_checkbox').toggle();
	});

	$('.filter_search_triger').on('click', function(){
		$(this).toggleClass('open');
		$('.search_job_filters_holder').slideToggle(200);
	});

    // // New job ad options desc show/hide
    // $('.new_job_add_choose_option_item input').click(function() {
    //     $('.new_job_add_desc').addClass('none');
    //     $("input[type='radio']:checked").each(function() {
    //         $(this).next('.new_job_add_desc').removeClass('none');
    //     });
    // }); 

    // // Pop up job ad custom design
    // $('.job_ad_enter_instuction_btn').on('click',function(e){
    //     e.preventDefault();
    //     $('.custom_job_ad_popup').fadeIn(200);
    // });

    // $('.popup_close').on('click',function(e){
    //     e.preventDefault();
    //     $('.custom_job_ad_popup').fadeOut(200);
    // });

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
        if (this.checked && this.value == '1') {
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




    $('#about_us_form').submit(function(e) {
        e.preventDefault();
        var about_us = $('#about_us_text').val();
        $.ajax
        ({
            url: '/updateAboutUs',
            data: about_us,
            type: 'post',
            success: function()
            {
                return 1;
            }
        });
    });


   //  $(function () {
   // var frm = $('#ajax');
   // var about_us = $('#about_us_text').val();
   // frm.submit(function (ev) {
   //     $.ajax({
   //         type: frm.attr('method'),
   //         url: frm.attr('action'),
   //         data: about_us,
   //         success: function (data) {
   //             alert('ok');
   //         }
   //     });
   //     ev.preventDefault();
   //     });
   // });



});

