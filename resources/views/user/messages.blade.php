@extends('layouts.master')

@section('content')
<main class="main_app_container">

	<h2 class="page_title">Applications</h2>

	<ul class="applicants_for_job_list">
	@foreach($applications as $application)
		<li class="applicants_for_job_item">
			<h3 class="bold">
				<a href="{{ route('getUserConversation', ['aid' => $application->id]) }}">Applicaton for:<span>{{ $application->ad->position }}</span></a>
			</h3>
			<p class="applicants_for_job_read_unread bold">
				<span class="read"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
				<span class="unread"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
			</p>
			<div class="footer_applicants_for_job_item cf">
				<span class="applications_date_for_job"><span class="bold">Date:</span> {{ $application->created_at }} </span>
				<span class="applications_user_for_job"><span class="bold">Company:</span> <a href="{{ route('getCompanyProfile', ['cid' => $application->company->id]) }}">{{ $application->company->company_name }}</a></span>
			</div>
		</li>
	@endforeach
	</ul>
</main>

@endsection