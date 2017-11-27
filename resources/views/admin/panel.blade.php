@extends('layouts.master')
@section('content')
	<h1 class="page_title main_page_title">Admin panel</h1>
	<div class="main_app_container">
    @if(Session::get('user')['is_admin'] === 1)
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="{{ route('getAdminAds') }}">Ads</a></li>
        <li role="presentation"><a href="{{ route('getAdminCompanies') }}">Companies</a></li>
        <li role="presentation"><a href="{{ route('getAdminUsers') }}">Users</a></li>
        <li role="presentation"><a href="{{ route('getReports') }}">Reports</a></li>
    </ul>
    @endif
	</div>
@endsection