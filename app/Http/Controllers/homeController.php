<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Cart;
class homeController extends Controller
{
    public function hienthiTrangChu()
    {
		Session::pull('kiemtrahang','co');
		$Banh=DB::table('tbl_banh')->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')->select('tbl_banh.ID','TenBanh','TenLoai','GiaTien','SoLuong','HinhAnh','NgaySX','KhuyenMai')->paginate(6);
		$avr=array();
		foreach($Banh as $value)
		{
			$av=DB::table('tbl_binhluan')->where('banh',$value->ID)->avg('Diem'); 
			$avr[$value->ID]=round($av);
		}
		$a1=DB::table('tbl_HoaDon')->count(); 
		$a2=DB::table('tbl_BinhLuan')->where('Diem',5)->count(); 
		$a3=DB::table('tbl_chitiethoadon')->sum('SoLuong') ;
		$a4=DB::table('tbl_user')->count();
		$a=array($a1,$a2,$a3,$a4);
		$Banhmoi=DB::table('tbl_banh')->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')->select('tbl_banh.ID','TenBanh','TenLoai','GiaTien','SoLuong','HinhAnh','NgaySX','KhuyenMai')->orderBy('NgaySX','desc')->get();
		$avr1=array();
		$Banhkhuyenmai=DB::table('tbl_banh')->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')->select('tbl_banh.ID','TenBanh','TenLoai','GiaTien','SoLuong','HinhAnh','NgaySX','KhuyenMai')->where('KhuyenMai','>','0')->get();
		foreach($Banhmoi as $value)
		{
			$av=DB::table('tbl_binhluan')->where('banh',$value->ID)->avg('Diem'); 
			$avr1[$value->ID]=round($av);
		}
		$Banhbanchay=DB::table('tbl_banh')->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')->join('tbl_chitiethoadon','tbl_banh.ID','=','tbl_chitiethoadon.MaBanh')->select(DB::raw('sum( tbl_chitiethoadon.SoLuong) as TongSoLuong,tbl_banh.ID,TenBanh,TenLoai,tbl_banh.GiaTien,tbl_banh.SoLuong,HinhAnh,NgaySX,KhuyenMai'))->groupBy('tbl_banh.ID','TenBanh','TenLoai','tbl_banh.GiaTien','tbl_banh.SoLuong','HinhAnh','NgaySX','KhuyenMai')->orderBy('TongSoLuong','desc')->get();
		$loaibanh=DB::table('tbl_loaibanh')->get();
		return view('home',['banh' => $Banh,'banhmoi'=>$Banhmoi,'avr'=>$avr,'a'=>$a,'avr1'=>$avr1,'banhkhuyenmai'=>$Banhkhuyenmai,'loaibanh'=>$loaibanh,'banhbanchay'=>$Banhbanchay]);
    }
	

}
