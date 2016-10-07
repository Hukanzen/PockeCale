<?php
	require_once(dirname(__FILE__).'/mysqli_connection.php');
	session_start();
	$_SESSION['UserID']="i65565";
	$_SESSION['Type']="Student";

	$link_id=db_connect();
	$sql="SELECT GroupID FROM u22.User WHERE UserID = \"$_SESSION[UserID]\"";
	$data=db_fetch($sql,$link_id);
	$_SESSION['GroupID']=$data[0]['GroupID'];
	db_close($link_id);

	header("Location: ../index.php");
	exit;
?>
