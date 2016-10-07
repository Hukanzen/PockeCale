<!-- ファイルアップロード時間割登録処理 -->
<?php
	header('Content-type: text/plain; charset=UTF-8');
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
			$gID=$_SESSION["GroupID"];

			chmod($file_tmp,0644);
			$fp=fopen($file_tmp,"r");


			setlocale(LC_ALL,'ja_JP');
			setlocale(LC_ALL,'ja_JP.UTF-8');

			$dow=$_POST["dow"];

			$data=array();
			$link_id=db_connect();
			$subID_sql="SELECT ID,Name FROM u22.Subject WHERE GroupID=$_SESSION[GroupID];";
			$sub_data=db_fetch($subID_sql,$link_id);

			$fdata=array();
			$n=0;
			while(!feof($fp)){
				$tmp=fgets($fp,4096);
				$fdata[$n]=preg_replace('/$\n/','',$tmp);
				$n++;
			}
			fclose($fp);

			for($i=1;$i<=$n;$i++){
				foreach($sub_data as $tmp){
					if($fdata[$i]===$tmp["Name"]){
						//$sql="REPLACE INTO u22.".$dow."_ClassSchedule (GroupID,Class_".$i.") VALUE(\"$gID\",\"$tmp[ID]\");";
						//$sql="UPSERT u22.".$dow."_ClassSchedule SET Class_$i= \"$tmp[ID]\" WHERE GroupID = \"$gID\";";
						$sql="INSERT INTO u22.".$dow."_ClassSchedule (GroupID,Class_".$i.") VALUE(\"$gID\",\"$tmp[ID]\") ON DUPLICATE KEY UPDATE GroupID = \"$gID\",Class_".$i." = \"$tmp[ID]\";";
						db_query($sql,$link_id);
						
						break;
					}
				}
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
