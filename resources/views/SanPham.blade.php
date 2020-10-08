@extends('Top')
@section('Top')
<!DOCTYPE html>
<html>
<head>
	<title>San Pham</title>
	<link rel="stylesheet" type="text/css" href="{{asset('CSS/SANPHAM.css')}}">
</head>
<body>
	<div id="danhsach">
		<div id="danhmuc">
			<p>THỂ LOẠI</p>
			@foreach ($TheLoai as $key)
			<ul>
				<li>
					<span>
						<a href="{{URL::to('SanPham/'.$key->loaisp)}}">{{$key->tentl}}</a>
					</span>
				</li>
			</ul>
			@endforeach
		</div>
		<div class="ten_ds">
			<p>TOP SÁCH HAY</p>
		</div>
		<ol class="rounded-list">
			@foreach ($TopSanPham as $key)
			<li>
				<a href="">
					<img align="left" src="{{ asset('/Anh/'.$key->tenanh) }}">
					<p id="ten_truyen">{{$key->tensp}}</p>
					<p id="danhgia">{{number_format ( $key->gia , 0 , "." , "." )}} đ</p>
				</a>
			</li>
			@endforeach
		</ol>
	</div>

	<div class="noidung">
		<div class="tieude">Sản Phẩm</div>

		<div class="danhsach">
			
			<ul>
				@foreach ($SanPham as $key)
				<a href="ChiTietSanPham/{{$key->masp}}">
					<li>
						<img src="{{ asset('/Anh/'.$key->tenanh) }}">
						<h3>{{$key->tensp}}</h3>
						<span>Đánh giá: {{$key->sao}}</span>
						<p>{{number_format ( $key->gia , 0 , "." , "." )}} đ</p>
					</li>
				</a>
				@endforeach       
			</ul>
			
		</div>  
	</div>
</body>
</html>
@endsection