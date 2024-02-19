<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    public $timestamps = false;
    protected $table = 'kriteria';
    protected $primaryKey = 'kdKriteria';
    protected $fillable = [
        'kriteria', 'sifat', 'bobot', 'detail',
    ];
    public function subkriteria()
    {
        return $this->hasMany(SubKriteria::class, 'kdKriteria', 'id'); // Adjust the column names as needed
    }

    public function getAll()
    {
        return $this->all();
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    public function insert($data)
    {
        return $this->create($data);
    }

    public function updateKriteria($id, $data)
    {
        $kriteria = $this->find($id);
        if ($kriteria) {
            return $kriteria->update($data);
        }
        return false;
    }

    public function deleteById($id)
    {
        return $this->where('kdKriteria', $id)->delete();
    }

    public function getLastID()
    {
        return $this->select('kdKriteria')->orderBy('kdKriteria', 'desc')->first();
    }

    public function getBobotKriteria()
    {
        return $this->select('kriteria', 'bobot')->get();
    }
}
