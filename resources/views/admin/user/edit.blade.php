@extends('layouts.main')

@section('content')
<div class="row pt-4 ">
    <div class="col">
        <div class="card mt-5">
            <div class="card-body">
                <h2 class="card-tittle text-black text-center mb-4 mt-2">Ubah Data User</h2>
                <form action="/admin/user/{{ $data->id }}" method="POST" enctype="multipart/form-data" class="m-3">
                    @method('put')
                    @csrf
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="inputNama" class="form-label">Nama User</label>
                            <input type="text" class="form-control @error('nama_user') is-invalid @enderror" id="inputNama" name="nama_user" value="{{ old('nama_user', $data->nama_user) }}">
                            @error('nama_user')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="inputFullname" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="inputFullname" name="nama_lengkap" value="{{ old('nama_lengkap', $data->nama_lengkap) }}">
                            @error('nama_lengkap')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="inputAlamat" class="form-label">Alamat</label>
                            <input type="text" id="inputAlamat" class="form-control" name="alamat" value="{{ old('alamat', $data->alamat) }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="inputNomor" class="form-label">Nomor Handphone</label>
                            <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" id="inputNomor" name="nomor_hp" value="{{ old('nomor_hp', $data->nomor_hp) }}">
                            @error('nomor_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email" value="{{ old('email', $data->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="formFile" class="form-label">Foto Diri</label>
                            <input class="form-control @error('foto_diri') is-invalid @enderror" type="file" name="foto_diri" id="formFile">
                            @error('foto_diri')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="inputPass" class="form-label">Current Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPass" name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="ConfirmPass" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control @error('passwordConf') is-invalid @enderror" id="ConfirmPass" name="passwordConf">
                            @error('passwordConf')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info mt-3">Simpan</button>    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection