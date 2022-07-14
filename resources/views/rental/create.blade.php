@extends('layouts.main')

@section('content1')
    <div class="card my-5" style="min-height: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('storage/'.$data->foto_mobil) }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <form action="/admin/mobil" method="POST" enctype="multipart/form-data" class="m-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-lg-4 col-xl-3 mt-3">
                                <label for="inputNama" class="form-label">Nama Mobil</label>
                                <input type="text" class="form-control @error('nama_mobil') is-invalid @enderror" id="inputNama" name="nama_mobil" value="{{ old('nama_mobil') }}">
                                @error('nama_mobil')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 col-lg-4 col-xl-3 mt-3">
                                <label for="inputTahun" class="form-label">Tahun</label>
                                <input type="text" class="form-control @error('tahun_mobil') is-invalid @enderror" id="inputTahun" name="tahun_mobil" value="{{ old('tahun_mobil') }}">
                                @error('tahun_mobil')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 col-lg-4 col-xl-3 mt-3">
                                <label for="inputSeat" class="form-label">Kapasitas</label>
                                <input type="text" class="form-control @error('seat_mobil') is-invalid @enderror" id="inputSeat" name="seat_mobil" value="{{ old('seat_mobil') }}">
                                @error('seat_mobil')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection