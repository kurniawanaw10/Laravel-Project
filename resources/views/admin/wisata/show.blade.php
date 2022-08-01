@extends('layouts/main')

@section('content1')
<style>
    .text-justify {
    text-align: justify;
}
</style>
<div class="row d-flex justify-content-center">
    <h3 class="text-center mt-2">{{ $wisata->judul }}</h3>
    <div class="mt-3" style="width: 34rem;">
        <img src="{{ asset('storage/'.$wisata->foto) }}" class="img-fluid" alt="...">
    </div>
    <p class="mt-3">{{ strip_tags($wisata->deskripsi) }}</p>
</div>
@endsection 