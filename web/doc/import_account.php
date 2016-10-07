<!-- アカウント新規登録画面処理 -->
<?php
	require_once(dirname(__FILE__).'/mysqli_connection.php');
	require_once(dirname(__FILE__).'/myfunc.php');

	$ctime=get_time();
	$salt=create_salt();
	$cryPW=crypt($_POST["ePassword"],$salt);

	$aSQL=array(
		"REPLACE INTO u22.User VALUES(\"$_POST[UserID]\",\"$cryPW\",\"$_POST[FirstName]\",\"$_POST[LastName]\",\"$_POST[GroupID]\",\"$_POST[Sex]\",\"$_POST[Type]\",\"$ctime\");",
		"REPLACE INTO u22.Salt VALUES(\"$_POST[UserID]\",\"$salt\");");
	
	$link_id=db_connect();
	$data=db_a_query($aSQL,$link_id);
	db_close($link_id);

	header("Location: ./login.php");
?>
