@extends('layouts.main')

@section('content1')
<div class="py-5">
    <form action="{{ route('sewa-store', $mobil->id) }}" method="POST" enctype="multipart/form-data" class="m-3">
        @csrf
        <input type="hidden" name="driver" value="{{ $driver }}">
        <input type="hidden" name="pembayaran" value="{{ $pembayaran }}">
        <div class="card" style="min-height: 540px;">
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
                                <td>@currency($mobil->harga)/Day</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 p-4">
                    <h4 class="p-3 text-center">Verifikasi Data</h4>
                    <div class="row my-3 d-flex justify-content-center">
                        <div class="col-md-5">
                            <div class="form-group mb-3">
                                <label for="tanggal1">Tanggal Sewa</label>
                                <input class="form-control" type="text" id="tanggal1" value="{{ date('D, d F Y', strtotime($tgl_pinjam))  }}" disabled>
                                <input type="hidden" name="tgl_pinjam" id="tanggal1" value="{{ $tgl_pinjam }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="hari">Jumlah Hari</label>
                                <input class="form-control" type="text" id="hari" value="{{ $hari }} Hari" disabled>
                                <input type="hidden" name="hari" id="hari" value="{{ $hari }}">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group mb-3">
                                <label for="tanggal2">Tanggal Kembali</label>
                                <input class="form-control" type="text" id="tanggal2" name="tgl_kembali" value="{{ date('D, d F Y', strtotime($tgl_kembali)) }}" disabled>
                                <input type="hidden" name="tgl_kembali" id="tanggal2" value="{{ $tgl_kembali }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="biaya">Total Biaya</label>
                                <input class="form-control" type="text" id="biaya" value="@currency($biaya)" disabled>
                                <input type="hidden" name="biaya" id="biaya" value="{{ $biaya }}">
                            </div>
                        </div>
                        <button type="button" class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#myModal">Pesan</button>
                        <input class="btn btn-danger mt-2" type="button" value="Batal" onclick="window.history.back()" />
                
                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content" style="background-color: #212529">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title text-white">Silahkan Melakukan Pembayaran</h4>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body text-center" style="background-color: #F8F7F3">
                                        <h6>Nomor Rekening :</h6>
                                        BCA a.n. Ryan Aninditya Manggala
                                        <br>
                                        <h6>7850728296</h6>
                                        <br>
                                        Konfirmasi Pemesanan :
                                        <br>
                                        <i class="fa fa-phone" aria-hidden="true"></i> : 0812 2567 1933 – 085 725 6666 81
                                        <br>
                                        <i class="fa fa-envelope" aria-hidden="true"></i> : wirawirisolo@gmail.com
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="sumbit" class="btn btn-outline-warning">Simpan</button>
                                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection