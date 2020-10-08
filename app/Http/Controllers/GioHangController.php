<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use App\DonHangMD;

class GioHangController extends Controller
{
	public function GetLichSu()
	{
		if( empty(Session::get('MaNVSS')) )
			return redirect()->route('DangNhap');
		$MaKH = Session::get('MaNVSS');
		//Lay ra danh sach gio hang
		$GioHang = DB::select('SELECT * FROM donhang WHERE makh ='."'$MaKH'");
		//dd($GioHang);
		return view('LichSu',['GioHang' => $GioHang]);
	}
    public function GetDanhSach()
	{
		if( empty(Session::get('MaNVSS')) )
			return redirect()->route('DangNhap');

		//Lay ma hang
		$MaDH = Session::get('MaDHSS');
		//Lay ra danh sach gio hang
		$GioHang = DB::select('SELECT TT.masp ,DH.tongtien ,ASP.tenanh ,TT.tensp ,CT.soluong  ,CT.dongia , CT.thanhtien
								FROM chitietdh CT
									JOIN donhang DH
										ON CT.madh = DH.madh
									JOIN thongtinsp TT
										ON CT.masp = TT.masp
									LEFT JOIN anhsp ASP
										ON TT.masp = ASP.masp
								WHERE DH.madh = '."'$MaDH'");
		//lay ra tong tien
		$TongTien = DB::select('SELECT SUM(thanhtien) AS "tongtien"
								FROM chitietdh
								WHERE madh = '."'$MaDH'");
		foreach ($TongTien as $key)
        {
            $TTien = $key->tongtien;
        }
        if ($TTien == null) 
        {

        	$TTien = 0;
        }
        //Cap nhap tong tien vao don hang
        DB::table('donhang')
		    ->where('madh',$MaDH )
		    ->update(['tongtien' => $TTien]);
		//
		return view('GioHang',['GioHang' => $GioHang],['TongTien' => $TongTien]);
	}
	public function ThemSanPham(Request $request)
	{
		//kiem tra mavn 
		if( empty(Session::get('MaNVSS')) )
			return redirect()->route('DangNhap');


		if(strcmp($request->input("MuaHang"), 'Mua Ngay') == 0) 
		{
			//bấm vào nút mua hàng
			$this->KiemTraSanPham($request);
			return redirect()->route('GioHang.DanhSach');
			
		}
		else
		{
			//bấm vào nút thêm vào giỏ
			$this->KiemTraSanPham($request);
			session()->flash('success','Thêm thành công vào Giỏ hàng');
			return redirect()->back();
		}
	}

	public function KiemTraSanPham($request)
	{
		//Lay ma hang
		$MaDH = Session::get('MaDHSS');
		//
		$KiemTraSP = DB::table('chitietdh')
						    ->where('madh', '=', $MaDH)
						    ->where('masp', '=', $request->MaSP)
						    ->first();

		if (is_null($KiemTraSP)) //kiem tra xem ton tai hay chua
			{
				//SP chua ton tai
			    DB::table('chitietdh')->insert([
							'madh' => $MaDH,
						    'masp' => $request->MaSP,
						    'soluong' => $request->SoLuong,
						    'dongia' => $request->DonGia,
						    'thanhtien' => $request->SoLuong *$request->DonGia
						]);
			} 
			else 
			{
			 //SP da ton tai 
	            DB::table('chitietdh')
					->where('madh', '=', $MaDH)
					->where('masp', '=', $request->MaSP)
				   	->update([
					       'soluong' => DB::raw('soluong + '.$request->SoLuong),
					       'thanhtien' => DB::raw('soluong * dongia')
   							]);
			}
	}

	public function PostSua(Request $request)
	{
		//Lay ma hang
		$MaDH = Session::get('MaDHSS');
		//
		//Sua so luong san pham
		if(strcmp($request->input("Sửa"), 'Sửa') == 0) 
		{
			DB::table('chitietdh')
				   	->where('madh', '=', $MaDH)
					->where('masp', '=', $request->MaSP)
				   ->update([
					       'soluong' => $request->SoLuong,
					       'thanhtien' => DB::raw('soluong * dongia')
   							]);
			return redirect()->back();
		}
		//Xoa san pham
		else
		{
			DB::table('chitietdh')
					->where('madh', '=', $MaDH)
					->where('masp', '=', $request->MaSP)
					->delete();
			return redirect()->back();
		}
		
	}
	public function GetThanhToan()
	{
		
		//Lay ma hang
		$MaDH = Session::get('MaDHSS');
		//
		DB::table('donhang')
		    ->where('madh',$MaDH )
		    ->update(['trangthai' => 1]);
		//Them moi don hang 
	    $Time = "DH".Carbon::now('Asia/Ho_Chi_Minh')->format('dmYHis');
	    $uses = new DonHangMD();
	    $uses->madh = $Time;
	    $uses->makh = Session::get('MaNVSS');
	    $uses->tongtien = 0;
	    $uses->trangthai= 0;
	    $uses->Save();

	    //
	    Session::put('MaDHSS',$Time);
	    return redirect()->route('GioHang.DanhSach');
	}
}
