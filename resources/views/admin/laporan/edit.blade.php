@extends('layouts.admin')

@section('konten')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-tittle mb-4">Laporan Transaksi</h4>
                <form action="{{ url('/admin/laporan/'.$data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table table-responsive-lg mt-3 text-center">
                        <tr>
                            <th>Nama Pengguna</th>
                            <th>Nama Mobil</th>
                            <th>Plat Nomor</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th>Biaya</th>
                            <th>Status</th>
                        </tr>
                        <tr style="width: 100%">
                            <td>{{ $data->user_nama }}</td>
                            <td>{{ $data->mobil_nama }}</td>
                            <td>{{ $data->mobil_nomor }}</td>
                            <td>{{ date('d-m-Y', strtotime($data->tgl_pinjam)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($data->tgl_kembali)) }}</td>
                            <td>@currency($data->harga)</td>
                            <input type="hidden" name="mobil_id" value="{{ $data->mobil_id }}">
                            <td>
                                <select class="custom-select" name="status">
                                    <option value="Unpaid" selected>Unpaid</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Progress">On Progress</option>
                                    <option value="Done">Done</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-info mt-3">Simpan</button> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection