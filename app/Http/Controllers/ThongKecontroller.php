<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class ThongKecontroller extends Controller
{
	 public function hienthithongke()
    {
		
		Session::put('kiemtrahang','co');
		$ngaythang=Carbon::now()->year.'-'.Carbon::now()->month.'-'.Carbon::now()->day;
		//$Banh=DB::table('tbl_banh')->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')->select('tbl_banh.ID','TenBanh','TenLoai','GiaTien','SoLuong','HinhAnh','NgaySX')->paginate(6);
		$Banh=DB::table('tbl_chitiethoadon')->join('tbl_banh','tbl_banh.ID','=','tbl_chitiethoadon.MaBanh')->join('tbl_hoadon','tbl_hoadon.ID','=','tbl_chitiethoadon.ID')->select( DB::raw('TenBanh,SUM(tbl_chitiethoadon.SoLuong) as soluongtong, SUM(tbl_chitiethoadon.GiaTien) as giatientong') )->groupBy('TenBanh')->where('NgayLap','=',$ngaythang)->paginate(10); 
		$KH=DB::table('tbl_chitiethoadon')->join('tbl_banh','tbl_banh.ID','=','tbl_chitiethoadon.MaBanh')->join('tbl_hoadon','tbl_hoadon.ID','=','tbl_chitiethoadon.ID')->select( DB::raw('TenKhachHang,SUM(tbl_chitiethoadon.SoLuong) as soluongtong, SUM(tbl_hoadon.TongTien) as giatientong') )->groupBy('TenKhachHang')->where('NgayLap','=',$ngaythang)->paginate(10); 
		return view('thongke.thongke',['banh' => $Banh,'khachhang'=>	$KH]);
	
	 }
	  public function hienthithongkesolieu(Request $request)
    {
		
		Session::put('kiemtrahang','co');
		$ngaythang=Carbon::now()->year.'-'.Carbon::now()->month.'-'.Carbon::now()->day;
		//$Banh=DB::table('tbl_banh')->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')->select('tbl_banh.ID','TenBanh','TenLoai','GiaTien','SoLuong','HinhAnh','NgaySX')->paginate(6);
		$kt=0;
		$tungay=$request->tungay;
		$denngay=$request->denngay;
		$Banh=DB::table('tbl_chitiethoadon')->join('tbl_banh','tbl_banh.ID','=','tbl_chitiethoadon.MaBanh')->join('tbl_hoadon','tbl_hoadon.ID','=','tbl_chitiethoadon.ID')->select( DB::raw('TenBanh,SUM(tbl_chitiethoadon.SoLuong) as soluongtong, SUM(tbl_chitiethoadon.GiaTien) as giatientong') )->groupBy('TenBanh')->where('NgayLap','=',$ngaythang)->paginate(10); 
		$KH=DB::table('tbl_chitiethoadon')->join('tbl_banh','tbl_banh.ID','=','tbl_chitiethoadon.MaBanh')->join('tbl_hoadon','tbl_hoadon.ID','=','tbl_chitiethoadon.ID')->select( DB::raw('TenKhachHang,SUM(tbl_chitiethoadon.SoLuong) as soluongtong, SUM(tbl_hoadon.TongTien) as giatientong') )->groupBy('TenKhachHang')->where('NgayLap','=',$ngaythang)->paginate(10);
		
		if($request->kiemtra == 2)
		{
			$thongke=DB::table('tbl_chitiethoadon')->join('tbl_banh','tbl_banh.ID','=','tbl_chitiethoadon.MaBanh')->join('tbl_hoadon','tbl_hoadon.ID','=','tbl_chitiethoadon.ID')->select( DB::raw('TenBanh,SUM(tbl_chitiethoadon.SoLuong) as soluongtong, SUM(tbl_chitiethoadon.GiaTien) as giatientong') )->groupBy('TenBanh')->where('NgayLap','>=',$request->tungay)->where('NgayLap','<=',$request->denngay)->get(); 
		}
		else
		{
			$thongke=DB::table('tbl_chitiethoadon')->join('tbl_banh','tbl_banh.ID','=','tbl_chitiethoadon.MaBanh')->join('tbl_hoadon','tbl_hoadon.ID','=','tbl_chitiethoadon.ID')->select( DB::raw('TenKhachHang,SUM(tbl_chitiethoadon.SoLuong) as soluongtong, SUM(tbl_hoadon.TongTien) as giatientong') )->groupBy('TenKhachHang')->where('NgayLap','>=',$request->tungay)->where('NgayLap','<=',$request->denngay)->get(); 
			return view('thongke.thongke',['banh' => $Banh,'khachhang'=>$KH,'thongke'=>$thongke,'kt'=>3,'tungay'=>$tungay,'denngay'=>$denngay]);
			
		}
		return view('thongke.thongke',['banh' => $Banh,'khachhang'=>$KH,'thongke'=>$thongke,'tungay'=>$tungay,'denngay'=>$denngay,'kt'=>$kt]);
	
	 }
}
