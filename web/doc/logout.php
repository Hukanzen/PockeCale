<!-- ログアウト -->
<?php
	session_start();

	$_SESSION["UserID"]="";
	$_SESSION["Type"]="";
	$_SESSION["GroupID"]="";

	header("Location: ../index.php");
	exit;
?>
