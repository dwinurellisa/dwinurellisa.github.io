<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\balitamodel;
use DataTables;


class MstBalitaController extends Controller
{
    public function index() {
        $gizi = balitamodel::all();
        return view('pages.mst_balita.index', compact('gizi'));
       

    function create() {
        return view('pages.mst_balita.form');
    }
}
}
