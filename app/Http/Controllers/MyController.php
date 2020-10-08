<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    //
    public function XinChao()
    {
    	echo "Xin Chao Controller";
    }
    function MonHoc($Mon)
    {
    	echo "Khoa Hoc ".$Mon;
    }
    function TruyenURL(Request $a)
    {
    	echo $a->path();
    	echo "ghh".$a->isMethod('post');
    }
    function postform(Request $a)
    {
        echo "fdsf:";
        echo $a->HoTen."   ".$a->HoTen1;
    }
}
