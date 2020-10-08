@extends('Top')
@section('Top')
  <!DOCTYPE html>
  <html>
    <head>
      <title>Trang chủ</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
      <link rel="stylesheet" type="text/css" href="{{asset('CSS/w3.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('CSS/TRANGCHU1.css')}}">
      <style>
        .mySlides {display:none;}
      </style>
    </head>
  <body>
    <div class="content">
    </div>
    
    <div class="w3-content w3-section">
     <img class="mySlides" src="{{asset('ANH/ANHTRANGCHU/banner.jpg')}}" >
     <img class="mySlides" src="{{asset('ANH/ANHTRANGCHU/1.jpg')}}" >
     <img class="mySlides" src="{{asset('ANH/ANHTRANGCHU/2.jpg')}}" >
     <img class="mySlides" src="{{asset('ANH/ANHTRANGCHU/4.jpg')}}" >
     <img class="mySlides" src="{{asset('ANH/ANHTRANGCHU/banner.jpg')}}" >
     <img class="mySlides" src="{{asset('ANH/ANHTRANGCHU/5.jpg')}}" >
     <img class="mySlides" src="{{asset('ANH/ANHTRANGCHU/6.jpg')}}" >
     <img class="mySlides" src="{{asset('ANH/ANHTRANGCHU/7.jpg')}}" >

   </div>
   <div id="Q">
    <h2>
     <bdi>SẢN PHẨM MỚI</bdi>
   </h2>
   <h1 class="e">
    <bdi>SẢN PHẨM NỔI BẬT</bdi>
  </h1>

  <div class="danhsach">
     <ul> 
      @foreach ($TrangChu as $key)
               
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

  <script>
    var myIndex = 0;
    carousel();

    function carousel() 
    {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
      setTimeout(carousel, 2000); 
    }
  </script>
  </body>
  </html> 
@endsection