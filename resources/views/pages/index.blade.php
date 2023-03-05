@extends('layouts.main')
@section('content')
<div class="py-5" style="min-height: 400px">
    <div class="row">
        <div class="col">
            <h1 class="text-center text-black pb-4"><b>Riwayat Pemesanan</b></h1>
            <div class="table-responsive">
                <table class="table my-4 text-center">
                    <tr>
                        <th>#</th>
                        <th>Nama Pengguna</th>
                        <th>Nama Mobil</th>
                        <th>Plat Nomor</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Biaya</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($riwayat as $value)
                    <tr style="width: 100%">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->nama_user }}</td>
                        <td>{{ $value->nama_mobil }}</td>
                        <td>{{ $value->plat_nomor }}</td>
                        <td>{{ date('d M Y', strtotime($value->tgl_pinjam)) }}</td>
                        <td>{{ date('d M Y', strtotime($value->tgl_kembali)) }}</td>
                        <td>@currency($value->harga)</td>
                        <td>
                            @if ($value->status == 'Progress')
                                <a class="badge btn-warning btn-sm text-decoration-none disabled">On Progress</a>
                            @elseif ($value->status == 'Done')
                                <a class="badge btn-success btn-sm text-decoration-none disabled">Done</a>
                            @elseif ($value->status == 'Paid')
                                <a class="badge btn-info btn-sm text-decoration-none disabled">Paid</a>
                            @else
                                <a class="badge btn-danger btn-sm text-decoration-none disabled">Unpaid</a>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#myModal-{{$value->id}}"><i class="fa fa-upload" aria-hidden="true"></i></button>
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('cetak-innvoice', $value->id) }}" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    {{-- MODAL --}}
                    <div class="modal" id="myModal-{{$value->id}}">
                        <form action="{{ route('upload-bukti', $value->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content" style="background-color: #212529">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title text-white">Unggah Butki Transfer</h4>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body text-center" style="background-color: #F8F7F3">
                                    <h6>Nomor Rekening :</h6>
                                    BCA a.n. Ryan Aninditya Manggala
                                    <br>
                                    <h6>7850728296</h6>
                                    <br>
                                    <br>
                                    <div class="col-4 position-absolute start-50 translate-middle">
                                        <input class="form-control form-control-sm @error('bukti') is-invalid @enderror" id="formFileSm" type="file" name="bukti">
                                    </div>
                                    <br>
                                    <br>
                                    Konfirmasi Pemesanan :
                                    <br>
                                    <i class="fa fa-phone" aria-hidden="true"></i> : <a href="https://wa.me/6281225671933" target="_blank" class="text-decoration-none" style="color: #5A5A5A">0812 2567 1933 – </a> <a href="https://wa.me/6285725666681" target="_blank" class="text-decoration-none" style="color: #5A5A5A">085 725 6666 81</a>
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
                        </form>
                    </div>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection