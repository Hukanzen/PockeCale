<!-- 教科登録処理 -->
<?php
	require_once(dirname(__FILE__).'/mysqli_connection.php');

	session_start();

	$link_id=db_connect();
	
	//$sql="SELECT * FROM u22.Subject;";
	$sql="REPLACE INTO u22.Subject(GroupID,Name) VALUES (\"$_SESSION[GroupID]\",\"$_POST[name]\");";
	$data=db_fetch($sql,$link_id);
	db_close($link_id);

	header("Location: ../index.php");
	exit;
?>
