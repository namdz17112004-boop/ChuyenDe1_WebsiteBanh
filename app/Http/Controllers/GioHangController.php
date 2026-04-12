<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;

class GioHangController extends Controller
{
public function themgiohang($id)
{
    // Kiểm tra đăng nhập
    if(!Session::has('user'))
    {
        return redirect('/dangnhap')->with('thongbao', 'Vui lòng đăng nhập để đặt hàng!');
    }

    $Banh = DB::table('tbl_banh')
        ->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')
        ->select('tbl_banh.ID','TenBanh','TenLoai','GiaTien','SoLuong','HinhAnh','KhuyenMai')
        ->where('tbl_banh.ID', $id)
        ->first();

    $soluongtoida = 0;

    foreach(Cart::getContent() as $value)
    {
        if($value->id == $id)
        {
            $soluongtoida = $value->quantity;
        }
    }

    $Giatien = $Banh->GiaTien - ($Banh->GiaTien * $Banh->KhuyenMai / 100);

    if($Banh->SoLuong > $soluongtoida)
    {
        Cart::add([
            'id' => $id,
            'name' => $Banh->TenBanh,
            'quantity' => 1,
            'price' => $Giatien,
            'attributes' => [
                'img' => $Banh->HinhAnh
            ]
        ]);
    }

    return redirect()->back();
}

    public function xemgiohang()
    {
        $giohang = Cart::getContent(); // ✅ FIX
        return view('giohang.xemgiohang', ['giohang' => $giohang]);
    }

    public function xoagiohang($id)
    {
        Cart::remove($id); // ✅ dùng id
        return redirect()->back();
    }

    public function xoaallgiohang()
    {
        Cart::clear(); // ✅ FIX
        return redirect()->back();
    }

    public function capnhatso(Request $request)
    {
        $Banh = DB::table('tbl_banh')
            ->where('ID', $request->id)
            ->first();

        if($request->qty > $Banh->SoLuong || $request->qty < 1)
        {
            return redirect()->back()->with('error','Số lượng không hợp lệ');
        }

        // ✅ FIX đúng format update
        Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->qty
            ],
        ]);

        return redirect()->back();
    }
}
