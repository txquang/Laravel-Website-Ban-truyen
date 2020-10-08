@extends('Top')
@section('Top')
<!DOCTYPE html>
<html>
<head>
  <style>
    table {
      width:100%;
    }
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 15px;
      text-align: left;
    }
    #t01 tr:nth-child(even) {
      background-color: #eee;
    }
    #t01 tr:nth-child(odd) {
     background-color: #fff;
   }
   #t01 th {
    background-color: black;
    color: white;
  }
</style>
</head>
<body>

  <h2>Quản lý giỏ hàng</h2>

  <table id="t01">
    <tr>
      <th>Mã đơn hàng</th>
      <th>Tổng tiền</th> 
      <th>Trạng thái</th>
      <th width="100">Chi Tiết</th>
    </tr>
    @foreach ($GioHang as $key)
    <tr>
      <td>{{$key->madh}}</td>
      <td>{{$key->tongtien}}</td>
      @if (strcmp('1', $key->trangthai) == 1)
          <td b>Chưa giao hàng</td>
      @else
        <td style="background-color:#bdde9d">Đã thanh toán</td>
      @endif
      <td><a href="KhoiPhuc/{{$key->madh}}" class="btn btn-danger">Xem Chi Tiết</a></td>
    </tr>
    @endforeach
  </table>
  <h2></h2>

</body>
</html>
@endsection