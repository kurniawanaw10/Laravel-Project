@extends('layouts.main')

@section('content')
@if (auth()->user()) 
<div class="pt-5">
    <h1 class="text-center text-black"><b>Rental Order</b></h1>
    <div class="d-flex justify-content-center">
        <div class="card col-lg-8 p-4 mt-4">
            <form action="{{ route('sewa-mobil') }}" method="GET" enctype="multipart/form-data">
            <div class="row d-flex justify-content-center">
                <h3 class="card-title text-center text-black my-3">Isi Data di bawah ini</h3>
                <div class="col-lg-6">
                    <label class="form-label">Tanggal Sewa</label>
                    <input class="form-control @error('tgl_kembali') is_invalid @enderror" type="date" name="tgl_pinjam" id="txtDate" min="{{ date("Y-m-d") }}" required autofocus>
                    @error('tgl_pinjam')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <label class="form-label">Tanggal Kembali</label>
                    <input class="form-control @error('tgl_kembali') is-invalid @enderror" type="date" name="tgl_kembali" id="txtDate" min="{{ date("Y-m-d") }}" required autofocus>
                    @error('tgl_kembali')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-lg-6">
                    <select id="pembayaran" name="pembayaran" class="form-select @error('pembayaran') is-invalid @enderror">
                        <option selected>Pilih Metode Pembayaran</option>
                        <option value="M-Banking">M-Banking</option>
                        <option value="Cash">Cash</option>
                        <option value="Transfer">Transfer Bank</option>
                    </select>
                    @error('pembayaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <select id="jaminan" name="jaminan" class="form-select @error('jaminan') is-invalid @enderror">
                        <option selected>Pilih Jaminan</option>
                        <option value="KTP">Kartu Tanda Penduduk</option>
                        <option value="Kartu Keluarga">Kartu Keluarga</option>
                        <option value="Kartu BPJS">Kartu BPJS</option>
                    </select>
                    @error('jaminan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-lg-11">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="driver">Menggunakan Jasa Driver</label>
                            <input class="form-check-input" type="checkbox" role="switch" name="driver" id="driver">
                        </div>
                        <small>*Tambah biaya Rp. 100.000/Day</small>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-dark mb-1">Pesan</button>  
                <button type="reset" class="btn btn-outline-danger mb-2">Reset</button>
            </div>
            </form>
        </div>
    </div>
</div>
@else
<div class="pt-5">
    <h1 class="text-center text-black"><b>Rental Order</b></h1>
    <div class="row d-flex justify-content-center mt-4">
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
                                <td>@currency($data->harga)/Day</td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection