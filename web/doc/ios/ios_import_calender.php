<!-- iOS用カレンダー登録処理 -->
<?php
	require_once(dirname(__FILE__).'/../mysqli_connection.php');
	$link_id=db_connect();

	$UserID=$_GET['UserID'];
	$Year  =$_GET['Year'];
	$Month =$_GET['Month'];
	$Day   =$_GET['Day'];
	$Cont  =$_GET['Content'];
	
	$date=$Year."/".$Month."/".$Day;

	$sql="SELECT GroupID FROM u22.User WHERE UserID = \"$UserID\"";
	$data=db_fetch($sql,$link_id);
	$GroupID=$data[0]["GroupID"];

	$sql="REPLACE INTO u22.Calender(GroupID,Date,Contents) VALUES(\"$GroupID\",\"$date\",\"$Cont\");";

	$data=db_query($sql,$link_id);

	db_close($link_id);

	echo 0;
?>

