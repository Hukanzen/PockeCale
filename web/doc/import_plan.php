<!-- 課題登録処理 -->
<?php
	require_once(dirname(__FILE__).'/mysqli_connection.php');

	session_start();
	//if(empty($_SESSION["UserID"])){
	//	echo "<p>Please Login </p>";
	//	exit;
	//}

	$gID=$_SESSION["GroupID"];
	$dead_line=$_POST["deadl_Y"]."/".$_POST["deadl_m"]."/".$_POST["deadl_d"];
	$dead_time=$_POST["deadt_h"].":".$_POST["deadt_m"];

	$sql="REPLACE INTO u22.Planlist (GroupID,Submit_Name,Class_Name,Dead_Line,Dead_Time) VALUES(\"$gID\",\"$_POST[Submit_Name]\",\"$_POST[Class_Name]\",\"$dead_line\",\"$dead_time\");";

	//echo $sql;
	$link_id=db_connect();
	$data=db_query($sql,$link_id);
	db_close($link_id);

	header("Location: ../index.php");
	exit;

?>
