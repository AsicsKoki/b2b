@extends('layouts.master')
@section('content')


	<h1 class="page_title main_page_title">Job description</h1>

	<main class="main_app_container cf">

		<div class="single_job_header">
			<h1 class="single_job_title bold">{{ $ad[0]->position }}</h1>
			<div class="single_job_info_holder">
				<ul class="single_job_categories cf">
				  
					<li>
						<span class="bold">Categories:</span>
					</li>
					@foreach($ad[0]->categories as $category)
						<li>
							<a href="{{ route('getJobsByCategory', ['catid' => $category->id]) }}">{{ $category->name }}</a>
						</li>
					@endforeach
				</ul>
				@if(Session::get('user'))
					@if(!App\Favorite::isFavorite($ad[0]->id))
						<a><i class="fa fa-star-o star" aria-hidden="true"></i></a>
					@else
						<a><i class="fa fa-star star" aria-hidden="true"></i></a>
					@endif
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
			<small class="single_job_published_date" style="display: block;"><span class="bold">Published:</span> <span>{{ $ad[0]->created_at }}</span></small>
			<div class="single_job_main_logo">
				<a href="">
					<img src="{{ URL::to('/') . $ad[0]->company->image->path }}" alt="">
				</a>
			</div>
			<h3 class="single_job_sidebar_item_title company_name bold">Company:</h3>
			<p>{{ $ad[0]->company->company_name }}</p>
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">Job location:</h3>
			<p><span>{{ $ad[0]->city }}</span>, <span>{{ $ad[0]->country }}</span></p>
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">Languages:</h3>
			
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">Job type:</h3>
			<p>{{ $ad[0]->job_type }}</p>
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">Salary:</h3>
			<p><span>{{ $ad[0]->salary_type }}</span>, from <span>{{ $ad[0]->salary_from }}{{ $ad[0]->currency }}</span> to <span>{{ $ad[0]->salary_from }}{{ $ad[0]->currency }}</span></p>
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">Career level:</h3>
			@if ($ad[0]->career_level == 0)
			    <p>Management</p>
			@elseif ($ad[0]->career_level == 1)
			    <p>Expert</p>
			@elseif ($ad[0]->career_level == 3)
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
				@if ($ad[0]->students == 1)
					<p class="single_job_students"><span class="">This job is available for students</span></p>
				@endif
				@if ($ad[0]->low_experience == 1)
					<p class="single_job_students"><span class="">This job is available for people with low experience</span></p>
				@endif

				</div>

				<div class="single_job_desc">
					<h3 class="bold">Job description</h3>
					{{ $ad[0]->description }}
				</div>
				<div class="apply_for_job_btn"><a href="{{ route('getJobApplication', ['jid' => $ad[0]->id, 'cid' => $ad[0]->company->id]) }}" class="bold">Apply</a></div>
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