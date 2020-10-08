<?php

use Illuminate\Support\Facades\Route;
//
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\View;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Lam dang nhap
//goi trang dang nhap
Route::get('DangNhap','DangNhapController@GetDangNhap')->name('DangNhap');
Route::post('DangNhap','DangNhapController@PostDangNhap');
//goi trang dang ki
Route::get("DangKy","DangNhapController@GetDangKy")->name('DangKy');
Route::post("DangKy","DangNhapController@PostDangKy");

Route::get('DangXuat','DangNhapController@DangXuat');

Route::get('ThanhCong',function(){//tests
	return view('DangNhap.ThanhCong');
});
Route::get('NhapThongTin','DangNhapController@GetNhapThongTin')->name('NhapThongTin');
Route::post('NhapThongTin','DangNhapController@PostNhapThongTin');


//Route  cho admim
Route::group(['prefix'=>'Admim'],function()
{

	Route::get('TrangChu','DangNhapController@TrangChu')->name('Admim.TrangChu');
	
	Route::group(['prefix'=>'TaiKhoan'],function()
	{

		Route::get('DanhSach','TaiKhoanController@GetDanhSach');

		Route::get('Them','TaiKhoanController@GetThem');
		Route::post('Them','TaiKhoanController@PostThem');

		Route::get('Sua/{manv}','TaiKhoanController@GetSua');
		Route::post('Sua/{manv}','TaiKhoanController@PostSua');
		
		Route::get('Xoa/{manv}','TaiKhoanController@GetXoa');
		Route::get('KhoiPhuc/{manv}','TaiKhoanController@GetKhoiPhuc');
		
	});
	Route::group(['prefix'=>'TheLoai'],function()
	{

		Route::get('DanhSach','TheLoaiController@GetDanhSach');

		Route::post('Them','TheLoaiController@PostThem');

		Route::get('Sua/{loaisp}','TheLoaiController@GetSua');
		Route::post('Sua/{loaisp}','TheLoaiController@PostSua')->name('Sua');

		Route::get('Xoa/{loaisp}','TheLoaiController@GetXoa');
		
	});
	Route::group(['prefix'=>'SanPham'],function()
	{

		Route::get('DanhSach','SanPhamController@GetDanhSach');

		Route::get('Them','SanPhamController@GetThem');
		Route::post('Them','SanPhamController@PostThem');

		Route::get('Sua/{masp}','SanPhamController@GetSua');
		Route::post('Sua/{masp}','SanPhamController@PostSua');
		
		Route::get('Xoa/{masp}','SanPhamController@GetXoa');
		Route::get('KhoiPhuc/{masp}','SanPhamController@GetKhoiPhuc');
		
	});
});
//end admin


//Danh cho gio hang
Route::group(['prefix'=>'GioHang'],function()
{
	Route::get('LichSu','GioHangController@GetLichSu')->name('GioHang.LichSu');
	Route::get('XemChiTiet/{masp}','SanPhamController@GetXemChiTiet');
	Route::get('DanhSach','GioHangController@GetDanhSach')->name('GioHang.DanhSach');
	Route::post('Them','GioHangController@ThemSanPham');//them va sua
	Route::post('Sua','GioHangController@PostSua');//bao gom sua va xoa
	Route::get('ThanhToan','GioHangController@GetThanhToan');
});
//Trang Chu
Route::get('TrangChu','SanPhamController@GetTrangChu')->name('TrangChu');

//SanPham
Route::get('SanPham','SanPhamController@GetDanhSachSanPham');
Route::get('ChiTietSanPham/{masp}','SanPhamController@GetXemChiTietSanPham');
Route::post('SanPham/TimKiem','SanPhamController@TimKiemSanPham');
Route::get('SanPham/{matl}','SanPhamController@SapXepTheloai');
Route::get('GioiThieu',function() 
{
	return view('GioiThieu');
});
