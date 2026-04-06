<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\BanhExport;
use App\Imports\BanhImport;
use Maatwebsite\Excel\Facades\Excel;

class excelcontroller extends Controller
{
	public function xuatxslx($kt,$tungay,$denngay)
    {
		 return Excel::download(new UsersExport($kt,$tungay,$denngay), 'thongke.xlsx');
    }
    public function xuatbanh()
	{
		 return Excel::download(new BanhExport(), 'banh.xlsx');
	}
	public function nhapbanh(Request $request)
	{
		 Excel::import(new BanhImport,$request->excel);
		 return redirect('banh/banh_danhsach');
		 
	}
}
