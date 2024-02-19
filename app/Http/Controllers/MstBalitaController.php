<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;
use App\Models\dataBalita;
use App\Models\Nilai;
use App\Models\Role;
use App\Models\Kriteria;
use App\Models\SubKriteria;

class MstBalitaController extends Controller
{
    public function index()
    {
        $balita = Balita::all();
        $roles = Role::all();
        $kriteria = Kriteria::all();
        return view('pages.mst_balita.index', compact('balita', 'roles'));
    }

    public function create($id = null)
    {
        $dataView = $this->getDataInsert();
        $roles = Role::all();
        $roleData = [];
        $nilaiBalita = []; // Initialize $nilaiBalita as an empty array

        if ($id !== null) {
            $balita = Balita::find($id);
            $nilaiBalita = Nilai::where('kdbalita', $id)->get();
            $roleData = $balita->role;
        }
        // dd($dataView);
        return view('pages.mst_balita.form', compact('dataView', 'roles', 'roleData', 'nilaiBalita'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_balita' => 'required', // Corrected field name
            'jenis_kelamin' => 'required', // Corrected field name
            'nilai' => 'required',
        ]);

        $balita = Balita::create([
            'balita' => $request->nama_balita, // Corrected field name
            'id_role' => $request->jenis_kelamin, // Corrected field name
        ]);

        foreach ($request->nilai as $item => $value) {
            Nilai::create([
                'kdbalita' => $balita->kdbalita, // Adjust to the actual primary key column name
                'kdKriteria' => $item,
                'nilai' => $value,
            ]);
        }

        return redirect()->route('balita.index')->with('success', 'Data balita berhasil ditambahkan.');
    }


    public function edit($id)
    {
        // Fetch the "balita" with the given $id
        $balita = Balita::findOrFail($id);

        // Fetch the "nilai" values associated with the "balita"
        $nilai = Nilai::where('kdbalita', $id)->get();

        // Fetch data from the "dataBalita" model based on "nama_balita"
        $data_balita = dataBalita::where('nama_balita', $balita->balita)->first();
        // dd($data_balita);
        // Fetch data to populate dataView
        $dataView = $this->getDataInsert();

        return view('pages.mst_balita.edit', compact('balita', 'dataView', 'nilai', 'data_balita'));
    }





    public function update(Request $request, $id)
    {
        $request->validate([
            'balita' => 'required',
            'role' => 'required',
            'nilai' => 'required',
        ]);

        $balita = Balita::find($id);
        $balita->update([
            'balita' => $request->balita,
            'role' => $request->role,
        ]);

        Nilai::where('kdbalita', $id)->delete();

        foreach ($request->nilai as $item => $value) {
            Nilai::create([
                'kdbalita' => $balita->id,
                'kdKriteria' => $item,
                'nilai' => $value,
            ]);
        }

        return redirect()->route('balita.index')->with('success', 'Data balita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Nilai::where('kdbalita', $id)->delete();
        Balita::find($id)->delete();

        return redirect()->route('balita.index')->with('success', 'Data balita berhasil dihapus.');
    }

    private function getDataInsert()
    {
        $dataView = [];
        $kriteria = Kriteria::all();

        // Assuming you have an instance of the SubKriteria model
        $subKriteriaModel = new SubKriteria();

        foreach ($kriteria as $item) {
            $subKriteriaData = $subKriteriaModel->getById($item->kdKriteria);

            $dataView[$item->kdKriteria] = [
                'nama' => $item->kriteria,
                'detail' => $item->detail,
                'data' => $subKriteriaData,
            ];
        }

        return $dataView;
    }
}
