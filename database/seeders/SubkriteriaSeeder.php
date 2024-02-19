<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert data into subkriteria table
        DB::table('subkriteria')->insert([
            [
                'subKriteria' => 'Sangat Kurang',
                'value' => 1,
                'kdKriteria' => 1, // Sesuaikan dengan kdKriteria dari tabel kriteria
            ],
            [
                'subKriteria' => 'Kurang',
                'value' => 2,
                'kdKriteria' => 1,
            ],
            [
                'subKriteria' => 'Normal',
                'value' => 3,
                'kdKriteria' => 1,
            ],
            [
                'subKriteria' => 'Lebih',
                'value' => 4,
                'kdKriteria' => 1,
            ],
            [
                'subKriteria' => 'Sangat Pendek',
                'value' => 1,
                'kdKriteria' => 2, // Sesuaikan dengan kdKriteria dari tabel kriteria
            ],
            [
                'subKriteria' => 'Pendek',
                'value' => 2,
                'kdKriteria' => 2,
            ],
            [
                'subKriteria' => 'Normal',
                'value' => 3,
                'kdKriteria' => 2,
            ],
            [
                'subKriteria' => 'Tinggi',
                'value' => 4,
                'kdKriteria' => 2,
            ],
        ]);
    }
}
