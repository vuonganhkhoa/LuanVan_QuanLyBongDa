<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class NhanVienYTeMiddleware
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
        if(Auth::check()){ 
            $nhanvienyte = Auth::user(); //lấy user đang check ra
            if($nhanvienyte->ChucVu == 'nhanvienyte')  {
                $response = $next($request);
                return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
                         ->header('Pragma','no-cache')
                         ->header('Expires','Fri, 01 Jan 1990 00:00:00 GMT');
            }
            else 
              return redirect('dang-nhap');
        }
        else{
            return redirect('dang-nhap');
        }
    }
}
