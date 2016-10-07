<!doctype html>
<!-- アカウント新規登録画面 -->
<?php
	require_once(dirname(__FILE__).'/mysqli_connection.php');

	//get information
	//$newUID="i6556";
	//$newName0="kagawa";
	//$newName1="taro";
	//$newUPW="hoge01";
	//$newSex="man";
	//$newDate=get_time();

	//$newGrade=4;
	//$newClass=3;

	//if($newSex=="man") $newSex=1;
	//else $newSex=2;

	////create my salt
	//$salt=create_salt();

	////create angouka password
	//$cryPW=crypt($newUPW,$salt);

	$link_id=db_connect();
	$sql="SELECT * FROM u22.Group;";
	$data=db_fetch($sql,$link_id);
	//var_dump($data);
	db_close($link_id);
?>
<html>
<head>
	<title>create_account.php</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/template.css">
	<link rel="stylesheet" type="text/css" href="../css/caccount.css">
</head>
<body>
	<div id="main">
	<h1>アカウント作成</h1>
	<form action="import_account.php" method=POST>
		<input type=text name="UserID" placeholder="ユーザーID" class="textinput" required><br>
		<input type=password name="ePassword" placeholder="パスワード" class="textinput" required><br>
		<input type=text name="LastName" placeholder="苗字" class="textinput" required><br>
		<input type=text name="FirstName" placeholder="名前" class="textinput" required><br><br>
		<p class="tinput">グループID</p>
		<ul class="ulist">
<?php
			foreach($data as $tmp){
				echo "<li><label><input type=radio name=GroupID value=".$tmp[GroupID].">";
				$i=0;
				foreach($tmp as $tmp1){
					$i++;
					if($i==1 || $i==6 ) continue;
					echo "$tmp1"." ";
				}
				echo "</label></li>";
			}
?>	
		</ul>
		<p class="tinput">性別</p>
		<p><label><input type=radio name=Sex value="1">男&nbsp;&nbsp;<input type=radio name=Sex value="0">女</label></p>
		<p class="tinput">職業</p>
		<p><label><input type=radio name=Type value="Student">生徒&nbsp;&nbsp;<input type=radio name=Type value="Teacher">先生</label></p>
		<input type="submit" value="登録">
	</form>
	<p>すでにアカウントをお持ちの方は<a href="login_page.php" id="kotira">こちら</a></p>
	</div>

	<!--戻る進むボタン-->
	<div id="undermenu">
	<ul class="underbar">
		<li><a href="javascript:history.back()">＜戻る</a></li>
		<li><a href="../index.php">TOP</a></li>
		<li><a href="javascript:history.go(1)">進む＞</a></li>
	</ul>
</div>
</body>
</html>
