@extends('layouts.main')

@section('content')
@if (auth()->user()) 
<div class="pt-5">
    <h1 class="text-center text-black"><b>Rental Order</b></h1>
    <div class="d-flex justify-content-center">
        <div class="card col-lg-8 p-4 mt-4">
            <form action="{{ route('sewa-mobil') }}" method="GET" enctype="multipart/form-data">
            @csrf
            <div class="row d-flex justify-content-center">
                <h3 class="card-title text-center text-black my-3">Isi Data di bawah ini</h3>
                <div class="col-lg-6">
                    <label class="form-label">Tanggal Pinjam</label>
                    <input class="form-control @error('tgl_pinjam') is_invalid @enderror" type="date" name="tgl_pinjam" id="pinjam" min="{{ date("Y-m-d") }}" required autofocus>
                    @error('tgl_pinjam')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <label class="form-label">Tanggal Kembali</label>
                    <input class="form-control @error('tgl_kembali') is-invalid @enderror" type="date" name="tgl_kembali" id="kembali" onchange="tglantara()" min="{{ date("Y-m-d") }}" required autofocus>
                    
                    @error('tgl_kembali')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-lg-6">
                    <select id="pembayaran" name="pembayaran" class="form-select @error('pembayaran') is-invalid @enderror">
                        <option selected>Pilih Metode Pembayaran</option>
                        <option value="M-Banking">M-Banking</option>
                        <option value="Transfer">Transfer Bank</option>
                        <option value="Cash">Cash</option>
                        <option value="Other">Other</option>
                    </select>
                    @error('pembayaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <select id="jaminan" name="jaminan" class="form-select @error('jaminan') is-invalid @enderror">
                        <option selected>Pilih Jaminan</option>
                        <option value="KTP">Kartu Tanda Penduduk</option>
                        <option value="Kartu Keluarga">Kartu Keluarga</option>
                        <option value="Kartu BPJS">Kartu BPJS</option>
                        <option value="Other">Other</option>
                    </select>
                    @error('jaminan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- <div class="row d-flex justify-content-center mt-3">
                <div class="col">
                    <div class="form-group">
                        <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                            <option selected>Pilih Layanan</option>
                            @foreach ($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->deskripsi }}</option>
                            @endforeach
                            <option value="Other">Other</option>
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <small>*Tambah biaya Rp. 100.000/Day</small>
                    </div>
                </div>
            </div> --}}
            <div class="row d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-dark mb-1" onclick="tglantara(event)">Pesan</button>  
                <button type="reset" class="btn btn-outline-danger mb-2">Reset</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function tglantara(e) {
        var pinjam = document.getElementById("pinjam").value;
        var kembali = document.getElementById("kembali").value;

        if ( kembali <= pinjam) {
            alert("Tidak Dapat Memilih Tanggal Kembali Kurang Dari Tanggal Pinjam");
            e.preventDefault();
            return false;
        }
        return true;
    }
</script>
@else
<div class="pt-5">
    <h1 class="text-center text-black"><b>Rental Order</b></h1>
    <div class="row d-flex justify-content-center mt-4">
        @foreach ($mobil as $data)
        <div class="col-sm-8 col-md-6 col-lg-4 col-xl-3 mt-3">
            <div class="card" style="background-color: #354259">
                <div style="max-height: 160px; overflow:hidden;">
                    <img src="{{ asset('storage/'.$data->foto_mobil) }}" class="card-img-top img-fluid d-block" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-white text-center">{{ $data->nama_mobil }}</h5>
                    <table class="table table-borderless text-white">
                            <tr>
                                <th>Kapasitas</th>
                                <td> : </td>
                                <td>{{ $data->seat_mobil }} Orang</td>
                            </tr>
                            <tr>
                                <th>Plat Nomor</th>
                                <td> : </td>
                                <td>{{ $data->plat_nomor }}</td>
                            </tr>
                            <tr>
                                <th>Harga Sewa</th>
                                <td> : </td>
                                <td>@currency($data->harga)/Day</td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection