<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use App\User;
use App\TaiKhoanMD;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;


class TaiKhoanController extends Controller
{
    //
    public function GetDanhSach()
    {
         if( empty(Session::get('Admin')) )
            return redirect()->route('DangNhap');

        $TaiKhoan = DB::select('SELECT tk.manv,nv.tennv,tk.taikhoan,tk.quyen,tk.trangthai 
                                FROM     
                                    taikhoan tk  LEFT JOIN thongtinnv nv
                                        on tk.manv = nv.manv');
        return view('Admim.TaiKhoan',['TaiKhoan' => $TaiKhoan]);
    }
    public function GetThem()
    {
         if( empty(Session::get('Admin')) )
            return redirect()->route('DangNhap');

        return view('Admim.ThemTaiKhoan');
    }
    public function PostThem(Request $request)
    {
         if( empty(Session::get('Admin')) )
            return redirect()->route('DangNhap');

        $this->validate($request, 
            [
                'taikhoan'=>'
                    required|unique:taikhoan,taikhoan|min:3|max:60',
                'password'=>'
                    required|unique:taikhoan,password|min:3|max:60'

            ],
            [
                'taikhoan.required'=>'Bạn chưa nhập tài khoản',
                'taikhoan.unique'=>'Tài khoản đã tồn tại',
                'taikhoan.min'=>'Tài khoản có ít nhất 3 kí tự',
                'taikhoan.max'=>'Tài khoản có độ dài không quá 60 kí tự',

                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu có ít nhất 3 kí tự',
                'password.max'=>'Mật khẩu có độ dài không quá 60 kí tự',
            ]
        );
        $Time = "NV".Carbon::now('Asia/Ho_Chi_Minh')->format('dmYHis');
        DB::table('taikhoan')->insert(
                [   'manv' => $Time, 
                    'taikhoan' => $request->taikhoan,
                    'password' =>  bcrypt($request->password),
                    'quyen' => $request->quyen,
                    'trangthai' => $request->trangthai]
        );
         return redirect('Admim/TaiKhoan/Them/')
            ->with('thongbao',' Thêm tài khoản:'.$Time.' thành công: ');
    }
    public function GetSua($manv)
    {
         if( empty(Session::get('Admin')) )
            return redirect()->route('DangNhap');

    	$TaiKhoan = TaiKhoanMD::where('manv', $manv)->get();
        return view('Admim.SuaTaiKhoan',['TaiKhoan' => $TaiKhoan]);
    }
    public function PostSua($manv, Request $request)
    {
         if( empty(Session::get('Admin')) )
            return redirect()->route('DangNhap');

        $this->validate($request, 
            [
                'taikhoan'=>'
                    required|unique:taikhoan,taikhoan|min:3|max:60',

            ],
            [
                'taikhoan.required'=>'Bạn chưa nhập tài khoản',
                'taikhoan.unique'=>'Tài khoản đã tồn tại',
                'taikhoan.min'=>'Tài khoản có ít nhất 3 kí tự',
                'taikhoan.max'=>'Tài khoản có độ dài không quá 60 kí tự',
            ]
        );
        $TheLoai = DB::table('taikhoan')
            ->where('manv', $manv)
            ->update(['taikhoan' => $request->taikhoan,
                      'password' => bcrypt($request->password),
                      'quyen' => $request->quyen,
                      'trangthai' => $request->trangthai  
        ]);

        return redirect('Admim/TaiKhoan/Sua/'.$manv)
            ->with('thongbao',' Sửa thành công: '.$manv);
    }
    public function GetXoa($manv)
    {
         if( empty(Session::get('Admin')) )
            return redirect()->route('DangNhap');

        $TaiKhoan = DB::table('taikhoan')
            ->where('manv', $manv)
            ->update(['trangthai' => '0']);

        return redirect('Admim/TaiKhoan/DanhSach')
            ->with('thongbao','Tài Khoản: '.$manv.' Đã Xóa');
    }
    public function GetKhoiPhuc($manv)
    {
         if( empty(Session::get('Admin')) )
            return redirect()->route('DangNhap');
        
        $TaiKhoan = DB::table('taikhoan')
            ->where('manv', $manv)
            ->update(['trangthai' => '1']);

        return redirect('Admim/TaiKhoan/DanhSach')
            ->with('thongbao','Khôi Phục Tài Khoản: '.$manv.' Thành Công ');    
    }
}
