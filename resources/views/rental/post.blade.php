@extends('layouts.main')

@section('content1')
    <form action="{{ route('sewa-store', $mobil->id) }}" method="POST" enctype="multipart/form-data" class="m-3">
        @csrf
        <input type="hidden" name="driver" value="{{ $driver }}">
        <input type="hidden" name="pembayaran" value="{{ $pembayaran }}">
        <div class="card my-5" style="min-height: 540px;">
            <div class="row g-0">
                <div class="col-md-6 p-4">
                    <img src="{{ asset('storage/'.$mobil->foto_mobil) }}" class="img-fluid rounded" alt="...">
                    <div class="card-body mt-3">
                        <h2 class="card-title mb-2">{{ $mobil->nama_mobil }}</h2>
                        <table class="table table-borderless">
                            <tr>
                                <th>Transmisi</th>
                                <td> : </td>
                                <td>{{ $mobil->transmisi }}</td>
                            </tr>
                            <tr>
                                <th>Kapasitas</th>
                                <td> : </td>
                                <td>{{ $mobil->seat_mobil }} Orang</td>
                            </tr>
                            <tr>
                                <th>Plat Nomor</th>
                                <td> : </td>
                                <td>{{ $mobil->plat_nomor }}</td>
                            </tr>
                            <tr>
                                <th>Bahan Bakar</th>
                                <td> : </td>
                                <td>{{ $mobil->bahan_bakar }}</td>
                            </tr>
                            <tr>
                                <th>Harga Sewa</th>
                                <td> : </td>
                                <td>Rp. {{ $mobil->harga }}/Day</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 p-4">
                    <h4 class="mt-4 mb-3">Rental</h4>
                        <div class="form-group mb-3">
                            <label>Tanggal Sewa</label>
                            <input class="form-control" type="date" name="tgl_pinjam" value="{{ $tgl_pinjam }}" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label>Tanggal Kembali</label>
                            <input class="form-control" type="date" name="tgl_kembali" value="{{ $tgl_kembali }}" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label for="hari">Jumlah Hari</label>
                            <input type="text" name="hari" id="hari" value="{{ $hari }}" readonly>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="biaya">Total Biaya</label>
                            <input type="text" name="biaya" id="biaya" value="{{ $biaya }}" readonly>
                        </div>
                        {{-- <div class="form-group mb-3">
                            <label>Metode Pembayaran : </label>
                            &nbsp;&nbsp;
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pembayaran" id="Cash" value="Cash">
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
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Include Driver</label>
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-success mt-2">Pesan</button>   
                        <button type="submit" class="btn btn-danger mt-2">Batal</button>
                    </form>
                </div>
            </div>
        </div>
@endsection