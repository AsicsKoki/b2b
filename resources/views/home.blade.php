@extends('layouts.master')

@section('content')
@if(session('message'))
    <h4 style="text-align: center; margin-bottom: 15px;color: #ff5c5c;">{{ session('message') }}</h4>
@endif
<main class="main_app_container home_page">
    <div class="home_search_job_employers_section cf">

        <!-- Home Job Search Section -->
        <div class="home_search_job">
            <form class="home_search_job_form cf" action="{{ route('getSearchResults') }}" method="POST">
                
                <!-- Home Main Job Search: location and job category -->
                <div class="home_search_job_main cf">   
                    <div class="home_search_job_item search_location_holder">
                        <p class="home_search_job_item_title">Search position</p>
                        <input type="text" id="" name="term" placeholder="Search...">
                    </div>

                    <div class="home_search_job_item job_category">

                        <p class="home_search_job_item_title">Categories</p>
                        
                        <p class="job_search_option_triger">Choose categories<i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-up" aria-hidden="true"></i></p>

                        <div class="options_checkbox">
                        @foreach( App\Category::getCategories() as $category)
                            <label for="category" id="category">
                                <span>{{ $category->name }}</span>
                                <input id="category" type="checkbox" name="category[]" value="{{$category->id}}">
                            </label>
                        @endforeach
                        </div>

                    </div>
                </div>
                <!-- End Home Main Job Search -->
                
                <!-- Btn Submit Form and Filters Search -->
                <div class="cf">
                    <div class="filter_search_triger">
                        <p><i class="fa fa-sort-desc" aria-hidden="true"></i><i class="fa fa-sort-asc" aria-hidden="true"></i>Search filters</p>
                    </div>

                    <div class="btn_job_search_home_submit">
                        {{ csrf_field() }}
                        <input type="submit" value="Send" class="confirm_btn">
                    </div>
                </div>
                <!-- End Btn Submit Form and Filters Search -->
                
                <!-- Home Filters Job Section -->
                <div class="search_job_filters_holder cf">

                    <div class="home_search_job_item search_job_filters_item">

                        <p class="home_search_job_item_title">Country</p>

                        <p class="job_search_option_triger">Choose type of work<i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-up" aria-hidden="true"></i></p>
                        
                        <div class="options_checkbox">
                            <label for="term">
                                <span>Permanent</span>
                                <input type="checkbox" name="term">
                            </label>

                            <label for="term">
                                <span>Temporary</span>
                                <input type="checkbox" name="term">
                            </label>
                        </div>
                    </div>

                    <div class="home_search_job_item search_job_filters_item">

                        <p class="home_search_job_item_title">City</p>

                        <p class="job_search_option_triger">Choose level<i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-up" aria-hidden="true"></i></p>
                        
                        <div class="options_checkbox">
                            <label for="career_level">
                                <span>All</span>
                                <input type="checkbox" name="career_level">
                            </label>

                            <label for="name8">
                                <span>Menagment</span>
                                <input type="checkbox" name="career_level">
                            </label>

                            <label for="career_level">
                                <span>Experts</span>
                                <input type="checkbox" name="career_level">
                            </label>
                        </div>
                    </div>

                    <div class="home_search_job_item search_job_filters_item">

                        <p class="home_search_job_item_title">Seniority</p>

                        <p class="job_search_option_triger">From..<i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-up" aria-hidden="true"></i></p>
                        
                        <div class="options_checkbox">
                            <label for="name10">
                                <span>All</span>
                                <input type="checkbox" name="company_type">
                            </label>

                            <label for="name11">
                                <span>Companies/Organizations</span>
                                <input type="checkbox" name="company_type" value="0">
                            </label>

                            <label for="name12">
                                <span>Agencies</span>
                                <input type="checkbox" name="company_type" value="1">
                            </label>
                        </div>
                    </div>

                    <div class="home_search_job_item search_job_filters_item">

                        <p class="home_search_job_item_title">Foreign Languages</p>

                        <p class="job_search_option_triger">Foreign Languages..<i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-up" aria-hidden="true"></i></p>
                        
                        <div class="options_checkbox">
                        @foreach(App\Language::getLanguages() as $language)
                            <label for="language">
                                <span>{{ $language->language }}</span>
                                <input type="checkbox" name="language" value="{{ $language->id }}">
                            </label>
                        @endforeach
                        </div>
                    </div>

                </div>
                <!-- Home Filters Job Section -->

            </form>
        </div>
        <!-- End Home Search Job Section -->

        <!-- Home Top Employers Section -->
        <div class="home_top_employers_top_jobs cf">

            <div class="home_top_employers cf">
                <h3 class="section_title"><span>Top employers</span></h3>

                <ul class="home_top_employers_grid cf">
                    @foreach($companies as $company)
                    <li>
                        <a href="{{ route('getCompanyProfile', ['cid' => $company->id]) }}">
                        @if($company->image)
                            <img src="{{ URL::to('/') . $company->image['path'] }}" alt="">
                        @endif
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>


            <div class="home_top_jobs cf">

                <h3 class="section_title"><span>Top Jobs</span></h3>

                <ul class="home_top_jobs_grid cf">
                @foreach($ads as $ad)
                    <li class="home_top_jobs_grid_item">
                        <span class="home_top_jobs_grid_item_header cf">
                                <span class="home_top_jobs_grid_item_logo">
                                    <a href="{{ route('getCompanyProfile', ['cid' => $ad->company->id]) }}" >
                                    @if($ad->company->image)
                                        <img src="{{ URL::to('/') . $ad->company->image->path }}" alt="">
                                    @endif
                                    </a>
                                </span>

                                <h3 class="bold home_top_jobs_grid_item_company">
                                    <a href="{{ route('getCompanyProfile', ['cid' => $ad->company->id]) }}">{{ $ad->company->company_name }}</a>
                                </h3>
                        </span>

                        <p class="bold home_top_jobs_grid_item_descript">
                            <a href="{{ route('getSpecificJob', ['jid' => $ad->id, 'cid' => $ad->company->id]) }}">{{ $ad->position }}</a>
                        </p>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        <!-- End Top Employers Section -->
    </div>
</main>
@if(Session::has('msg'))
<div class="popUp pop_up_registration_success">
    <div class="pop_up_registration_success_content">
        <p>Your registration is complete!</p>
        <p>Please confirm registration on your email.</p>
        <button class="pop_up_registration_success_btn">Ok</button>
    </div>
</div> 
@endif

<!-- <script type="text/javascript">

      $(document).click(function() {

       $(".search_job_filters_holder").click(function(e) {
            e.stopPropagation(); // if you click on the div itself it will cancel the click event.
        });

</script> -->

@endsection
