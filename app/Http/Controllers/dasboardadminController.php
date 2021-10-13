<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class dasboardadminController extends Controller
{
    public function dashboardadmin()
    {
        return view('dashboardadmin');
    }

}
