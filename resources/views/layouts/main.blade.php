<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Style -->
    <link rel="stylesheet" href="/css/carousel.css">
    <link rel="stylesheet" href="/css/style.css">

    <title>Wira Wiri Solo | {{ $title }}</title>
</head>

<body style="background-color: #212529">

    <!-- NAVBAR -->
    @include('partials.navbar')
    
    
    <!-- ISI -->
    <div style="background-color: #F8F7F3">
        <!-- HEADER -->
        <div id="header">
            @yield('header')
        </div>
        <div class="container">
            @yield('content1')
            <div class="">
                @yield('content')
            </div>
            <hr class="featurette-divider">
        </div>
    </div>

    <!-- FOOTER -->
    <div id="footer">
        <footer class="container footer">
            <div class="row">
                <div class="col">
                    <a href="#"><img src="{{ asset('dist/img/logo-3.png') }}" width="240" height="54" alt=""></a>
                </div>
                <div class="col text-end">
                    <a href="" class="fs-2 mx-2"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/wirawiri_solo" target="_blank" class="fs-2 mx-2"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="https://wa.me/6281225671933" target="_blank" class="fs-2 mx-2"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col text-center text-white-50">
                    <p class="">&copy;  Copyright by Wira Wiri Car Rental Solo </p>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
        $('input[name="dates"]').daterangepicker({
            "minDate": "0"
        });
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>