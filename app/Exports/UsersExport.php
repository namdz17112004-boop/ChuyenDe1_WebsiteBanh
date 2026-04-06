<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection,WithHeadings,WithTitle,ShouldAutoSize
{
	public function __construct($kt,$tungay,$denngay)
    {
        $this->kt = $kt;
		$this->tn = $tungay;
		$this->dn = $denngay;
    }
	public function headings(): array
    {	
		if($this->kt==3)
			 return [
            'Tên Khách Hàng',
            'Tổng Số Lượng Mua(Cái)',
			'Tổng Giá Tiền Mua(VNĐ)',
			'Từ ngày '.$this->tn.' đến ngày '.$this->dn,
        ];
		else
        return [
            'Tên Bánh',
            'Tổng Số Lượng Bán Được(Cái)',
			'Tổng Giá Tiền Bán Được(VNĐ)',
			'Từ ngày '.$this->tn.' đến ngày '.$this->dn,
        ];
    }
     public function collection()
    {
		if($this->kt==3)
		{
			$thongke=DB::table('tbl_chitiethoadon')->join('tbl_banh','tbl_banh.ID','=','tbl_chitiethoadon.MaBanh')->join('tbl_hoadon','tbl_hoadon.ID','=','tbl_chitiethoadon.ID')->select( DB::raw('TenKhachHang,SUM(tbl_chitiethoadon.SoLuong) as soluongtong, SUM(tbl_hoadon.TongTien) as giatientong') )->groupBy('TenKhachHang')->where('NgayLap','>=',$this->tn)->where('NgayLap','<=',$this->dn)->get(); 
		}
		else
		{
			$thongke=DB::table('tbl_chitiethoadon')->join('tbl_banh','tbl_banh.ID','=','tbl_chitiethoadon.MaBanh')->join('tbl_hoadon','tbl_hoadon.ID','=','tbl_chitiethoadon.ID')->select( DB::raw('TenBanh,SUM(tbl_chitiethoadon.SoLuong) as soluongtong, SUM(tbl_chitiethoadon.GiaTien) as giatientong') )->groupBy('TenBanh')->where('NgayLap','>=',$this->tn)->where('NgayLap','<=',$this->dn)->get(); 
		}
        return $thongke;
    }
	 public function title(): string
    {
		if($this->kt==3)
			return 'Bảng thống kê khách hàng';
		else
			return 'Bảng thống kê bánh';
    }
}
