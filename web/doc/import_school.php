<!-- 学校登録処理 -->
<?php
	require_once(dirname(__FILE__).'/mysqli_connection.php');

	session_start();
	//if((empty($_SESSION["UserID"])) || (($_SESSION["Type"]!="Teacher"))){
	//	echo "<p>Please Login for Teacher account</p>";
	//	exit;
	//}

	$Group_data=array("school_name"=>"$_POST[school_name]","grade"=>$_POST[grade],"class"=>"$_POST[class]","num"=>$_POST[num],"type"=>"$_POST[type]");
	$sql0="REPLACE INTO u22.Group(School_Name,Grade,Class,NumMember,School_type) VALUES(\"$Group_data[school_name]\",\"$Group_data[grade]\",\"$Group_data[class]\",\"$Group_data[num]\",\"$Group_data[type]\");";

	$link_id=db_connect();
	db_query($sql0,$link_id);
	db_close($link_id);


	header("Location: ../index.php");
	exit;
?>
