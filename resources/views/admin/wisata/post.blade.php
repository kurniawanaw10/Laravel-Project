@extends('layouts/main')

@section('content')
<style>
    .text-justify {
    text-align: justify;
}
</style>
<div class="pt-5">
    <h1 class="text-center text-black mb-4"><b>Explore Indonesia</b></h1>
    <div class="row d-flex justify-content-center">
        @foreach ($datas as $data)
        <div class="col-sm-8 col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div style="max-height: 190px; overflow:hidden;">
                    <img src="{{ asset('storage/'.$data->foto) }}" class="card-img-top img-fluid" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-black fs-4">{{ $data->judul }}</h5>
                    <p class="card-text text-justify">{{ $data->excerpt }}</p>
                    <a href="/wisata/{{ $data->id }}" class="btn btn-outline-dark">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection