<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class loaibanhControllers extends Controller
{
    public function getDanhSach()
    {
		Session::pull('kiemtrahang','co');
		$Loaibanh = DB::table('tbl_loaibanh')->get();
        
		 return view('loaibanh.loaibanh_them',['loaibanh' => $Loaibanh]);
    }
	public function themloaibanh(Request $request)
    {
		Session::pull('kiemtrahang','co');
		$this->validate($request, [
            'tenloai' => 'required|filled|string|max:100',
        ]);
	
		DB::table('tbl_loaibanh')->insert( ['TenLoai' => $request->tenloai] );
		$Loaibanh = DB::table('tbl_loaibanh')->get();		
		return view('loaibanh.loaibanh_them',['loaibanh' => $Loaibanh]);
    }
	public function xoaloaibanh($id)
    {
		Session::pull('kiemtrahang','co');
		DB::table('tbl_loaibanh')->where('ID', '=', $id)->delete(); 
		$Loaibanh = DB::table('tbl_loaibanh')->get();		
		return view('loaibanh.loaibanh_them',['loaibanh' => $Loaibanh]);
    }
	public function laysualoaibanh($id)
    { 
		Session::pull('kiemtrahang','co');
		$Loaibanh = DB::table('tbl_loaibanh')->where('ID','=',$id)->first();		
		return view('loaibanh.loaibanh_sua',['loaibanh' => $Loaibanh]);
    }
	public function sualoaibanh(Request $request)
    {
		Session::pull('kiemtrahang','co');
		$this->validate($request, [
            'tenloai' => 'required|string|max:100',
        ]);
	
		DB::table('tbl_loaibanh')->where('ID', $request->id)->update([
			'TenLoai' => $request->tenloai
		]);
		$Loaibanh = DB::table('tbl_loaibanh')->get();		
		return view('loaibanh.loaibanh_them',['loaibanh' => $Loaibanh]);
    }
}
