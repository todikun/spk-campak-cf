<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Gejala, Penyakit};

class DashboardController extends Controller
{
    public function index()
    {
        $gejala = Gejala::get()->count();
        $penyakit = Penyakit::get()->count();
        return view('pages.index', compact('gejala', 'penyakit'));
    }
}
