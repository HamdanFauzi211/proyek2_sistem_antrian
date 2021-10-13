<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PanggilAntrianController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::all();
        return view('panggil-antrian.index', compact('pengguna'));
    }

    
    public function delete($id)
    {
        return "delete";
    }
}
