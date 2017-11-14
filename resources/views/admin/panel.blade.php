@extends('layouts.master')
@section('content')
	<h1 class="page_title main_page_title">Company Profile</h1>
	<div class="main_app_container">
    @if(Session::get('user')['is_admin'] === 1)
        <li>
            <a href="{{ route('getAdminAds') }}">Ads</a>
        </li>
        <li>
            <a href="{{ route('getAdminCompanies') }}">Companies</a>
        </li>
        <li>
            <a href="{{ route('getAdminUsers') }}">Users</a>
        </li>
        <li>
            <a href="{{ route('getReports') }}">Reports</a>
        </li>
    @endif
	</div>
@endsection