<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{!! csrf_token() !!}">

    <meta property="og:url"           content="http://www.your-domain.com/your-page.html" />
      <meta property="og:type"          content="website" />
      <meta property="og:title"         content="Naposao.rs" />
      <meta property="og:description"   content="Your description" />
      <meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />

    <title>Naposao</title>
    <!-- Fonts -->
    <script src="https://use.fontawesome.com/a007057742.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- jQuery -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <!-- JS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
@yield('styles')
</head>
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10';
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <div class="app_holder">
        @include('layouts.header')
        @yield('content')

        <div id="js-heightControl" style="height: 0;">&nbsp;</div>
        <script>
            $(function(){
                $('#js-heightControl').css('height', $(window).height() - $('html').height() +'px');
            });
        </script>
        @include('layouts.footer')
    </div>


    

    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/particles.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:400,400i,600,700&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:400,700&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- Stripe JS -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/charge.js') }}"></script>



    <script>
       particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 63,
      "density": {
        "enable": true,
        "value_area": 721.5354273894853
      }
    },
    "color": {
      "value": "#2081bf"
    },
    "shape": {
      "type": "polygon",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 4
      },
      "image": {
        "src": "http://localhost:8888/naposao/public/photos/naposaologo.png",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.5,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 0.48724632738080703,
        "opacity_min": 0.06496617698410762,
        "sync": false
      }
    },
    "size": {
      "value": 2,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 80.17060304327615,
      "color": "#2258d9",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 3.206824121731046,
      "direction": "bottom-right",
      "random": true,
      "straight": true,
      "out_mode": "bounce",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "bubble"
      },
      "onclick": {
        "enable": true,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 323.67632367632365,
        "size": 11.988011988011989,
        "duration": 1.4385614385614387,
        "opacity": 1,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
}
);
    </script>

</body>
</html>