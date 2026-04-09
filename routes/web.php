<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
//
//Trang chủ
Route::get("/", 'homeController@hienthiTrangChu');
//login
Route::get('dangky', function () {
	return view('login.dangky');
});
Route::get('dangnhap', function () {
	return view('login.dangnhap');
});
Route::get('doimatkhau', function () {
	return view('login.doimatkhau');
});
Route::get('xuat', function () {
	Session::pull('user');
	Session::pull('tenuser');
	Session::pull('quyenhan');
	return redirect('/');
})->middleware('Url');
Route::post("dangky/dienthongtin", 'LoginController@dangky');
Route::post("dangnhap/dienthongtin", 'LoginController@dangnhap');
Route::post("doimatkhau/dienthongtin", 'LoginController@doimatkhau')->middleware('Url');
Route::get("laythongtin", 'LoginController@laythongtin')->middleware('Url');
Route::post("laythongtin/capnhatthongtin", 'LoginController@capnhatthongtin')->middleware('Url');
Route::get("xemdonhangkhachhang", 'LoginController@xemdonhangkh')->middleware('Url');
Route::get("xemchitietdonhangkh/{id}", 'LoginController@xemchitietdonhangkh')->middleware('Url');

//Banhyeuthich
Route::get("themvaoyeuthich/{id}", 'LoginController@themvaoyeuthich')->middleware('Url');
Route::get("laybanhyeuthich", 'LoginController@laybanhyeuthich')->middleware('Url');
Route::get("xoabanhyeuthich/{id}", 'LoginController@xoabanhyeuthich')->middleware('Url');

//loaibanh
Route::get("loaibanh/loaibanh_danhsach", 'loaibanhControllers@getDanhSach')->middleware('nhanvien');
Route::post("loaibanh/loaibanh_them",'loaibanhControllers@themloaibanh')->middleware('nhanvien');
Route::get("loaibanh/loaibanh_xoa/{id}",'loaibanhControllers@xoaloaibanh')->middleware('nhanvien');
Route::get('loaibanh/loaibanh_sua/{id}','loaibanhControllers@laysualoaibanh')->middleware('nhanvien');
Route::post('loaibanh/loaibanh_sua','loaibanhControllers@sualoaibanh')->middleware('nhanvien');

//banh
Route::get("banh/banh_them", 'banhControllers@laythembanh')->middleware('nhanvien');
Route::post("banh/banh_themvao", 'banhControllers@thembanh')->middleware('nhanvien');

Route::get("banh/banh_danhsach", 'banhControllers@laydsbanh')->middleware('nhanvien');
Route::get("banh/banh_xoa/{id}", 'banhControllers@xoabanh')->middleware('nhanvien');
Route::get("banh/banh_sua/{id}", 'banhControllers@laysuabanh')->middleware('nhanvien');
Route::post("banh/banh_sua", 'banhControllers@suabanh')->middleware('nhanvien');
Route::get('capnhatkhuyenmai','banhControllers@capnhatkhuyenmai')->middleware('nhanvien');

Route::get("banh/xemchitietbanh/{id}", 'banhControllers@xemchitietbanh');
Route::get('banh/xuatbanh','excelcontroller@xuatbanh')->middleware('nhanvien');
Route::post('banh/nhapbanh','excelcontroller@nhapbanh')->middleware('nhanvien');

//binhluan
Route::post("banh/thembinhluan", 'BinhLuanController@thembinhluan');
Route::get("banh/xoabinhluan/{id}/{mabanh}", 'BinhLuanController@xoabinhluan')->middleware('nhanvien');
//Giohang
Route::get("banh/themgiohang/{id}", 'GioHangController@themgiohang');
Route::get("giohang/xemgiohang", 'GioHangController@xemgiohang');
Route::get("giohang/xoaallgiohang", 'GioHangController@xoaallgiohang');
Route::get("giohang/xoagiohang/{row}", 'GioHangController@xoagiohang');
Route::get("giohang/capnhatso", 'GioHangController@capnhatso');

//donhang
Route::get("dathang/dienthongtin", 'dathangController@dathang');
Route::post("dathang/themdonhang", 'dathangController@themdonhang');
Route::get("dathang/xemdonhang", 'dathangController@xemdonhang')->middleware('nhanvien');
Route::get("dathang/xoadonhang/{id}", 'dathangController@xoadonhang')->middleware('Url');
Route::get("dathang/duyetdonhang/{id}", 'dathangController@duyetdonhang')->middleware('nhanvien');
Route::get("dathang/xemchitietdonhang/{id}", 'dathangController@xemchitietdonhang')->middleware('nhanvien');
Route::get("dathang/indonhang/{id}", 'dathangController@indonhang')->middleware('nhanvien');
//hoadon
Route::get("hoadon/xemchitiethoadon/{id}", 'hoadonController@xemchitiethoadon')->middleware('nhanvien');
Route::get("hoadon/inhoadon/{id}", 'hoadonController@inhoadon')->middleware('nhanvien');

///thongke
Route::get('thongke','ThongKecontroller@hienthithongke')->middleware('nhanvien');
Route::post('thongke/hienthi','ThongKecontroller@hienthithongkesolieu')->middleware('nhanvien');
Route::get('thongke/xuatfile/{kt}/{tu}/{den}','excelcontroller@xuatxslx')->middleware('nhanvien');

//taikhoan
Route::get('xemtaikhoankh','TaiKhoanController@xemtaikhoankhachhang')->middleware('admin');
Route::get('xemtaikhoannv','TaiKhoanController@xemtaikhoannhanvien')->middleware('admin');
Route::get('Setquyen/{id}','TaiKhoanController@setquyen')->middleware('admin');
Route::get('xoataikhoan/{id}','TaiKhoanController@xoataikhoan')->middleware('admin');
Route::get('Giamquyen/{id}','TaiKhoanController@Giamquyen')->middleware('admin');
Route::get('capmatkhau/{id}','TaiKhoanController@capmatkhau')->middleware('admin');

//gopy
Route::post('gopy/them','HopThucontroller@themgopy');
Route::get('gopy/xem','HopThucontroller@xemgopy')->middleware('admin');
