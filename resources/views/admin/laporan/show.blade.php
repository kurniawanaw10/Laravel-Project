@extends('layouts.admin')

@section('konten')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-5">
                <img src="{{ asset('storage/'.$laporan->mobil->foto_mobil) }}" class="img-fluid rounded" alt="...">
                <h2 class="text-bold mt-3 text-center">{{ $laporan->mobil_nama }}</h2>                
            </div>
            <div class="col-lg-7">
                <div class="text-center mt-5">
                    <img src="{{ asset('dist/img/foto-sampul.jpg') }}" class="mb-4" alt="" style="height: 140px; width: 120px;">
                    <h2 class="text-bold mt-4">Data User</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <table class="table table-bordered mt-4">
                    <tr>
                        <th>Transmisi</th>
                        <td>{{ $laporan->mobil->transmisi }}</td>
                    </tr>
                    <tr>
                        <th>Plat Nomor</th>
                        <td>{{ $laporan->mobil_nomor }}</td>
                    </tr>
                    <tr>
                        <th>Harga Sewa</th>
                        <td>@currency($laporan->mobil->harga)/Day</td>
                    </tr>
                    @if ($laporan->driver == "YES")
                    <tr>
                        <th>Biaya Sopir</th>
                        <td>Rp. 100.000/Day</td>
                    </tr>
                    @endif
                </table>
            </div>
            <div class="col-lg-7">
                <table class="table table-bordered mt-4">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $laporan->user->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $laporan->user->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Nomor</th>
                        <td>{{ $laporan->user->nomor_hp }}</td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td>{{ $laporan->user->email }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <table class="table table-responsive-lg mt-3 text-center">
                <tr>
                    <th>Nama Pengguna</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Lama Sewa</th>
                    <th>Biaya</th>
                    <th>Driver</th>
                    <th>Jaminan</th>
                    <th>Status</th>
                    <th>Bukti Tf</th>
                </tr>
                <tr>
                    <td>{{ $laporan->user_nama }}</td>
                    <td>{{ date('d F Y', strtotime($laporan->tgl_pinjam)) }}</td>
                    <td>{{ date('d F Y', strtotime($laporan->tgl_kembali)) }}</td>
                    <td>{{ $laporan->hari }} Hari</td>
                    <td >@currency($laporan->harga)</td>
                    <td>
                        @if ($laporan->driver == "YES")
                            <a class="badge btn-success text-decoration-none disabled"><i class="fa fa-check" aria-hidden="true"></i></a>
                        @elseif ($laporan->driver == "NO")
                            <a class="badge btn-danger text-decoration-none disabled"><i class="fa fa-times" aria-hidden="true"></i></a>
                        @endif
                    </td>
                    <td >{{ $laporan->jaminan }}</td>
                    <td>
                        @if ($laporan->status == 'Progress')
                            <a class="badge btn-warning btn-sm text-decoration-none disabled">On Progress</a>
                        @elseif ($laporan->status == 'Done')
                            <a class="badge btn-success btn-sm text-decoration-none disabled">Done</a>
                        @elseif ($laporan->status == 'Paid')
                            <a class="badge btn-info btn-sm text-decoration-none disabled">Paid</a>
                        @else
                            <a class="badge btn-danger btn-sm text-decoration-none disabled">Unpaid</a>
                        @endif
                    </td>
                    <td>
                        <button class="badge btn-outline-dark myImg" data-bs-toggle="modal" data-bs-target="#myModal-{{ $laporan->id }}">CHECK</button>
                    </td>
                </tr>
            </table>
            <div class="row">
                <div class="col-12 ml-2">
                    <h6 class="text-bold">* Rincian Biaya : </h6> <h6>( @currency($laporan->mobil->harga) @if ($laporan->driver == "YES") + Rp. 100.000 @endif) x {{ $laporan->hari }} = @currency($laporan->harga)</h6>
                </div>
            </div>
        </div>
        {{-- MODAL --}}
        <div class="modal" id="myModal-{{$laporan->id}}">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="background-color: #212529">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-white">Bukti Transfer</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body text-center" style="background-color: #F8F7F3">
                        @if ($laporan->bukti == 0)
                            <img src="{{ asset('storage/'.$laporan->bukti) }}" class="img-fluid rounded" alt="...">
                        @endif
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection