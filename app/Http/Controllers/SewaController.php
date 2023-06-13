<?php

namespace App\Http\Controllers;

use App\Models\DataMobil;
use App\Models\Transaksi;
use Alert;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mobil = DataMobil::all();
        // if ($request->tgl_kembali < $request->tgl_pinjam) {
        //     return back();
        // }

        return view('rental.index', [
            "title" => "Rental Order",
            'mobil' => DataMobil::all()
        ]);
    }

    public function pick(Request $request)
    {
        $checkTrans = Transaksi::whereBetween('tgl_pinjam', [$request->tgl_pinjam, $request->tgl_kembali])
            ->orwhereBetween('tgl_kembali', [$request->tgl_pinjam, $request->tgl_kembali])
            ->get();
        $mobil_id_terpakai = [];
        foreach ($checkTrans as $c) {
            $mobil_id_terpakai[] = $c->mobil_id;
        }

        return view('rental.pick', [
            "title" => "Pilih Mobil",
            "tgl_pinjam" => $request->tgl_pinjam,
            "tgl_kembali" => $request->tgl_kembali,
            "driver" => $request->driver,
            "pembayaran" => $request->pembayaran,
            "jaminan" => $request->jaminan,
            "mobil" => DataMobil::whereNotIn('id', $mobil_id_terpakai)->get()
            // "datas" => DataMobil::where([
            //     ['status', 'tersedia']
            // ])->get()
        ]);

        // dd($mobil_id_terpakai);

        // if ($checkTrans) {
        //     return view('rental.index', [
        //         "title" => "Rental Order",
        //         'mobil' => $mobil
        //     ]);
        // } else {
        //     return view('rental.pick', [
        //         "title" => "Pilih Mobil",
        //         "tgl_pinjam" => $request->tgl_pinjam,
        //         "tgl_kembali" => $request->tgl_kembali,
        //         "driver" => $request->driver,
        //         "pembayaran" => $request->pembayaran,
        //         "jaminan" => $request->jaminan,
        //         "mobil" => DataMobil::where('status', 'tersedia')->get()
        //         // "datas" => DataMobil::where([
        //         //     ['status', 'tersedia']
        //         // ])->get()
        //     ]);
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(DataMobil $mobil)
    {
        //     return view('rental.edit', [
        //         "title" => "Rental Order",
        //         "data" => $mobil
        //     ]);
    }

    public function post(Request $request, DataMobil $mobil)
    {
        $tgl_pinjam = strtotime($request->tgl_pinjam);
        $tgl_kembali = strtotime($request->tgl_kembali);
        $hari = (($tgl_kembali - $tgl_pinjam) + 86400) / 86400;

        if ($request->driver == "on") {
            $biaya = ($mobil->harga * $hari) + (100000 * $hari);
        } else {
            $biaya = $mobil->harga * $hari;
        }

        // dd($biaya);
        return view('rental.post', [
            "title"         => "Order Kendaraan",
            'tgl_pinjam'    => $request->tgl_pinjam,
            'tgl_kembali'   => $request->tgl_kembali,
            'driver'        => $request->driver == 'on' ? 'on' : 'off',
            'pembayaran'    => $request->pembayaran,
            'jaminan'       => $request->jaminan,
            "hari"          => $hari,
            "biaya"         => $biaya,
            'mobil'         => $mobil,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DataMobil $mobil)
    {
        $request->validate([
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'driver' => 'required|in:on,off',
            'jaminan' => 'required|in:KTP,Kartu Keluarga,Kartu BPJS',
            'pembayaran' => 'required|in:M-Banking,Cash,Transfer'
        ]);

        $str_tgl_kembali = strtotime($request->tgl_kembali);
        $str_tgl_pinjam  = strtotime($request->tgl_pinjam);


        // Hitung Biaya
        $hari  = (($str_tgl_kembali - $str_tgl_pinjam) + 86400) / 86400;
        $biaya = $request->driver == 'on' ? ($mobil->harga * $hari) + (100000 * $hari) : $mobil->harga * $hari;
        $sopir = $request->driver;
        if ($request->driver == 'on') {
            $sopir = "YES";
        } else {
            $sopir = "NO";
        }

        // $checkTrans = Transaksi::where('mobil_id', $mobil->id)
        //     ->orWhereBetween('tgl_pinjam', [$request->tgl_pinjam, $request->tgl_kembali])
        //     ->orWhereBetween('tgl_kembali', [$request->tgl_pinjam, $request->tgl_kembali])
        //     ->first();
        // dd($checkTrans);

        // dd($checkTrans);

        // if ($checkTrans) {
        //     dd('SUDAH TERPINJAM');
        //     // return redirect('rental/' . $mobil->id)->with('danger', 'hello');
        // } else {
        Transaksi::create([
            'mobil_id' => $mobil->id,
            'mobil_nama' => $mobil->nama_mobil,
            'mobil_nomor' => $mobil->plat_nomor,
            'user_id' => auth()->user()->id,
            'user_nama' => auth()->user()->nama_user,
            'user_nomor' => auth()->user()->nomor_hp,
            'driver' => $sopir,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'hari' => $hari,
            'harga' => $biaya,
            'jaminan' => $request->jaminan,
            'pembayaran' => $request->pembayaran
        ]);

        return redirect('/riwayat');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // $order = new Transaksi();
        // return view('rental.edit', [
        //     "title" => "Order Kendaraan",
        //     "data" => DataMobil::find($id)
        // ])->with([
        //     'order' => $order
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
