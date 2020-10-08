<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sửa sản phẩm</title>
<link rel="stylesheet" type="text/css" href="{{asset('CSS/Admim/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('CSS/Admim/css/datepicker3.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('CSS/Admim/css/styles.css')}}">
<script src="{{ asset('JS/js/jquery-1.11.1.min.js') }}"></script>
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
					<div class="panel-heading">Sửa sản phẩm</div>
					<div class="panel-body">

						@foreach ($SanPham as $key)
						<form action="{{$key->masp}}" method="post">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<input type="hidden" name="masp" value="{{$key->masp}}">
									<div class="form-group" >
										<label>Ảnh sản phẩm</label><br>
										<input required id="img" type="file" name="anh" class="form-control hidden" >
					                    <img height="250px" width="170px" id="avatar" class="thumbnail" src="{{ asset('/Anh/'.$key->tenanh) }}">
									</div>
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input required type="text" name="tensp" class="form-control" value="{{$key->tensp}}">
									</div>
									<div class="form-group" >
										<label>Thể loại</label>
										<select required name="theloai" class="form-control">
											<option value="0">Tiểu thuyết</option>
											<option value="1">Kỹ năng sống</option>
											<option value="2">Tâm lý</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Tác giả</label>
										<input required type="text" name="tacgia" class="form-control" value="{{$key->tacgia}}">
									</div>
									<div class="form-group" >
										<label>Giá</label>
										<input required type="text" name="gia" class="form-control" value='{{number_format ( $key->gia , 0 , "." , "." )}} đ'>
									</div>
									<div class="form-group" >
										<label>Số lượng</label>
										<input required type="text" name="soluong" class="form-control" value="{{$key->soluong}}">
									</div>
									<div class="form-group" >
										<label>Nhà xuất bản</label>
										<input required type="text" name="nxb" class="form-control" value="{{$key->nhaxb}}">
									</div>
									<div class="form-group" >
										<label>Số trang</label>
										<input required type="text" name="sotrang" class="form-control" value="{{$key->sotrang}}">
									</div>
									<div class="form-group" >
										<label>Kích thước</label>
										<input required type="text" name="kichthuoc" class="form-control" value="{{$key->kichthuoc}}">
									</div>
									<div class="form-group" >
										<label>Trọng lượng</label>
										<input required type="text" name="trongluong" class="form-control" value="{{$key->trongluong}}">
									</div>
									<div class="form-group" >
										<label>Mô tả</label><br>
										<textarea rows="6" cols="97" required name="mota">
											{!!html_entity_decode($key->tomtat)!!}
										</textarea>
									</div>
									<div class="form-group" >
										<label>Đọc thử</label><br>
										<textarea rows="8" cols="97" required name="docthu">
											{!!html_entity_decode($key->doctruoc)!!}
										</textarea>
									</div>
									<input type="submit" value="Sửa" class="btn btn-primary">
								</div>
							</div>
						</form>
						@endforeach
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
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
		});
		function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#img').click();
		    });
		});
	</script>	
</body>

</html>
