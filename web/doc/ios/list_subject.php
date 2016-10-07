<?php
//<!-- 教科IDと教科名、変換 -->
	header('Content-type: text/plain; charset=UTF-8');
	header('Content-type: application/json; charset=UTF-8');
	header('Content-Transfer-Encoding: binary');


	require_once(dirname(__FILE__).'/../mysqli_connection.php');
	$link_id=db_connect();
	$sql="SELECT ID,Name FROM u22.Subject;";
	$data=db_fetch($sql,$link_id);
	db_close($link_id);

	$json_array=array();
	$i=0;
	foreach($data as $tmp){
		$json_array[$i]["ID"]=$tmp["ID"];
		$json_array[$i]["Name"]=$tmp["Name"];
		$i++;
	}

	echo json_encode($json_array);
?>
