@extends('layouts.admin')

@section('konten')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-tittle">Ubah Data User</h4>
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
                            <input type="text" class="form-control" id="inputFullname" name="nama_lengkap" value="{{ old('nama_lengkap', $data->nama_lengkap) }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-9">
                            <label for="inputAlamat" class="form-label">Alamat</label>
                            <input type="text" id="inputAlamat" class="form-control" name="alamat" value="{{ old('alamat', $data->alamat) }}">
                        </div>
                        <div class="col-3">
                            <label for="inputJaminan" class="form-label">Jaminan</label>
                            <select id="inputJaminan" name="jaminan" class="form-control  @error('jaminan') is-invalid @enderror">
                                <option selected>Pilih Jaminan</option>
                                <option value="KTP">Kartu Tanda Penduduk</option>
                                <option value="Kartu Keluarga">Kartu Keluarga</option>
                                <option value="Kartu BPJS">Kartu BPJS</option>
                            </select>
                            @error('jaminan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
                    <button type="submit" class="btn btn-info mt-3">Simpan</button>    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection