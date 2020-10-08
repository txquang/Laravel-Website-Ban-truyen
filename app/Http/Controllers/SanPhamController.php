<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;


class SanPhamController extends Controller
{
    
    public function GetTrangChu()
    {
        $TrangChu = DB::select('SELECT SP.masp ,ASP.tenanh ,SP.tensp ,DG.sao ,SP.gia
                                FROM thongtinsp SP 
                                    JOIN anhsp ASP
                                        ON SP.masp = ASP.masp
                                    LEFT JOIN danhgiasp DG
                                        ON SP.masp = DG.masp
                                        LIMIT 8'
                            );
        //Lay madh cua kh
        $MaNV = Session::get('MaNVSS');
        $MaDH = DB::select('SELECT DH.madh
                            FROM thongtinnv TT 
                                LEFT JOIN donhang DH 
                                ON TT.manv=DH.makh
                            WHERE manv='."'$MaNV'".' AND DH.trangthai = 0');
        foreach ($MaDH as $key)
        {
            $MaDH = $key->madh;
        } 
        Session::put('MaDHSS',$MaDH );
        //

        return view('TrangChu',['TrangChu' => $TrangChu]);
    }

    //admin
    public function GetDanhSach()//cho admim
    {
        if( empty(Session::get('Admin')) )
            return redirect()->route('DangNhap');

        $SanPham = DB::select('SELECT SP.masp, SP.tensp,SP.soluong,SP.gia,CT.kichthuoc,CT.sotrang,CT.nhaxb,CT.tacgia,CT.trongluong,TL.tentl,ASP.tenanh FROM thongtinsp SP 
                JOIN chitietsp CT
                    ON SP.masp = CT.masp
                JOIN theloaisp TL
                    ON SP.loaisp = TL.loaisp
                JOIN anhsp ASP 
                    ON SP.masp = ASP.masp');

        return view('Admim.Sanpham',['SanPham' => $SanPham]);
    }

    public function GetThem()
    {
        if( empty(Session::get('Admin')) )
            return redirect()->route('DangNhap');

        return view('Admim.ThemSanPham');
    }

    public function PostThem(Request $request)//sai
    {
        if( empty(Session::get('Admin')) )
            return redirect()->route('DangNhap');
        //dd($request->anh);
        if($request->hasFile('anh'))
        {
            $request->photo->store('images');
        }
        else
            echo "31221";

        /*$Time = "SP".Carbon::now('Asia/Ho_Chi_Minh')->format('dmYHis');
        $filename = $request->anh->getClientOriginalName();
        DB::table('thongtinsp')->insert(
                [   'masp' => $Time, 
                    'tensp' => $request->tensp,
                    'soluong' =>$request->soluong,
                    'gia' => $request->quyen]
        );
        DB::table('chitietsp')->insert(
                [   'kichthuoc' => $request->kichthuoc,
                    'sotrang' => $request->sotrang,
                    'nhaxb' =>$request->nxb,
                    'tacgia' => $request->tacgia,
                    'trongluong' => $request->trongluong]
        );
        DB::table('theloaisp')->insert(
                [   'tentl' => $request->theloai]
        );
        DB::table('anhsp')->insert(
                [   'tenanh' => srt_slug($request->tenanh)]
        );
        DB::table('xemtruocsp')->insert(
                [   'anh' => $filename]
        );
        return redirect('Admim/SanPham/Them/')
            ->with('thongbao',' Thêm sản phẩm:'.$Time.' thành công: ');*/
    }
    public function GetSua($MaSP)
    {
        if( empty(Session::get('Admin')) )
            return redirect()->route('DangNhap');
        
        $SanPham = DB::select('SELECT SP.masp, SP.tensp, SP.soluong, SP.gia, CT.kichthuoc, CT.sotrang, CT.nhaxb, CT.tacgia, CT.trongluong, TL.tentl, ASP.tenanh, XT.tomtat, XT.doctruoc
                    FROM thongtinsp SP 
                        LEFT JOIN chitietsp CT
                            ON SP.masp = CT.masp               
                        LEFT JOIN theloaisp TL
                            ON SP.loaisp = TL.loaisp              
                        LEFT JOIN anhsp ASP 
                            ON SP.masp = ASP.masp
                        LEFT JOIN xemtruocsp XT
                            ON SP.masp = XT.masp
                    WHERE SP.masp = '."'$MaSP'");
        return view('Admim.SuaSanPham',['SanPham' => $SanPham]);
    }
    public function PostSua1(Request $request, $MaSP)
    {
      var_dump($request);
    }
    public function GetXoa($manv)
    {
       
    }
    public function GetKhoiPhuc($manv)
    {
    }
    //cho ng dung
    public function GetDanhSachSanPham()
    {
        $TheLoai = DB::select('SELECT * FROM theloaisp');
        $TopSanPham = DB::select('SELECT SP.masp ,ASP.tenanh ,SP.tensp,SP.gia
                                    FROM thongtinsp SP
                                        JOIN anhsp ASP
                                            ON SP.masp = ASP.masp
                                                LIMIT 5');

        $SanPham = DB::select('SELECT SP.masp ,ASP.tenanh ,SP.tensp ,DG.sao ,SP.gia
                                FROM thongtinsp SP 
                                    JOIN anhsp ASP
                                        ON SP.masp = ASP.masp
                                    LEFT JOIN danhgiasp DG
                                        ON SP.masp = DG.masp'
                            );
        return view('SanPham',['SanPham' => $SanPham ,'TheLoai'=>$TheLoai,'TopSanPham'=>$TopSanPham]);
    }
    //
    public function SapXepTheLoai($matl)
    {
        $TheLoai = DB::select('SELECT * FROM theloaisp');
        $TopSanPham = DB::select('SELECT SP.masp ,ASP.tenanh ,SP.tensp,SP.gia
                                    FROM thongtinsp SP
                                        JOIN anhsp ASP
                                            ON SP.masp = ASP.masp
                                                LIMIT 5');

        $SanPham = DB::select('SELECT SP.masp ,ASP.tenanh ,SP.tensp ,DG.sao ,SP.gia
                                FROM thongtinsp SP 
                                    JOIN anhsp ASP
                                        ON SP.masp = ASP.masp
                                    LEFT JOIN danhgiasp DG
                                        ON SP.masp = DG.masp
                                        WHERE SP.loaisp = '."'$matl'"
                            );
        return view('SanPham',['SanPham' => $SanPham ,'TheLoai'=>$TheLoai,'TopSanPham'=>$TopSanPham]);
    }
    public function TimKiemSanPham(Request $request)
    {
        
        $TheLoai = DB::select('SELECT * FROM theloaisp');
        $SanPham = DB::select(' SELECT SP.masp ,ASP.tenanh ,SP.tensp ,DG.sao ,SP.gia
                FROM thongtinsp SP 
                    LEFT JOIN anhsp ASP
                        ON SP.masp = ASP.masp
                    LEFT JOIN danhgiasp DG
                        ON SP.masp = DG.masp
                    LEFT JOIN chitietsp CT 
                        ON SP.masp = CT.masp 
                WHERE SP.tensp LIKE N'."'%$request->TimKiem%'".
                    ' OR SP.gia LIKE N'."'%$request->TimKiem%'".
                    ' OR SP.loaisp LIKE  N'."'%$request->TimKiem%'".
                    ' OR CT.tacgia LIKE  N'."'%$request->TimKiem%'".
                    ' OR CT.nhaxb LIKE  N'."'%$request->TimKiem%'"
                );
        $TopSanPham = DB::select('SELECT SP.masp ,ASP.tenanh ,SP.tensp,SP.gia
                                    FROM thongtinsp SP
                                        JOIN anhsp ASP
                                            ON SP.masp = ASP.masp
                                                LIMIT 5');
        return view('SanPham',['SanPham' => $SanPham ,'TheLoai'=>$TheLoai,'TopSanPham'=>$TopSanPham]);
        echo $request->TimKiem;
    }
      
    public function GetXemChiTietSanPham($masp)
    {
        $SanPham = DB::select('SELECT SP.masp ,ASP.tenanh ,SP.tensp ,SP.gia ,SP.soluong ,CT.kichthuoc ,CT.sotrang ,CT.sotrang ,CT.nhaxb ,Ct.tacgia ,CT.trongluong,XT.tomtat ,XT.doctruoc,DG.sao,TL.tentl,TL.loaisp
                                FROM thongtinsp SP 
                                    LEFT JOIN  anhsp ASP
                                        ON SP.masp = ASP.masp
                                    LEFT JOIN danhgiasp DG
                                        ON SP.masp = DG.masp
                                    LEFT JOIN chitietsp CT
                                        ON SP.masp = CT.masp
                                    LEFT JOIN xemtruocsp XT
                                        ON XT.masp = SP.masp
                                    LEFT JOIN theloaisp TL
                                        ON TL.loaisp = SP.loaisp
                                    WHERE SP.masp = '."'$masp'"
                            );
        foreach ($SanPham as $key)
        {
            $masp = $key->masp;
            $matl = $key->loaisp;
        } 
        $SP = DB::select('SELECT SP.masp ,ASP.tenanh ,SP.tensp ,DG.sao ,SP.gia
                                FROM thongtinsp SP 
                                    JOIN anhsp ASP
                                        ON SP.masp = ASP.masp
                                    LEFT JOIN danhgiasp DG
                                        ON SP.masp = DG.masp
                                    LEFT JOIN theloaisp TL
                                        ON SP.loaisp = TL.loaisp
                                  WHERE TL.loaisp = '."'$matl'".'   
                                  AND SP.masp NOT LIKE '."'$masp'".'
                                  LIMIT 5');

        return view('ChiTietSanPham',['SanPham' => $SanPham,'SP' => $SP]);
        
    }
}