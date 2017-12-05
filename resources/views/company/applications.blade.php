@extends('layouts.master')
@section('content')
<h1 class="page_title main_page_title">Your Profile</h1>

<main class="main_app_container">
	@foreach($applications as $application)
				<li class="applicants_for_job_item">
					<h3 class="bold">
						<a href="{{ route('getConversation', ['aid' => $application->id]) }}">Applicaton for:<span>{{ $application->ad->position }}</span></a>
					</h3>
					<p class="applicants_for_job_read_unread bold">
						@if($application->notiffication === 1)
							<span class="unread"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
						@else
							<span class="read"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
						@endif
					</p>
					<div class="footer_applicants_for_job_item cf">
						<span class="applications_date_for_job"><span class="bold">Date:</span> {{ $application->created_at }} </span>
						<span class="applications_user_for_job"><span class="bold">Applicant:</span> <a href="{{ route('getProfile',['uid' => $application->user_id]) }}">{{ $application->user->last_name }} {{ $application->user->first_name }}</a></span>
					</div>
				</li>
			@endforeach
</main>
@endsection