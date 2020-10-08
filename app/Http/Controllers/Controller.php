<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
//

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
    	/*//$this->DangNhap();
    	View::composer('*', function ($view) {
   			$view->with('auth',Auth::guard('TaiKhoanMD')->user());
		});
 
    	//Auth::guard('TaiKhoanMD')->user()*/
    	 //view()->share('signedIn', \Auth::guard('TaiKhoanMD')->check());
       // view()->share('user', \Auth::guard('TaiKhoanMD')->user());
    }

}
