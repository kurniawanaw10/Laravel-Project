@extends('layouts.main')
@section('content')
<div class="row pt-4 justify-content-center">
    <div class="col-lg-8">
        <div class="card mt-5">
            <div class="card-body">
                <h2 class="text-bold text-black text-center mb-4 mt-2">Ubah Data Diri</h2>
                <form action="{{ route('update-data', ["id" => $data->id]) }}" method="POST" enctype="multipart/form-data" class="m-3">
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
                            <select id="inputJaminan" name="jaminan" class="form-select  @error('jaminan') is-invalid @enderror">
                                <option>Pilih Jaminan</option>
                                <option value="KTP" selected>Kartu Tanda Penduduk</option>
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
                    <div class="text-center">
                        <div class="d-inline p-2">
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </div>    
                        <div class="d-inline p-2">
                            <input class="btn btn-secondary mt-3" type="button" value="Kembali" onclick="window.history.back()" />
                        </div>    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection