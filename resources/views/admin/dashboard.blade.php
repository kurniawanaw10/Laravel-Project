@extends('layouts.admin')

@section('konten')
<div class="row d-flex justify-content-center">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header text-white" style="background-color: #212529">
                <h5 class="m-0">Laporan</h5>
            </div>
            <div class="card-body">
                <table class="table table-responsive-lg mt-3 text-center">
                    <tr>
                        <th>#</th>
                        <th>Nama Pengguna</th>
                        <th>Nama Mobil</th>
                        <th>Plat Nomor</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        {{-- <th>Driver</th> --}}
                        {{-- <th>Biaya</th> --}}
                        <th>Status</th>
                    </tr>
                    @foreach ($reports as $value)
                    <tr style="width: 100%">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->user_nama }}</td>
                        <td>{{ $value->mobil_nama }}</td>
                        <td>{{ $value->mobil_nomor }}</td>
                        <td>{{ date('d F Y', strtotime($value->tgl_pinjam)) }}</td>
                        <td>{{ date('d F Y', strtotime($value->tgl_kembali)) }}</td>
                        {{-- <td>
                            @if ($value->driver == "YES")
                                <a class="badge btn-success btn-sm text-decoration-none disabled"><i class="fa fa-check" aria-hidden="true"></i></a>
                            @elseif ($value->driver == "NO")
                                <a class="badge btn-danger btn-sm text-decoration-none disabled"><i class="fa fa-times" aria-hidden="true"></i></a>
                            @endif
                        </td> --}}
                        {{-- <td>@currency($value->harga)</td> --}}
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
                    </tr>
                    @endforeach
                </table>
                <div class="mt-4">
                    <a href="/admin/laporan" class="btn btn-outline-dark">More Info ...</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header text-white" style="background-color: #212529">
                <h5 class="m-0">Data Mobil</h5>
            </div>
            <div class="card-body">
                <table class="table table-responsive-lg mt-3 text-center">
                    <tr>
                        <th>#</th>
                        <th>Nama Unit</th>
                        <th>Plat Nomor</th>
                        <th>Tahun</th>
                        <th>Transmisi</th>
                        <th>Bahan Bakar</th>
                        <th>Harga</th>
                        <th>Foto</th>
                    </tr>
                    @foreach ($datas as $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->nama_mobil }}</td>
                        <td>{{ $value->plat_nomor }}</td>
                        <td>{{ $value->tahun_mobil }}</td>
                        <td>{{ $value->transmisi }}</td>
                        <td>{{ $value->bahan_bakar }}</td>
                        <td>@currency($value->harga)</td>
                        <td>
                            <div style="max-width: 100px; overflow:hidden;">
                                <img src="{{ asset('storage/'.$value->foto_mobil) }}" alt="" class="img-fluid">
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <a href="/admin/mobil" class="btn btn-outline-dark">More Info ...</a>
            </div>
        </div>
    </div>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header text-white" style="background-color: #212529">
                <h5 class="m-0">Data Wisata</h5>
            </div>
            <div class="card-body">
                <table class="table table-responsive-lg mt-3 text-center">
                    <tr>
                        <th>#</th>
                        <th>Nama Wisata</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                    </tr>
                    @foreach ($wisatas as $value)
                    <tr style="width: 100%">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->judul }}</td>
                        <td style="width:60%">{{ strip_tags($value->excerpt) }}</td>
                        <td>
                            <div style="max-width: 100px; overflow:hidden;">
                                <img src="{{ asset('storage/'.$value->foto) }}" alt="" class="img-fluid">
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <a href="/admin/wisata" class="btn btn-outline-dark">More Info ...</a>
            </div>
        </div>
    </div>
</div>
@endsection