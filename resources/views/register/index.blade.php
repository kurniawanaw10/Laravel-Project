@extends('layouts.main')

@section('content1')
<style>
    a:link{
    color: #9f9f9d
    }
    a:visited{
        color: #9f9f9d
    }
    a:hover{
        color: #1e1e1e
    }
</style>
    <div class="row py-5 justify-content-center">
        <div class="col-lg-5">
            <main class="form-registration">
                <h1 class="h3 my-3 fw-normal text-black text-center"><b>Form Registration</b></h1>
                <br>
                <form action="/register" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="nama_user" class="form-control rounded-top @error('nama_user') is-invalid @enderror" id="namauser" placeholder="Nama User" value="{{ old('nama_user') }}">
                        <label for="namauser">Username</label>
                        @error('nama_user')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="nama_lengkap" class="form-control rounded-top @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" placeholder="Nama Lengkap" value="{{ old('nama_lengkap') }}">
                        <label for="namalengkap">Nama Lengkap</label>
                        @error('nama_lengkap')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" value="{{ old('alamat') }}">
                        <label for="alamat">Alamat</label>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="number" name="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror" id="nomorhp" placeholder="Nomor Handphone" value="{{ old('nomor_hp') }}">
                        <label for="nomorhp">No. Handphone</label>
                        @error('nomor_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="checkPass" class="form-control @error('checkPass') is-invalid @enderror" id="checkPass" placeholder="Confirm Password">
                        <label for="checkPass">Confirm Password</label>
                        @error('checkPass')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-dark mt-4" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">Already registered? <a class="text-decoration-none" href="/login">Login</a></small>
            </main>
        </div>
    </div>
@endsection