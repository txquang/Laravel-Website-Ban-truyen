<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use App\TheLoaiSPMD;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;

class TheLoaiController extends Controller
{
    
    //
    public function GetDanhSach()
    {
        if( empty(Session::get('Admin')) )
            return redirect()->route('DangNhap');

    	$TheLoai = TheLoaiSPMD::all();
    	return view('Admim.category',['TheLoai' => $TheLoai]);
    	//foreach ($TaiKhoan as $key => $value) {
    //echo $value->loaisp."  ";echo $value->tentl."  ";
    }

    public function PostThem(request $request)
    {
        if( empty(Session::get('Admin')) )
            return redirect()->route('DangNhap'); 

        $this->validate($request,
            [
                'tentl'=>'
                    required|unique:theloaisp,tentl|min:3|max:60'
                    
            ],
            [
                'tentl.required'=>'Bạn chưa nhập tên thể loại',
                'tentl.unique'=>'Tên thể loại đã tồn tại',
                'tentl.min'=>'Tên thể loại có ít nhất 3 kí tự',
                'tentl.max'=>'Tên thể loại có độ dài dưới 60 kí tự'
               
            ]);

        $Time = "TL".Carbon::now('Asia/Ho_Chi_Minh')->format('dmYHis');
        $TheLoai = new TheLoaiSPMD;
        $TheLoai->loaisp = $Time;
        $TheLoai->tentl = $request->tentl;
        $TheLoai->save();
        return redirect('Admim/TheLoai/DanhSach')->with('thongbao','Thêm Thể Loại '. $request->tentl .' Thành Công'); 
    }

    public function GetSua( $loaisp )
    {

        if( empty(Session::get('Admin')) )
            return redirect()->route('DangNhap');

        $TheLoai = TheLoaiSPMD::where('loaisp', $loaisp)->get();
        //echo $TheLoai->loaisp;
    	return view('Admim.editcategory',['TheLoai' => $TheLoai ]);
    }
    public function PostSua($loaisp, Request $request)
    {
        if( empty(Session::get('Admin')) )
            return redirect()->route('DangNhap');

        $this->validate($request, 
            [
                'tentl'=>'
                    required|unique:theloaisp,tentl|min:3|max:60'
            ],
            [
                'tentl.required'=>'Bạn chưa nhập thể loại',
                'tentl.unique'=>'Tên thể loại đã tồn tại',
                'tentl.min'=>'Tên thể loại có ít nhất 3 kí tự',
                'tentl.max'=>'Tên thể loại có độ dài không quá 60 kí tự'
            ]
        );
       // var_dump($loaisp);
        //echo $request->TheLoai;
        //$TheLoai = TheLoaiSPMD::where('loaisp','=', $loaisp)->first();
        //$TheLoai = TheLoaiSPMD::find($loaisp);
        $TheLoai = DB::table('theloaisp')
            ->where('loaisp', $loaisp)
            ->update(['tentl' => $request->tentl]);

        return redirect('Admim/TheLoai/Sua/'.$loaisp)
            ->with('thongbao',' Sửa thành công');
        //var_dump($TheLoai);

        
        /*$TheLoai->tentl = $request->tentl;
        $TheLoai->tentl = changeTitle($request->tentl)
        $TheLoai->save();
        return redirect('admim/TheLoai/Sua/'.$TheLoai->loaisp)
        var_dump($loaisp);
        echo $request->tentl;*/
    }
    public function GetXoa($loaisp)
    {
        if( empty(Session::get('Admin')) )
            return redirect()->route('DangNhap');

        $TheLoai= DB::table('theloaisp')
            ->where('loaisp',$loaisp)
            ->delete();
        return redirect('Admim/TheLoai/DanhSach')
            ->with('thongbao','Bạn đã xóa thành công');
    }
}
