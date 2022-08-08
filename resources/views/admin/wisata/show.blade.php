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
        <div class="mt-4" style="width: 34rem;">
            <img src="{{ asset('storage/'.$wisata->foto) }}" class="img-fluid" alt="...">
        </div>
        <p class="mt-5">{{ strip_tags($wisata->deskripsi) }}</p>
    </div>
</div>
@endsection 