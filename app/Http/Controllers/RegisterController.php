<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{


    public function regist()
    {
        return view('register.index', [
            "title" => "Daftar Akun Baru"
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_user' => ['required', 'max:255', 'unique:users'],
            'alamat' => ['required', 'max:425'],
            'nik' => ['required', 'numeric'],
            'nomor_hp' => ['required', 'numeric', 'min:11', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:8', 'max:255'],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/login')->with('success', 'Registrasi Berhasil! Silahkan Login!');
    }
}
