@extends('layouts.master')

@section('content')
	<h1 class="page_title main_page_title">Reports - Companies</h1>

	<main class="main_app_container">
	    <ul class="nav nav-tabs">
        <li role="presentation"><a href="{{ route('getAdminAds') }}">Ads</a></li>
        <li role="presentation"><a href="{{ route('getAdminCompanies') }}">Companies</a></li>
        <li role="presentation"><a href="{{ route('getAdminUsers') }}">Users</a></li>
        <li role="presentation"><a href="{{ route('getReports') }}">Reports - Ads</a></li>
        <li role="presentation"><a href="{{ route('getReportsCompanies') }}">Reports - Companies</a></li>
    </ul>
		<ul class="list_of_reports">
			@foreach($reports as $report)
				<li class="list_of_reports_item">
					<a href="" class="list_of_reports_item_holder cf">
						<span class="list_of_reports_name">{{ $report->company->company_name }}</a></span>
						<span class="list_of_reports_name"><h4>{{ $report->text }}</h4></span>
						<span class="list_of_reports_date">{{ $report->created_at }}</span>
						<span class="list_of_reports_name"><a href="{{ route('getCompanyProfile', ['cid' => $report->company->id]) }}">Details</a></span>
					</a>
				</li>
			@endforeach
		</ul>

{{-- 		<div class="reports_popup_holder popUp">
			<div class="reports_popup_content">
				<div class="reports_popup_topic">Vredjanje</div>
				<div class="reports_popup_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
				<div class="reports_popup_bnt">
					<a href="#">Details</a>
				</div>

				<a href="" class="popup_close">
					<i class="fa fa-times" aria-hidden="true"></i>	
				</a>
			</div>
		</div> --}}
	</main>
@endsection