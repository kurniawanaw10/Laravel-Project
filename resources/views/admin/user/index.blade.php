@extends('layouts.admin')

@section('konten')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-tittle">Data User</h4>
                <a href="/admin/user/create" class="btn btn-info mt-2 ml-3">Tambah Data User</a>
                <table class="table table-responsive-lg mt-3 text-center">
                    <tr>
                        <th>#</th>
                        <th>Nama User</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>NIK</th>
                        <th>Email</th>
                        <th>Foto</th> 
                        <th>Aksi</th>
                    </tr>
                    @foreach ($datas as $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->nama_user }}</td>
                        <td>{{ $value->alamat }}</td>
                        <td>{{ $value->nomor_hp }}</td>
                        <td>{{ $value->nik }}</td>
                        <td>{{ $value->email }}</td>
                        <td><img src="{{ asset('storage/'.$value->foto_diri) }}" alt="" class="img-thumbnail"></td>
                        <td>
                            <a href="/admin/user/{{ $value->id }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <form action="/admin/user/{{ $value->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin?')" type="submit"><i class="far fa-trash-alt"></i></button>
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