<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class banhControllers extends Controller
{
    public function laythembanh()
    {
		Session::pull('kiemtrahang','co');
		$Loaibanh = DB::table('tbl_loaibanh')->get();		
		return view('banh.banh_them',['loaibanh' => $Loaibanh]);
    }
	public function laydsbanh()
    {
		Session::pull('kiemtrahang','co');
		$Banh=DB::table('tbl_banh')->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')->select('tbl_banh.ID','TenBanh','TenLoai','GiaTien','SoLuong','HinhAnh','NgaySX','KhuyenMai')->get(); 
		return view('banh.banh_danhsach',['banh' => $Banh]);
    }
	public function xemchitietbanh($id)
    {
		Session::pull('kiemtrahang','co');
		$BinhLuan=DB::table('tbl_binhluan')->select('ID','Ten','LoiBinh','Diem','ThoiGian','Banh')->where('banh', '=', $id)->get();
		$Avg=DB::table('tbl_binhluan')->where('banh', $id)->avg('Diem'); 
		$Banh=DB::table('tbl_banh')->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')->select('tbl_banh.ID','TenBanh','TenLoai','GiaTien','SoLuong','HinhAnh','NgaySX','NoiDung','KhuyenMai')->where('tbl_banh.ID', '=', $id)->first();
		return view('banh.xemchitietbanh',['banh' => $Banh,'binhluan'=>$BinhLuan,'avg'=>$Avg]);
    }
	public function laysuabanh($id)
    {
		Session::pull('kiemtrahang','co');
		$Loaibanh = DB::table('tbl_loaibanh')->get();	
		$Banh=DB::table('tbl_banh')->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')->select('tbl_banh.ID','TenBanh','MaLoai','TenLoai','GiaTien','SoLuong','HinhAnh','NgaySX','NoiDung')->where('tbl_banh.ID', '=', $id)->first(); 
		return view('banh.banh_sua',['banh' => $Banh,'loaibanh'=>$Loaibanh]);
    }
	public function suabanh(Request $request)
    {
		Session::pull('kiemtrahang','co');
		$this->validate($request, 
		[
			//Kiểm tra giá trị rỗng
			'tenbanh' => 'required',
			'giatien' => 'required',
			'soluong' => 'required',
			'ngaysx'=>'required'
			
		],			
		[
			//Tùy chỉnh hiển thị thông báo
			'tenbanh' => 'Tên Bánh trùng',
		]
		);
					
		DB::table('tbl_banh')->where('ID',$request->id)->update(['MaLoai' =>$request->maloai,'TenBanh'=>$request->tenbanh,'GiaTien'=>$request->giatien,'HinhAnh'=>$request->hinhbanh,'SoLuong'=>$request->soluong,'NgaySX'=>$request->ngaysx,'NoiDung'=>$request->noidung] );
		$Banh=DB::table('tbl_banh')->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')->select('tbl_banh.ID','TenBanh','TenLoai','GiaTien','SoLuong','HinhAnh','NgaySX','KhuyenMai')->get(); 
		return view('banh.banh_danhsach',['banh' => $Banh]);
    }
	public function xoabanh($id)
    {
		Session::pull('kiemtrahang','co');
		DB::table('tbl_banh')->where('ID', '=', $id)->delete(); 
		$Banh=DB::table('tbl_banh')->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')->select('tbl_banh.ID','TenBanh','TenLoai','GiaTien','SoLuong','HinhAnh','NgaySX','KhuyenMai')->get(); 
		DB::table('tbl_yeuthich')->where('ID',Session::get('user'))->where('MaBanh',$id)->delete();	
		return view('banh.banh_danhsach',['banh' => $Banh]);
    }
    
	public function thembanh(Request $request)
    {
		Session::pull('kiemtrahang','co');
		$this->validate($request, 
		[
			//Kiểm tra giá trị rỗng
			'tenbanh' => 'required',
			'giatien' => 'required',
			'soluong' => 'required',
			'ngaysx'=>'required'
			
		],			
		[
			//Tùy chỉnh hiển thị thông báo
			'tenbanh' => 'Tên Bánh trùng',
		]
		);
		$gethinhbanh = '';
		if($request->hasFile('hinhbanh')){
		//Hàm kiểm tra dữ liệu
		$this->validate($request, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'hinhbanh' => 'mimes:jpg,jpeg,png,gif|max:2048',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'hinhbanh.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
				'hinhbanh.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
			]
		);
		//Lưu hình ảnh vào thư mục public/images
		$hinhbanh = $request->hinhbanh;
		$gethinhbanh = $hinhbanh->getClientOriginalName();
		$destinationPath = public_path('images');
		$hinhbanh->move($destinationPath, $gethinhbanh);
			}			
		DB::table('tbl_banh')->insert(['MaLoai' =>$request->maloai,'TenBanh'=>$request->tenbanh,'GiaTien'=>$request->giatien,'HinhAnh'=>$gethinhbanh,'SoLuong'=>$request->soluong,'NgaySX'=>$request->ngaysx,'NoiDung'=>$request->noidung,'KhuyenMai'=>0] );
		$Banh=DB::table('tbl_banh')->join('tbl_loaibanh','tbl_banh.MaLoai','=','tbl_loaibanh.ID')->select('tbl_banh.ID','TenBanh','TenLoai','GiaTien','SoLuong','HinhAnh','NgaySX','KhuyenMai')->get(); 
		return view('banh.banh_danhsach',['banh' => $Banh]);
    }
	public function capnhatkhuyenmai(Request $request)
    {
		Session::pull('kiemtrahang','co');
		DB::table('tbl_banh')->where('ID',$request->id)->update(['KhuyenMai'=>$request->khuyenmai]);
		return redirect()->back();
    }
}
