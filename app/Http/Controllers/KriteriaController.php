<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('pages.data_kriteria.index', compact('kriteria'));
    }

    public function create()
    {
        return view('pages.data_kriteria.form');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'kode_kriteria' => 'required',
            'sifat' => 'required',
            'nama_kriteria' => 'required',
            'bobot_kriteria' => 'required|numeric',
            'itemKriteria1' => 'required',
            'itemKriteria2' => 'required',
            'itemKriteria3' => 'required',
            'itemKriteria4' => 'required',
        ]);

        // Create a new Kriteria instance and save it
        $kriteria = Kriteria::create([
            'kriteria' => $request->kode_kriteria,
            'sifat' => $request->sifat,
            'detail' => $request->nama_kriteria,
            'bobot' => $request->bobot_kriteria,
        ]);

        // Get the ID of the newly created Kriteria
        $kdKriteria = DB::getPdo()->lastInsertId();

        // Create SubKriteria instances and save them
        $items = [
            $request->itemKriteria1,
            $request->itemKriteria2,
            $request->itemKriteria3,
            $request->itemKriteria4,
        ];

        for ($i = 1; $i <= 4; $i++) {
            SubKriteria::create([
                'kdKriteria' => $kdKriteria,
                'subKriteria' => $items[$i - 1],
                'value' => $i,
            ]);
        }

        return redirect()->route('data_kriteria')->with('success', 'Data kriteria berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);

        // Create an instance of the SubKriteria model
        $subKriteriaModel = new SubKriteria;

        // Retrieve subkriteria based on kdKriteria
        $subkriteria = $subKriteriaModel->getSubKriteriaByKdKriteria($kriteria->kdKriteria);

        return view('pages.data_kriteria.edit', compact('kriteria', 'subkriteria', 'id'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kriteria' => 'required',
            'sifat' => 'required',
            'nama_kriteria' => 'required',
            'bobot_kriteria' => 'required|numeric',
            'itemKriteria.*' => 'required', // Validate all itemKriteria fields.
        ]);

        $kriteria = Kriteria::findOrFail($id);

        $kriteria->update([
            'kriteria' => $request->kode_kriteria,
            'sifat' => $request->sifat,
            'detail' => $request->nama_kriteria,
            'bobot' => $request->bobot_kriteria,
        ]);

        SubKriteria::where('kdKriteria', $id)->delete();
        $items = $request->itemKriteria;

        for ($i = 0; $i < count($items); $i++) {
            SubKriteria::create([
                'kdKriteria' => $id,
                'subKriteria' => $items[$i],
                'value' => $i + 1,
            ]);
        }

        return redirect()->route('data_kriteria')->with('success', 'Data kriteria berhasil diperbarui.');
    }

    public function destroy($kdKriteria)
    {
        $kriteria = Kriteria::find($kdKriteria);    

        // Delete associated SubKriteria records based on kdKriteria
        SubKriteria::where('kdKriteria', $kdKriteria)->delete();

        // Delete the main Kriteria
        $kriteria->delete();

        if (!$kriteria) {
            return redirect()->route('data_kriteria')->with('error', 'Kriteria tidak ditemukan.');
        }

        return redirect()->route('data_kriteria')->with('success', 'SubKriteria dan Kriteria berhasil dihapus berdasarkan ID Kriteria.');
    }
}
