<?php

namespace App\Http\Controllers;

use App\Models\DataMobil;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Wisata;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            "title" => "Beranda",
            'wisatas' => Wisata::latest()->get()
        ]);
    }

    public function admin()
    {
        return view('admin.dashboard', [
            'reports' => Transaksi::all(),
            'datas' => DataMobil::all(),
            'wisatas' => Wisata::all()
        ]);
    }

    public function wisata()
    {
        return view('admin.wisata.post', [
            "title" => "Wisata"
        ]);
    }

    public function riwayat()
    {
        return view('pages.index', [
            "title" => "Riwayat Pemesanan",
            'riwayat' => Transaksi::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function pengaturan()
    {
        return view('pages.pengaturan', [
            "title" => "Pengaturan"
        ]);
    }

    public function edit($id)
    {
        return view('pages.ubahdata', [
            "title" => "Ubah Data",
            'data' => User::findOrfail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_user' => ['required', 'max:255'],
            'nama_lengkap' => ['required', 'max:255'],
            'alamat' => ['required', 'max:425'],
            'jaminan' => ['required', 'max:225'],
            'nomor_hp' => ['required', 'numeric'],
            'email' => ['required', 'email:dns'],
        ]);

        // $validatedData['password'] = Hash::make($validatedData['password']);

        User::find($id)->update($validatedData);
        return redirect()->route('pengaturan');
    }

    public function cetak($id)
    {
        $today = Carbon::now()->isoFormat('D MMMM Y');
        return view('admin.laporan.receipt', [
            'invoice' => Transaksi::where('id', $id)->get()
        ])->with(['today' => $today]);
    }

    public function upload(Request $request, $id)
    {
        Transaksi::findOrFail($id);

        $validatedData = $request->validate(['bukti' => ['image', 'file', 'max:3072']]);

        if ($request->file('bukti')) {
            $validatedData['bukti'] = $request->file('bukti')->store('bukti');
        }

        Transaksi::where('id', $id)->update($validatedData);
        return redirect('/riwayat');
    }
}
