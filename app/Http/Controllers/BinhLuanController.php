<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class BinhLuanController extends Controller
{
    public function thembinhluan(Request $request)
    {
		Session::pull('kiemtrahang','co');
		$this->validate($request, 
		[
			//Kiểm tra giá trị rỗng
			'star' => 'required',
			
			
		],			
		[
			//Tùy chỉnh hiển thị thông báo
			'star' => 'Chưa đánh giá',
		]
		);
		DB::table('tbl_binhluan')->insert(['Diem' =>$request->star,'Ten'=>$request->ten,'LoiBinh'=>$request->noidung,'Banh'=>$request->banh,'ThoiGian'=>Carbon::now()] );
		$Banh=DB::table('tbl_banh')->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')->select('tbl_banh.ID','TenBanh','TenLoai','GiaTien','SoLuong','HinhAnh','NgaySX','NoiDung')->where('tbl_banh.ID', '=', $request->banh)->first();
		return redirect('banh/xemchitietbanh/'.$request->banh);
    }
	public function xoabinhluan($id,$mabanh)
    {
		Session::pull('kiemtrahang','co');
		DB::table('tbl_binhluan')->where('ID','=',$id)->delete();
		$Banh=DB::table('tbl_banh')->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')->select('tbl_banh.ID','TenBanh','TenLoai','GiaTien','SoLuong','HinhAnh','NgaySX','NoiDung')->where('tbl_banh.ID', '=', $mabanh)->first();
		return redirect('banh/xemchitietbanh/'.$mabanh);
    }
}
