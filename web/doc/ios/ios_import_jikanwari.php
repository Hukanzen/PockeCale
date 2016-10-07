<?php
	//<!-- iOS用時間割登録処理 -->
	require_once(dirname(__FILE__).'/../mysqli_connection.php');
	$link_id=db_connect();

	$UserID=$_GET['UserID'];
	$dows  =$_GET['WeekDay'];
	$Class=array(
			$_GET['Class_1'],
			$_GET['Class_2'],
			$_GET['Class_3'],
			$_GET['Class_4'],
			$_GET['Class_5'],
			$_GET['Class_6'],
			$_GET['Class_7'],
			$_GET['Class_8']);
	
	$sql="SELECT GroupID FROM u22.User WHERE UserID = \"$UserID\"";
	$data=db_fetch($sql,$link_id);
	$GroupID=$data[0]["GroupID"];

	$sql="REPLACE INTO u22.".$dows."_ClassSchedule (GroupID,Class_1,Class_2,Class_3,Class_4,Class_5,Class_6,Class_7,Class_8) VALUE(\"$GroupID\",\"$Class[0]\",\"$Class[1]\",\"$Class[2]\",\"$Class[3]\",\"$Class[4]\",\"$Class[5]\",\"$Class[6]\",\"$Class[7]\");";

	$data=db_query($sql,$link_id);

	db_close($link_id);

	echo 0;
?>
