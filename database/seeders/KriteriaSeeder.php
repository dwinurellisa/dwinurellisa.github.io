<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert data into kriteria table
        DB::table('kriteria')->insert([
            [
                'kriteria' => 'C1',
                'sifat' => 'B',
                'bobot' => 50,
                'detail' => 'Berat Badan',
            ],
            [
                'kriteria' => 'C2',
                'sifat' => 'B',
                'bobot' => 50,
                'detail' => 'Tinggi Badan',
            ],
        ]);
    }
}
