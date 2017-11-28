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
						@if(isset($user[0]->image->path))
							<img src="{{ URL::to('/') . $user[0]->image->path }}" alt="">
						@endif
						</span>
					</div>
				</div>

				<div class="user_profile_name_holder user_profile_item">
					<p class="user_profile_name">
					<span>{{ $user[0]->first_name }} {{ $user[0]->last_name }}</span>
					</p>
				</div>

				<div class="user_profile_name_holder user_profile_item">
					<p class="user_profile_name">
					<span id="education_span">{{ $user[0]->education }}</span>
					</p>
				</div>


				<div class="user_profile_item user_skills_holder">
					<div class="user_profile_skills">
						<p class="bold" style="text-align: left;">My skills:</p>
						<span id="skills_span">PHP, HTML, CSS, Project menager, profesor, auto mehanicar, etc...</span>
					</div>

					<div class="edit_info_window" id="user_skills" style="display: none">
						<textarea name="" cols="30" rows="10" width="80%" placeholder="Enter your skills" style="height: 50px;"></textarea>
						<button class="confirm_edit_btn blue_btn" id="skills_btn">Confirm <i class="fa fa-check" aria-hidden="true"></i></button>
					</div>
				</div>

				<div class="user_profile_item user_profile_languages_holder">
					<p class="bold" style="text-align: left;font-size: 15px;position: relative;display: inline-block;">
					<span>Languages:</span>
					<a href="#" class="edit_link" id=""> English </a>
					</p>		
				</div>

				<div class="user_profile_item user_profile_work_prev">
					<ul>
						@foreach($user[0]->workHistory as $workHistory)
							<li class="bold">

								<span class="user_work_position">{{ $workHistory->position }}</span> 
								
								<span class="work_place_user">
									<i class="fa fa-circle" aria-hidden="true"></i>
									<span>{{ $workHistory->company_name }}</span>
									<i class="fa fa-circle" aria-hidden="true"></i>
								</span>
	
								<span class="period_prev_work">{{ $workHistory->year_from }} - {{ $workHistory->year_to }}</span>

								<p class="user_profile_desc"> {{ $workHistory->description }} </p>

								<a href="#" class="edit_link" id="user_skills">	
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>

							</li>
						@endforeach
						</ul>
				</div>

				<div class="user_profile_about user_profile_item">
					<p class="user_profile_about_text">
						<span id="description_span">{{ $user[0]->description }}</span>
					</p>
				</div>
			</div>
		</div>

		<div class="user_profile_sidebar">
			<div class="user_profile_sidebar_item">
				<p class="bold">Email:</p>
				<span>{{ $user[0]->email }}</span>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">Country:</p>
				<span id="country_span">{{ $user[0]->country }}</span>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">City:</p>
				<span id="city_span">{{ $user[0]->city }}</span>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">Region:</p>
				<span id="region_span">{{ $user[0]->region }}</span>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">Birth date:</p>
				<span id="birthdate_span">{{ $user[0]->birthdate }}</span>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">Gender:</p>
				<span>{{ $user[0]->gender }}</span>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">Phone:</p>
				<span id="phone_span">{{ $user[0]->phone }}</span>
			</div>
		
			</div>
		</div>
	</div>
</main>
@endsection