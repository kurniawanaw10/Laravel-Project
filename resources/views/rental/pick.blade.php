@extends('layouts.main')

@section('content')
<div class="pt-5">
    <h1 class="text-center text-black"><b>Rental Order</b></h1>
    <a class="btn btn-outline-dark" href="/rental"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Kembali</a>
    <div class="row d-flex justify-content-center mt-4">
    @foreach ($mobil as $data)
        <div class="col-sm-6 col-lg-3 mt-3">
            <div class="card" style="background-color: #354259">
                <form action="{{ route('sewa-post', $data->id) }}" method="GET" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="driver" value="{{ $driver }}">
                    <input type="hidden" name="pembayaran" value="{{ $pembayaran }}">
                    <input type="hidden" name="jaminan" value="{{ $jaminan }}">
                    <input type="hidden" name="tgl_pinjam" value="{{ $tgl_pinjam }}">
                    <input type="hidden" name="tgl_kembali" value="{{ $tgl_kembali }}">
                    <div style="max-height: 200px; overflow:hidden;">
                        <img src="{{ asset('storage/'.$data->foto_mobil) }}" class="card-img-top img-fluid d-block" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-white text-center">{{ $data->nama_mobil }}</h5>
                        <table class="table table-borderless text-white">
                            <tr>
                                <th>Plat Nomor</th>
                                <td> : </td>
                                <td>{{ $data->plat_nomor }}</td>
                            </tr>
                            <tr>
                                <th>Pilih Layanan</th>
                                <td> : </td>
                                <td>
                                    <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                        @foreach ($category as $cat)
                                        @if ($cat->mobil_id == $data->id)
                                            <option value="{{ $cat->id }}">{{ $cat->deskripsi }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                        </table>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-light">Pilih</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection