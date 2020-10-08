<?php

namespace App\Http\Controllers;
//
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\TaiKhoanMD;
use App\ThongTinNVMD;
use App\SoDiaChiMD;
use App\DonHangMD;
use Session;

class DangNhapController extends Controller
{
  

   public function GetDangNhap()
   {
   	return view('DangNhap.DangNhap');
   }
   public function DangXuat()
   {
      Auth::guard('TaiKhoanMD')->logout();
      //xoa het session
      Session()->flush();
      return redirect()->route('TrangChu');
   }

   public function PostDangNhap(Request $request)
   {
      //bat loi
      $this->validate($request,[
         'name'=>'required',
         'password'=>'required|min:3|max:10'
      ],[
         'name.required'=>'Bạn Chưa Nhập tài Khoản',
         'password.required'=>'Bạn Chưa Nhập Mật Khẩu',
         'password.min'=>'Mật khẩu không nhỏ hơn 3 kí tự',
         'password.max'=>'Mật khẩu không lớn hơn 32 kí tự',
      ]);


      //kiem tra tai khoan
      if (Auth::guard('TaiKhoanMD')->attempt(array('taikhoan' => $request->name, 'password' => $request->password)))
      {
         if ( Auth::guard('TaiKhoanMD')->attempt(array('taikhoan' => $request->name, 'password' => $request->password, 'quyen'=>'2')) )
         {
            //Dang nhap vao Admin
            $TaiKhoan = Auth::guard('TaiKhoanMD')->user();
            Session::put('MaNVSS', $TaiKhoan->manv);
            Session::put('Admin','Admin');
            Session::put('TenNVSS', $TaiKhoan->taikhoan);
            return view('Admim.index');
         }

         else
         {
            if ( Auth::guard('TaiKhoanMD')->attempt(array('taikhoan' => $request->name, 'password' => $request->password, 'quyen'=>'1','trangthai'=>'1')) )
            {
              //Dang Nhap vao quan li
              $TaiKhoan = Auth::guard('TaiKhoanMD')->user();
              Session::put('MaNVSS', $TaiKhoan->manv);
              Session::put('TenNVSS', $TaiKhoan->taikhoan);
              return view('Admim.index');
            }
            if ( Auth::guard('TaiKhoanMD')->attempt(array('taikhoan' => $request->name, 'password' => $request->password, 'quyen'=>'0','trangthai'=>'1')) ) 
            {
              //Dang nhap vao khach hang
              $TaiKhoan = Auth::guard('TaiKhoanMD')->user();
              Session::put('MaNVSS', $TaiKhoan->manv);
              Session::put('TenNVSS', $TaiKhoan->taikhoan);
              return redirect()->route('TrangChu');
            }
            else
              return  "<h1>bị Khóa</h1>";              
       }        
    }
    else
    {
      return view('DangNhap.DangNhap',['error'=>'Đăng nhập thất bại']);
    }

   }
   public function GetDangKy()
   {
    return view('DangNhap.DangKy');
   }
   public function PostDangKy(Request $request)
   {
      $this->validate($request, 
         [
          'taikhoan'=>'
          required|unique:taikhoan,taikhoan|min:3|max:60',
          'password'=>'
          required|unique:taikhoan,password|min:3|max:60',
          'passwordAgain' =>
          'required|same:password'

       ],
       [
          'taikhoan.required'=>'Bạn chưa nhập tài khoản',
          'taikhoan.unique'=>'Tài khoản đã tồn tại',
          'taikhoan.min'=>'Tài khoản có ít nhất 3 kí tự',
          'taikhoan.max'=>'Tài khoản có độ dài không quá 60 kí tự',

          'password.required'=>'Bạn chưa nhập mật khẩu',
          'password.min'=>'Mật khẩu có ít nhất 3 kí tự',
          'password.max'=>'Mật khẩu có độ dài không quá 60 kí tự',
          'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
          'passwordAgain.same'=>'Mật khẩu không trùng khớp'
       ]
    );
      $Time = "NV".Carbon::now('Asia/Ho_Chi_Minh')->format('dmYHis');
      $uses = new TaiKhoanMD();//them vao database
      $uses->manv = $Time;
      $uses->taikhoan = $request->taikhoan;
      $uses->quyen = '3';
      $uses->trangthai = '1';
      $uses->password = bcrypt($request->password);
      $uses->Save();
      Session::put('MaNVSS', $Time);
      Session::put('TenNVSS', $request->taikhoan);

      return Redirect()->route('NhapThongTin');
   }
   public function TrangChu()
   {
      return view('Admim.index',['TaiKhoan'=>Auth::guard('TaiKhoanMD')->user()]);
   }
   public function LayThongTin()
   {
      return $TaiKhoan =  Auth::guard('TaiKhoanMD')->user();
   }
   public function GetNhapThongTin()
   {
      return view('DangNhap.ThongTin');
   }
   public function PostNhapThongTin(Request $request)
   {
      $this->validate($request,[
         'tennv'=>'required',
         'diachi'=>'required',
         'sdt'=>'required',
         'gioitinh'=>'required',
         'diachigh'=>'required'
      ],[
         'tennv.required'=>'Bạn chưa nhập tên',
         'diachi.required'=>'Bạn chưa nhập địa chỉ',
         'sdt.required'=>'Bạn chưa nhập số điện thoại',
         'gioitinh.required'=>'Bạn chưa nhập giới tính',
         'diachigh.required'=>'Bạn chưa nhập địa chỉ giao hàng'
      ]);

      //Them moi thong tin nhan vien vao csdl
      $uses = new ThongTinNVMD();//them vao database
      $uses->manv = Session::get('MaNVSS');
      $uses->tennv = $request->tennv;
      $uses->diachi = $request->diachi;
      $uses->gioitinh = $request->gioitinh;
      $uses->Save();

      //Them moi dia chi gh nv 
      $uses = new SoDiaChiMD();
      $uses->manv = Session::get('MaNVSS');
      $uses->sdt = $request->sdt;
      $uses->diachi = $request->diachigh;
      $uses->Save();

      //Them moi don hang 
      $Time = "DH".Carbon::now('Asia/Ho_Chi_Minh')->format('dmYHis');
      $uses = new DonHangMD();
      $uses->madh = $Time;
      $uses->makh = Session::get('MaNVSS');
      $uses->tongtien = 0;
      $uses->trangthai= 0;
      $uses->Save();

      DB::table('taikhoan')
                ->where( 'manv', Session::get('MaNVSS') )
                ->update(['quyen' => 0]);
      return Redirect()->route('TrangChu');
   }
}