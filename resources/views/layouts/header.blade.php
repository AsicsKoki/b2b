
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
                <a href="{{ URL::to('/')}}" class="logo_header_holder">
                    <img src="{{ URL::to('/')}}/photos/naposaologo.png" alt="">
                </a>

                <nav class="main_nav">
                    <ul class="cf">
                     @if(Session::has('user'))
                        <li>
                            <a href="">My CV</a>
                        </li>
                        <li>
                            <a href="">History</a>
                        </li>
                        <li>
                            <a href="">Favorites</a>
                        </li>
                         <li>
                            <a href="">My files</a>
                        </li>
                    @endif
                    </ul>
                </nav>

                <ul class="right_nav">
                    <li class="notification_item_menu">
                        <a href="#">
                            <i class="fa fa-bell" aria-hidden="true"></i>
                            <span>1</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="main_header_bottom cf">
                <div class="main_header_bottom_left">
                    <p>
                        <a href="{{ route('getAllJobs') }}">View all job offers:<span>{{ App\Ad::countAll() }}</span></a>
                    </p>
                </div>

                <div class="main_header_bottom_right">
                    <p>
                        <a href="">Job offers today:<span>{{ App\Ad::countLastDay() }}</span></a>
                    </p>
                </div>
            </div>

        </header>
       