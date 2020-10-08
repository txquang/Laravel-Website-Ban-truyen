<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sửa tài khoản</title>
<link rel="stylesheet" type="text/css" href="{{asset('CSS/Admim/css/bootstrap1.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('CSS/Admim/css/datepicker3.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('CSS/Admim/css/styles.css')}}">
<script src="{{ asset('JS/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('JS/js/lumino.glyphs.js') }}"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
#navbar{
    margin-top:50px;}
#tbl-first-row{
    font-weight:bold;}  
#logout{
    padding-right:30px;}    
</style>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Admin</a>
                <ul class="user-menu">
                   <?php  
                        if( Session::get('TenNVSS')!=null ){
                    ?>

                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                        {{Session::get('TenNVSS')}} 
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                        
                                <li>
                                    <a href="{{URL::to('DangXuat')}}"> 
                                        <svg class="glyph stroked cancel">
                                        <use xlink:href="#stroked-cancel">
                                        </use>
                                    </svg>Đăng xuất</a>
                                </li>
                        </ul>
                    </li>
                    <?php  } ?>
                </ul>
            </div>
                            
        </div><!-- /.container-fluid -->
    </nav>

    
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu">
            <li role="presentation" class="divider"></li>
            <li>
                <a href="{{ URL('Admim/TrangChu') }}">
                    <svg class="glyph stroked dashboard-dial">
                        <use xlink:href="#stroked-dashboard-dial">
                            
                        </use>
                    </svg> Trang chủ
                </a>
            </li>
            <li>
                <a href="{{ URL('Admim/SanPham/DanhSach') }}">
                    <svg class="glyph stroked calendar">
                        <use xlink:href="#stroked-calendar">
                            
                        </use>
                    </svg> Sản phẩm
                </a>
                </li>
            <li>
                <a href="{{ URL('Admim/TheLoai/DanhSach') }}">
                    <svg class="glyph stroked line-graph">
                        <use xlink:href="#stroked-line-graph">
                            
                        </use>
                    </svg> Thể Loại
                </a>
            </li>
            <li class="active">
                <a href="{{ URL('Admim/TaiKhoan/DanhSach') }}">
                    <svg class="glyph stroked male-user">
                        <use xlink:href="#stroked-male-user"/>
                    </svg> Tài khoản
                </a>
            </li>
            <li role="presentation" class="divider"></li>
        </ul>
    </div><!--/.sidebar-->

    <div class="row">
        <div class="col-sm-6">
            <div class="alert alert-danger">
                @if(count($errors)>0)
                                
                    @foreach ($errors->all() as $err ):
                        {{$err}}
                    @endforeach
                                
                @endif 
                @if(session('thongbao'))
                        {{session('thongbao')}}
                @endif
            </div>
           
                @foreach ($TaiKhoan as $key)
                <form action="{{$key->manv}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tài Khoản</label>
                        <input type="text" name="taikhoan" class="form-control" placeholder="Username" value="{{$key->taikhoan}}" required />
                    </div>
                    <div class="form-group">
                        <label>Mật Khẩu</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" value="123" required />
                    </div>
                    <div class="form-group">
                        <label>Quyền</label>
                        <select name="quyen" class="form-control">
                            <option value="0" selected="selected">Khách Hàng</option>
                            <option value="1">Quản Lí</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Trạng Thái</label>
                        <select name="trangthai" class="form-control">
                            <option value="1">Sử Dụng</option>
                            <option value="0">Đã Khóa</option>
                        </select>
                    </div>
                  
                @endforeach
                <input type="submit" value="Sửa Tài Khoản" class="btn btn-primary"/>
            </form>
        </div>
    </div>
</div>

</body>
</html>
