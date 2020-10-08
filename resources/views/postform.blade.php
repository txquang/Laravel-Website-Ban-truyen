<form  action="{{ url('PostDangNhap') }}" method="POST">
    {{ csrf_field() }}
    <input type="text" name="HoTen">
    <input type="text" name="HoTen1">
    <input type="submit" name="">
</form>