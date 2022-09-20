@extends('layouts/main')

@section('content')
<style>
    .text-justify {
    text-align: justify;
}
</style>
<div class="pt-5">
    <div class="row d-flex justify-content-center">
        <h3 class="text-center mt-2">{{ $wisata->judul }}</h3>
        <div class="mt-4" style="width: 36rem;">
            <img src="{{ asset('storage/'.$wisata->foto) }}" class="img-fluid" alt="...">
        </div>
        <p class="mt-5 text-justify">{{ strip_tags($wisata->deskripsi) }}</p>
    </div>
    <a href="/wisata" class="btn btn-outline-dark btn-sm text-decoration-none"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; Kembali</a>
    <div class="row d-flex align-items-center">
        <div class="col-lg-8">
            <h4 class="font-weight-normal text-color-light text-5 ls-0 mt-2 mb-4">Ingin Mengunjungi Wisata Diatas? Silahkan Pesan dibawah!</h4>
            <a href="/rental" class="btn btn-dark ms-4"><i class="fa fa-car" aria-hidden="true"></i> Pesan Mobil</a>
            <a href="https://wa.me/6281225671933?text=Saya%20tertarik%20untuk%20menyewa%20rental%20mobil%20anda" target="_blank" class="btn btn-outline-dark ms-2"><i class="fa fa-phone" aria-hidden="true"></i> Kontak 1</a>
            <a href="https://wa.me/6285725666681?text=Saya%20tertarik%20untuk%20menyewa%20rental%20mobil%20anda" target="_blank" class="btn btn-outline-secondary ms-2"><i class="fa fa-phone" aria-hidden="true"></i> Kontak 2</a>
        </div>
        <div class="col-lg-4">
            <h4 class="font-weight-normal text-color-light text-5 ls-0 mt-2 mb-4">Lokasi Wisata</h4>
            {!! $wisata->lokasi !!}
        </div>
    </div>
</div>
@endsection 