@extends('layouts.admin')

@section('konten')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-tittle">Data Mobil</h4>
                <a href="{{ url('admin/mobil/create') }}" class="btn btn-info mt-2 ml-3">Tambah Data Mobil</a>
                <table class="table table-responsive-lg mt-3 text-center">
                    <tr>
                        <th>#</th>
                        <th>Nama Unit</th>
                        <th>Plat Nomor</th>
                        <th>Tahun</th>
                        <th>Transmisi</th>
                        <th>Kapasitas</th>
                        <th>Bahan Bakar</th>
                        <th>Harga</th>
                        <th>Denda</th>
                        <th>Foto</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    @foreach ($datas as $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->nama_mobil }}</td>
                        <td>{{ $value->plat_nomor }}</td>
                        <td>{{ $value->tahun_mobil }}</td>
                        <td>{{ $value->transmisi }}</td>
                        <td>{{ $value->seat_mobil }} Orang</td>
                        <td>{{ $value->bahan_bakar }}</td>
                        <td>Rp. {{ $value->harga }}</td>
                        <td>Rp. {{ $value->denda }}</td>
                        <td>
                            <div style="max-width: 140px; overflow:hidden;">
                                <img src="{{ asset('storage/'.$value->foto_mobil) }}" alt="" class="img-fluid">
                            </div>
                        </td>
                        <td>
                            <a href="{{ url('admin/mobil/'.$value->id.'/edit' ) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ url('admin/mobil/'.$value->id) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" type="submit">Hapus</button>
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