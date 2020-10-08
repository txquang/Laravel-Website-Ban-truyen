<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sản phẩm</title>
<link rel="stylesheet" type="text/css" href="{{asset('CSS/Admim/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('CSS/Admim/css/datepicker3.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('CSS/Admim/css/styles.css')}}">
<script src="{{ asset('JS/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('JS/js/lumino.glyphs.js') }}"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
		
	<<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
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
			<li class="active">
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
			<li>
				<a href="{{ URL('Admim/TaiKhoan/DanhSach') }}">
					<svg class="glyph stroked male-user">
						<use xlink:href="#stroked-male-user"/>
					</svg> Tài khoản
				</a>
			</li>
			<li role="presentation" class="divider"></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách sản phẩm</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="Them" class="btn btn-primary">Thêm sản phẩm</a>
								<table class="table table-bordered" style="margin-top:20px;">			
									<thead>
										<tr class="bg-primary">
											<th>Ảnh</th>
											<th style="display:none;">Tên Ảnh</th>
											<th style="display:none;">Mã Sản Phẩm</th>
											<th>Tên Sản Phẩm</th>
											<th>Thể Loại</th>
											<th>Tác Giả</th>
											<th>Giá</th>
											<th>Số Lượng </th>
											<th>NXB</th>
											<th>Số Trang</th>
											<th >Kích Thước</th>
											<th>Trọng Lượng</th>
											<th width="20%">Tùy Chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($SanPham as $key)
										<tr>
											<td>
												<img width="65px" src="{{ asset('/Anh/'.$key->tenanh) }}" class="thumbnail">
											</td>
											<td style="display:none;">{{$key->tenanh}}</td>
											<td style="display:none;">{{$key->masp}}</td>
											<td>{{$key->tensp}}</td>
											<td>{{$key->tentl}}</td>
											<td>{{$key->tacgia}}</td>
											<td>{{$key->gia}}</td>
											<td>{{$key->soluong}}</td>
											<td>{{$key->nhaxb}}</td>
											<td>{{$key->sotrang}}</td>
											<td>{{$key->kichthuoc}}</td>
											<td>{{$key->trongluong}}</td>
											<td>
												<a href="Sua/{{$key->masp}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});
		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
