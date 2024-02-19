<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use Illuminate\Http\Request;
use App\Models\dataBalita;
use App\Models\Nilai;

class DataBalitaController extends Controller
{
    public function index()
    {
        $balitas = dataBalita::all();
        return view('pages.data_lengkap.index', compact('balitas'));
    }

    public function create()
    {
        return view('pages.data_lengkap.form');
    }
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'nama_balita' => 'required|string',
            'nik' => 'required|string',
            'nama_orangtua' => 'required|string',
            'alamat_rt_rw' => 'required|string',
            'jenis_kelamin' => 'required|in:1,2',
            'tanggal_timbang' => 'required|date',
            'tanggal_lahir' => 'required|date',
            'umur_bulan' => 'required|integer',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
        ]);
        $berat_badan = $request->berat_badan;
        $tinggi_badan = $request->tinggi_badan;
        $umur_bulan = $request->umur_bulan;

        $balita = Balita::create([
            'balita' => $request->nama_balita,
            'id_role' => $request->jenis_kelamin,
        ]);

        //Laki - laki
        if ($request->jenis_kelamin == 1) {
            if ($umur_bulan >= 0 && $umur_bulan <= 12) {
                if ($berat_badan < 2.1) {
                    $C1laki = 1;
                } elseif ($berat_badan < 2.5) {
                    $C1laki = 2;
                } elseif ($berat_badan <= 10.8) {
                    $C1laki = 3;
                } else {
                    $C1laki = 4;
                }
            } else if ($umur_bulan >= 13 && $umur_bulan <= 24) {
                if ($berat_badan < 7.1) {
                    $C1laki = 1;
                } elseif ($berat_badan < 7.9) {
                    $C1laki = 2;
                } elseif ($berat_badan <= 13.6) {
                    $C1laki = 3;
                } else {
                    $C1laki = 4;
                }
            } else if ($umur_bulan >= 25 && $umur_bulan <= 36) {
                if ($berat_badan < 8.8) {
                    $C1laki = 1;
                } elseif ($berat_badan < 9.8) {
                    $C1laki = 2;
                } elseif ($berat_badan <= 16.2) {
                    $C1laki = 3;
                } else {
                    $C1laki = 4;
                }
            } else if ($umur_bulan >= 37 && $umur_bulan <= 48) {
                if ($berat_badan < 10.1) {
                    $C1laki = 1;
                } elseif ($berat_badan < 11.4) {
                    $C1laki = 2;
                } elseif ($berat_badan <= 18.6) {
                    $C1laki = 3;
                } else {
                    $C1laki = 4;
                }
            } else if ($umur_bulan >= 49 && $umur_bulan <= 60) {
                if ($berat_badan < 11.3) {
                    $C1laki = 1;
                } elseif ($berat_badan < 12.8) {
                    $C1laki = 2;
                } elseif ($berat_badan <= 21.0) {
                    $C1laki = 3;
                } else {
                    $C1laki = 4;
                }
            }
            if ($umur_bulan >= 0 && $umur_bulan <= 12) {
                if ($tinggi_badan < 44.2) {
                    $C2laki = 1;
                } elseif ($tinggi_badan < 46.1) {
                    $C2laki = 2;
                } elseif ($tinggi_badan <= 82.9) {
                    $C2laki = 3;
                } else {
                    $C2laki = 4;
                }
            } else if ($umur_bulan >= 13 && $umur_bulan <= 24) {
                if ($tinggi_badan < 69.6) {
                    $C2laki = 1;
                } elseif ($tinggi_badan < 72.1) {
                    $C2laki = 2;
                } elseif ($tinggi_badan <= 97.0) {
                    $C2laki = 3;
                } else {
                    $C2laki = 4;
                }
            } else if ($umur_bulan >= 25 && $umur_bulan <= 36) {
                if ($tinggi_badan < 78.6) {
                    $C2laki = 1;
                } elseif ($tinggi_badan < 81.7) {
                    $C2laki = 2;
                } elseif ($tinggi_badan <= 107.2) {
                    $C2laki = 3;
                } else {
                    $C2laki = 4;
                }
            } else if ($umur_bulan >= 37 && $umur_bulan <= 48) {
                if ($tinggi_badan < 85.5) {
                    $C2laki = 1;
                } elseif ($tinggi_badan < 89.2) {
                    $C2laki = 2;
                } elseif ($tinggi_badan <= 115.9) {
                    $C2laki = 3;
                } else {
                    $C2laki = 4;
                }
            } else if ($umur_bulan >= 49 && $umur_bulan <= 60) {
                if ($tinggi_badan < 91.2) {
                    $C2laki = 1;
                } elseif ($tinggi_badan < 95.4) {
                    $C2laki = 2;
                } elseif ($tinggi_badan <= 123.9) {
                    $C2laki = 3;
                } else {
                    $C2laki = 4;
                }
            }
            Nilai::create([
                'kdbalita' => $balita->kdbalita,
                'kdKriteria' => 1,
                'nilai' => $C1laki,
            ]);
            Nilai::create([
                'kdbalita' => $balita->kdbalita,
                'kdKriteria' => 2,
                'nilai' => $C2laki,
            ]);
        } elseif ($request->jenis_kelamin == 2) {
            if ($umur_bulan >= 0 && $umur_bulan <= 12) {
                if ($berat_badan < 2) {
                    $C1perempuan = 1;
                } elseif ($berat_badan < 2.4) {
                    $C1perempuan = 2;
                } elseif ($berat_badan <= 10.1) {
                    $C1perempuan = 3;
                } else {
                    $C1perempuan = 4;
                }
            } else if ($umur_bulan >= 13 && $umur_bulan <= 24) {
                if ($berat_badan < 6.4) {
                    $C1perempuan = 1;
                } elseif ($berat_badan < 7.2) {
                    $C1perempuan = 2;
                } elseif ($berat_badan <= 13.0) {
                    $C1perempuan = 3;
                } else {
                    $C1perempuan = 4;
                }
            } else if ($umur_bulan >= 25 && $umur_bulan <= 36) {
                if ($berat_badan < 8.2) {
                    $C1perempuan = 1;
                } elseif ($berat_badan < 9.2) {
                    $C1perempuan = 2;
                } elseif ($berat_badan <= 15.8) {
                    $C1perempuan = 3;
                } else {
                    $C1perempuan = 4;
                }
            } else if ($umur_bulan >= 37 && $umur_bulan <= 48) {
                if ($berat_badan < 9.7) {
                    $C1perempuan = 1;
                } elseif ($berat_badan < 10.9) {
                    $C1perempuan = 2;
                } elseif ($berat_badan <= 18.5) {
                    $C1perempuan = 3;
                } else {
                    $C1perempuan = 4;
                }
            } else if ($umur_bulan >= 49 && $umur_bulan <= 60) {
                if ($berat_badan < 11) {
                    $C1perempuan = 1;
                } elseif ($berat_badan < 12.4) {
                    $C1perempuan = 2;
                } elseif ($berat_badan <= 21.2) {
                    $C1perempuan = 3;
                } else {
                    $C1perempuan = 4;
                }
            }
            if ($umur_bulan >= 0 && $umur_bulan <= 12) {
                if ($tinggi_badan < 43.6) {
                    $C2perempuan = 1;
                } elseif ($tinggi_badan < 45.4) {
                    $C2perempuan = 2;
                } elseif ($tinggi_badan <= 81.7) {
                    $C2perempuan = 3;
                } else {
                    $C2perempuan = 4;
                }
            } else if ($umur_bulan >= 13 && $umur_bulan <= 24) {
                if ($tinggi_badan < 67.3) {
                    $C2perempuan = 1;
                } elseif ($tinggi_badan < 70) {
                    $C2perempuan = 2;
                } elseif ($tinggi_badan <= 96.1) {
                    $C2perempuan = 3;
                } else {
                    $C2lC2perempuanaki = 4;
                }
            } else if ($umur_bulan >= 25 && $umur_bulan <= 36) {
                if ($tinggi_badan < 76.8) {
                    $C2perempuan = 1;
                } elseif ($tinggi_badan < 80) {
                    $C2perempuan = 2;
                } elseif ($tinggi_badan <= 106.5) {
                    $C2perempuan = 3;
                } else {
                    $C2perempuan = 4;
                }
            } else if ($umur_bulan >= 37 && $umur_bulan <= 48) {
                if ($tinggi_badan < 84.2) {
                    $C2perempuan = 1;
                } elseif ($tinggi_badan < 88) {
                    $C2perempuan = 2;
                } elseif ($tinggi_badan <= 115.7) {
                    $C2perempuan = 3;
                } else {
                    $C2perempuan = 4;
                }
            } else if ($umur_bulan >= 49 && $umur_bulan <= 60) {
                if ($tinggi_badan < 90.3) {
                    $C2perempuan = 1;
                } elseif ($tinggi_badan < 94.6) {
                    $C2perempuan = 2;
                } elseif ($tinggi_badan <= 123.7) {
                    $C2perempuan = 3;
                } else {
                    $C2perempuan = 4;
                }
            }
            Nilai::create([
                'kdbalita' => $balita->kdbalita,
                'kdKriteria' => 1,
                'nilai' => $C1perempuan,
            ]);
            Nilai::create([
                'kdbalita' => $balita->kdbalita,
                'kdKriteria' => 2,
                'nilai' => $C2perempuan,
            ]);
        }

        // Simpan data balita ke dalam database
        dataBalita::create($validatedData);

        // Redirect ke halaman index atau halaman lain sesuai kebutuhan
        return redirect()->route('data-lengkap')->with('success', 'Balita telah ditambahkan.');
    }
    public function destroy($id)
    {
        // Cari data balita berdasarkan ID
        $balita = dataBalita::find($id);
        if (!$balita) {
            return redirect()->route('data-lengkap')->with('error', 'Balita tidak ditemukan.');
        }

        // Dapatkan nama balita
        $namaBalita = $balita->nama_balita;

        // Hapus data balita dari tabel dataBalita
        $balita->delete();

        // Dapatkan kdbalita berdasarkan nama balita dari tabel Balita
        $kdbalita = Balita::where('balita', $namaBalita)->value('kdbalita');

        // Hapus data nilai berdasarkan kdbalita dari tabel Nilai
        Nilai::where('kdbalita', $kdbalita)->delete();
        // Hapus data balita dari tabel Balita jika nama_balita cocok
        Balita::where('balita', $namaBalita)->delete();


        // Redirect ke halaman index atau halaman lain sesuai kebutuhan
        return redirect()->route('data-lengkap')->with('success', 'Balita ' . $namaBalita . ' telah dihapus.');
    }
}
