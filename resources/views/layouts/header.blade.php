
<header class="main_header">
            
            <div class="main_header_reg_lang_menu cf">

                <div class="main_header_reg_lang_menu_content">
                    <ul class="header_login_reg_holder cf">
                        <li><i class="fa fa-sign-in" aria-hidden="true"></i></li>
                        @if(Auth::check())
                            <li>
                                <a href="{{ route('logout') }}">Logout</a>
                            </li>
                        @elseif(Session::has('user'))
                            <li>
                                <a href="{{ route('logout') }}">Logout</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('getUserLogin') }}">Korisnici</a>
                            </li>
                            <li>
                                <a href="{{ route('getCompanyLogin') }}">Kompanije</a>
                            </li>
                        @endif
                    </ul>

                    <ul class="choose_lang_header cf">
                        <li>
                            <a href="">
                                <img src="{{ URL::to('/')}}/photos/serbian-flag-graphic.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{ URL::to('/')}}/photos/british-flag-graphic.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main_header_top cf"> 
                <a href="{{ URL::to('/')}}" class="logo_header_holder animated bounceInLeft">
                    <img src="{{ URL::to('/')}}/photos/naposaologo.png" alt="">
                </a>

                <nav class="main_nav">
                    <ul class="cf">
                     @if(Session::has('user'))
                        <li>
                            <a href="{{ route('getUserProfile') }}">Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('getUserFavorites') }}">Favorites</a>
                        </li>
                        <li>
                            <a href="{{ route('getHistory') }}">Application History</a>
                        </li>
                        <li>
                            <a href="{{ route('getMessages') }}">Messages</a>
                        </li>
                        @if(Session::get('user')->is_admin === 1)
                            <li>
                                <a href="{{ route('getAdminPanel') }}">Admin Panel</a>
                            </li>
                        @endif
                    @endif
                    @if(Auth::check())
                        <li>
                            <a href="{{ route('addNewJob') }}">New Job</a>
                        </li>
                        <li>
                            <a href="{{ route('getCompanyProfile', ['cid' => Auth::user()->id]) }}">Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('getApplications') }}">Applications</a>
                        </li>
                        <li>
                            <a href="{{ route('getAllJobs') }}">My Ads</a>
                        </li>
                        <li>
                            <a href="">Invoices</a>
                        </li>
                        <li>
                            <a href="{{ route('getPayment') }}">Credits: 120</a>
                        </li>
                    @endif
                    </ul>
                </nav>
                
                <a href="#" class="mob_menu_icon">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </a>

                <nav class="main_nav_mob">
                    <ul class="cf">
                     @if(Session::has('user'))
                        <li>
                            <a href="{{ route('getUserProfile') }}">Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('getUserFavorites') }}">Favorites</a>
                        </li>
                        <li>
                            <a href="{{ route('getHistory') }}">Application History</a>
                        </li>
                        <li>
                            <a href="{{ route('getMessages') }}">Messages</a>
                        </li>
                        @if(Session::get('user')->is_admin === 1)
                            <li>
                                <a href="{{ route('getAdminPanel') }}">Admin Panel</a>
                            </li>
                        @endif
                    @endif
                    @if(Auth::check())
                        <li>
                            <a href="{{ route('addNewJob') }}">New Job</a>
                        </li>
                        <li>
                            <a href="{{ route('getCompanyProfile', ['cid' => Auth::user()->id]) }}">Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('getApplications') }}">Applications</a>
                        </li>
                        <li>
                            <a href="{{ route('getAllJobs') }}">My Ads</a>
                        </li>
                        <li>
                            <a href="">Invoices</a>
                        </li>
                        <li>
                            <a href="">Credits: 120</a>
                        </li>
                    @endif
                    </ul>
                </nav>
            </div>

            <div class="main_header_bottom cf">
                <div class="main_header_bottom_left">
                    <p>
                        <a href="{{ route('getJobs') }}">View all job offers:<span>{{ App\Ad::countAll() }}</span></a>
                    </p>
                </div>

                <div class="main_header_bottom_right">
                    <p>
                        <a href="{{ route('getToday') }}">Job offers today:<span>{{ App\Ad::countLastDay() }}</span></a>
                    </p>
                </div>
            </div>

        </header>
       