<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HopThucontroller extends Controller
{
    public function themgopy(Request $request)
	{
		$validate=$this->validate($request,
        [
            'formname' => 'required|min:5|max:50',
            'formemail' => 'required|max:100',
			'formSubject'=> 'required|min:5|max:50',
			'formtext'=> 'required'
        ],

        [
            'required' => ':attribute Không được để trống',
            'min' => ':attribute Không được nhỏ hơn :min',
            'max' => ':attribute Không được lớn hơn :max',
            'integer' => ':attribute Chỉ được nhập số',
        ],
		[
			'formname' => 'Họ và Tên',
            'formemail' => 'Email',
			'formSubject'=> 'Tiêu Đề',
			'formtext'=> 'Nội dung',
		]
		);
		
		
		$ngaythang=Carbon::now()->year.'-'.Carbon::now()->month.'-'.Carbon::now()->day;
		
		DB::table('hopthu')->insert(['HoVaTen'=>$request->formname,'TieuDe'=>$request->formSubject,'Email'=>$request->formemail,'NoiDung'=>$request->formtext,'Ngay'=>$ngaythang]);
		return redirect()->back()->withErrors($validate);;

	}
	public function xemgopy()
	{
		$homgoy=DB::table('hopthu')->orderBy('Ngay','desc')->paginate(6);
		return view('homgopy',['hom'=>$homgoy]);
	}
}
