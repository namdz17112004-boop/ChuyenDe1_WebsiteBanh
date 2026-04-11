<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Cart;
class GioHangController extends Controller
{
    public function themgiohang($id)
    {
		$Banh=DB::table('tbl_banh')->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')->select('tbl_banh.ID','TenBanh','TenLoai','GiaTien','SoLuong','HinhAnh','NgaySX','NoiDung','KhuyenMai')->where('tbl_banh.ID', '=', $id)->first();
		$soluongtoida = 0;

foreach(Cart::getContent() as $value)
{
    if($value->id == $id)
    {
        $soluongtoida = $value->quantity;
    }
}
		}
		$Giatien=$Banh->GiaTien-$Banh->GiaTien*$Banh->KhuyenMai/100;
		if($Banh->SoLuong>$soluongtoida)
		{
		$Tongtien=$Giatien*$Banh->SoLuong;
		Cart::add([
				['id' => $id, 'name' => $Banh->TenBanh, 'qty' => 1, 'price' => $Giatien, 'options' => ['img' =>  $Banh->HinhAnh],'tong'=>$Tongtien]
					]);
		}//('home')->with('success', 'Đăng ký thành công');
		//return view('home',['banh' => $banh,'banhmoi'=>$Banhmoi,'giohang'=>$giohang]);
		return redirect()->back();
	
    }
	public function xemgiohang()
    {
		$giohang=Cart::content();		
		return view('giohang/xemgiohang',['giohang'=>$giohang]);
    }
	public function xoagiohang($rowid)
    {
		Cart::remove($rowid);		
		return redirect()->back();
    }
	public function xoaallgiohang(Request $request)
    {
		Cart::destroy();
		return redirect()->back();
		
    }
	
	public function capnhatso(Request $request)
    {
		$request->session()->put('kiemtra', 'cotontai');
		$Banh=DB::table('tbl_banh')->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')->select('tbl_banh.ID','TenBanh','TenLoai','GiaTien','SoLuong','HinhAnh','NgaySX','NoiDung')->where('tbl_banh.ID', '=', $request->id)->first();
		if($request->qty>$Banh->SoLuong||$request->qty<0)
		{
			$request->session()->put('kiemtra', 'cotontai');
		}
		else
		{
			Cart::update($request->rowId,$request->qty);
			$request->session()->forget('kiemtra');
		}
    }
}
