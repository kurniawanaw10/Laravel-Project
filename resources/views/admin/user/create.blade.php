@extends('layouts.admin')

@section('konten')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-tittle">Tambah Data User</h4>
                <form action="/admin/user" method="POST" enctype="multipart/form-data" class="m-3">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="inputNama" class="form-label">Nama User</label>
                            <input type="text" class="form-control @error('nama_user') is-invalid @enderror" id="inputNama" name="nama_user" value="{{ old('nama_user') }}">
                            @error('nama_user')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="inputFullname" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="inputFullname" name="nama_lengkap" value="{{ old('nama_lengkap') }}"> 
                            @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="inputNomor" class="form-label">Nomor Handphone</label>
                            <input type="number" class="form-control @error('nomor_hp') is-invalid @enderror" id="inputNomor" minlength="11" name="nomor_hp" value="{{ old('nomor_hp') }}">
                            @error('nomor_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-8">
                            <label for="inputAlamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="inputAlamat" name="alamat" value="{{ old('alamat') }}">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror " id="inputPassword" name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <div class="col-8">
                            <label class="mb-2" for="foto_diri">Foto Diri</label>
                            <input type="file" class="form-control-file @error('foto_diri') is-invalid @enderror" id="foto_diri" name="foto_diri">
                            @error('foto_diri')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div> --}}
                    <button type="submit" class="btn btn-info mt-3">Simpan</button>    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection