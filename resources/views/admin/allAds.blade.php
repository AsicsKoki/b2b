@extends('layouts.master')
@section('content')
	<h1 class="page_title main_page_title">All jobs</h1>

	<main class="main_app_container">
		

		<div class="job_list_filter_holder">
			<ul>
			@if(!$ads->first())
				No results found!
			@endif
			@foreach ($ads as $ad)
				<li class="job_list_filter_item cf">

					<div class="job_list_filter_item_left">

						<small class="date">Id: <h4>{{ $ad->id }} </h4> Created at: {{ $ad->created_at }}</small>
						<h3 class="job_list_filter_item_title bold">
							<a href="{{ route('getSpecificJob', ['jid' => $ad->id, 'cid' => $ad->company->id]) }}">{{ $ad->position }}</a>
						</h3>
						
						<div class="job_list_filter_item_info">
							<p class="location"><span class="bold">Location:</span>{{ $ad->city }}</p>
							<p class="salary"><span class="bold">Salary:</span>from {{ $ad->salary_from }} to {{ $ad->salary_to }} {{ $ad->currency }} ({{ $ad->salary_type }})</p>	
						</div>

					</div>

					<div class="job_list_filter_item_right">
						
							<ul class="job_list_filter_info">
								@if ($ad->career_level == 0)
								    <li>Management</li>
								@elseif ($ad->career_level == 1)
								    <li>Expert</li>
								@elseif ($ad->career_level == 3)
									<li>Administrative staff</li>
								@else
								 
								@endif
								@if ($ad->students == 1)
									<li class="single_job_students"><span class="">Students welcome</span></li>
								@endif
								@if ($ad->low_experience == 1)
									<li class="single_job_students"><span class="">Low experience welcome</span></li>
								@endif
							</ul>

							<div class="job_container_push_right cf">

								<div class="job_container_push_right_item">
									<div class="job_list_filter_item_logo">
										<img src="{{ URL::to('/') . $ad->company->image->path }}" alt="">
									</div>
									<input type="hidden" name="id" value="{{$ad->id}}">
								</div>

								<div class="job_container_push_right_item">
									<a href="{{ route('getCompanyProfile', ['cid' => $ad->company->id]) }}" class="job_list_filter_item_company bold">{{ $ad->company->company_name }}</a>
									<ul class="company_ads_list">
										<li>
											<a href=""><i class="fa fa-lightbulb-o" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href=""><i class="fa fa-video-camera" aria-hidden="true"></i></a>
										</li>
										@if(Session::get('user'))
											@if(!App\Favorite::isFavorite($ad->id))
											<li>
												<a><i class="fa fa-star-o star" aria-hidden="true"></i></a>
											</li>
											@else
											<li>
												<a><i class="fa fa-star star" aria-hidden="true"></i></a>
											</li>

											@endif
										@endif
									</ul>
								</div>
								@if($ad->approved == 0)
									<button type="button" data-status="1" data-aid="{{ $ad->id }}" class="btn btn-success set-active">Activate</button>
								@else
									<button type="button" data-status="0" data-aid="{{ $ad->id }}" class="btn btn-danger set-active">Deactivate</button>
								@endif
								<button type="button" class="btn btn-danger delete" data-aid="{{ $ad->id }}">Delete</button>
								<button type="button" class="btn btn edit" data-aid="{{ $ad->id }}">Edit</button>

							</div>

					</div>	
					
				</li>
			@endforeach
			</ul>
		</div>

		<div class="pagination">

        {!! $ads->links() !!}

        </div>
	</main>
	<script type="text/javascript">
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

    </script>
@endsection