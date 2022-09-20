@extends('layouts.main')

@section('content')
<div class="pt-5">
    <h1 class="text-center text-black"><b>Rental Order</b></h1>
    <button class="btn btn-outline-dark" onclick="window.history.back()">Kembali</button>
    <div class="row d-flex justify-content-center mt-4">
        <form action="{{ route('sewa-post', $mobil->id) }}" method="GET" enctype="multipart/form-data">
            <input type="hidden" name="driver" value="{{ $driver }}">
            <input type="hidden" name="pembayaran" value="{{ $pembayaran }}">
            <input type="hidden" name="jaminan" value="{{ $jaminan }}">
            <input type="hidden" name="tgl_pinjam" value="{{ $tgl_pinjam }}">
            <input type="hidden" name="tgl_kembali" value="{{ $tgl_kembali }}">
        @foreach ($mobil as $data)
        <div class="col-sm-8 col-md-6 col-lg-4 col-xl-3 mt-3">
            <div class="card" style="background-color: #354259">
                <div style="max-height: 200px; overflow:hidden;">
                    <img src="{{ asset('storage/'.$data->foto_mobil) }}" class="card-img-top img-fluid d-block" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-white text-center">{{ $data->nama_mobil }}</h5>
                    <table class="table table-borderless text-white">
                        <tr>
                            <th>Plat Nomor</th>
                            <td> : </td>
                            <td>{{ $data->plat_nomor }}</td>
                        </tr>
                        <tr>
                            <th>Transmisi</th>
                            <td> : </td>
                            <td>{{ $data->transmisi }}</td>
                        </tr>
                        <tr>
                            <th>Harga Sewa</th>
                            <td> : </td>
                            <td>@currency($data->harga)/Day</td>
                        </tr>
                    </table>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-light">Pilih</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection