<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataBalita extends Model
{
    protected $table = 'data_balita';

    protected $fillable = [
        'nama_balita', 'nik', 'nama_orangtua', 'alamat_rt_rw', 'jenis_kelamin',
        'tanggal_timbang', 'tanggal_lahir', 'umur_bulan', 'berat_badan', 'tinggi_badan',
    ];
}
