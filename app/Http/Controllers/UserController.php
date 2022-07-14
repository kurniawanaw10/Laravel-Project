<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::all();
        return view('admin.user.index')->with([
            'datas' => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new User;
        return view('admin.user.create', compact(
            'data'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_user' => ['required', 'max:255'],
            'alamat' => ['required', 'max:425'],
            'nik' => ['required', 'numeric', 'unique:users'],
            'nomor_hp' => ['required', 'numeric', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:8', 'max:255'],
            'foto_diri' => ['image', 'file', 'max:3072'],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        if ($request->file('foto_diri')) {
            $validatedData['foto_diri'] = $request->file('foto_diri')->store('foto-user');
        }

        User::create($validatedData);
        return redirect('/admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data = User::findOrfail($user->id);
        return view('admin.user.edit', compact(
            'data'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'nama_user' => ['required', 'max:255'],
            'alamat' => ['required', 'max:425'],
            'nik' => ['required', 'numeric'],
            'nomor_hp' => ['required', 'numeric'],
            'email' => ['required', 'email:dns'],
            'password' => ['required', 'min:8', 'max:255'],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::find($user->id)->update($validatedData);
        return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/admin/user');
    }
}
