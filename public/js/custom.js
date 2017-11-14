

$(document).ready(function () {

    // $('.job_search_option_triger').on('click', function() {
    //     $(this).toggleClass('open').next('.options_checkbox').toggle();
    // });

    $('.filter_search_triger').on('click', function () {
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

    $('.popup_close').on('click', function (e) {
        e.preventDefault();
        $('.popUp').fadeOut(200);
    });

    $('.popup_new_language_user_item p').click(function () {
        $('.new_language_user_list').fadeToggle(200);
    });

    $('.user_profile_languages_holder .edit_link').on('click', function (e) {
        e.preventDefault();
        $('.popup_new_language_user').fadeIn(200);
    });

    $('.add_new_user_job_profile_btn').on('click', function (e) {
        e.preventDefault();
        $('.popup_new_job_user').fadeIn(200);
    });

    // Check PIB Company - Show Second Part Of Form
    $('.btn_check_company_pib').on('click', function (e) {
        e.preventDefault();
        $('.second_part_companies_reg').slideToggle(200);
    });

    // Check 
    $('input:radio[name="authorized_person"]').change(
        function () {
            if (this.checked && this.value == '0') {
                $('.authorized_person_for_contact_company').removeClass('none');
            } else {
                $('.authorized_person_for_contact_company').addClass('none');
            }
        });

    $('input:radio[name="office_out_country"]').change(

        function () {
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
    $('.loginRegFormSubmitFinal').on('click', function (e) {
        e.preventDefault();
        $('.popup_confirmation_register').fadeIn(200);
    });

    $('.popup_confirmation_register_btn button').on('click', function (e) {
        e.preventDefault();
        $('.popup_confirmation_register').fadeOut(200);
    });

    // Notification Show/Hide Sub Menu
    $('.notification_item_menu_trigger').on('click', function (e) {
        e.preventDefault();
        $('.sub_menu_notification').fadeToggle(200);
    });

    // Business sector form selection
    $('.selectSector').click(function () {
        return !$('.selectSector option:selected').remove().appendTo('.selectSectorSelected');
    });
    $('.selectSectorSelected').click(function () {
        return !$('.selectSectorSelected option:selected').remove().appendTo('.selectSector');
    });
    // End business sector form selection

    // $('#about_us').on('click', function(evt) {
    //   evt.preventDefault();
    //   var about_us = $('#about_us_text').val();
    //     $.ajax
    //     ({
    //         url: 'updateAboutUs',
    //         data: {
    //             about_us: about_us,
    //             '_token': $('meta[name="csrf-token"]').attr('content'),
    //         }
    //         type: 'post',
    //         success: function()
    //         {
    //             return 1;
    //         }
    //     });
    // });


    // $('#about_us_form').submit(function(e) {
    //     e.preventDefault();
    //     var about_us = $('#about_us_text').val();
    //     $.ajax
    //     ({
    //         url: 'updateAboutUs',
    //         data: {
    //             about_us: about_us,
    //             '_token': $('meta[name="csrf-token"]').attr('content'),
    //         }
    //         type: 'post',
    //         success: function()
    //         {
    //             return console.log('123');
    //         }
    //     });
    // });

    // $('button#about_us').click(function(e) {
    //         e.preventDefault();
    //         var about_us = $('#about_us_text').value(),
    //         $.ajax
    //         ({
    //             url: '/updateAboutUs',
    //             data: about_us
    //             type: 'post',
    //             success: function()
    //             {
    //                 return 1;
    //             }
    //         });
    //     });

    $('#about_us_form').submit(function (e) {
        e.preventDefault();
        var about_us = $('#about_us_text').val();
        $('#about_us_text').html(about_us);
        $.ajax({
            url: '/updateAboutUs',
            data: {
                about_us: about_us,
                '_token': $('meta[name="csrf-token"]').attr('content'),
            },
            type: 'post'

        })
            .done(function () {

                return 1;
            })

    });

    $('#career_form').submit(function (e) {
        e.preventDefault();
        var career = $('#career').val();
        $('#career').html(career);
        $.ajax({
            url: '/updateCareer',
            data: {
                career: career,
                '_token': $('meta[name="csrf-token"]').attr('content'),
            },
            type: 'post'

        })
            .done(function () {

                return 1;
            })

    });
    $('.job_search_option_triger').click(function (e) {
        e.stopPropagation();
        var targetDisp = $(this).siblings('.options_checkbox');

        if ($(".job_search_option_triger").not(this).hasClass("open")) {
            $('.job_search_option_triger').removeClass('open');
            $('.options_checkbox').css('display', 'none');
        };
        if (targetDisp.css('display') === 'block') {
            targetDisp.css('display', 'none');
            $(this).removeClass('open');
        } else {
            $(this).siblings('.options_checkbox').css('display', 'none');
            targetDisp.css('display', 'block');
            $(this).addClass('open');
        }
    });


    $(window).click(function () {
        $('.options_checkbox').css('display', 'none');
        $('.job_search_option_triger').removeClass('open');
    });
    $('.options_checkbox').click(function (e) {
        e.stopPropagation();
    });
    $('.options_checkbox label').click(function (e) {
        e.stopPropagation();
    });
    $('#description_input').click(function (e) {
        e.stopPropagation();
    })

    $(".add_new_user_job_profile_btn").click(function () {
        $('#new_job_form').find("input[type=text], textarea, select").val("");
    });
    $('#user_skills textarea').click(function (e) {
        e.stopPropagation();
    })

    $('.save_btn_pop_up').click(function () {
        $('.popup_new_job_user').css('display', 'none');
    })

});

