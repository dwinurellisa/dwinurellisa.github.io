<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubKriteria extends Model
{
    protected $table = 'subkriteria';
    public $timestamps = false;

    protected $fillable = ['subKriteria', 'value', 'kdKriteria'];

    public function getAll()
    {
        return DB::table($this->table)->get()->all();
    }

    public function getById($kdKriteria)
    {
        return DB::table($this->table)->where('kdKriteria', $kdKriteria)->get()->all();
    }
    public function getSubKriteriaByKdKriteria($kdKriteria)
    {
        return $this->where('kdKriteria', $kdKriteria)->get();
    }
    public function insertData($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function updateData($kdSubKriteria, $data)
    {
        return DB::table($this->table)
            ->where('kdSubKriteria', $kdSubKriteria)
            ->update($data);
    }

    public function deleteData($kdKriteria)
    {
        return DB::table($this->table)
            ->where('kdKriteria', $kdKriteria)
            ->delete();
    }
}
