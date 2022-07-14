@extends('layouts.admin')

@section('konten')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-tittle">Ubah Data Mobil</h4>
                <form action="{{ url('/admin/mobil/'.$model->id) }}" method="POST" enctype="multipart/form-data" class="m-3">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="inputNama" class="form-label">Nama Mobil</label>
                            <input type="text" class="form-control @error('nama_mobil') is-invalid @enderror" id="inputNama" name="nama_mobil" value="{{ $model->nama_mobil }}">
                            @error('nama_mobil')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="inputTahun" class="form-label">Tahun</label>
                            <input type="text" class="form-control @error('tahun_mobil') is-invalid @enderror" id="inputTahun" name="tahun_mobil" value="{{ $model->tahun_mobil }}">
                            @error('tahun_mobil')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="inputTransmisi">Transmisi</label>
                                <select name="transmisi" id="transmisi" class="form-control @error('transmisi') is-invalid @enderror" id="inputTransmisi" value="{{ $model->transmisi }}">
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
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="inputSeat" class="form-label">Kapasitas</label>
                            <input type="text" class="form-control @error('seat_mobil') is-invalid @enderror" id="inputSeat" name="seat_mobil" value="{{ $model->seat_mobil }}">
                            @error('seat_mobil')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="inputHarga" class="form-label">Harga Sewa</label>
                            <input type="text" class="form-control @error('harga_sewa') is-invalid @enderror" id="inputHarga" name="harga_sewa" value="{{ $model->harga_sewa }}">
                            @error('harga_sewa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="inputBahanbakar" class="form-label">Bahan Bakar</label>
                            <input type="text" class="form-control @error('harga_sewa') is-invalid @enderror" id="inputBahanbakar" name="bahan_bakar" value="{{ $model->bahan_bakar }}">
                            @error('bahan_bakar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="inputNomor" class="form-label">Plat Nomor</label>
                            <input type="text" class="form-control @error('plat_nomor') is-invalid @enderror" id="inputNomor" name="plat_nomor" value="{{ $model->plat_nomor }}">
                            @error('plat_nomor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="inputFoto">Foto Mobil</label>
                            @if ($model->foto_mobil)
                                <img src="/img/{{ $model->foto_mobil }}" alt="">
                            @endif
                            <input type="file" name="foto_mobil" class="form-control-file" id="inputFoto">
                            <input type="hidden" name="foto_lama" class="form-control-file" id="foto_lama" value="{{ $model->foto_mobil }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info mt-3">Simpan</button>    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection