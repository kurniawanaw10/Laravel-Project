<?php

namespace App\Http\Controllers;

use App\Models\DataMobil;
use App\Models\Wisata;
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
        return view('admin.dashboard');
    }

    public function wisata()
    {
        return view('admin.wisata.post', [
            "title" => "Wisata"
        ]);
    }
}
