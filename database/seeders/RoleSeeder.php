<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert data into role table
        DB::table('role')->insert([
            ['nama' => 'laki-laki'],
            ['nama' => 'perempuan'],
        ]);
    }
}
