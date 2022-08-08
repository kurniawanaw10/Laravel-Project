@extends('layouts.admin')

@section('konten')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-tittle">Data Wisata</h4>
                <a href="{{ url('admin/wisata/create') }}" class="btn btn-info mt-2 ml-3">Tambah Wisata</a>
                <table class="table table-responsive-lg mt-3 text-center">
                    <tr>
                        <th>#</th>
                        <th>Nama Wisata</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($wisatas as $value)
                    <tr style="width: 100%">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->judul }}</td>
                        <td style="width:60%">{{ strip_tags($value->deskripsi) }}</td>
                        <td>
                            <div style="max-width: 140px; overflow:hidden;">
                                <img src="{{ asset('storage/'.$value->foto) }}" alt="" class="img-fluid">
                            </div>
                        </td>
                        <td style="width:10%">
                            <a href="/admin/wisata/{{ $value->id }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <form action="/admin/wisata/{{ $value->id }}" method="POST" class="d-inline">
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