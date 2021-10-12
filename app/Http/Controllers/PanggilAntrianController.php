<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanggilAntrianController extends Controller
{
    public function index()
    {
        return view('panggil-antrian.index');
    }
}
