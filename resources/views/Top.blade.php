@extends('End')
@section('End')
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('CSS/TOP.css')}}">
</head>
<body>
	<div id="menu">
		<ul>
			<li><a href="{{URL::to('TrangChu')}}"> Trang chủ </a></li>
			<li><a href="{{URL::to('SanPham')}}"> Sản phẩm </a></li>
			<li><a href="{{URL::to('GioHang/DanhSach')}}"> Giỏ hàng </a></li>
			<li><a href="{{URL::to('GioiThieu')}}"> Giới thiệu </a></li>
			<?php 
			if( Session::get('TenNVSS')!=null ){
				?>
				<li><a>{{Session::get('TenNVSS')}}</a>
				<?php }else { ?>
					<li><a>Tài khoản</a>
					<?php  } ?>
					<ul class="sub-menu">
						<?php  
						if( Session::get('TenNVSS')!=null ){
							?>
							<li><a href="">Quản lý tài khoản</a></li>
							<li><a href="{{URL::to('GioHang/LichSu')}}">Đơn hàng của tôi</a></li>
							<li><a href="{{URL::to('DangXuat')}}">Đăng xuất</a></li>
						<?php }else { ?>
							<li><a href="{{URL::to('DangNhap')}}">Đăng nhập</a></li>
							<li><a href="{{URL::to('DangKy')}}">Đăng ký</a></li>
						<?php  } ?>
					</ul>
				</li>	
				<li>
					<form action="{{ url('SanPham/TimKiem')}}" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="search" placeholder="Search" name="TimKiem">
					</form>
				</li>
		</ul>
	</div>
</body>
</html>
@yield('Top')
@endsection