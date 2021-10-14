<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function landingpage()
    {
        return view('landingpage');
    }

    public function lihatantrian()
    {
        $pengguna = Pengguna::all();
        return view('lihatantrian', compact('pengguna'));
    }
    public function tampil()
    {
        // $pengguna = Pengguna::where('id')->first();
        $pengguna = Pengguna::all();
        return view('homeuser', compact('pengguna'));
    }
}