<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Session;

class dathangController extends Controller
{
    public function dathang()
    {
        $thongtin = DB::table('tbl_thongtin')
            ->where('ID', Session::get('user'))
            ->first();

        Session::pull('kiemtrahang', 'co');

        // ✅ FIX: dùng getTotalQuantity()
        if (Cart::getTotalQuantity() > 0)
        {
            if (Session::has('user'))
                return view('dathang.themdonhang', ['thongtin' => $thongtin]);
            else
                return view('dathang.themdonhang');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function themdonhang(Request $request)
    {
        Session::pull('kiemtrahang','co');

        $request->validate([
            'hoten' => 'required',
            'email' => 'required',
            'sdt' => 'required',
            'diachi'=>'required'
        ]);

        // ✅ FIX: getTotal()
        DB::table('tbl_donhang')->insert([
            'Email' => $request->email,
            'TenKhachHang'=>$request->hoten,
            'SDT'=>$request->sdt,
            'DiaChi'=>$request->diachi,
            'TongTien'=>Cart::getTotal(),
            'NgayMua'=>Carbon::now()
        ]);

        $layid = DB::table('tbl_donhang')->max('ID');

        // ✅ FIX: getContent()
        $giohang = Cart::getContent();

        foreach($giohang as $value)
        {
            DB::table('tbl_chitetdonhang')->insert([
                'MaBanh'=>$value->id,
                'SoLuong'=>$value->quantity, // ⚠️ qty -> quantity
                'GiaTien'=>$value->price,
                'ID'=>$layid
            ]);

            $soluong = DB::table('tbl_banh')
                ->where('ID',$value->id)
                ->first();

            $soluong = $soluong->SoLuong - $value->quantity;

            DB::table('tbl_banh')
                ->where('id', $value->id)
                ->update(['SoLuong' =>$soluong]);
        }

        if(Session::has('user'))
        {
            DB::table('tbl_donhangkh')->insert([
                'ID'=>Session::get('user'),
                'MADH'=>$layid
            ]);
        }

        Cart::clear(); // ✅ FIX destroy -> clear

        return view('dathang.thanhcong');
    }

    public function xemdonhang()
    {
        Session::pull('kiemtrahang','co');

        $Donhang = DB::table('tbl_donhang')->get();

        return view('dathang.xemdonhang',['donhang' => $Donhang]);
    }

    public function duyetdonhang($id)
    {
        Session::pull('kiemtrahang','co');

        $donhang = DB::table('tbl_donhang')->where('ID', $id)->first();

        if($donhang->Duyet == 0)
            DB::table('tbl_donhang')->where('ID',$id)->update(['Duyet'=>1]);
        else if($donhang->Duyet == 1)
            DB::table('tbl_donhang')->where('ID',$id)->update(['Duyet'=>2]);
        else if($donhang->Duyet == 2)
        {
            DB::table('tbl_hoadon')->insert([
                'TenKhachHang'=>$donhang->TenKhachHang,
                'Email'=>$donhang->Email,
                'DiaChi'=>$donhang->DiaChi,
                'SDT'=>$donhang->SDT,
                'TongTien'=>$donhang->TongTien,
                'NgayLap'=>Carbon::now()
            ]);

            $layid = DB::table('tbl_hoadon')->max('ID');

            $chitiet = DB::table('tbl_chitetdonhang')
                ->where('ID',$id)
                ->get();

            foreach($chitiet as $value)
            {
                DB::table('tbl_chitiethoadon')->insert([
                    'ID'=>$layid,
                    'MaBanh'=>$value->MaBanh,
                    'SoLuong'=>$value->SoLuong,
                    'GiaTien'=>$value->GiaTien
                ]);
            }

            DB::table('tbl_donhang')->where('ID',$id)->update(['Duyet'=>3]);
        }

        return redirect()->back();
    }

    public function xoadonhang($id)
    {
        Session::pull('kiemtrahang','co');

        $donhang = DB::table('tbl_donhang')->where('ID',$id)->first();

        if($donhang->Duyet != 3)
        {
            $chitiet = DB::table('tbl_chitetdonhang')
                ->where('ID',$id)
                ->get();

            foreach($chitiet as $value)
            {
                $banh = DB::table('tbl_banh')
                    ->where('ID',$value->MaBanh)
                    ->first();

                $soluong = $banh->SoLuong + $value->SoLuong;

                DB::table('tbl_banh')
                    ->where('id',$value->MaBanh)
                    ->update(['SoLuong'=>$soluong]);
            }

            DB::table('tbl_donhang')->where('ID',$id)->delete();
            DB::table('tbl_donhangkh')->where('MaDH',$id)->delete();
            DB::table('tbl_chitetdonhang')->where('ID',$id)->delete();
        }

        return redirect()->back();
    }

    public function xemchitietdonhang($id)
    {
        Session::pull('kiemtrahang','co');

        $donhang = DB::table('tbl_donhang')->where('ID',$id)->first();

        $chitiet = DB::table('tbl_chitetdonhang')
            ->join('tbl_banh','tbl_chitetdonhang.MaBanh','=','tbl_banh.ID')
            ->where('tbl_chitetdonhang.ID',$id)
            ->select(DB::raw('tbl_chitetdonhang.SoLuong as SoLuong, TenBanh,HinhAnh,tbl_chitetdonhang.GiaTien as GiaTien'))
            ->get();

        return view('dathang.xemchitietdonhang',[
            'donhang'=>$donhang,
            'chitiet'=>$chitiet
        ]);
    }

    public function indonhang($id)
    {
        Session::pull('kiemtrahang','co');

        $hoadon = DB::table('tbl_donhang')->where('ID',$id)->first();

        $chitiet = DB::table('tbl_chitetdonhang')
            ->join('tbl_banh','tbl_chitetdonhang.MaBanh','=','tbl_banh.ID')
            ->where('tbl_chitetdonhang.ID',$id)
            ->select(DB::raw('tbl_chitetdonhang.SoLuong as SoLuong, TenBanh,HinhAnh,tbl_chitetdonhang.GiaTien as GiaTien'))
            ->get();

        return view('hoadon.inhoadon',[
            'hoadon'=>$hoadon,
            'chitiet'=>$chitiet
        ]);
    }
}
