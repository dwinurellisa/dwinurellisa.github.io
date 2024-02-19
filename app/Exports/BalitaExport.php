<?php

namespace App\Exports;

use App\Models\Balita;
use Maatwebsite\Excel\Concerns\FromCollection;

class BalitaExport implements FromCollection
{
    public function collection()
    {
        return Balita::all();
    }
}
