<?php

namespace App\Http\Controllers;

use App\Models\DataMobil;
use App\Models\Transaksi;
use App\Models\Wisata;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = DB::table('transaksi')->latest();

        if (request('search')) {
            $laporan->where('user_nama', 'like', "%" . request('search') . "%")
                ->orwhere('mobil_nama', 'like', "%" . request('search') . "%")
                ->orWhere('mobil_nomor', 'like', "%" . request('search') . "%");
        }
        // $laporan = DB::table('transaksi')->orderBy('created_at', 'desc');
        return view('admin.laporan.index', [
            "title" => "Laporan",
            'reports' => $laporan->paginate(10)
        ]);
    }

    public function cetakform()
    {
        return view('admin.laporan.cetak');
    }

    public function print(Request $request)
    {
        $awal = $request->tglawal;
        $akhir = $request->tglakhir;
        // $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $laporan = Transaksi::whereBetween('created_at', [$request->tglawal, $request->tglakhir])->get();
        // dd($laporan);

        return view('admin.laporan.receipt-all', [
            'laporan' => $laporan,
            'awal' => $awal,
            'akhir' => $akhir
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function search(Request $request)
    {
        // $keyword = $request->search;
        // $reports = Transaksi::where('user_nama', 'like', "%" . $keyword . "%")
        //     ->orwhere('mobil_nama', 'like', "%" . $keyword . "%")
        //     ->orWhere('mobil_nomor', 'like', "%" . $keyword . "%")
        //     ->get();
        // return view('admin.laporan.index', compact('reports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.laporan.show', [
            "title" => "Detail Laporan",
            'laporan' => Transaksi::findOrfail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $Transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.laporan.edit', [
            "title" => "Ubah Laporan",
            'data' => Transaksi::findOrfail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $Transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, DataMobil $mobil)
    {

        $mobil = DataMobil::find($request->mobil_id);
        if ($request->status == "Progress") {
            $mobil->status = "terpakai";
        } else {
            $mobil->status = "tersedia";
        }
        $mobil->save();

        $update = Transaksi::findOrFail($id);
        $update->update([
            'status' => $request->status
        ]);
        return redirect('/admin/laporan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $Transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi, $id)
    {
        if ($transaksi->foto) {
            Storage::delete($transaksi->foto);
        }
        Transaksi::destroy($id);
        return redirect('/admin/laporan');
    }
}
