@extends('Top')
@section('Top')
<!DOCTYPE html>
<html>
<head>
	<title>GIO HANG</title>
	<link rel="stylesheet" type="text/css" href="{{asset('CSS/GIOHANG.css')}}">
</head>
<body>
	<div id="TieuDe">
		<h2>GIỎ HÀNG  <span> 
							@if(session()->has('success'))
								<div class="alert alert-success">
									{{ session()->get('success') }}
								</div>
							@endif
					</span>
	</h2>
	</div>
	<div id="NoiDung">
		<div id="NoiDung1">
			<ul>
				@foreach ($GioHang as $key)
				<li class="ChiTiet1">
					<img src="{{ asset('/Anh/'.$key->tenanh) }}">
					<label>{{$key->tensp}}
					</label><br>
					<br>
					<form action="{{url('GioHang/Sua')}}" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<p>
							<b>{{  number_format ( $key->dongia  , 0 , "." , "." )  }} ₫</b>
							<a href="" style="text-decoration: none;">x</a>
							<input type="hidden" name="MaDH" value="{{Session::get('MaDHSS')}}">
							<input type="hidden" name="MaSP" value="{{$key -> masp}}">
							<input type="text" name="SoLuong" value="{{$key -> soluong}}">
							<b>{{  number_format ( $key->thanhtien  , 0 , "." , "." )  }} ₫</b>
						</p><br><br><br>
						<label> 
							<input class="Sua" type="submit" name="Sửa" value="Sửa">
							<input class="Xoa" type="submit" name="Xóa" value="Xóa">
						</label>
					</form>
				</li>
				@endforeach

			</ul>
			
		</div>
		<div id="NoiDung2">
			<ul>
				@foreach ($TongTien as $key)
				<li id="TamTinh1">
					<label class="TenTam1">Tạm Tính:</label>
					<label class="TenTam2">{{$key->tongtien}}</label>
				</li>
				<li id="TamTinh2">
					<label class="TenTam3">Tổng Tiền:</label>
					<label class="TenTam4">{{  number_format ( $key->tongtien  , 0 , "." , "." )  }} ₫</label>
				</li>
				@endforeach
				<li id="TamTinh1">
					<a href="ThanhToan"><input type="submit" name="Mua" value="Thanh Toán"></a>
				</li>
				<li id="TamTinh1">
					<a href="../SanPham/DanhSach"><input type="submit" name="TiepTuc" value="Tiếp Tục Mua Hàng"></a>
				</li>
			</ul>
			
		</div>
		
	</div>
</body>
</html>
@endsection