@extends('layouts/main')

@section('content')
<style>
    .text-justify {
    text-align: justify;
}
</style>
<div class="pt-5">
    <a href="/wisata" class="btn btn-outline-dark btn-sm text-decoration-none"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; Kembali</a>
    <div class="row d-flex justify-content-center">
        <h1 class="text-center text-black mt-2 fs-1 animate__animated animate__fadeInDown"><b>{{ $wisata->judul }}</b></h1>
        <div class="mt-4" style="width: 60%;">
            <img src="{{ asset('storage/'.$wisata->foto) }}" class="img-fluid animate__animated animate__zoomIn" alt="...">
        </div>
        <p class="mt-5 text-justify fs-5" data-aos="fade-up" style="padding-left: 20%; padding-right: 20%; ">{{ strip_tags($wisata->deskripsi) }}</p>
    </div>
    
    <div class="row d-flex align-items-center" data-aos="fade-up">        
        <div class="col-lg-5" style="padding-left: 20%">
            <h4 class="fs-2 text-black mt-2 mb-4">Lokasi Wisata</h4>
                {!! $wisata->lokasi !!}
        </div>
    </div>
    <div class="row mt-3" data-aos="fade-up">
        <div class="col-lg-10" style="padding-left: 20%">
            <h4 class="fs-4 text-black mt-2 mb-4">Ingin Mengunjungi Wisata Diatas? Silahkan Pesan dibawah!</h4>
            <a href="/rental" class="btn btn-dark"><i class="fa fa-car" aria-hidden="true"></i> Pesan Mobil</a>
            <a href="https://wa.me/6281225671933?text=Saya%20tertarik%20untuk%20menyewa%20rental%20mobil%20anda" target="_blank" class="btn btn-outline-dark ms-2"><i class="fa fa-phone" aria-hidden="true"></i> Kontak 1</a>
            <a href="https://wa.me/6285725666681?text=Saya%20tertarik%20untuk%20menyewa%20rental%20mobil%20anda" target="_blank" class="btn btn-outline-secondary ms-2"><i class="fa fa-phone" aria-hidden="true"></i> Kontak 2</a>
        </div>
    </div>
</div>
@endsection 