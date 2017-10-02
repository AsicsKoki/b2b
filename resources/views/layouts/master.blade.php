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
        <main class="main_app_container">
        @yield('content')
        </main>
    </div>
     
     @include('layouts.footer')
    <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>