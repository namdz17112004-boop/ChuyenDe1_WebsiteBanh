<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Closure;
use Session;
class nhanvien
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::has('user'))
		{
			$taikhoan=DB::table('tbl_user')->where('TaiKhoan',Session::get('user'))->first();
			if($taikhoan->QuyenHan!=0)
				return $next($request);
			else
				return redirect('/');
		}
		else
			return redirect('/');
    }
}
