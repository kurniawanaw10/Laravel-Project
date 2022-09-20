@extends('layouts.admin')

@section('konten')
<div class="row d-flex justify-content-center">
    <div class="card col-lg-8">
        <div class="card-body">
            <h4 class="card-tittle">Tambah Data Wisata</h4>
            <form action="{{ route('wisata-store') }}" method="POST" enctype="multipart/form-data" class="m-3">
                @csrf
                <div class="form-group mt-3">
                    <label for="wisata">Nama Wisata</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="wisata" name="judul" value="{{ old('judul') }}">
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="wisata">Lokasi</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="wisata" name="lokasi" value="{{ old('lokasi') }}" placeholder="">
                    <small>*Salin Link "Embed a Maps" pada Google Maps</small>
                    @error('lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="deskripsi">Deskripsi</label>
                    <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
                    <trix-editor input="deskripsi"></trix-editor>
                    @error('deskripsi')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control-file @error('foto') is-invalid @enderror" id="foto" name="foto">
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
<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>
@endsection