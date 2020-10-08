<?php
	use Carbon\Carbon;
	$Time =  Carbon::now('Asia/Ho_Chi_Minh');
	echo "NG".$Time->format('dmYHis')."\br";
	echo "NG".Carbon::now('Asia/Ho_Chi_Minh')->format('dmYHis');echo "<br>";

	if(session()->has('MaNVSS')) 
	{
		var_dump(Session::get('TenNVSS'));echo "<br>";
		var_dump(Session::get('MaNVSS'));echo "<br>";
		var_dump(Session::get('MaDHSS'));echo "<br>";
		//Session()->forget('key');
	}
	else 
	{
		echo "chua";
	}
	

?>