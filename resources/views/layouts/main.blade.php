<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
            <style>
                .footer a:visited{
                    color: #F8F7F3
                }
                .footer a:hover{
                    color: #D9D8D4
                }
            </style>
            <p class="float-end"><a href="#" class="text-decoration-none">Back to top</a></p>
            <p style="color: #F8F7F3">&copy; 2022 Kurniawan Andika W. &nbsp; &middot; <a href="#" class="text-decoration-none">Privacy</a> &middot; <a href="#" class="text-decoration-none">Terms</a></p>
        </footer>
    </div>
</body>
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>