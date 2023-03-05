<?php

namespace App\Http\Controllers;

use App\Models\Category_harga;
use App\Models\DataMobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DataMobil::all();
        return view('admin.mobil.index')->with([
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
        $model = new DataMobil;
        return view('admin.mobil.create', compact(
            'model'
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
        $data = [
            'nama_mobil' => ['required', 'max:255'],
            'tahun_mobil' => ['required'],
            'seat_mobil' => ['required', 'numeric'],
            'plat_nomor' => ['required', 'max:10', 'min:4', 'unique:data_mobil'],
            // 'transmisi' => ['required'],
            // 'bahan_bakar' => ['required'],
            // 'harga' => ['required'],
            'foto_mobil' => ['image', 'file', 'max:3072'],
        ];

        $validatedData = $request->validate($data);

        if ($request->file('foto_mobil')) {
            $validatedData['foto_mobil'] = $request->file('foto_mobil')->store('foto-mobil');
        }

        DataMobil::create($validatedData);

        return redirect('/admin/mobil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $datas = DataMobil::findOrfail($id);
        // return view('mobil.show')->with([
        //     'datas' => $datas
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.mobil.edit', [
            'model' => DataMobil::findOrfail($id)
        ]);
    }

    public function ubahharga($id)
    {
        return view('admin.mobil.editharga', [
            'model' => DataMobil::findOrfail($id),
            'cat' => Category_harga::all()
        ]);
    }

    public function updateharga(Request $request, DataMobil $mobil)
    {
        // dd($request->harga);

        $request->validate([
            'deskripsi' => ['required'],
            'harga' => ['required', 'numeric']
        ]);

        Category_harga::create([
            'mobil_id' => $mobil->id,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga
        ]);

        return redirect()->route('edit-harga', [$mobil->id]);
    }

    public function hapus($id)
    {
        Category_harga::destroy($id);
        return redirect()->back();
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
        $rules = [
            'nama_mobil' => ['required', 'max:255'],
            'tahun_mobil' => ['required'],
            'seat_mobil' => ['required', 'numeric'],
            'plat_nomor' => ['required', 'max:10', 'min:4'],
            'foto_mobil' => ['image', 'file', 'max:3072']
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('foto_mobil')) {
            $validatedData['foto_mobil'] = $request->file('foto_mobil')->store('foto-mobil');
        }

        DataMobil::where('id', $id)->update($validatedData);

        return redirect('/admin/mobil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataMobil::destroy($id);
        return redirect('/admin/mobil');
    }
}
