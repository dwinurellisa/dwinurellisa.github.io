<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\dataBalita;

class DashboardController extends Controller
{
    public function index()
    {
        $countdatanilaibalita = Balita::count();
        $countdataBalita = dataBalita::count();
        return view('pages.dashboard', compact('countdatanilaibalita', 'countdataBalita'));
    }
}
