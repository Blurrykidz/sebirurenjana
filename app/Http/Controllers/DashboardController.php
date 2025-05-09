<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $nama        = auth()->user()->name;

        return view('back.dashboard',[
            "nama"   => $nama,
            'level' => auth()->user()->level,
            'title' => "Dashboard"
        ]);
    }
}
