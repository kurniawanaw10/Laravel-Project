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
            <p class="float-end"><a href="#" class="text-decoration-none">Back to top</a></p>
            <p style="color: #F8F7F3">&copy;  2022 <a href="https://www.linkedin.com/in/kurniawan-andika-wijaya-454a10213/" target="_blank" class="text-decoration-none">Kurniawan Andika W</a> &nbsp;&nbsp;&middot; <a href="https://wa.me/6281225671933" target="_blank" class="text-decoration-none">Contact</a> &nbsp; &middot; <a href="https://goo.gl/maps/iNpajmxcCms8aSSY8" target="_blank" class="text-decoration-none">Location</a></p>
        </footer>
    </div>
</body>
    <script>
        $('input[name="dates"]').daterangepicker({
            "minDate": "0"
        });
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>