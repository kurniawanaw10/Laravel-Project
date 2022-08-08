@extends('layouts.admin')

@section('konten')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-tittle">Data Wisata</h4>
                <a href="" class="btn btn-info mt-2 ml-3">Cetak Laporan</a>
                <table class="table table-responsive-lg mt-3 text-center">
                    <tr>
                        <th>#</th>
                        <th>Nama Pengguna</th>
                        <th>Nama Mobil</th>
                        <th>Plat Nomor</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Biaya</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($reports as $value)
                    <tr style="width: 100%">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->user_nama }}</td>
                        <td>{{ $value->mobil_nama }}</td>
                        <td>{{ $value->mobil_nomor }}</td>
                        <td>{{ date('d-m-Y', strtotime($value->tgl_pinjam)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($value->tgl_kembali)) }}</td>
                        <td>Rp. {{ $value->harga }}</td>
                        <td style="width:10%">
                            <a href="/admin/laporan/{{ $value->id }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <form action="/admin/laporan/{{ $value->id }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger btn-sm" type="submit"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection