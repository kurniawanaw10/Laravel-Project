@extends('layouts.main')
@section('content')
<div class="row pt-4 justify-content-center">
    <div class="col-lg-8">
        <div class="card mt-5">
            <div class="card-body">
                <h2 class="text-bold text-black text-center mb-4 mt-2">Pengaturan</h2>
                <div class="d-flex justify-content-center">
                    @if (auth()->user()->foto_diri)
                        <img src="{{ asset('storage/'. auth()->user()->foto_diri) }}" alt="" style="height: 148px; width: 120px;">
                    @else
                        <img src="{{ asset('dist/img/foto-sampul.jpg') }}" alt="" style="height: 148px; width: 120px;">
                    @endif
                </div>
                <div class="row justify-content-center mx-4">
                    <div class="table-responsive px-5 mt-3">
                        <table class="table table-bordered">
                            <tr>
                                <th>Username</th>
                                <td>{{ auth()->user()->nama_user }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>{{ auth()->user()->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ auth()->user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ auth()->user()->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Nomor HP</th>
                                <td>{{ auth()->user()->nomor_hp }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="text-center my-2">
                    {{-- <a href="/pengaturan/{{ auth()->user()->id }}/edit" class="btn btn-primary">Ubah Data</a> --}}
                    <a href="/pengaturan/{{ auth()->user()->id }}/edit" class="btn btn-primary">Ubah Data</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection