<!-- カレンダー登録処理 -->
<?php
	session_start();
	//if(empty($_SESSION["UserID"])){
	//	echo "<p>Please Login </p>";
	//	exit;
	//}

	require_once(dirname(__FILE__).'/mysqli_connection.php');

	$date=$_POST["date_Y"]."/".$_POST["date_m"]."/".$_POST["date_d"];

	$sql="REPLACE INTO u22.Calender(GroupID,Date,Contents) VALUES(\"$_SESSION[GroupID]\",\"$date\",\"$_POST[contents]\");";

	$link_id=db_connect();
	db_query($sql,$link_id);
	db_close($link_id);

	header("Location: ../index.php");
	exit;

?>
