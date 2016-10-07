<?php
	//<!-- iOS用ログイン処理 -->
	require_once(dirname(__FILE__).'/../mysqli_connection.php');

	$tmpUID=$_GET['UserID'];
	$tmpUPW=$_GET['Password'];

	$aSQL=array(
		"SELECT ePassword,Type,GroupID FROM u22.User WHERE UserID = \"$tmpUID\";",
		"SELECT salt           FROM u22.Salt WHERE UserID = \"$tmpUID\";");

	$link_id=db_connect();
	$SQL_rslt=db_a_fetch_assoc($aSQL,$link_id);
	db_close($link_id);

	if(!isset($SQL_rslt[0][0]["ePassword"])){
		echo 1;
		exit;
	}

	$db_UPW=$SQL_rslt[0][0]["ePassword"];
	$db_slt=$SQL_rslt[1][0]["salt"];
	$cryPW=crypt($tmpUPW,$db_slt);

	if($db_UPW==$cryPW){
		echo 0;
	}else{
		echo 1;
	}
?>
