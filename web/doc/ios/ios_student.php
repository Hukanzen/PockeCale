<?php
//	iOS用生徒用データ渡し
	require_once(dirname(__FILE__).'/../mysqli_connection.php');
	$UserID=$_GET['UserID'];

	$sql="SELECT GroupID FROM u22.User WHERE UserID = \"$UserID\"";

	$link_id=db_connect();
	$data=db_fetch($sql,$link_id);

	$GroupID=$data[0]["GroupID"];

	$aSQL=array(
		"SELECT UserID,FirstName,LastName,GroupID,Sex,Type,Created FROM u22.User WHERE UserID=\"$UserID\";",
		"SELECT * FROM u22.Group WHERE GroupID=\"$GroupID\";",
		"SELECT * FROM u22.Calender WHERE GroupID=\"$GroupID\";",
		"SELECT * FROM u22.TimeTable WHERE GroupID=\"$GroupID\";",
		"SELECT * FROM u22.Planlist WHERE GroupID=\"$GroupID\";",
		"SELECT * FROM u22.Mon_ClassSchedule WHERE GroupID=\"$GroupID\";",
		"SELECT * FROM u22.Tue_ClassSchedule WHERE GroupID=\"$GroupID\";",
		"SELECT * FROM u22.Wed_ClassSchedule WHERE GroupID=\"$GroupID\";",
		"SELECT * FROM u22.Thu_ClassSchedule WHERE GroupID=\"$GroupID\";",
		"SELECT * FROM u22.Fri_ClassSchedule WHERE GroupID=\"$GroupID\";");

	$data=db_a_fetch_assoc($aSQL,$link_id);
	db_close($link_id);
	
	$json=array();

	echo json_encode($data);
?>
