<!-- ログインページ処理 -->
<?php

	require_once(dirname(__FILE__).'/mysqli_connection.php');
	
	$tmpUID=$_POST["UserID"];
	$tmpUPW=$_POST["UserPW"];


	$aSQL=array(
		"SELECT ePassword,Type,GroupID FROM u22.User WHERE UserID = \"$tmpUID\";",
		"SELECT salt           FROM u22.Salt WHERE UserID = \"$tmpUID\";");

	
	$link_id=db_connect();
	$SQL_rslt=db_a_fetch_assoc($aSQL,$link_id);
	db_close($link_id);

	if(!isset($SQL_rslt[0][0]["ePassword"])){
		header("Location: ./error.php");
		exit;
	}

	$db_UPW=$SQL_rslt[0][0]["ePassword"];
	$db_slt=$SQL_rslt[1][0]["salt"];
	$cryPW=crypt($tmpUPW,$db_slt);

	if($db_UPW==$cryPW){
		session_start();
		$type=$SQL_rslt[0][0]["Type"];
		$_SESSION["UserID"]=$tmpUID;
		$_SESSION["Type"]=$type;
		$_SESSION["GroupID"]=$SQL_rslt[0][0]["GroupID"];
		if($type=="Teacher"){
			$url="../index.php";
		}else if($type=="Student"){
			$url="../index.php";
		}
	}else{
		$url="./error.php";
	}
	echo $url;
	header("Location: {$url}");
	exit;
?>
