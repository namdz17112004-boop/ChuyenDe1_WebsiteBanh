<?php

namespace App\Imports;

use App\Banh;
use Maatwebsite\Excel\Concerns\ToModel;

class BanhImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Banh([
            'MaLoai'=>$row[1],
			'TenBanh'=>$row[2],
			'HinhAnh'=>$row[3],
			'NoiDung'=>$row[4],
			'GiaTien'=>$row[5],
			'SoLuong'=>$row[6],
			'NgaySX'=>$row[7],
			'KhuyenMai'=>$row[8],
        ]);
    }
}
