<?php

namespace App\Http\Controllers;

use App\Models\DataMobil;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $data = DataMobil::all();
        return view('pages.home', [
            "title" => "Beranda"
        ])->with([
            'data' => $data
        ]);
    }

    public function wisata()
    {
        return view('pages.wisata', [
            "title" => "Wisata"
        ]);
    }

    public function ulasan()
    {
        return view('pages.contact', [
            "title" => "Ulasan"
        ]);
    }

    public function admin()
    {
        return view('admin.index');
    }

    public function laporan()
    {
        return view('admin.laporan');
    }
}
