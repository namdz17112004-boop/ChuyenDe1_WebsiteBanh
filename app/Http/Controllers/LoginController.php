<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
	public function dangky(Request $request)
    {
		$tontai = DB::table('tbl_user')->where('TaiKhoan',$request->tendangnhap)->get();
		$tontaigmail = DB::table('tbl_thongtin')->where('Email',$request->email)->get();
		$tontaisdt = DB::table('tbl_thongtin')->where('Email',$request->sdt)->get();
		if(count($tontai)>0)
		{
			return view('login.dangky',['dn' => 2]);
		}
		if(count($tontaisdt)>0)
		{
			return view('login.dangky',['sdt' => 2]);
		}
		if(count($tontaigmail)>0)
		{
			return view('login.dangky',['gm' => 2]);
		}
		if($request->matkhau!=$request->nhaplaimatkhau)
		{
			return view('login.dangky',['mk' => 2]);
		}
		DB::table('tbl_user')->insert( ['TaiKhoan' => $request->tendangnhap,'MatKhau'=>Hash::make($request->matkhau),'QuyenHan'=>0] );
		DB::table('tbl_thongtin')->insert(['HoTen' =>$request->hoten,'SDT'=>$request->sdt,'DiaChi'=>' ','Email'=>$request->email,'ID'=> $request->tendangnhap]);
		return view('login.dangkythanhcong');
	
    }
	public function dangnhap(Request $request)
    {
		$tontai = DB::table('tbl_user')->join('tbl_thongtin','tbl_user.TaiKhoan','=','tbl_thongtin.ID')->where('TaiKhoan',$request->tendangnhap)->get();
		$tontai1 = DB::table('tbl_user')->join('tbl_thongtin','tbl_user.TaiKhoan','=','tbl_thongtin.ID')->where('Email',$request->tendangnhap)->get();
		$tontai2 = DB::table('tbl_user')->join('tbl_thongtin','tbl_user.TaiKhoan','=','tbl_thongtin.ID')->where('SDT',$request->tendangnhap)->get();
		$mk='';
		if(count($tontai)>0)
		foreach($tontai  as $value)
		{
			$mk=$value->MatKhau;
		}
		if(count($tontai1)>0)
		foreach($tontai1  as $value)
		{
			$mk=$value->MatKhau;
		}
		if(count($tontai2)>0)
		foreach($tontai2  as $value)
		{
			$mk=$value->MatKhau;
		}
		if(Hash::check($request->matkhau,$mk))
			{
				$request->has('remember');
				Session::put('user',$value->TaiKhoan);
				Session::put('tenuser',$value->HoTen);
				Session::put('quyenhan',$value->QuyenHan);
				
			}
			else
			{
				return view('login.dangnhap',['kt'=>1]);
			
			}
		return redirect('/');
    }
	public function doimatkhau(Request $request)
    {
		$tontai = DB::table('tbl_user')->where('TaiKhoan',Session::get('user'))->get();
		$mk='';
		foreach($tontai  as $value)
		{
			$mk=$value->MatKhau;
		}
		if(Hash::check($request->matkhaucu,$mk))
			{
				if($request->matkhau==$request->nhaplaimatkhau)
				{
					DB::table('tbl_user')->where('TaiKhoan',Session::get('user'))->update(['MatKhau' => Hash::make($request->matkhau)]); 
				}
				else{
					return view('login.doimatkhau',['mk'=>1]);
				}
			}
			else
			{
				return view('login.doimatkhau',['dn'=>2]);
			
			}
		return view('login.doimatkhauthanhcong');
    }
	public function laythongtin()
    {
		$thongtin = DB::table('tbl_thongtin')->where('ID',Session::get('user'))->first();
		return view('login.doithongtin',['thongtin'=>$thongtin]);
	
    }
	public function capnhatthongtin(Request $request)
    {
		
		$a=DB::table('tbl_thongtin')->where('ID',Session::get('user'))->update(['HoTen' =>$request->hoten ,'SDT' =>$request->sdt,'Email'=>$request->email,'DiaChi'=>$request->diachi]);
		Session::put('tenuser', $request->hoten);
		return view('login.capnhatthanhcong');
    }
	public function themvaoyeuthich($id)
    {
		$tontai = DB::table('tbl_yeuthich')->where('ID',Session::get('user'))->where('MaBanh',$id)->get();
		if(Session::has('user'))
		{
			if(count($tontai)>0)
				return redirect('/')->with('yeuthich', 1);
			else
			{
				DB::table('tbl_yeuthich')->insert(['ID'=>Session::get('user'),'MaBanh'=>$id]);
			}
		}
		return redirect()->back();
    }
	public function laybanhyeuthich()
    {
		Session::pull('kiemtrahang','co');
		$banh = DB::table('tbl_banh')->join('tbl_yeuthich','tbl_banh.ID','=','MaBanh')->where('tbl_yeuthich.ID',Session::get('user'))->select('tbl_banh.ID','TenBanh','SoLuong','GiaTien','HinhAnh')->get();
		return view('banh.banhyeuthich',['banh'=>$banh]);
    }
	public function xoabanhyeuthich($id)
    {
		DB::table('tbl_yeuthich')->where('ID',Session::get('user'))->where('MaBanh',$id)->delete();
		return redirect()->back();
    }
	public function xemdonhangkh()
	{
		Session::pull('kiemtrahang','co');
		$Donhang=DB::table('tbl_donhang')->join('tbl_donhangkh','MaDH','=','tbl_donhang.ID')->where('tbl_donhangkh.ID',Session::get('user'))->select('tbl_donhang.ID','TenKhachHang','SDT','Email','NgayMua','DiaChi','TongTien','Duyet')->get();
		return view('dathang.donhangkh',['donhang' => $Donhang]);
	}
	public function xemchitietdonhangkh($id)
	{
		Session::pull('kiemtrahang','co');
		$donhang=DB::table('tbl_donhang')->where('ID', '=',$id)->first();
		$chitietdonghang=DB::table('tbl_chitetdonhang')->join('tbl_banh','tbl_chitetdonhang.MaBanh','=','tbl_banh.ID')->where('tbl_chitetdonhang.ID', '=',$id)->select( DB::raw('tbl_chitetdonhang.SoLuong as SoLuong, TenBanh,HinhAnh,tbl_chitetdonhang.GiaTien as GiaTien') )->get();
		return view('dathang.xemchitietdonhangkh',['donhang' => $donhang,'chitiet'=>$chitietdonghang]);
	}
}
