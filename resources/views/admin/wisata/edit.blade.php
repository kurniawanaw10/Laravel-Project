@extends('layouts.admin')

@section('konten')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-tittle">Ubah Data Wisata</h4>
                <form action="/admin/wisata/{{ $ubah->id }}" method="POST" enctype="multipart/form-data" class="m-3">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-3">
                        <label for="wisata">Nama Wisata</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="wisata" name="judul" value="{{ $ubah->judul }}">
                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="deskripsi">Deskripsi</label>
                        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ $ubah->deskripsi }}">
                        <trix-editor input="deskripsi"></trix-editor>
                        @error('deskripsi')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                        <input type="hidden" name="oldfoto" id="oldfoto" value="{{ $ubah->foto }}">
                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-info mt-3">Simpan</button>    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection