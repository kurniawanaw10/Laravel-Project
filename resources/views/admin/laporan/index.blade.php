@extends('layouts.admin')

@section('konten')
<div class="card">
    <div class="card-body">
        <h4 class="card-tittle mb-4">Laporan Transaksi</h4>
        <div class="row">
            <div class="col-lg-8 mb-3">
                <form action="{{ route('cetak-laporan') }}" method="GET" target="_blank">
                    @csrf
                    <div class="row">
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
                        <div class="col-lg-4 d-flex align-items-end mt-2">
                            <button type="submit" class="btn btn-outline-primary" onclick="tglantara(event);"><i class="fa fa-print" aria-hidden="true"></i> Cetak</button> 
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 justify-content-end">
                <form action="/admin/laporan">
                    <label class="form-label">Pencarian</label>
                    <div class="row">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukkan Keyword..." name="search">
                            <button class="btn btn-outline-dark" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <table class="table table-responsive mt-3 text-center">
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Nama Mobil</th>
                    <th>Plat Nomor</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Driver</th>
                    <th>Jaminan</th>
                    <th>Biaya</th>
                    <th>Status</th>
                    <th>Bukti Tf</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($reports as $value)
                <tr style="width: 100%">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->user_nama }}</td>
                    <td>{{ $value->mobil_nama }}</td>
                    <td>{{ $value->mobil_nomor }}</td>
                    <td>{{ date('d F Y', strtotime($value->tgl_pinjam)) }}</td>
                    <td>{{ date('d F Y', strtotime($value->tgl_kembali)) }}</td>
                    <td>
                        @if ($value->driver == "YES")
                            <a class="badge btn-success btn-sm text-decoration-none disabled"><i class="fa fa-check" aria-hidden="true"></i></a>
                        @elseif ($value->driver == "NO")
                            <a class="badge btn-danger btn-sm text-decoration-none disabled"><i class="fa fa-times" aria-hidden="true"></i></a>
                        @endif
                    </td>
                    <td>{{ $value->jaminan }}</td>
                    <td width="10%">@currency($value->harga)</td>
                    <td>
                        @if ($value->status == 'Progress')
                            <a class="badge btn-warning btn-sm text-decoration-none disabled">On Progress</a>
                        @elseif ($value->status == 'Done')
                            <a class="badge btn-success btn-sm text-decoration-none disabled">Done</a>
                        @elseif ($value->status == 'Paid')
                            <a class="badge btn-info btn-sm text-decoration-none disabled">Paid</a>
                        @else
                            <a class="badge btn-danger btn-sm text-decoration-none disabled">Unpaid</a>
                        @endif
                    </td>
                    <td>
                        <button class="badge btn-outline-dark myImg" data-bs-toggle="modal" data-bs-target="#myModal-{{ $value->id }}">CHECK</button>
                    </td>
                    <td>
                        <div class="row">
                            <div class="p-1">
                                <a href="/admin/laporan/{{ $value->id }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            </div>
                            <div class="p-1">
                                <form action="/admin/laporan/{{ $value->id }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </div>
                            <div class="p-1">
                                <a href="{{ route('cetak-innvoice', $value->id) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print" aria-hidden="true"></i></a>
                            </div>
                            <div class="p-1">
                                <a href="{{ route('show-laporan', $value->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </td>
                </tr>
                {{-- MODAL --}}
                <div class="modal" id="myModal-{{$value->id}}">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content" style="background-color: #212529">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title text-white">Bukti Transfer</h4>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body text-center" style="background-color: #F8F7F3">
                                @if ($value->bukti == 0)
                                    <img src="{{ asset('storage/'.$value->bukti) }}" class="img-fluid rounded" alt="...">
                                @endif
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Kembali</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </table>
            <div class="d-flex justify-content-center">
                {{ $reports->links() }}
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