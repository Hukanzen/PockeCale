<!-- 時間割登録処理 -->
<?php
	require_once(dirname(__FILE__).'/mysqli_connection.php');

	session_start();
	$gID=$_SESSION["GroupID"];

	$sql="INSERT INTO u22.$_POST[dow]_ClassSchedule (GroupID,Class_$_POST[class]) VALUE(\"$gID\",\"$_POST[subject]\") ON DUPLICATE KEY UPDATE GroupID = \"$gID\",Class_$_POST[class] = \"$_POST[subject]\";";

	$link_id=db_connect();
	$data=db_query($sql,$link_id);
	db_close($link_id);

	header("Location: ../index.php");
	exit;
?>
