@extends('layouts.master')
@section('content')
<h1 class="page_title main_page_title">Your Profile</h1>

<main class="main_app_container">
	<div class="user_profile_content cf">
		<div class="user_profile_main">
			<div class="user_profile_main_header">
				<div class="user_profile_image user_profile_item">
					<div class="user_profile_image_holder">
						<span>
							<img src="{{ URL::to('/') . $avatar }}" alt="">
						</span>

						<form action="{{ route('updateAvatar') }}" method="POST" enctype="multipart/form-data" id="upload_avt_form">
                            {{Form::open(array('route' => 'updateAvatar','method'=>'POST', 'files'=>true))}}
                            <div class="edit_info_window change_image_edit_info_window" id="avatar_input" style="display:none">
                            	<p class="simulat_choose_img">Choose image</p>
                                <input type="file" name="data_input">
                            
                            </div>
                            <div class="edit_info_window" id="avatar_input2" style="display:none">
                                {{ csrf_field() }}
                  <button type="submit" value="upload" class="confirm_edit_btn blue_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
      						</div>
     		           </form>

						<a class="edit_link" id="avatar">	
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
						<br>
						<!-- <div class="edit_info_window change_image_edit_info_window" id="avatar_input" style="display:none">
							<input type="file">
							<button class="confirm_edit_btn blue_btn">Choose image</button>
						</div>
				
						</div> -->
					</div>
					<div class="edit_info_window" id="avatar_input2" style="display:none">
						<button class="confirm_edit_btn blue_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
					</div>
				</div>

				<div class="user_profile_name_holder user_profile_item">
					<p class="user_profile_name">
					<span>{{ Session::get('user')->first_name }} {{Session::get('user')->last_name}}</span>
					</p>
					

				</div>

				<div class="user_profile_about user_profile_item">
					<p class="user_profile_about_text">
					<span id="description_span">{{ Session::get('user')->description }}</span>
						<a class="edit_link" id="description">	
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
					</p>
					
					<div class="edit_info_window" id="description_input" style="display:none">
						<textarea name="" cols="30" rows="10" width="100%" placeholder="Say something about you"></textarea>

						<button class="confirm_edit_btn blue_btn" id="description_btn">Confirm <i class="fa fa-check" aria-hidden="true"></i></button>
					</div>
				</div>

				<div class="user_profile_name_holder user_profile_item">
					<p class="bold">Education:</p>
					<p class="user_profile_name">
					<!-- <p class="bold">Education:</p> -->
					<span id="education_span">{{ Session::get('user')->education }}</span>
						<a class="edit_link" id="education" >	
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
					</p>
					
			
					<div class="edit_info_window" id="education_input" style="display: none">
						<input type="text" placeholder="Enter education" style="font-size: 14px" >
						<button class="confirm_edit_btn blue_btn" id="education_btn">Confirm <i class="fa fa-check" aria-hidden="true"></i></button>
					</div>
	
				</div>


				<div class="user_profile_item user_skills_holder">
					<div class="user_profile_skills">
						<p class="bold" style="text-align: left;">My skills:</p>
						<span id="skills_span">{{ Session::get('user')->skills }}</span>
						<a class="edit_link" id="user_skills">	
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
					</div>

					<div class="edit_info_window" id="user_skills" style="display: none">
						<textarea name="" cols="30" rows="10" width="80%" placeholder="Enter your skills" style="height: 50px;"></textarea>
						<button class="confirm_edit_btn blue_btn" id="skills_btn">Confirm <i class="fa fa-check" aria-hidden="true"></i></button>
					</div>
				</div>

				<div class="user_profile_item user_profile_languages_holder">
					<p class="bold" style="text-align: left;font-size: 15px;position: relative;display: inline-block;">
					<span>Languages:</span>
					<a href="#" class="edit_link" id="languages_multiSelect">	
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
					</p>
					<ul class="user_profile_languages cf">
					@foreach($languages as $language)
							<li class="bold"><span>{{ $language }}</span></li>

					@endforeach
						<li><span>English</span></li>
						<li><span>Serbian</span></li>
					</ul>
					<div class="languages_multipleSelect_holder">
						<select class="languages_multipleSelect" name="states[]"  multiple="multiple">
							<option value="English">English</option>
							<option value="Serbian">Serbian</option>
							<option value="Bulgarian">Bulgarian</option>
							<option value="Slovenian">Slovenian</option>
							<option value="Macedonian">Macedonian</option>
						</select>
							<button class="blue_btn languages_submit">Save</button>
					</div>
				</div>

				<div class="user_profile_item user_profile_work_prev">
					<ul>
						@foreach($workHistory as $workHistory)
							<li class="bold">

								<span class="user_work_position">{{ $workHistory->position }}</span> 
								
								<span class="work_place_user">
									<i class="fa fa-circle" aria-hidden="true"></i>
									<span>{{ $workHistory->company_name }}</span>
									<i class="fa fa-circle" aria-hidden="true"></i>
								</span>
	
								<span class="period_prev_work">{{ $workHistory->year_from }} - {{ $workHistory->year_to }}</span>
								<a class="delete_link" data-id="{{ $workHistory->id }}"> 
									<i class="fa fa-minus-circle" aria-hidden="true"></i>
								</a>
								<a href="#" class="edit_link" data-id="{{ $workHistory->id }}" id="user_skills_history">	
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>
			
							</li>
						@endforeach
						</ul>
						
						<div class="add_new_user_job_profile">
							<button class="add_new_user_job_profile_btn"><i class="fa fa-plus" aria-hidden="true"></i> Add new job</button>
						</div>
				</div>

				<!-- <div class="user_profile_about user_profile_item">
					<p class="user_profile_about_text">
					<span id="description_span">{{ Session::get('user')->description }}</span>
						<a class="edit_link" id="description">	
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
					</p>
					
					<div class="edit_info_window" id="description_input" style="display:none">
						<textarea name="" cols="30" rows="10" width="100%" placeholder="Say something about you"></textarea>

						<button class="confirm_edit_btn blue_btn" id="description_btn">Confirm <i class="fa fa-check" aria-hidden="true"></i></button>
					</div>
				</div> -->
			</div>
		</div>

		<div class="user_profile_sidebar">
			<div class="user_profile_sidebar_item">
				<p class="bold">Email:</p>
				<span>{{ Session::get('user')->email }}</span>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">Country:</p>
				<span id="country_span">{{ Session::get('user')->country }}</span>
				<a class="edit_link" id="country">	
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>

				<div class="edit_info_window" id="country_input" style="display:none">
					<input type="text" placeholder="Enter your country">
					<button class="confirm_edit_btn blue_btn" id="country_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
				</div>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">City:</p>
				<span id="city_span">{{ Session::get('user')->city }}</span>
				<a class="edit_link" id="city">	
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>

				<div class="edit_info_window"  id="city_input" style="display:none">
					<input type="text" placeholder="Enter your city">
					<button class="confirm_edit_btn blue_btn" id="city_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
				</div>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">Region:</p>
				<span id="region_span">{{ Session::get('user')->region }}</span>
				<a class="edit_link" id="region">	
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>

				<div class="edit_info_window" id="region_input" style="display:none">
					<input type="text" placeholder="Enter your region">
					<button class="confirm_edit_btn blue_btn" id="region_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
				</div>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">Birth date:</p>
				<span id="birthdate_span">{{ Session::get('user')->birthdate }}</span>
				<a class="edit_link" id="birthdate">	
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>

				<div class="edit_info_window" id="birthdate_input" style="display:none">
					<input type="text" placeholder="Enter your birth date">
					<button class="confirm_edit_btn blue_btn" id="birthdate_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
				</div>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">Gender:</p>
				<span>{{ Session::get('user')->gender }}</span>
<!-- 				<a href="" class="edit_link">	
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>

				<div class="edit_info_window">
					<label for="male">
						<input type="radio" value="" id="male" name="gender" style="width: auto;margin-right: 5px;">
						<span style="font-size: 15px;">Male</span>
					</label>

					<label for="female">
						<input type="radio" value="" id="female" name="gender" style="width: auto;margin-right: 5px;">
						<span style="font-size: 15px;">Female</span>
					</label>
					<button class="confirm_edit_btn blue_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
					</div> -->
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">Phone:</p>
				<span id="phone_span">{{ Session::get('user')->phone }}</span>
				<a class="edit_link" id="phone">	
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>

				<div class="edit_info_window"  id="phone_input" style="display:none">
					<input type="text" placeholder="Enter your phone">
					<button class="confirm_edit_btn blue_btn" id="phone_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
				</div>
			</div>
		
			</div>
		</div>


	<!-- <div class="popUp popup_new_language_user">
		<form action="" method="" class="popup_new_language_user_form">
		<select class="languages_multipleSelect" name="state">
			<option value="English">English</option>
			<option value="Serbian">Serbian</option>
		</select>
			<div class="popup_new_job_user_form_item" style="background: transparent;margin: 0;padding: 0;box-shadow: none;">
				<input type="submit" value="Save" class="save_btn_pop_up">
			</div>	
		</form>
		<a href="#" class="popup_close">
			<i class="fa fa-times" aria-hidden="true"></i>
		</a>
	</div> -->


	<div class="popUp popup_new_job_user">
		<form action="{{ route('updatePopup') }}" method="POST" enctype="multipart/form-data" class="popup_new_job_user_form" id="new_job_form">
			{{Form::open(array('route' => 'updatePopup','method'=>'POST'))}}
			<div class="popup_new_job_user_form_item">
				<p class="popup_new_job_user_form_item_title bold">Job position:</p>
				<input type="text" id="job_position_input" name="position">
			</div>

			<div class="popup_new_job_user_form_item">
				<p class="popup_new_job_user_form_item_title bold">Company:</p>
				<input type="text" name="company_name" placeholder="Company name" id="user_job_company_name">
				<input type="text" name="company_website" placeholder="Company website" id="user_job_company_website">
			</div>

			<div class="popup_new_job_user_form_item cf">

				<div class="user_from_to_period">				
					<p class="popup_new_job_user_form_item_title bold">From:</p>
					<div class="user_from_to_period_item">
						<select name="year_from" id="job_years_from">
						<option value="">Choose year</option>
						 <script>
						 var year = 2017;
						 while(year > 1930) {
							 $('#job_years_from').append(`<option value="`+ year +`">`+ year-- +`</option>`); 
						
						 }
							</script>
						</select>
					</div>

					<div class="user_from_to_period_item">
						<select name="month_from" id="month_from">
							<option value="">Choose month</option>
							<option value="January">January</option>
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
						</select>
					</div>
				</div>

				<div class="user_from_to_period">
					<p class="popup_new_job_user_form_item_title bold">To:</p>
					<div class="user_from_to_period_item">
						<select name="year_to" id="job_years_to">
						<option value="">Choose year</option>
						 <script>
						 var year = 2017;
						 while(year > 1930) {
							 $('#job_years_to').append(`<option value="`+ year +`">`+ year-- +`</option>`);
						 }
						</script>
						</select>
					</div>

					<div class="user_from_to_period_item">
						<select name="month_to" id="month_to">
							<option value="">Choose month</option>
							<option value="January">January</option>
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
						</select>
					</div>
				</div>

			</div>

			<div class="popup_new_job_user_form_item">
				<p class="popup_new_job_user_form_item_title bold">Description:</p>
				<textarea name="description" id="user_job_description" cols="30" rows="10"></textarea>
			</div>
			 {{ csrf_field() }}
			<div class="popup_new_job_user_form_item" style="background: transparent;margin: 0;padding: 0;box-shadow: none;">
				<input type="submit" value="Save" class="save_btn_pop_up">
			</div>
		</form>
		<a href="#" class="popup_close">
			<i class="fa fa-times" aria-hidden="true"></i>
		</a>
	</div>

</main>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
<script>

	 $(document).click(function() {
	
// dugme da se pojavljuje i nestaje

        $('.confirm_edit_btn').css('display','none');
	 	$('#avatar').css('display','inline-block');
	 	$('#avatar_input').css('display','none');
	 	$('#avatar_input2').css('display','none');
        });

	 	$('.edit_link').click(function(e){
	 		e.stopPropagation();
	 	});
 	

       $(".edit_info_window input").focus(function(e) {
       	$(this).next().css('display','inline');
            e.stopPropagation(); // if you click on the div itself it will cancel the click event.
        });

	   $('.edit_info_window textarea').focus(function(e){
       	e.stopPropagation();
       		$(this).next().css('display','inline-block');
       	});

   		$('#education_input input').click(function(e){
   			e.stopPropagation();
			$(this).next().css('display','inline-block');
		});

		$('#avatar_input2 button').click(function(e){
   			e.stopPropagation();
		});

		$('.user_profile_sidebar').click(function(e){
			e.stopPropagation();
		})


// avatar/ profile image   - nezavrsen
 
	$('#avatar').click(function(){
			$(this).css('display', 'none');
			$('#avatar_input').css('display','block');
			$('#avatar_input2').css('display','block');
			$('#avatar_input2 button').css('display','inline-block');
		});

		$('#avatar_input2').click(function(e){
			e.preventDefault();
			$('#avatar').css('display','block');	
			$('#avatar_input').css('display','none');
			$('#avatar_input2').css('display','none');
		});
	// 		var data_input = $('#avatar_input input')[0].files[0];
	// 		console.log(data_input);
	// 		$.ajax({
	// 		  method: "POST",
	// 		  url: "/updateAvatar",
	// 		     contentType:false,
 //               	 cache: false,
 //             	 processData:false,
	// 		  data: {
	// 		  	'_token': $('meta[name="csrf-token"]').attr('content'),
	// 		  	data_input:data_input
	// 		  },
	// 		  // headers: {
 //     //  				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	// 				// },
	// 			})
	//            .done(function(data)
	// 	           {
	// 	            console.log(data);
	// 	           })



// // avatar/ profile image   - nezavrsen

// 	$('#avatar').classick(function(){
// 			$(this).css('display', 'none');
// 			$('#avatar_input').slideToggle('slow');
// 		});

// 		$('#avatar_input button').click(function(e){
// 			e.preventDefault();
// 			$('#avatar').css('display','block');	
// 		});

		// });   ???


		//ako su prazni da stoje otvoreno 
		$(document).ready(function(){
		if ($('#description_span').text() == "") {
			$('#description_input').css('display','block');
			$('#description').css('display','none');
			$('#description_btn').css('display','none');
			$('#description_input textarea').focus(function(){
			$('#description_btn').css('display','inline-block');
		});
		};

		if ($('#education_span').text() == "") {
			$('#education_input').css('display','block');
			$('#education').css('display','none');
			$('#education_btn').css('display','none');
			$('#education_input input').focus(function(){
			$('#education_btn').css('display','inline-block');
		});
		};

		if ($('#country_span').text() == "") {
			$('#country_input').css('display','block');
			$('#country').css('display','none');
			$('#country_btn').css('display','none');
		
		};

		if ($('#city_span').text() == "") {
			$('#city_input').css('display','block');
			$('#city').css('display','none');
			$('#city_btn').css('display','none');
			
		};
		if ($('#country_span').text() == "") {
			$('#country_input').css('display','block');
			$('#country').css('display','none');
			$('#country_btn').css('display','none');
			
		};
		if ($('#region_span').text() == "") {
			$('#region_input').css('display','block');
			$('#region').css('display','none');
			$('#region_btn').css('display','none');
			
		};
		if ($('#birthdate_span').text() == "") {
			$('#birthdate_input').css('display','block');
			$('#birthdate').css('display','none');
			$('#birthdate_btn').css('display','none');
			
		};
		if ($('#phone_span').text() == "") {
			$('#phone_input').css('display','block');
			$('#phone').css('display','none');
			$('#phone_btn').css('display','none');
			
		};
		if ($('#skills_span').text() == "") {
			$('#skills_input').css('display','block');
			$('#user_skills').css('display','none');
			$('#skills_btn').css('display','none');
			
		};


		$('#upload_avt_form').click(function(e){
			e.stopPropagation();
		})
	});
		
// education

	$('#education').click(function(){
		$(this).css('display', 'none');
		var edu_span = $('#education_span').text();
		$('#education_span').css('display','none');
		$('#education_input').slideToggle('slow');
		$('#education_input input').val(edu_span).focus();
	});

		//

		$('#education_input button').click(function(e){
			e.preventDefault();
			$('#education').css('display', 'block');
			$('#education_span').css('display','block');
			$('#education_input').css('display','none');
			var data_input = $('#education_input input').val();
			$('#education_span').html(data_input);
			$.ajax({
				  method: "POST",
				  url: "/updateEducation",
				  data: {
				  	data_input:data_input,
				  	'_token': $('meta[name="csrf-token"]').attr('content')
				  },
				})
		           .done(function(data)
			           {
			            console.log(data);
			           })


		});

// description 		

		$('#description').click(function(){
		$(this).css('display', 'none');
		var des_span = $('#description_span').text();
		$('#description_span').css('display','none');
		$('#description_input').slideToggle('slow');
		$('#description_input textarea').val(des_span).focus();
	});

		//

		$('#description_input button').click(function(e){
			e.preventDefault();
			$('#description').css('display', 'block');
			$('#description_span').css('display','block');
			$('#description_input').css('display','none');
			var data_input = $('#description_input textarea').val();
			$('#description_input').html(data_input);
			$('#description_span').html(data_input);
			$.ajax({
				  method: "POST",
				  url: "/updateDescription",
				  data: {
				  	data_input:data_input,
				  	'_token': $('meta[name="csrf-token"]').attr('content')
				  },
				})
		           .done(function(data)
			           {
			            console.log(data);
			           })


		});

// country 

	$('#country').click(function(){
			$(this).css('display', 'none');
			var coun_span = $('#country_span').text();
			$('#country_span').css('display','none');
			$('#country_input').slideToggle('slow');
			$('#country_input input').val(coun_span).focus();
		});

			//

			$('#country_input button').click(function(e){
				e.preventDefault();
				$('#country').css('display', 'block');
				$('#country_span').css('display','block');
				$('#country_input').css('display','none');
				var data_input = $('#country_input input').val();
				$('#country_span').html(data_input);
				$.ajax({
					  method: "POST",
					  url: "/updateCountry",
					  data: {
					  	data_input:data_input,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			           .done(function(data)
				           {
				            console.log(data);
				           })


			});

// city

	$('#city').click(function(){
			$(this).css('display', 'none');
			var city_span = $('#city_span').text();
			$('#city_span').css('display','none');
			$('#city_input').slideToggle('slow');
			$('#city_input input').val(city_span).focus();
		});

			//

			$('#city_input button').click(function(e){
				e.preventDefault();
				$('#city').css('display', 'block');
				$('#city_span').css('display','block');
				$('#city_input').css('display','none');
				var data_input = $('#city_input input').val();
				$('#city_span').html(data_input);
				$.ajax({
					  method: "POST",
					  url: "/updateCity",
					  data: {
					  	data_input:data_input,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			           .done(function(data)
				           {
				            console.log(data);
				           })


			});

// region

	$('#region').click(function(){
			$(this).css('display', 'none');
			var reg_span = $('#region_span').text();
			$('#region_span').css('display','none');
			$('#region_input').slideToggle('slow');
			$('#region_input input').val(reg_span).focus();
		});

			//

			$('#region_input button').click(function(e){
				e.preventDefault();
				$('#region').css('display', 'block');
				$('#region_span').css('display','block');
				$('#region_input').css('display','none');
				var data_input = $('#region_input input').val();
				$('#region_span').html(data_input);
				$.ajax({
					  method: "POST",
					  url: "/updateRegion",
					  data: {
					  	data_input:data_input,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			           .done(function(data)
				           {
				            console.log(data);
				           })


			});

// birthdate

	$('#birthdate').click(function(){
			$(this).css('display', 'none');
			var bir_span = $('#birthdate_span').text();
			$('#birthdate_span').css('display','none');
			$('#birthdate_input').slideToggle('slow');
			$('#birthdate_input input').val(bir_span).focus();
		});

			//

			$('#birthdate_input button').click(function(e){
				e.preventDefault();
				$('#birthdate').css('display', 'block');
				$('#birthdate_span').css('display','block');
				$('#birthdate_input').css('display','none');
				var data_input = $('#birthdate_input input').val();
				$('#birthdate_span').html(data_input);
				$.ajax({
					  method: "POST",
					  url: "/updateBirthdate",
					  data: {
					  	data_input:data_input,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			           .done(function(data)
				           {
				            console.log(data);
				           })


			});

// phone

	$('#phone').click(function(){
			$(this).css('display', 'none');
			var pho_span = $('#phone_span').text();
			$('#phone_span').css('display','none');
			$('#phone_input').slideToggle('slow');
			$('#phone_input input').val(pho_span).focus();
		});

			//

			$('#phone_input button').click(function(e){
				e.preventDefault();
				$('#phone').css('display', 'block');
				$('#phone_span').css('display','block');
				$('#phone_input').css('display','none');
				var data_input = $('#phone_input input').val();
				$('#phone_span').html(data_input);
				$.ajax({
					  method: "POST",
					  url: "/updatePhone",
					  data: {
					  	data_input:data_input,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			           .done(function(data)
				           {
				            console.log(data);
				           })


			});

// skills

	$('.edit_link#user_skills').click(function(){
		$(this).css('display', 'none');
		var skills_span = $('#skills_span').text();
		$('#skills_span').css('display','none');
		$('.edit_info_window#user_skills').slideToggle('slow');
		$('.edit_info_window#user_skills textarea').val(skills_span).focus();
	});

	$('.delete_link').click(function(e){
		e.preventDefault();
		var whid = $(this).attr('data-id');
		 $(this).parent().remove();
		$.ajax({
				method: "POST",
				url: "/removeHistory",
				data: {
					whid:whid,
					'_token': $('meta[name="csrf-token"]').attr('content')
					},
				})
			.done(function(data)
			{		
					console.log(data);
			
			}).fail(function(err){
				console.log(err);
			})

	});

		//

		$('.edit_info_window#user_skills button').click(function(e){
			e.preventDefault();
			$('.edit_link#user_skills').css('display', 'block');
			$('#skills_span').css('display','block');
			$('.edit_info_window#user_skills').css('display','none');
			var data_input = $('.edit_info_window#user_skills textarea').val();
			$('#skills_span').html(data_input);
			$.ajax({
				  method: "POST",
				  url: "/updateSkills",
				  data: {
				  	data_input:data_input,
				  	'_token': $('meta[name="csrf-token"]').attr('content')
				  },
				})
		           .done(function(data)
			           {
			            console.log(data);
			           })


		});

		$('#new_job_form').ajaxForm(function(data){
				var position = data.position;
				var company = data.company_name;
				var from = data.year_from;
				var to = data.year_to;
				$('.user_profile_work_prev ul').append(`<li class="bold">

								<span class="user_work_position">`+ position + `</span> 
								
								<span class="work_place_user">
									<i class="fa fa-circle" aria-hidden="true"></i>
									<span>` + company + `</span>
									<i class="fa fa-circle" aria-hidden="true"></i>
								</span>
	
								<span class="period_prev_work">`+ from + ' - ' + to +`</span>
								<a class="delete_link"> 
									<i class="fa fa-minus-circle" aria-hidden="true"></i>
								</a>
								<a href="#" class="edit_link" id="user_skills">	
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>
			
							</li>`)
		});


		$('.user_profile_item ul li #user_skills_history').click(function(e){
			// $('#user_skills').css('display','block');
			e.preventDefault();
			e.stopPropagation();
			console.log('im clicked');
			var whid = $(this).attr('data-id');
			$.ajax({
				method: "GET",
				url: "/getPopUpData",
				data: { whid: whid}
				})
				.done(function(data){
					$('.popup_new_job_user').fadeIn(200);
					var cName = data[0].company_name;
					var desc = data[0].description;
					var mFrom = data[0].month_from;
					var mTo = data[0].month_to;
					var pos = data[0].position;
					var yFrom = data[0].year_from;
					var yTo = data[0].year_to;
					$('#job_position_input').val(pos);
					$('#user_job_company_name').val(cName);
					// $('.popup_new_job_user_form_item input:last-of-type').val(cName); company website
					$('#job_years_from').val(yFrom);
					$('#job_years_to').val(yTo);
					$('#month_from').val(mFrom);
					$('#month_to').val(mTo);
					$('#user_job_description').val(desc);
				})
		});
		
       $('#languages_multiSelect').click(function(e){
		   e.preventDefault();
			$('.languages_multipleSelect_holder').css('display','block');
	   }); 
	   
	   $('.languages_submit').click(function(e){
		e.preventDefault();
		var languages = [], language;
			$('.select2-selection__choice').each(function(){
				language = $(this).text().substring(1);
				languages.push(language);
				return languages;
			});
		console.log(languages);
		$.ajax({
				method: "POST",
				url: "/updateLangauge",
				data: {
					languages:languages,
					'_token': $('meta[name="csrf-token"]').attr('content')
					},
				})
			.done(function(data)
			{		
					console.log(data);
			}).fail(function(err){
				console.log(err);
			})
	   });
</script>

@endsection