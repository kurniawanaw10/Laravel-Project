@extends('layouts.admin')

@section('konten')
<div class="card">
    <div class="card-body">
        <h4 class="card-tittle mb-4">Laporan Transaksi</h4>
        <h6 class="text-bold ml-2">Filter</h6>
        <div class="row">
            <div class="col-6">
                <select class="custom-select w-50">
                    <option selected>Pilih bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <select class="custom-select w-25">
                    <option selected>Pilih tahun</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                </select>
                <button class="btn btn-outline-dark" type="submit">Cari</button>
            </div>
            <div class="col-6">
                <form action="{{ route('search') }}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control w-75" name="search" placeholder="Masukkan keyword..." value="{{ old('search') }}">
                        <button class="btn btn-outline-dark" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-responsive-lg mt-3 text-center">
            <tr>
                <th>#</th>
                <th>Nama Pengguna</th>
                <th>Nama Mobil</th>
                <th>Plat Nomor</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                {{-- <th>Driver</th> --}}
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
                {{-- <td>
                    @if ($value->driver == "YES")
                        <a class="badge btn-success btn-sm text-decoration-none disabled"><i class="fa fa-check" aria-hidden="true"></i></a>
                    @elseif ($value->driver == "NO")
                        <a class="badge btn-danger btn-sm text-decoration-none disabled"><i class="fa fa-times" aria-hidden="true"></i></a>
                    @endif
                </td> --}}
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
                    </div>
                    <div class="row">
                        <div class="p-1">
                            <a href="{{ route('cetak-innvoice', $value->id) }}" target="_blank" class="btn btn-secondary btn-sm"><i class="fa fa-print" aria-hidden="true"></i></a>
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
    </div>
</div>
@endsection