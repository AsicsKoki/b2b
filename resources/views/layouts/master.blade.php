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
        @include('layouts.header')
        @yield('content')

        <!-- Stick footer to bottom -->
        <div id="js-heightControl" style="height: 0;">&nbsp;</div>
        <script>
            $(function(){
                $('#js-heightControl').css('height', $(window).height() - $('html').height() +'px');
            });
        </script>
        <!--  -->
    
        @include('layouts.footer')
    </div>
     
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>