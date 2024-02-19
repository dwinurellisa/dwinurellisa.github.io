<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    protected $table = 'balita';
    protected $primaryKey = 'kdbalita'; // Ganti 'kdbalita' dengan nama kolom kunci utama yang sesuai
    public $timestamps = false;

    protected $fillable = ['balita', 'id_role'];

    public function getBalitasByRoleId($role_id)
    {
        return $this->where('id_role', $role_id)->get();
    }
    public function Nilai()
    {
        return $this->hasOne(Nilai::class, 'kdbalita', 'kdbalita');
    }
    public function getAllBalitas()
    {
        return $this->all();
    }

    public function getNilaiByBalita($id)
    {
        return $this->select('balita.kdbalita', 'balita.balita', 'kriteria.kdKriteria', 'nilai')
                    ->join('nilai', 'balita.kdbalita', '=', 'nilai.kdbalita')
                    ->join('kriteria', 'kriteria.kdKriteria', '=', 'nilai.kdKriteria')
                    ->where('balita.kdbalita', $id)
                    ->get();
    }

    public function insertBalita($data)
    {
        return $this->create($data);
    }

    public function updateBalita($id, $data)
    {
        return $this->where('kdbalita', $id)->update($data);
    }

    public function deleteBalita($id)
    {
        return $this->where('kdbalita', $id)->delete();
    }

    public function getBalitasSelect($role_id)
    {
        return $this->where('id_role', $role_id)->get();
    }

    public function getLastBalitaID()
    {
        return $this->select('kdbalita')->orderBy('kdbalita', 'DESC')->first();
    }
}
