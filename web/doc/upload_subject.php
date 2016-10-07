<!-- ファイルアップロード教科登録処理 -->
<?php
	//session_start();
	//if((empty($_SESSION["UserID"])) || (($_SESSION["Type"]!="Teacher"))){
	//	echo "<p>Please Login for Teacher account</p>";
	//	exit;
	//}
	
	require_once(dirname(__FILE__).'/mysqli_connection.php');

	if(is_uploaded_file($_FILES["jfile"]["tmp_name"])){
		$file_name=$_FILES["jfile"]["name"];
		$file_tmp =$_FILES["jfile"]["tmp_name"];

		if(pathinfo($file_name,PATHINFO_EXTENSION)!='csv'){
			$err_msg="support only csv";
		}else{
			session_start();

			chmod($file_tmp,0644);
			$fp=fopen($file_tmp,"r");

			setlocale(LC_ALL,'ja_JP');
			setlocale(LC_ALL,'ja_JP.UTF-8');

			$data=array();
			$link_id=db_connect();
			while($tmp=fgets($fp)){
				$tmp=preg_replace('/\n/','',$tmp);
				$sql="REPLACE INTO u22.Subject(GroupID,Name) VALUES(\"$_SESSION[GroupID]\",\"$tmp\");";
				db_query($sql,$link_id);

			}
			db_close($link_id);

			fclose($fp);

			unlink($file_tmp);
		}
	}else{
		$err_msg="can't uploaded";
	}
	if(isset($err_msg)){
		echo $err_msg;
	}else{
		header("Location: ../index.php");
	}
	exit;

?>
