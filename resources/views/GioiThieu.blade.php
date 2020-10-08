@extends('Top')
@section('Top')
<!DOCTYPE html>
<html>
<head>
	<title>Gioi Thieu</title>
	<link rel="stylesheet" type="text/css" href="{{asset('CSS/GIOITHIEU.css')}}">
</head>
<body>
	<div align="center"  id="tieude">
		<h1>Đề tài: Website bán sách Laravel</h1>
		<h2>Người thực hiện</h2>
	</div>
	<div>
		<h2> Vũ Anh Tài - 18I3</h2>

		<a href="https://www.facebook.com/VuAnhTai01"><img src="{{asset('ANH/ANHGIOITHIEU/1.png')}}"></a>
	</div>
	<div>
		<h2> Trần Xuân Quang - 18I3</h2>
		<a href="https://www.facebook.com/Quang16072000"><img src="{{asset('ANH/ANHGIOITHIEU/2.png')}}"></a>
	</div>
	<div>
		<h2> Nguyễn Văn Tuyển - 18I3</h2>
		<a href="https://www.facebook.com/catprovicieo"><img src="{{asset('ANH/ANHGIOITHIEU/3.png')}}"></a>
	</div>
</body>
</html>
@endsection