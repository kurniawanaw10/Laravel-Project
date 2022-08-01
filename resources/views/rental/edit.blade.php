@extends('layouts.main')

@section('content1')
    <form action="{{ route('sewa-post', $data->id) }}" method="GET" enctype="multipart/form-data" class="m-3">
        <div class="card my-5" style="min-height: 540px;">
            <div class="row g-0">
                <div class="col-md-6 p-4">
                    @csrf
                    <img src="{{ asset('storage/'.$data->foto_mobil) }}" class="img-fluid rounded" alt="...">
                    <div class="card-body mt-3">
                        <input type="hidden" name="foto_mobil" value="{{ $data->foto_mobil }}">
                        <input type="hidden" name="nama_mobil" value="{{ $data->nama_mobil }}">
                        <h2 class="card-title mb-2">{{ $data->nama_mobil }}</h2>
                        <table class="table table-borderless">
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
                    </div>
                </div>
                <div class="col-md-6 p-4">
                    <h4 class="mt-4 mb-3">Silahkan Mengisi Form Dibawah Ini.</h4>
                        @csrf
                        <div class="form-group mb-3">
                            <label>Tanggal Sewa</label>
                            <input class="form-control" type="date" name="tgl_pinjam" required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label>Tanggal Kembali</label>
                            <input class="form-control" type="date" name="tgl_kembali" required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label>Metode Pembayaran : </label>
                            &nbsp;&nbsp;
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pembayaran" id="Cash" value="Cash" required>
                                <label class="form-check-label" for="Cash">Cash</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pembayaran" id="M-banking" value="M-banking">
                                <label class="form-check-label" for="M-banking">M-Banking</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pembayaran" id="Other" value="Other">
                                <label class="form-check-label" for="Other">Other</label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="driver" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Include Driver</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Pesan</button>   
                        <button type="reset" class="btn btn-danger mt-2">Reset</button>
                </div>
            </div>
        </div>
</form>
@endsection