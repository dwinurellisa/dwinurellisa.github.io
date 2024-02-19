<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id'; // Ganti 'id' dengan nama kolom kunci utama yang sesuai
    public $timestamps = false;

    protected $fillable = ['kdbalita', 'kdKriteria', 'nilai'];

    public function getPlayerNilai()
    {
        return $this->select('kdbalita', 'kdKriteria', 'nilai')
                    ->join('balita', 'balita.kdbalita', '=', 'nilai.kdbalita')
                    ->join('kriteria', 'kriteria.kdKriteria', '=', 'nilai.kdKriteria')
                    ->get();
    }

    public function getNilaiByPlayer($id)
    {
        return $this->select('nilai.kdbalita', 'balita', 'nilai.kdKriteria', 'nilai')
                    ->join('balita', 'balita.kdbalita', '=', 'nilai.kdbalita')
                    ->join('kriteria', 'kriteria.kdKriteria', '=', 'nilai.kdKriteria')
                    ->where('nilai.kdbalita', $id)
                    ->groupBy('nilai.kdbalita', 'balita', 'nilai.kdKriteria', 'nilai')
                    ->get();
    }

    public function updateNilai()
    {
        return $this->where('kdbalita', $this->kdbalita)
                    ->where('kdKriteria', $this->kdKriteria)
                    ->update(['nilai' => $this->nilai]);
    }

    public function deleteNilai($id)
    {
        return $this->where('kdbalita', $id)->delete();
    }
}
