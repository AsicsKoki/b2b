@extends('layouts.master')

@section('content')
	<h1 class="page_title main_page_title">List of companies</h1>

	<main class="main_app_container">
	    <ul class="nav nav-tabs">
	        <li role="presentation"><a href="{{ route('getAdminAds') }}">Ads</a></li>
	        <li role="presentation"><a href="{{ route('getAdminCompanies') }}">Companies</a></li>
	        <li role="presentation"><a href="{{ route('getAdminUsers') }}">Users</a></li>
        	<li role="presentation"><a href="{{ route('getReports') }}">Reports - Ads</a></li>
        	<li role="presentation"><a href="{{ route('getReportsCompanies') }}">Reports - Companies</a></li>
	    </ul>
		<ul class="list_of_companies">
		@foreach($companies as $company)
			<li class="list_of_companies_item cf">
				<a href="" class="list_of_companies_item_logo">
					<img src="{{ URL::to('/') . $company['image']['path'] }}" alt="">
				</a>

				<a href="" class="list_of_companies_item_companie_name">{{ $company->company_name }}</a>

				<a href="" class="list_of_companies_item_person_name">{{ $company->first_name }} {{ $company->last_name }}</a>

				<p class="list_of_companies_item_companies_phone"><i class="fa fa-phone-square" aria-hidden="true"></i>{{ $company->business_phone }}</p>

				<a href="{{ route('getEditCompanyAdmin', ['cid' => $company->id]) }}" class="list_of_companies_modify list_of_companies_item_btn"><i class="fa fa-pencil-square" aria-hidden="true"></i><span>Modify</span></a>

				<a href="{{ route('getCompanyProfile', ['cid' => $company->id]) }}" class="list_of_companies_details list_of_companies_item_btn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i><span>Details</span></a>

				@if($company->blocked === 0)
					<a href="{{ route('blockCompany', ['cid' => $company->id]) }}" class="list_of_companies_details list_of_companies_item_btn block"><i class="fa fa-ellipsis-v" aria-hidden="true" data-status="1"></i><span>Block</span></a>
				@else
					<a href="{{ route('blockCompany', ['cid' => $company->id]) }}" class="list_of_companies_details list_of_companies_item_btn block"><i class="fa fa-ellipsis-v" aria-hidden="true" data-status="0"></i><span>Unblock</span></a>
				@endif

				<a href="{{ route('deleteCompany', ['cid' => $company->id]) }}" class="list_of_companies_delete list_of_companies_item_btn"><i class="fa fa-trash-o" aria-hidden="true"></i><span>Delete</span></a>
			</li>
		@endforeach
		<div class="pagination">

			{!! $companies->render() !!}

		</div>
		</ul>
	</main>
@endsection