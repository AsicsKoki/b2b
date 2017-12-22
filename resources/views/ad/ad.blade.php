@extends('layouts.master')
@section('content')


	<h1 class="page_title main_page_title">Job description</h1>

	<main class="main_app_container cf">

		<div class="single_job_header">
		<span>Views: {{ $ad->page_visits }}</span>
			<h1 class="single_job_title bold">{{ $ad->position }}</h1>
			<div class="single_job_info_holder">
				<ul class="single_job_categories cf">
					<li>
						<span class="bold">Categories:</span>
					</li>
					@foreach($ad->categories as $category)
						<li>
							<a href="{{ route('getJobsByCategory', ['catid' => $category->id]) }}">{{ $category->name }}</a>
						</li>
					@endforeach
				</ul>
				@if(Session::get('user'))
					@if(!App\Favorite::isFavorite($ad->id))
						<a><i class="fa fa-star-o star" aria-hidden="true"></i></a>
					@else
						<a><i class="fa fa-star star" aria-hidden="true"></i></a>
					@endif
				@endif
				@if(Auth::check())

			        <a class="report" data-js="open">
	          			<i class="fa fa-flag" aria-hidden="true"></i><span>Report</span>
	   				</a>

                @elseif(Session::has('user'))

			        <a class="report" href="#" data-js="open">
	          			<i class="fa fa-flag" aria-hidden="true"></i><span>Report</span>
	   				</a>

                @endif
                @if(Session::get('user')->is_admin === 1)
                	<a href="{{ route('getEditCompanyAdmin', ['aid' => $ad->id]) }}" class="btn">Edit Company</a>
                	<a href="{{ route('deleteAd', ['aid' => $ad->id]) }}" class="btn">Delete Ad</a>
					@if($ad->approved == 0)
						<button type="button" data-status="1" data-aid="{{ $ad->id }}" class="btn btn-success set-active">Activate</button>
					@else
						<button type="button" data-status="0" data-aid="{{ $ad->id }}" class="btn btn-danger set-active">Deactivate</button>
					@endif
                @else

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
				<a href="{{ route('getCompanyProfile', ['cid' => $ad->company->id]) }}">
					<img src="{{ URL::to('/') . $ad->company->image->path }}" alt="">
				</a>
			</div>
			<h3 class="single_job_sidebar_item_title company_name bold">Company:</h3>
			<p>{{ $ad->company->company_name }}</p>
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">Job location:</h3>
			<p><span>{{ $ad->city }}</span>, <span>{{ $ad->country }}</span></p>
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">Languages:</h3>
			<p><span>{{ $ad->foreign_languages }}</span></p>
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">Job type:</h3>
			@if ($ad->job_type == 0)
			    <p>Permanent</p>
			@elseif ($ad->job_type == 1)
			    <p>Temporary</p>
			@elseif ($ad->job_type == 2)
				<p>Internship</p>
			@elseif ($ad->job_type == 3)
				<p>Distance job</p>	 
			@endif
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">Salary:</h3>
			<p><span>{{ $ad->salary_type }}</span>, from <span>{{ $ad->salary_from }}{{ $ad->currency }}</span> to <span>{{ $ad->salary_to }}{{ $ad->currency }}</span></p>
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

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">External link:</h3>
			<p><span><a href="{{ $ad->external_url }}">{{ $ad->external_url }}</a></span></p>
		</div>

	</div>
		
		<div class="single_job_main">
			<div class="single_job_main_cover"> 
				<img src="http://booproweb.com/img/ilya-pavlov-87438.jpg" alt="">
			</div>
			<div class="popup popUp report_popup">
				<a href="#" class="popup_close" name="close">
					<i class="fa fa-times" aria-hidden="true"></i>
				</a>
				<div class="row text-center">
					<h2>Report Ad</h2> 
				</div>
					<form action="{{ route('reportAd', ['aid' => $ad->id]) }}" method="POST" enctype="multipart/form-data">
						<div class="modal-body">
						{{ csrf_field() }}

							<ul>
								<li><input type="radio" name="text" value="Ad is misleading or incomplete">Ad is misleading or incomplete</li>
								<li><input type="radio" name="text" value="Ad is insulting or inappropriate">Ad is insulting or inappropriate</li>
								<li><input type="radio" name="text" value="Ad is a scam">Ad is a scam</li>
							</ul>
						</div>
						<div class="modal-footer">
							<button type="btn" class="btn btn-default" data-dismiss="modal">Submit</button>
						</div>
					</form>
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
				@if(Session::get('user') !== null)
					<div class="apply_for_job_btn"><a href="{{ route('getJobApplication', ['jid' => $ad->id, 'cid' => $ad->company->id]) }}" class="bold">Apply</a></div>
				@else
					<div class="apply_for_job_btn"><a href="{{ route('getUserLogin') }}" class="bold">Apply</a></div>
				@endif
			</div>
		</div>

	</main>

<script type="text/javascript">
	$('.report').click(function(){
		$('.reportModal');
	})
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
	$(document).ready(function(){
		$('.set-active').click(function(){
					var status = $(this).attr('data-status');
					var aid = $(this).attr('data-aid');
					var url = "/updateAdStatus/"+aid;

					if ($(this).attr('data-status') === '1') {
						$(this).removeClass('btn-danger').addClass('btn-success').text('Activate');
						$(this).attr('data-status', '0');
					} else {
						$(this).removeClass('btn-success').addClass('btn-danger').text('Deactivate');
						$(this).attr('data-status', '1');
					}

				    $.ajax({
			       		type: "POST",
			        	url: url,
			        	async: true,
			        	data: {
			            	status: status,
			            	'_token': $('meta[name="csrf-token"]').attr('content')
			        	},
			        success: function (msg) {
			        	console.log('success');
			        }
			    });
			})
			//Obrisati element posle brisanja iz baze
			$('.delete').click(function(e){
		        var aid = $(this).attr('data-aid');
		        var url = "/deleteAd/"+aid;
		        $(e.target).parent().closest("li").remove();
		        $.ajax({
		            type: "POST",
		            url: url,
		            async: true,
		            data: {

		               '_token': $('meta[name="csrf-token"]').attr('content')
		           },
		       success: function (msg) {
		           console.log('success');
		           }
		       });
		    })
	});
</script>

@endsection