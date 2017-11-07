@extends('layouts.master')
@section('content')


	<h1 class="page_title main_page_title">Job description</h1>

	<main class="main_app_container cf">

		<div class="single_job_header">
			<h1 class="single_job_title bold">{{ $ad->position }}</h1>
			<div class="single_job_info_holder">
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
				@if(!App\Favorite::isFavorite($ad->id))
					<a><i class="fa fa-star-o star" aria-hidden="true"></i></a>
				@else
					<a><i class="fa fa-star star" aria-hidden="true"></i></a>
				@endif
			</div>
			
			<div class="single_job_social_net">
				<div class="fb-like" data-href="https://www.facebook.com/booproweb/" data-width="50" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
				<button class="favorite_job_icon"><!-- <i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"> --></i></button>
			<div class="linked_in">
				<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
				<script type="IN/Share"></script>

				<script src="https://apis.google.com/js/platform.js" async defer></script>
				<g:plus action="share"></g:plus>
			</div>
			</div>
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
		
		<div class="single_job_main">

			<div class="single_job_main_cover">
				<img src="http://booproweb.com/img/ilya-pavlov-87438.jpg" alt="">
			</div>
			

			<div class="single_job_main_section">

				<div class="single_job_main_section_first">
				@if ($ad->students == 1)
					<p class="single_job_students"><span class="">This job is available for students</span></p>
				@endif
				@if ($ad->low_experience == 1)
					<p class="single_job_students"><span class="">This job is available for people with low experience</span></p>
				@endif

				</div>

				<div class="single_job_desc">
					<h3 class="bold">Job description</h3>
					{{ $ad->description }}
				</div>
				<div class="apply_for_job_btn"><a href="{{ route('getJobApplication', ['jid' => $ad->id, 'cid' => $ad->company->id]) }}" class="bold">Apply</a></div>
			</div>
		</div>

	</main>

<script type="text/javascript">
	$('.star').click(function(){
		var a =  $(location).attr('href');
		var id = a.match(/([\d]+)/)[0];		
		console.log(id);
		if ($(this).hasClass('fa-star-o')){
			$(this).toggleClass('fa-star-o').toggleClass('fa-star');    
		$.ajax({
				method: "POST",
				url: "/updateFavorites",
				data: {
					id:id,
					'_token': $('meta[name="csrf-token"]').attr('content')
					},
				})
			.done(function(data)
			{
					console.log(data);
			}).fail(function(err){
				console.log(err);
			})
		} else if ($(this).hasClass('fa-star')) {
					$(this).toggleClass('fa-star').toggleClass('fa-star-o');    
		$.ajax({
				method: "POST",
				url: "/removeFavorites",
				data: {
					id:id,
					'_token': $('meta[name="csrf-token"]').attr('content')
					},
				})
			.done(function(data)
			{
					console.log(data);
			}).fail(function(err){
				console.log(err);
			})
		}
	});

</script>

@endsection