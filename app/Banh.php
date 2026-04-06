<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banh extends Model
{
   protected $table='tbl_banh';
   protected $fillable = ['MaLoai',
			'TenBanh',
			'HinhAnh',
			'NoiDung',
			'GiaTien',
			'SoLuong',
			'NgaySX',
			'KhuyenMai'];
			public $timestamps = false;
   
}
