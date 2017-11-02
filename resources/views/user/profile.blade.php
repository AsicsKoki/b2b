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
							<img src="https://scontent.fbeg5-1.fna.fbcdn.net/v/t1.0-1/p160x160/21686203_1317978501681658_3611638233223355882_n.jpg?oh=8125a6abd8ff47a68901a7907b32c738&oe=5A39DB7C" alt="">
						</span>
						<a class="edit_link" id="avatar">	
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
						<br>
						<div class="edit_info_window change_image_edit_info_window" id="avatar_input" style="display:none">
							<input type="file">
							<button class="confirm_edit_btn blue_btn">Choose image</button>
						</div>


					</div>
					<div class="edit_info_window" id="avatar_input2" style="display:none">
						<button class="confirm_edit_btn blue_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
					</div>
				</div>

				<div class="user_profile_name_holder user_profile_item">
					<p class="user_profile_name">
					<span>{{ Session::get('user')->first_name }} {{Session::get('user')->last_name}}</span>
						<a href="" class="edit_link">	
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
					</p>
					
					<div class="edit_info_window">
						<input type="text" placeholder="Enter your full name">
						<button class="confirm_edit_btn blue_btn">Confirm</button>
					</div>
				</div>

				<div class="user_profile_name_holder user_profile_item">
					<p class="user_profile_name">
					<span id="education_span">{{ Session::get('user')->education }}</span>
						<a class="edit_link" id="education" >	
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
					</p>
					
			
					<div class="edit_info_window" id="education_input" style="display: none">
						<input type="text" placeholder="Enter education" style="font-size: 14px" >
						<button class="confirm_edit_btn blue_btn" id="education_btn">Confirm</button>
						<input type="text" placeholder="Education" style="font-size: 14px">
						<button class="confirm_edit_btn blue_btn">Confirm <i class="fa fa-check" aria-hidden="true"></i></button>
					</div>
	
				</div>


				<div class="user_profile_item user_skills_holder">
					<div class="user_profile_skills">
						<p class="bold" style="text-align: left;">My skills:</p>
						<span>PHP, HTML, CSS, Project menager, profesor, auto mehanicar, etc...</span>
						<a class="edit_link" id="user_skills">	
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
					</div>

					<div class="edit_info_window" id="user_skills" style="">
						<textarea name="" cols="30" rows="10" width="80%" placeholder="Enter your skills" style="height: 50px;"></textarea>
						<button class="confirm_edit_btn blue_btn">Confirm <i class="fa fa-check" aria-hidden="true"></i></button>
					</div>
				</div>

				<div class="user_profile_item user_profile_languages_holder">
					<p class="bold" style="text-align: left;font-size: 15px;position: relative;display: inline-block;">
					<span>Languages:</span>
					<a href="#" class="edit_link" id="">	
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
					</p>
					<ul class="user_profile_languages cf">
						<li><span>English</span></li>
						<li><span>Serbian</span></li>
					</ul>
					
				</div>

				<div class="user_profile_item user_profile_work_prev">
		
						<ul>
							<li class="bold">

								<span class="user_work_position">Frontend developer</span> 
								
								<span class="work_place_user">
									<i class="fa fa-circle" aria-hidden="true"></i>
									<span>Booproweb</span>
									<i class="fa fa-circle" aria-hidden="true"></i>
								</span>
	
								<span class="period_prev_work">2014 - 2017</span>

								<a href="#" class="edit_link" id="user_skills">	
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>
			
							</li>

							<li class="bold">

								<span class="user_work_position">Frontend developer</span> 
								
								<span class="work_place_user">
									<i class="fa fa-circle" aria-hidden="true"></i>
									<span>Booproweb</span>
									<i class="fa fa-circle" aria-hidden="true"></i>
								</span>
	
								<span class="period_prev_work">2014 - 2017</span>

								<a href="#" class="edit_link" id="user_skills">	
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>
			
							</li>

							<li class="bold">

								<span class="user_work_position">Frontend developer</span> 
								
								<span class="work_place_user">
									<i class="fa fa-circle" aria-hidden="true"></i>
									<span>Booproweb</span>
									<i class="fa fa-circle" aria-hidden="true"></i>
								</span>
	
								<span class="period_prev_work">2014 - 2017</span>

								<a href="#" class="edit_link" id="user_skills">	
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>
			
							</li>
						</ul>
						
						<div class="add_new_user_job_profile">
							<button class="add_new_user_job_profile_btn"><i class="fa fa-plus" aria-hidden="true"></i> Add new job</button>
						</div>
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

						<button class="confirm_edit_btn blue_btn" id="description_btn">Confirm</button>

						<button class="confirm_edit_btn blue_btn">Confirm <i class="fa fa-check" aria-hidden="true"></i></button>
					</div>
				</div>
			</div>
		</div>

		<div class="user_profile_sidebar">
			<div class="user_profile_sidebar_item">
				<p class="bold">Email:</p>
				<span>{{ Session::get('user')->email }}</span>
				<a href="" class="edit_link">	
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>
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
				<a href="" class="edit_link">	
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
					</div>
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

	<div class="popUp popup_new_language_user">
		<form action="" method="" class="popup_new_language_user_form">
			<div class="popup_new_language_user_item">
				<p>Choose language <i class="fa fa-angle-down" aria-hidden="true"></i></p>
				<ul class="new_language_user_list">
					<li><a href="">English</a></li>
					<li><a href="">Serbian</a></li>
					<li><a href="">Spanish</a></li>
					<li><a href="">Maxican</a></li>
				</ul>
				<button class="add_new_lang_btn"><i class="fa fa-plus" aria-hidden="true"></i></button>
			</div>
			<div class="popup_new_job_user_form_item" style="background: transparent;margin: 0;padding: 0;box-shadow: none;">
				<input type="submit" value="Save" class="save_btn_pop_up">
			</div>
		</form>

		<a href="#" class="popup_close">
			<i class="fa fa-times" aria-hidden="true"></i>
		</a>
	</div>


	<div class="popUp popup_new_job_user">
		<form action="" method="" class="popup_new_job_user_form">
			<div class="popup_new_job_user_form_item">
				<p class="popup_new_job_user_form_item_title bold">Job position:</p>
				<input type="text">
			</div>

			<div class="popup_new_job_user_form_item">
				<p class="popup_new_job_user_form_item_title bold">Company:</p>
				<input type="text" placeholder="Company name">
				<input type="text" placeholder="Company website">
			</div>

			<div class="popup_new_job_user_form_item cf">

				<div class="user_from_to_period">				
					<p class="popup_new_job_user_form_item_title bold">From:</p>
					<div class="user_from_to_period_item">
						<select name="" id="">
							<option value="">Choose year</option>
							<option value="">2017</option>
							<option value="">2016</option>
							<option value="">2015</option>
						</select>
					</div>

					<div class="user_from_to_period_item">
						<select name="" id="">
							<option value="">Choose month</option>
							<option value="">Januar</option>
							<option value="">Februar</option>
							<option value="">March</option>
						</select>
					</div>
				</div>

				<div class="user_from_to_period">
					<p class="popup_new_job_user_form_item_title bold">To:</p>
					<div class="user_from_to_period_item">
						<select name="" id="">
							<option value="">Choose year</option>
							<option value="">2017</option>
							<option value="">2016</option>
							<option value="">2015</option>
						</select>
					</div>

					<div class="user_from_to_period_item">
						<select name="" id="">
							<option value="">Choose month</option>
							<option value="">Januar</option>
							<option value="">Februar</option>
							<option value="">March</option>
						</select>
					</div>
				</div>

			</div>

			<div class="popup_new_job_user_form_item">
				<p class="popup_new_job_user_form_item_title bold">Description:</p>
				<textarea name="" id="" cols="30" rows="10" "></textarea>
			</div>

			<div class="popup_new_job_user_form_item" style="background: transparent;margin: 0;padding: 0;box-shadow: none;">
				<input type="submit" value="Save" class="save_btn_pop_up">
			</div>
		</form>
		<a href="#" class="popup_close">
			<i class="fa fa-times" aria-hidden="true"></i>
		</a>
	</div>

</main>

<script>


// avatar/ profile image   - nezavrsen
 
	$('#avatar').click(function(){
			$(this).css('display', 'none');
			$('#avatar_input').slideToggle('slow');
			$('#avatar_input2').slideToggle('slow');
		});

		$('#avatar_input2').click(function(e){
			e.preventDefault();
			$('#avatar').css('display','block');	
			$('#avatar_input').css('display','none');
			$('#avatar_input2').css('display','none');
			var data_input = $('#avatar_input input')[0].files[0];
			console.log(data_input);
			$.ajax({
			  method: "POST",
			  url: "/updateAvatar",
			     contentType:false,
               	 cache: false,
             	 processData:false,
			  data: {
			  	'_token': $('meta[name="csrf-token"]').attr('content'),
			  	data_input:data_input
			  },
			  // headers: {
     //  				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					// },
				})
	           .done(function(data)
		           {
		            console.log(data);
		           })

// // avatar/ profile image   - nezavrsen

// 	$('#avatar').classick(function(){
// 			$(this).css('display', 'none');
// 			$('#avatar_input').slideToggle('slow');
// 		});

// 		$('#avatar_input button').click(function(e){
// 			e.preventDefault();
// 			$('#avatar').css('display','block');	
// 		});

		});

		// $('#education_input input').focus(function(){
		// 	$('.confirm_edit_btn').css('display','block');
		// });

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
			$('#country_input input').focus(function(){
			$('#country_btn').css('display','block');
		});
		};

		if ($('#city_span').text() == "") {
			$('#city_input').css('display','block');
			$('#city').css('display','none');
			$('#city_btn').css('display','none');
			$('#city_input input').focus(function(){
			$('#city_btn').css('display','block');
		});
		};
		if ($('#country_span').text() == "") {
			$('#country_input').css('display','block');
			$('#country').css('display','none');
			$('#city_btn').css('display','none');
			$('#city_input input').focus(function(){
			$('#city_btn').css('display','block');
		});
		};
		if ($('#region_span').text() == "") {
			$('#region_input').css('display','block');
			$('#region').css('display','none');
			$('#region_btn').css('display','none');
			$('#region_input input').focus(function(){
			$('#region_btn').css('display','block');
		});
		};
		if ($('#birthdate_span').text() == "") {
			$('#birthdate_input').css('display','block');
			$('#birthdate').css('display','none');
			$('#birthdate_btn').css('display','none');
			$('#birthdate_input input').focus(function(){
			$('#birthdate_btn').css('display','block');
		});
		};
		if ($('#phone_span').text() == "") {
			$('#phone_input').css('display','block');
			$('#phone').css('display','none');
			$('#phone_btn').css('display','none');
			$('#phone_input input').focus(function(){
			$('#phone_btn').css('display','block');
		});
		};
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
		$('#description_input input').val(des_span).focus();
	});

		//

		$('#description_input button').click(function(e){
			e.preventDefault();
			$('#description').css('display', 'block');
			$('#description_span').css('display','block');
			$('#description_input').css('display','none');
			var data_input = $('#description_input textarea').val();
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


</script>

@endsection