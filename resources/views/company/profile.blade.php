@extends('layouts.master')
@section('content')
	<h1 class="page_title main_page_title">Company Profile</h1>
	<div class="main_app_container">
		@if(Auth::check() && Auth::user()->id === $company->id)
			<a href="{{ route('getEditCompany', ['cid' => Auth::user()->id]) }}" class="btn_edit_profile">Edit Profile <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		@endif
		<div class="company_profile_view_holder cf">	
			<div class="company_profile_view_side cf">
				<div class="company_profile_view_side_logo">
					<div class="company_profile_logo_holder">
						<img src="{{ URL::to('/') . $logo }}" alt="">
					</div>
					@if(Auth::check() && Auth::user()->id === $company->id)
					{{Form::open(array('route' => 'updateCompanyLogo','method'=>'POST', 'files'=>true))}}
					<div class="update_logo_holder">
						<a class="btn_edit_profile">Update Logo <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						<input type="file" name="company_logo" id="company_logo">
						{{ csrf_field() }}
						<div class="login_reg_form_item login_reg_form_submit">
							<input type="submit" value="Update" id="company_logo_submit">
						</div>
					</div>
					{{Form::close()}}
					@endif
				</div>
				<div class="company_profile_view_side_info">
					<div class="company_profile_view_jobs_title">
						<p class="bold" style="background: transparent; padding: 0;">Company info</p>
					</div>
					<p class="bold">{{ $company->company_name }}</p>
					<p class="bold"><a href="http://{{ $company->company_website }}" style="color: #ff5d5c;">{{ $company->company_website }}</a></p>
					<p class=""><span class="bold">Location:</span> {{$company->country}}<span>, <span>{{$company->company_address}}</span></p>
					<p><span class="bold">Phone:</span> <span>{{$company->company_phone}}</span></p>
					<p><span class="bold">Employees:</span> <span>{{ $businessCard['number_of_employees'] }}</span></p>
				</div>
				<div class="company_profile_view_jobs">
					<div class="company_profile_view_jobs_title">
						<p class="bold">All jobs by <span>Booproweb</span></p>
					</div>
					<ul>
						@foreach ($ads as $ad)
						<li class="company_profile_view_jobs_item">
							<a href="{{ route('getSpecificJob', ['jid' => $ad->id, 'cid' => $company->id]) }}" class="company_profile_view_jobs_item_link">
								<p class="bold">{{ $ad->position }}</p>
								<p class=""><span>{{ $ad->country }}</span>, <span>{{ $ad->city }}</span></p>
							</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>

			<div class="company_profile_view_main">
				<div class="company_profile_view_cover">
					<!-- <img style="width: 100%;" src="https://scontent.fbeg4-1.fna.fbcdn.net/v/t31.0-8/19702672_1617343671610432_6250076273563742580_o.jpg?oh=cd246e4b52bd4d88c2054c4ce088c5a4&oe=5A8552D0" alt=""> -->
					
					<img src="{{ URL::to('/') . $cover }}" alt="">
				</div>

				<div>
					@if(Auth::check() && Auth::user()->id === $company->id)
						{{Form::open(array('route' => 'updateCover','method'=>'POST', 'files'=>true))}}
							<a class="btn_edit_profile">Update Cover <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<input type="file" name="company_cover" id="company_cover">
							{{ csrf_field() }}
							<div class="login_reg_form_item login_reg_form_submit">
								<input type="submit" value="Update" id="company_cover_submit">
							</div>
						{{Form::close()}}
					@endif
				</div>

				<div class="company_profile_view_main_item">
					<div class="company_profile_view_main_title"><p class="bold">About company</p></div>
					<div class="company_profile_view_main_text">
						<p>{{$company->about_us}}</p>
					</div>
				</div>

				<div class="company_profile_view_main_item">
					<div class="company_profile_view_main_title"><p class="bold">Careers</p></div>
					<div class="company_profile_view_main_text">
						<p>{{$company->career}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script> 
	
	$('#company_logo').change(function(){
		if ($('#company_logo')[0].files.length !== 0) {
		$('#company_logo_submit').css('display','block');
	}
	});

	$('#company_cover').change(function(){
		if ($('#company_cover')[0].files.length !== 0) {
		$('#company_cover_submit').css('display','block');
	}
	});
	</script>
@endsection