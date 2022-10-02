@extends('layouts.admin')

@section('konten')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-tittle text-center mb-4"><b>Cetak Laporan</b></h4>
                <form action="{{ route('cetak-laporan') }}" method="GET">
                    @csrf
                    <div class="row justify-content-center mb-3">
                        <div class="col-lg-4">
                            <label class="form-label">Tanggal Awal</label>
                            <input class="form-control @error('tglawal') is_invalid @enderror" type="date" name="tglawal" id="awal" required autofocus>
                            @error('tglawal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">Tanggal Akhir</label>
                            <input class="form-control @error('tglakhir') is_invalid @enderror" type="date" name="tglakhir" id="akhir" onchange="tglantara()" required autofocus>
                            @error('tglakhir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="d-inline p-2">
                            <button type="submit" class="btn btn-outline-primary" onclick="tglantara(event);" target="_blank">Cetak</button>  
                        </div>
                        <div class="d-inline p-2">
                            <button type="reset" class="btn btn-outline-danger">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function tglantara(e) {
        var awal = document.getElementById("awal").value;
        var akhir = document.getElementById("akhir").value;

        if ( akhir <= awal) {
            alert("Tidak Dapat Memilih Tanggal Awal Kurang Dari Tanggal Akhir");
            e.preventDefault();
            return false;
        }
        return true;
    }
</script>
@endsection