<?php

namespace App\Http\Controllers;

use App\Models\DataMobil;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Wisata;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Romans\Filter\IntToRoman;


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
        $info = DB::table('transaksi')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.dashboard', [
            'reports' => $info,
            'datas' => DataMobil::paginate(5),
            'wisatas' => Wisata::paginate(5)
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
            "title" => "Pengaturan",
            'data' => User::where('id', auth()->user()->id)->get()
        ]);
    }

    public function edit($id)
    {
        return view('pages.ubahdata', [
            "title" => "Ubah Data",
            'data' => User::findOrfail($id)
        ]);
    }

    public function update(Request $request, User $user, $id)
    {
        $validatedData = $request->validate([
            'nama_user' => ['required', 'max:255'],
            'nama_lengkap' => ['required', 'max:255'],
            'alamat' => ['required', 'max:425'],
            'nomor_hp' => ['required', 'numeric'],
            'email' => ['required', 'email:dns'],
            'foto_diri' => ['image', 'file', 'max:3072'],
            'password' => ['required_with:passwordConf'],
            'passwordConf' => ['required', 'same:password'],
        ]);

        if ($request->file('foto_diri')) {
            $validatedData['foto_diri'] = $request->file('foto_diri')->store('foto_diri');
        }
        // if (Hash::check($validatedData['password'], $user->password)) {
        // }
        $validatedData['password'] = Hash::make($validatedData['password']);

        // $validatedData['password'] = Hash::make($validatedData['password']);
        // if (Hash::check('password', $user->password)) {
        //     // Success
        // }
        // $validatedData['password'] = Hash::check($request->password, $user['password']);

        User::find($id)->update($validatedData);
        return redirect()->route('pengaturan');
    }

    public function cetak($id)
    {
        // $num = 390;
        // foreach ($num as $inv) {
        //     $inv = 'arm' . ($num + 1);
        // }
        // dd($inv);
        $filter = new IntToRoman();
        $todayMonth = Carbon::now()->isoFormat('M');
        $today = Carbon::now()->isoFormat('D MMMM Y');
        // dd($todayMonth);
        return view('admin.laporan.receipt', [
            'invoice' => Transaksi::where('id', $id)->get(),
            'filter' => $filter->filter($todayMonth)
        ])->with([
            'today' => $today
        ]);
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
