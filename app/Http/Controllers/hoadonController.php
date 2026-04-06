<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class hoadonController extends Controller
{
	public function xemhoadon()
	{
		Session::pull('kiemtrahang','co');
		$hoadon=DB::table('tbl_hoadon')->get();
		return view('hoadon.xemhoadon',['hoadon' => $hoadon]);
	}
	
    public function xemchitiethoadon($id)
	{
		Session::pull('kiemtrahang','co');
		$hoadon=DB::table('tbl_hoadon')->where('ID', '=',$id)->first();
		$chitiethoadon=DB::table('tbl_chitiethoadon')->join('tbl_banh','tbl_chitiethoadon.MaBanh','=','tbl_banh.ID')->where('tbl_chitiethoadon.ID', '=',$id)->select( DB::raw('tbl_chitiethoadon.SoLuong as SoLuong, TenBanh,HinhAnh,tbl_chitiethoadon.GiaTien as GiaTien') )->get();
		return view('hoadon.xemchitiethoadon',['hoadon' => $hoadon,'chitiet'=>$chitiethoadon]);
	}
	 public function inhoadon($id)
	{
		Session::pull('kiemtrahang','co');
		$hoadon=DB::table('tbl_hoadon')->where('ID', '=',$id)->first();
		$chitiethoadon=DB::table('tbl_chitiethoadon')->join('tbl_banh','tbl_chitiethoadon.MaBanh','=','tbl_banh.ID')->where('tbl_chitiethoadon.ID', '=',$id)->select( DB::raw('tbl_chitiethoadon.SoLuong as SoLuong, TenBanh,HinhAnh,tbl_chitiethoadon.GiaTien as GiaTien') )->get();
		return view('hoadon.inhoadon',['hoadon' => $hoadon,'chitiet'=>$chitiethoadon]);
	}
}

