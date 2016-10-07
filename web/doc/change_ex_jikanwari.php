<?php
	//時間割変更処理

	require_once(dirname(__FILE__).'/mysqli_connection.php');

	session_start();
//	if((empty($_SESSION["UserID"])) || (($_SESSION["Type"]!="Teacher"))){
//		echo "<p>Please Login for Teacher account</p>";
//		exit;
//	}

	$gID=$_SESSION["GroupID"];
	$o_Date=$_POST["oDate_Y"]."/".$_POST["oDate_m"]."/".$_POST["oDate_d"];

	$sql="REPLACE INTO u22.TimeTable(GroupID,o_Date,o_Class_Time,o_Class_ID,ch_Content,ch_Class_ID) VALUES(\"$gID\",\"$o_Date\",\"$_POST[oCTime]\",\"$_POST[o_subject]\",\"$_POST[chCt]\",\"$_POST[subject]\");";

	//echo $sql;
	$link_id=db_connect();
	$data=db_query($sql,$link_id);
	db_close($link_id);

	header("Location: ./change_jikanwari.php");
	exit;
?>
