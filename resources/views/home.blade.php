@extends('layouts.master')

@section('content')
<main class="main_app_container home_page">
            <div class="home_search_job_employers_section cf">

                <!-- Home Job Search Section -->
                <div class="home_search_job">
                    <form class="home_search_job_form cf" action="" method="">
                        
                        <!-- Home Main Job Search: location and job category -->
                        <div class="home_search_job_main cf">   
                            <div class="home_search_job_item search_location_holder">
                                <p class="home_search_job_item_title">Choose location</p>
                                <input type="text" id="" name="search" placeholder="Search..">
                            </div>

                            <div class="home_search_job_item job_category">

                                <p class="home_search_job_item_title">Categories</p>
                                
                                <p class="job_search_option_triger">Choose categories<i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-up" aria-hidden="true"></i></p>

                                <div class="options_checkbox">
                                    <label for="name1">
                                        <span>Accounting, Audit, Finance</span>
                                        <input type="checkbox" name="name1" id="name1">
                                    </label>

                                    <label for="name2">
                                        <span>Administrative and office</span>
                                        <input type="checkbox" name="name2" id="name2">
                                    </label>

                                    <label for="name3">
                                        <span>Advertising, PR</span>
                                        <input type="checkbox" name="name3" id="name3">
                                    </label>
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
                                <button>Search</button>
                            </div>
                        </div>
                        <!-- End Btn Submit Form and Filters Search -->
                        
                        <!-- Home Filters Job Section -->
                        <div class="search_job_filters_holder cf">

                            <div class="home_search_job_item search_job_filters_item">

                                <p class="home_search_job_item_title">Type of work</p>

                                <p class="job_search_option_triger">Choose type of work<i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-up" aria-hidden="true"></i></p>
                                
                                <div class="options_checkbox">
                                    <label for="name4">
                                        <span>Permanent</span>
                                        <input type="checkbox" name="name4" id="name4">
                                    </label>

                                    <label for="name5">
                                        <span>Temporary</span>
                                        <input type="checkbox" name="name5" id="name5">
                                    </label>

                                    <label for="name6">
                                        <span>Permanent</span>
                                        <input type="checkbox" name="name6" id="name6">
                                    </label>
                                </div>
                            </div>

                            <div class="home_search_job_item search_job_filters_item">

                                <p class="home_search_job_item_title">Level</p>

                                <p class="job_search_option_triger">Choose level<i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-up" aria-hidden="true"></i></p>
                                
                                <div class="options_checkbox">
                                    <label for="name7">
                                        <span>All</span>
                                        <input type="checkbox" name="name7" id="name7">
                                    </label>

                                    <label for="name8">
                                        <span>Menagment</span>
                                        <input type="checkbox" name="name8" id="name8">
                                    </label>

                                    <label for="name9">
                                        <span>Experts</span>
                                        <input type="checkbox" name="name9" id="name9">
                                    </label>
                                </div>
                            </div>

                            <div class="home_search_job_item search_job_filters_item">

                                <p class="home_search_job_item_title">From</p>

                                <p class="job_search_option_triger">From..<i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-up" aria-hidden="true"></i></p>
                                
                                <div class="options_checkbox">
                                    <label for="name10">
                                        <span>All</span>
                                        <input type="checkbox" name="name10" id="name10">
                                    </label>

                                    <label for="name11">
                                        <span>Companies/Organizations</span>
                                        <input type="checkbox" name="name11" id="name11">
                                    </label>

                                    <label for="name12">
                                        <span>Agencies</span>
                                        <input type="checkbox" name="name12" id="name12">
                                    </label>
                                </div>
                            </div>

                            <div class="home_search_job_item search_job_filters_item">

                                <p class="home_search_job_item_title">Foreign Languages</p>

                                <p class="job_search_option_triger">Foreign Languages..<i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-up" aria-hidden="true"></i></p>
                                
                                <div class="options_checkbox">
                                    <label for="name13">
                                        <span>Serbian</span>
                                        <input type="checkbox" name="name10" id="name13">
                                    </label>

                                    <label for="name14">
                                        <span>English</span>
                                        <input type="checkbox" name="name11" id="name14">
                                    </label>

                                    <label for="name15">
                                        <span>Spanish</span>
                                        <input type="checkbox" name="name12" id="name15">
                                    </label>
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
                            <li>
                                <a href="#">
                                    <img src="http://booproweb.com/img/booproweb-logo2.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="http://booproweb.com/img/booproweb-logo2.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="http://booproweb.com/img/booproweb-logo2.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="http://booproweb.com/img/booproweb-logo2.png" alt="">
                                </a>
                            </li>
                             <li>
                                <a href="#">
                                    <img src="http://booproweb.com/img/booproweb-logo2.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="http://booproweb.com/img/booproweb-logo2.png" alt="">
                                </a>
                            </li>
                             <li>
                                <a href="#">
                                    <img src="http://booproweb.com/img/booproweb-logo2.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="http://booproweb.com/img/booproweb-logo2.png" alt="">
                                </a>
                            </li>
                             <li>
                                <a href="#">
                                    <img src="http://booproweb.com/img/booproweb-logo2.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="http://booproweb.com/img/booproweb-logo2.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>


                    <div class="home_top_jobs cf">

                        <h3 class="section_title"><span>Top Jobs</span></h3>

                        <ul class="home_top_jobs_grid cf">

                            <li class="home_top_jobs_grid_item">
                                <span class="home_top_jobs_grid_item_header cf">
                                        <span class="home_top_jobs_grid_item_logo">
                                            <a href="" >
                                                <img src="http://booproweb.com/img/booproweb-logo2.png" alt="">
                                            </a>
                                        </span>

                                        <h3 class="bold home_top_jobs_grid_item_company">
                                            <a href="">Booproweb</a>
                                        </h3>
                                </span>

                                <p class="bold home_top_jobs_grid_item_descript">
                                    <a href="">Indented on the first line of my textarea, replace all leading or trailing white space with an empty string.</a>
                                </p>
                            </li>

                            <li class="home_top_jobs_grid_item">
                                <span class="home_top_jobs_grid_item_header cf">
                                        <span class="home_top_jobs_grid_item_logo">
                                            <a href="" >
                                                <img src="http://booproweb.com/img/booproweb-logo2.png" alt="">
                                            </a>
                                        </span>

                                        <h3 class="bold home_top_jobs_grid_item_company">
                                            <a href="">Booproweb</a>
                                        </h3>
                                </span>

                                <p class="bold home_top_jobs_grid_item_descript">
                                    <a href="">Indented on the first line of my textarea, replace all leading or trailing white space with an empty string.</a>
                                </p>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- End Top Employers Section -->
            </div>
        </main>
@endsection
