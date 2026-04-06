<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Closure;
use Session;
class admin
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
			if($taikhoan->QuyenHan==2)
				return $next($request);
			else
				return redirect('/');
		}
		else
			return redirect('/');
    }
}
