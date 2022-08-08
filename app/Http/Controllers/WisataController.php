<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.wisata.index', [
            "title" => "Wisata",
            'wisatas' => Wisata::all()
        ]);
    }

    public function post()
    {
        $datas = Wisata::all();
        return view('admin.wisata.post', [
            "title" => "Wisata"
        ])
            ->with(['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wisata.create');
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
            'judul' => ['required', 'max:255'],
            'deskripsi' => ['required'],
            'foto' => ['image', 'file', 'max:3072'],
        ]);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->deskripsi), 150,);

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('foto-wisata');
        }

        Wisata::create($validatedData,);

        return redirect('/admin/wisata');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.wisata.show', [
            "title" => "Wisata",
            'wisata' => Wisata::findOrfail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.wisata.edit', [
            'ubah' => Wisata::findOrfail($id)
        ]);
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
        $validatedData = $request->validate([
            'judul' => ['required', 'max:255'],
            'deskripsi' => ['required'],
            'foto' => ['image', 'file', 'max:3072']
        ]);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->deskripsi), 150,);

        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $validatedData['foto'] = $request->file('foto')->store('foto-wisata');
        }

        Wisata::where('id', $id)->update($validatedData);

        return redirect('/admin/wisata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wisata $wisata, $id)
    {
        if ($wisata->foto) {
            Storage::delete($wisata->foto);
        }
        Wisata::destroy($id);
        return redirect('/admin/wisata');
    }
}
