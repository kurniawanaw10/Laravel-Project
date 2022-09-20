@extends('layouts.main')
@section('content')
<div class="row pt-4 justify-content-center">
    <div class="col-lg-6">
        <div class="card mt-5">
            <div class="card-body">
                <h2 class="text-bold text-black text-center mb-4 mt-2">Pengaturan</h2>
                <div class="table-responsive ms-5 my-3">
                    <table class="table table-borderless">
                        <tr>
                            <th>Username</th>
                            <td>:</td>
                            <td>{{ auth()->user()->nama_user }}</td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>:</td>
                            <td>{{ auth()->user()->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>:</td>
                            <td>{{ auth()->user()->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Nomor HP</th>
                            <td>:</td>
                            <td>{{ auth()->user()->nomor_hp }}</td>
                        </tr>
                        <tr>
                            <th>Jaminan</th>
                            <td>:</td>
                            <td>{{ auth()->user()->jaminan }}</td>
                        </tr>
                    </table>
                </div>
                <div class="text-center">
                    <div class="d-inline p-2">
                        <a href="/pengaturan/{{ auth()->user()->id }}/edit" class="btn btn-primary">Ubah Data</a>
                    </div>
                    <div class="d-inline p-2">
                        <a href="" class="btn btn-secondary">Ubah Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection