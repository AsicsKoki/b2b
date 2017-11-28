@extends('layouts.master')
@section('content')
	<h1 class="page_title main_page_title">All jobs</h1>

	<main class="main_app_container">

		<div class="job_list_filter_holder">
			<ul>
			@if(!$ads->first())
				No results found.
			@endif
			@foreach ($ads as $ad)
				<li class="job_list_filter_item cf">

					<div class="job_list_filter_item_left">

						<small class="date">{{ $ad['ads'][0]['created_at'] }}</small>
						<h3 class="job_list_filter_item_title bold">
							<a href="{{ route('getSpecificJob', ['jid' => $ad['ads'][0]['id'], 'cid' => $ad['ads'][0]['company']['id']]) }}">{{$ad['ads'][0]['position']}}</a>
						</h3>
						
						<div class="job_list_filter_item_info">
							<p class="location"><span class="bold">Location:</span>{{$ad['ads'][0]['city']}}</p>
							<p class="salary"><span class="bold">Salary:</span>from {{$ad['ads'][0]['salary_from']}} to {{$ad['ads'][0]['salary_to']}} {{$ad['ads'][0]['currency']}} ({{$ad['ads'][0]['salary_type']}})</p>	
						</div>

					</div>

					<div class="job_list_filter_item_right">
						<ul class="job_list_filter_info">
								@if ($ad['ads'][0]['career_level'] == 0)
								    <li>Management</li>
								@elseif ($ad['ads'][0]['career_level'] == 1)
								    <li>Expert</li>
								@elseif ($ad['ads'][0]['career_level'] == 3)
									<li>Administrative staff</li>
								@else
								 
								@endif
								@if ($ad['ads'][0]['students'] == 1)
									<li class="single_job_students"><span class="">Students welcome</span></li>
								@endif
								@if ($ad['ads'][0]['low_experiance'] == 1)
									<li class="single_job_students"><span class="">Low experience welcome</span></li>
								@endif
							</ul>

							<div class="job_container_push_right cf">

								<div class="job_container_push_right_item">
									<div class="job_list_filter_item_logo">
										<img src="{{ URL::to('/') . $ad['ads'][0]['company']['image']['path']}}" alt="">
									</div>
								</div>

								<div class="job_container_push_right_item">
									<a href="{{ route('getCompanyProfile', ['cid' => $ad['ads'][0]['company']['id']]) }}" class="job_list_filter_item_company bold">{{ $ad['ads'][0]['company']['company_name'] }}</a>
									<ul class="company_ads_list">
										<li>
											<a href=""><i class="fa fa-lightbulb-o" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href=""><i class="fa fa-video-camera" aria-hidden="true"></i></a>
										</li>
									</ul>
								</div>
								
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
@endsection