<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoaiSPMD extends Model
{
    //
    protected $table = "theloaisp";

    public $timestamps = false;

    protected $fillable = [
    	'loaisp', 'tentl'
    ];
}
