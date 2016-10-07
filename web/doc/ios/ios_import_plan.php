<?php
	// <!-- iOS用課題登録処理 -->
	require_once(dirname(__FILE__).'/../mysqli_connection.php');
	$link_id=db_connect();
	
	$UserID=$_GET['UserID'];
	$Year  =$_GET['Year'];
	$Month =$_GET['Month'];
	$Day   =$_GET['Day'];
	$Submit=$_GET['Content'];
	$Class =$_GET['Subject'];

	$dead_line=$Year."/".$Month."/".$Day;
	$dead_time="00:00";

	$sql="SELECT GroupID FROM u22.User WHERE UserID = \"$UserID\"";
	$data=db_fetch($sql,$link_id);
	$GroupID=$data[0]["GroupID"];

	$sql="REPLACE INTO u22.Planlist (GroupID,Submit_Name,Class_Name,Dead_Line,Dead_Time) VALUES(\"$GroupID\",\"$Submit\",\"$Class\",\"$dead_line\",\"$dead_time\");";
	$data=db_query($sql,$link_id);

	db_close($link_id);

	echo 0;
?>
