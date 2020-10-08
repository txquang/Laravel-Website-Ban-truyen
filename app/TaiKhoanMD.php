<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TaiKhoanMD  extends Authenticatable
{
    //
    use Notifiable;
    protected $guard = 'TaiKhoanMD';
    protected $table = "taikhoan";

    public $timestamps = false;

    protected $fillable = [
    	'manv', 'taikhoan', 'password', 'quyen', 'trangthai'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
