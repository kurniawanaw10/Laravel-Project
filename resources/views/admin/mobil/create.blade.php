@extends('layouts.admin')

@section('konten')
<div class="row d-flex justify-content-center">
    <div class="card col-lg-8">
        <div class="card-body">
            <h4 class="card-tittle">Tambah Data Mobil</h4>
            <form action="/admin/mobil" method="POST" enctype="multipart/form-data" class="m-3">
                @csrf
                <div class="mt-3">
                    <label for="inputNama" class="form-label">Nama Mobil</label>
                    <input type="text" class="form-control @error('nama_mobil') is-invalid @enderror" id="inputNama" name="nama_mobil" value="{{ old('nama_mobil') }}">
                    @error('nama_mobil')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="inputTahun" class="form-label">Tahun</label>
                    <input type="number" class="form-control @error('tahun_mobil') is-invalid @enderror" id="inputTahun" name="tahun_mobil" value="{{ old('tahun_mobil') }}">
                    @error('tahun_mobil')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="inputSeat" class="form-label">Kapasitas</label>
                    <input type="number" class="form-control @error('seat_mobil') is-invalid @enderror" id="inputSeat" name="seat_mobil" value="{{ old('seat_mobil') }}">
                    @error('seat_mobil')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-3">
                    <div class="form-group">
                        <label for="inputTransmisi">Transmisi</label>
                        <select name="transmisi" class="custom-select @error('transmisi') is-invalid @enderror" id="inputTransmisi" value="{{ old('transmisi') }}">
                            <option value="">Silahkan Pilih Transmisi</option>      
                            <option value="Matic">Matic</option>
                            <option value="Manual">Manual</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    @error('transmisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="inputHarga" class="form-label">Harga Sewa</label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="inputHarga" name="harga" value="{{ old('harga') }}">
                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="inputBahanbakar" class="form-label">Bahan Bakar</label>
                    <input type="text" class="form-control @error('bahan_bakar') is-invalid @enderror" id="inputBahanbakar" name="bahan_bakar" value="{{ old('bahan_bakar') }}">
                    @error('bahan_bakar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="inputNomor" class="form-label">Plat Nomor</label>
                    <input type="text" class="form-control @error('plat_nomor') is-invalid @enderror" id="inputNomor" name="plat_nomor" value="{{ old('plat_nomor') }}">
                    @error('plat_nomor')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="mb-2" for="image">Foto Mobil</label>
                    <input type="file" class="form-control-file @error('foto_mobil') is-invalid @enderror" id="foto_mobil" name="foto_mobil">
                    @error('foto_mobil')
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
@endsection