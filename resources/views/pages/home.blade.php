@extends('layouts/main')

@section('header')
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel" style="background-color: #F8F7F3">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/><img src="{{ asset('/dist/img/innovabrown.png') }}" class="opacity-75" alt=""></svg>

        <div class="container">
          <div class="carousel-caption text-start">
            <h2>Wira Wiri Car Rental</h2>
            <p>Rental mobil aman dan terpercaya dari kota Solo yang berdiri sejak 2013.</p>
            @auth
            <p>
              <form action="/logout" method="POST" >
              @csrf
                <button type="submit" class="btn btn-lg btn-dark opacity-75" href="#">Log Out</button>
              </form>
            </p>
            @else
              <p><a class="btn btn-lg btn-dark opacity-75" href="/register">Sign up</a></p>
            @endauth
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/><img src="{{ asset('/dist/img/keraton-surakarta.png') }}" class="opacity-75" alt=""></svg>

        <div class="container">
          <div class="carousel-caption">
            <h2>Menawarkan kunjungan wisata untuk refreshing</h2>
            <p>Berikut beberapa artikel mengenai tempat wisata yang menarik untuk dikunjungi.</p>
            <p><a class="btn btn-lg btn-dark opacity-75" href="/wisata">Tour & Travel</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/><img src="{{ asset('/dist/img/RentalCarLG.jpg') }}" class="opacity-75" alt=""></svg>

        <div class="container">
          <div class="carousel-caption text-end">
            <h2>Menawarkan kendaraan dengan kondisi yang prima</h2>
            <p>Kendaraan yang kami tawarkan sangat terawat serta menggunakan driver professional.</p>
            <p><a class="btn btn-lg btn-dark opacity-75" href="/rental">Car Rental</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>
@endsection
@section('content1')
<div class="container marketing">

  <!-- Three columns of text below the carousel -->
  <div class="row">
    <div class="col-lg-4">
      <img class="bd-placeholder-img rounded-circle" src="{{ asset('storage/'.$wisatas[0]->foto) }}" width="140" height="140" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">

      <h2 class="mt-3">{{ $wisatas[0]->judul }}</h2>
      <p>{{ $wisatas[0]->excerpt }}</p>
      <p><a class="btn btn-outline-dark" href="/admin/wisata/{{ $wisatas[0]->id }}">View details &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img class="bd-placeholder-img rounded-circle" src="{{ asset('storage/'.$wisatas[1]->foto) }}" width="140" height="140" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">

      <h2 class="mt-3">{{ $wisatas[1]->judul }}</h2>
      <p>{{ $wisatas[1]->excerpt }}</p>
      <p><a class="btn btn-outline-dark" href="/admin/wisata/{{ $wisatas[1]->id }}">View details &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img class="bd-placeholder-img rounded-circle" src="{{ asset('storage/'.$wisatas[2]->foto) }}" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">

      <h2 class="mt-3">{{ $wisatas[2]->judul }}</h2>
      <p>{{ $wisatas[2]->excerpt }}</p>
      <p><a class="btn btn-outline-dark" href="/admin/wisata/{{ $wisatas[2]->id }}">View details &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
  </div><!-- /.row -->


  <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading">Melayani secara Professional. <span class="text-muted">Pelayanan untuk Mentri BUMN.</span></h2>
      <p class="lead">Wira Wiri Car Rental menangani penyewaan kendaaran untuk keperluan dinas atau kunjungan kerja.</p>
    </div>
    <div class="col-md-5">
      <img class="bd-placeholder-img bd-placeholder-img-lg img-fluid mx-auto" src="{{ asset('/dist/img/1a.jpg') }}" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">

    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7 order-md-2">
      <h2 class="featurette-heading">Kendaraan dengan kondisi prima. <span class="text-muted">Unit dirawat dengan baik.</span></h2>
      <p class="lead">Wira Wiri Car Rental selalu melakukan pengecekan sebelum dan setelah penggunaan kendaraan. Serta melakukan servis kendaraan secara rutin. </p>
    </div>
    <div class="col-md-5 order-md-1">
      <img class="bd-placeholder-img bd-placeholder-img-lg img-fluid mx-auto" src="{{ asset('/dist/img/2.jpg') }}" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">

    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading">Segera booking sekarang. <span class="text-muted">Dengan syarat yang mudah.</span></h2>
      <p class="lead">Anda hanya perlu melakukan registrasi serta mengisi form yang telah disediakan. Kami tunggu orderan anda!</p>
    </div>
    <div class="col-md-5">
      <img class="bd-placeholder-img bd-placeholder-img-lg img-fluid mx-auto" src="{{ asset('/dist/img/3.jpg') }}" width="500" height="500" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">

    </div>
  </div>

  {{-- <hr class="featurette-divider"> --}}

  <!-- /END THE FEATURETTES -->

</div><!-- /.container -->
@endsection