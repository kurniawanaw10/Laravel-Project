@extends('layouts.admin')

@section('konten')
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-tittle">Ubah Harga Mobil</h4>
                <form action="{{ route('update-harga', $model->id) }}" method="POST" enctype="multipart/form-data" class="m-3">
                    @csrf
                    <div class="row mt-4">
                        <label for="inputNama" class="form-label">Nama Mobil</label>
                        <input type="text" class="form-control @error('nama_mobil') is-invalid @enderror" id="inputNama" name="nama_mobil" value="{{ $model->nama_mobil }}" disabled>
                        @error('nama_mobil')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="inputharga" class="form-label">Deskripsi Layanan</label>
                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="inputharga" name="deskripsi" value="" placeholder="Fullday/12 Jam">
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="inputharga" class="form-label">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="inputharga" name="harga" value="" placeholder="Rp. 600.0000">
                        @error('harga')
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
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-tittle">Data Harga Mobil</h4>
                <table class="table table-responsive-lg mt-4 text-center">
                    <tr>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($cat as $i)
                    @if ($i->mobil_id == $model->id)
                    <tr>
                        <td>{{ $i->deskripsi }}</td>
                        <td>@currency( $i->harga )</td>
                        <td>
                            <form action="{{ route('hapus-harga',$i->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger btn-sm" type="submit"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection