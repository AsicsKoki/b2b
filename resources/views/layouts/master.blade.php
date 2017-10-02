<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Naposao</title>
    <!-- Fonts -->
    <script src="https://use.fontawesome.com/a007057742.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- JS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@yield('styles')
</head>
<body>
    <div class="app_holder">
        <header class="main_header">
            
            <div class="main_header_reg_lang_menu cf">

                <div class="main_header_reg_lang_menu_content">
                    <ul class="header_login_reg_holder cf">
                        <li><i class="fa fa-sign-in" aria-hidden="true"></i></li>
                        <li>
                            <a href="{{ route('getUserLogin') }}">Korisnici</a>
                        </li>
                        <li>
                            <a href="{{ route('getCompanyLogin') }}">Kompanije</a>
                        </li>
                    </ul>

                    <ul class="choose_lang_header cf">
                        <li>
                            <a href="">
                                <img src="images/serbian-flag-graphic.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="images/british-flag-graphic.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main_header_top cf">
                <a href="#" class="logo_header_holder">
                    <img src="images/naposaologo.png" alt="">
                </a>

                <nav class="main_nav">
                    <ul class="cf">
                        <li>
                            <a href="">Karijeria</a>
                        </li>
                        <li>
                            <a href="">Kursevi</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="main_header_bottom cf">
                <div class="main_header_bottom_left">
                    <p>
                        <a href="">View all job offers:<span>36.631</span></a>
                    </p>
                </div>

                <div class="main_header_bottom_right">
                    <p>
                        <a href="">Job offers today:<span>2.808</span></a>
                    </p>
                </div>
            </div>

        </header>
        @yield('content')
    </div>
    <footer class="main_footer">
        <ul class="footer_menu cf">
            <li>
                <a href="">Contacts</a>
            </li>
            <li>
                <a href="">Prices</a>
            </li>
            <li>
                <a href="">Q&A - Users</a>
            </li>
            <li>
                <a href="">Q&A - Companies</a>
            </li>
            <li>
                <a href="">Q&A - Companies</a>
            </li>
            <li>
                <a href="">Terms and Conditions</a>
            </li>
            <li>
                <a href="">Privacy Policy</a>
            </li>
            <li>
                <a href="">Cookies</a>
            </li>
        </ul>
        <p class="copyrigts">©2017 Naposao.rs All rights reserved</p>
    </footer>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>