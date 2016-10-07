<?php
	//現在時刻を返す関数
	function get_time(){
		date_default_timezone_set('Asia/Tokyo');
		return date("Y-m-d H:i:s");
	}

	//10~99の間でsaltを発行する
	function create_salt(){
		return rand(10,99);
	}

?>	
