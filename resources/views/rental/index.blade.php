@extends('layouts.main')

@section('content1')
    <h1 class="text-center" style="font-weight:800; font-size:24pt;">DAFTAR MOBIL</h1>
    <div class="row">
        @foreach ($datas as $data)
        <div class="col-md-6 col-lg-4 col-xl-3 mt-3">
            <div class="card" style="background-color: #354259">
                <div style="max-height: 3000px; overflow:hidden;">
                    <img src="{{ asset('storage/'.$data->foto_mobil) }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-white text-center">{{ $data->nama_mobil }}</h5>
                    <table class="table table-borderless text-white text-opacity-75">
                            <tr>
                                <th>Transmisi</th>
                                <td> : </td>
                                <td>{{ $data->transmisi }}</td>
                            </tr>
                            <tr>
                                <th>Kapasitas</th>
                                <td> : </td>
                                <td>{{ $data->seat_mobil }} Orang</td>
                            </tr>
                            <tr>
                                <th>Plat Nomor</th>
                                <td> : </td>
                                <td>{{ $data->plat_nomor }}</td>
                            </tr>
                            <tr>
                                <th>Bahan Bakar</th>
                                <td> : </td>
                                <td>{{ $data->bahan_bakar }}</td>
                            </tr>
                            <tr>
                                <th>Harga Sewa</th>
                                <td> : </td>
                                <td>Rp. {{ $data->harga }}/Day</td>
                            </tr>
                        </table>
                        <div class="d-flex justify-content-center">
                            <a href="/rental/{{ $data->id }}" class="btn btn-info">Pesan</a>
                            {{-- <a href="/rental/{{ $data->id }}/edit" class="btn btn-info">Pesan</a> --}}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="/rental/show" class="btn btn-warning">Detail</a>
                        </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection