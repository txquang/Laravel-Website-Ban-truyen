@extends('Top')
@section('Top')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chi Tiet</title>
	<link rel="stylesheet" type="text/css" href="{{asset('CSS/Admim/css/bootstrap2.min.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="{{ asset('JS/js/bootstrap.min.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('CSS/CHITIETSP.css')}}">
	<script>
		if ( window.history.replaceState ) 
		{
			window.history.replaceState( null, null, window.location.href );
		}
	</script>
</head>
<body>
	@foreach ($SanPham as $key)

	<div class="container">
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-lg">

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">{{$key->tensp}}</h3>
					</div>
					<div class="modal-body">
						<p>{!!html_entity_decode($key->doctruoc)!!}</p>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div id="Sach1">
		<div id="ThongTin">
			<div class="Anh">
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Đọc Thử</button>
				<img src="{{ asset('/Anh/'.$key->tenanh) }}" alt="Pineapple" >
			</div>
			<div id="Q">
				<h1 class="e">
					<bdi>
						{{$key->tensp}}
					</bdi>

				</h1>
				<div class="Gia">
					<label id="GiaBan">{{number_format ( $key->gia , 0 , "." , "." )}} đ</label><label></label>
				</div>
				<div id="TinhTrang">
					<label id="TinhTrang1">Trạng Thái  </label>
					@if( $key->soluong >0 )
					<label id="TinhTrang2">Còn Hàng  </label>
					@else
					<label id="TinhTrang2">Hết Hàng  </label>
					@endif
				</div>
				<form action="{{url('GioHang/Them')}}" method="post" >
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<label class="rt">Số Lượng</label>
					<input type="hidden" name="MaSP"  value="{{$key->masp}}"><!--ma sp-->
					<input type="hidden" name="DonGia"  value="{{$key->gia}}"><!--gia sp-->
					<input type="text" name="SoLuong" placeholder="1" width="50px" value="1"><br><br>
					<input type="submit" name="MuaHang" value="Mua Ngay" class="Nut">
					<input type="submit" name="ThemVaoGio" value="Thêm Vào Giỏ" class="Nut" >
				</form>					
			</div>				
		</div>


		<div id="BaoHanh">
			<div class="widget-box">
				<h3>Chính sách đổi trả</h3>
				<div class="content-widget">
					<div class="returnpolicy icon-return">
						<strong>Hoàn tiền 100%</strong>
						Nếu phát hiện hàng giả
					</div>
					<div class="returnpolicy icon-return7">
						<strong>Đổi trả trong vòng 7 ngày</strong>
						Không chấp nhận<br> trường hợp thay đổi suy nghĩ
					</div>
					<div class="returnpolicy icon-waranty">
						<strong>Bảo hành</strong>
						Nếu phát hiện hàng giả
					</div>
				</div>
			</div>

			<div class="widget-box">
				<ul class="menu-list">
					<li><a href="#">Chính sách thành viên</a></li>
					<li><a href="#">Chính sách khách sỉ</a></li>
					<li><a href="#">Chính sách giao nhận</a></li>
					<li><a href="#">Dailydeals</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div id="Sach2">
		<h1 id="ChiTiet1"><span>Thông tin</span> sản phẩm </h1>
		<div class="ChiTiet2">
			<span class="label1">Trọng Lượng (gr):</span>
			<div class="value">{{$key->tentl}}</div>
		</div>
		<div class="ChiTiet2">
			<span class="label1">Kích Thước (cm):</span>
			<div class="value">{{$key->kichthuoc}}</div>
		</div>
		<div class="ChiTiet2">
			<span class="label1">Số Trang:</span>
			<div class="value">{{$key->sotrang}}</div>
		</div>
		<div class="ChiTiet2">
			<span class="label1">Nhà Xuất Bản:</span>
			<div class="value">{{$key->nhaxb}}</div>
		</div>
		<div class="ChiTiet2">
			<span class="label1">Tác Giả:</span>
			<div class="value">{{$key->tacgia}}</div>
		</div>
		<div class="ChiTiet2">
			<span class="label1">Trọng Lượng (gr):</span>
			<div class="value">{{$key->trongluong}}</div>
		</div>
	</div>

	<div id="Sach3">
		<h1 id="ChiTiet1"><span>Mô tả</span> sản phẩm </h1>
		<div class="ChiTiet2">
			<p style="color:red; font-size:20px; font-weight: bold;margin-left: 30px;">{{$key->tensp}}</p>
			<div id="tomtat">
				{!!html_entity_decode($key->tomtat)!!}
			</div>
		</div>
	</div>
	@endforeach
	<div id="Sach4">
		<h1 id="ChiTiet1"><span>Thường được</span> xem cùng</h1>
		<div class="danhsach">	
			<ul>    
				@foreach ($SP as $key)    
				<li>
					<a href="{{$key->masp}}">
						<img src="{{ asset('/Anh/'.$key->tenanh) }}">
					</a>
					<h2>{{$key->tensp}}</h2>
					<p>Đánh giá: {{$key->sao}}</p>
					<h4>{{number_format ( $key->gia , 0 , "." , "." )}} đ</h4>
				</li>
				@endforeach
			</ul>	
		</div>  	
	</body>
	</html>
	@endsection
