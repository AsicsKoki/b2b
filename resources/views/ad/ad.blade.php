@extends('layouts.master')
@section('content')
<div class="single_job_content cf">
	<div class="single_job_header">
		<h1 class="single_job_title bold">{{ $ad->position }}</h1>
		<ul class="single_job_categories cf">
			<li>
				<span class="bold">Categories:</span>
			</li>
			<li>
				<a href="">IT</a>
			</li>
			<li>
				<a href="">Computer Ingenier</a>
			</li>
			<li>
				<a href="">Programming</a>
			</li>
		</ul>
	</div>
	<div class="single_job_sidebar">
		<div class="single_job_sidebar_item">
			<small class="single_job_published_date" style="display: block;"><span class="bold">Published:</span> <span>{{ $ad->created_at }}</span></small>
			<div class="single_job_main_logo">
				<a href="">
					<img src="http://booproweb.com/img/booproweb-logo2.png" alt="">
				</a>
			</div>
			<h3 class="single_job_sidebar_item_title company_name bold">Company:</h3>
			<p>{{ $company->company_name }}</p>
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">Job location:</h3>
			<p><span>{{ $ad->city }}</span>, <span>{{ $ad->country }}</span></p>
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">Languages:</h3>
			<p>{{ $ad->languages }}</p>
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">Job type:</h3>
			<p>{{ $ad->job_type }}</p>
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">Salary:</h3>
			<p><span>{{ $ad->salary_type }}</span>, from <span>{{ $ad->salary_from }}{{ $ad->currency }}</span> to <span>{{ $ad->salary_from }}{{ $ad->currency }}</span></p>
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">Career level:</h3>
			@if ($ad->career_level == 0)
			    <p>Management</p>
			@elseif ($ad->career_level == 1)
			    <p>Expert</p>
			@elseif ($ad->career_level == 3)
				<p>Administrative staff</p>
			@else
			 
			@endif
		</div>
	</div>
	<main class="main_app_container single_job_main">

		<div class="single_job_main_cover">
			<img src="http://booproweb.com/img/ilya-pavlov-87438.jpg" alt="">
		</div>

		<div class="single_job_main_section single_job_main_section_first">
		@if ($ad->students == 1)
			<p class="single_job_students"><span class="bold">This job is available for students</span></p>
		@endif
		@if ($ad->low_experience == 1)
			<p class="single_job_students"><span class="bold">This job is available for people with low experience</span></p>
		@endif

		</div>

		<div class="single_job_desc">
			<h3 class="bold">Job description</h3>
			{{ $ad->description }}
		</div>
	</main>
</div>
@endsection