<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;
use App\Models\dataBalita;
use App\Models\Role;
use App\Models\Kriteria;
use App\Models\Nilai;

class RangkingController extends Controller
{

    public function index()
    {
        $balita = Balita::all();
        $roles = Role::all();
        $kriteria = Kriteria::all();
        $nilai = Nilai::all();

        $output = [];

        // Get the maximum values for each kdKriteria
        $maxNilaiByKriteria = $nilai->groupBy('kdKriteria')->map(function ($grouped) {
            return $grouped->max('nilai');
        });

        // Loop to collect values for each balita
        foreach ($balita as $b) {
            $kdbalita = $b->kdbalita;
            $namaBalita = $b->balita;

            // Get values for the specific balita and convert to an array
            $nilaiBalita = $nilai->where('kdbalita', $kdbalita)->toArray();

            // Normalize the values based on the maximum value for each kdKriteria
            $normalizedNilai = array_map(function ($nilaiItem) use ($kriteria, $maxNilaiByKriteria) {
                $matchingKriteria = $kriteria->where('kdKriteria', $nilaiItem['kdKriteria'])->first();

                if ($matchingKriteria) {
                    $kdKriteria = $matchingKriteria->kdKriteria;

                    // Normalize the value using the corresponding max value for this kdKriteria
                    $maxValueForKriteria = $maxNilaiByKriteria->get($kdKriteria);
                    if ($maxValueForKriteria) {
                        $normalizedValue = $nilaiItem['nilai'] / $maxValueForKriteria;
                    } 

                    $nilaiItem['bobot'] = $matchingKriteria->bobot;
                    $nilaiItem['kriteria'] = $matchingKriteria->kriteria;
                    $nilaiItem['normalized'] = $normalizedValue;
                    $nilaiItem['nilaimaximum'] = $maxValueForKriteria;
                    $nilaiItem['nilai_preferensi'] = $normalizedValue * $nilaiItem['bobot'];
                }
                return $nilaiItem;
            }, $nilaiBalita);

            // Calculate the total preferensi for this balita
            $totalPreferensi = array_sum(array_column($normalizedNilai, 'nilai_preferensi'));
            if ($totalPreferensi > 90) {
                $kategoriGizi = 'Gizi Baik';
            } elseif ($totalPreferensi >= 81 && $totalPreferensi <= 90) {
                $kategoriGizi = 'Gizi Sedang';
            } elseif ($totalPreferensi >= 71 && $totalPreferensi <= 80) {
                $kategoriGizi = 'Gizi Kurang';
            } else {
                $kategoriGizi = 'Gizi Buruk';
            }

            $tanggal_timbang = dataBalita::where('nama_balita', $namaBalita)->value('tanggal_timbang');
            $berat_badan = dataBalita::where('nama_balita', $namaBalita)->value('berat_badan');
            $tinggi_badan = dataBalita::where('nama_balita', $namaBalita)->value('tinggi_badan');
            $output[] = [
                'kdbalita' => $kdbalita,
                'nama_balita' => $namaBalita,
                'nilai' => $nilaiBalita,
                'berat_badan' => $berat_badan,
                'tinggi_badan' => $tinggi_badan,
                'tanggal_timbang'=> $tanggal_timbang,
                'normalized_nilai' => $normalizedNilai,
                'total_preferensi' => $totalPreferensi,
                'kategori_gizi' => $kategoriGizi,
            ];
        }

        // dd($output);

        return view('pages.data_penilaian.index', [
            'output' => $output,
        ]);
    }
}
