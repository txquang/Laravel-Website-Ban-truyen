<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTinSPMD extends Model
{
    //
    protected $table = "thongtinsp";

    public function TheLoaiSPMD()
    {
    	return $this->belongsTo('App\TheLoaiSPMD','loaisp','masp');
    }
}
