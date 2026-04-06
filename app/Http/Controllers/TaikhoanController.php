<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Hash;
class TaikhoanController extends Controller
{
    public function xemtaikhoankhachhang()
	{
		Session::pull('kiemtrahang','co');
		$taikhoan=DB::table('tbl_user')->join('tbl_thongtin as tt','tt.ID','=','TaiKhoan')->where('QuyenHan',0)->get();
		return view('taikhoan.xemtaikhoan',['taikhoan' =>$taikhoan]);
		
	}
	public function xemtaikhoannhanvien()
	{
		Session::pull('kiemtrahang','co');
		$taikhoan=DB::table('tbl_user')->join('tbl_thongtin as tt','tt.ID','=','TaiKhoan')->where('QuyenHan',1)->get();
		return view('taikhoan.xemtaikhoan',['taikhoan' =>$taikhoan]);
	}
	public function setquyen($id)
	{
		DB::table('tbl_user')->where('TaiKhoan',$id)->update(['QuyenHan'=>1]);
		return redirect()->back();
	}
	public function giamquyen($id)
	{
		DB::table('tbl_user')->where('TaiKhoan',$id)->update(['QuyenHan'=>0]);
		return redirect()->back();
	}
	public function xoataikhoan($id)
	{
		DB::table('tbl_user')->where('TaiKhoan',$id)->delete();
		DB::table('tbl_thongin')->where('ID',$id)->delete();
		return redirect()->back();
	}
	public function capmatkhau($id)
	{
		DB::table('tbl_user')->where('TaiKhoan',$id)->update(['MatKhau'=>Hash::make(123456)]);
		return redirect()->back()->with('id',$id);
	}
	
}
