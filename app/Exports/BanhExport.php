<?php

namespace App\Exports;

use App\Banh;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class BanhExport implements FromCollection,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Banh::all();
    }
}
