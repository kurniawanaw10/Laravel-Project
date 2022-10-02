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
            <div class="col-lg-4">

                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                </div>
                @endif

                @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <main class="form-signin">
                    <h1 class="h3 mb-5 mt-3 fw-normal text-black text-center"><b>Silahkan Login</b></h1>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-dark mt-4" type="submit">Sign in</button>
                    </form>
                    <small class="d-block text-center mt-3">Not registered? <a class="text-decoration-none" href="/register">Register Now!</a></small>
                </main>
            </div>
        </div>
@endsection