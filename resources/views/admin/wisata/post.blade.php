@extends('layouts/main')

@section('content1')
<style>
    .text-justify {
    text-align: justify;
}
</style>
<h1 class="text-center" style="font-weight:800; font-size:24pt;">WISATA</h1>
<div class="row d-flex justify-content-center">
    @foreach ($datas as $data)
    <div class="col-sm-8 col-md-6 col-lg-3 mt-3">
        <div class="card">
            <div style="max-height: 190px; overflow:hidden;">
                <img src="{{ asset('storage/'.$data->foto) }}" class="card-img-top img-fluid" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $data->judul }}</h5>
                <p class="card-text text-justify">{{ $data->excerpt }}</p>
                <a href="/admin/wisata/{{ $data->id }}" class="btn btn-primary">Detail</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection