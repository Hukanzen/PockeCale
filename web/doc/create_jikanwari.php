<!doctype html>
<!-- 時間割登録 -->
<html>
<head>
	<title>create_jikanwari.php</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/template.css">
	<link rel="stylesheet" type="text/css" href="../css/caccount.css">
	<?php
	session_start();
	//if((empty($_SESSION["UserID"])) || (($_SESSION["Type"]!="Teacher"))){
	if(empty($_SESSION["UserID"])){
		echo "<div id='main'>
		<h1>ログインして下さい</h1>
		</div>
		<div id='undermenu'>
		<ul class='underbar'>
			<li><a href='javascript:history.back()''>＜戻る</a></li>
			<li><a href='../index.php'>TOP</a></li>
			<li><a href='javascript:history.go(1)''>進む＞</a></li>
		</ul>
		</div>";
		exit;
	}

	require_once(dirname(__FILE__).'/mysqli_connection.php');
	$link_id=db_connect();
	$sql="SELECT ID,Name FROM u22.Subject;";
	$data=db_fetch($sql,$link_id);
	db_close($link_id);

?>
</head>
<body>
	<div id="main">
	<h1>時間割作成</h1>
	<form action="import_jikanwari.php" method=POST>
		<p class="tinput">曜日</p>
		<script type="text/javascript">
			var dodo=['月','火','水','木','金'];
			var dow=['Mon','Tue','Wed','Thu','Fri'];
			for(var i=0;i<5;i++){
				document.write("<label><input type=radio name=dow value=");
				document.write(dow[i]);
				document.write(">");
				document.write(dodo[i]);
				document.write("</label>");
			}
			document.write("<br>");
		</script>
		<p class="tinput">時限</p>
		<script type="text/javascript">
			for(var i=0;i<8;i++){
				document.write("<label><input type=radio name=class value=");
				document.write(i+1);
				document.write(">");
				document.write(i+1);
				document.write("</label>");
			}
		</script>
		<br>
		<p class="tinput">教科名</p>
		<ul class="ulist">
<?php
			//var_dump($data);
			foreach($data as $tmp){
				echo "<li><label><input type=radio name=subject value=".$tmp['ID'].">";
				echo $tmp['Name']."</label></li><br>";
			}
?>
		</ul>
		<!--<input type=text name=name> -->
		<!--<input type=number name=CTime> -->
		<input type=submit value="登録">
	</form>
	
	<form action="upload_jikanwari.php" method=POST enctype=multipart/form-data >
	<br><br><p>csvファイルで時間割を読み込むことができます</p>
	サンプルファイルは<a href="./Mon.csv" download="sample_jikanwari.csv">こちら</a>から
		<p class="tinput">曜日</p>
		<script type="text/javascript">
			var dodo=['月','火','水','木','金'];
			var dow=['Mon','Tue','Wed','Thu','Fri'];
			for(var i=0;i<5;i++){
				document.write("<label><input type=radio name=dow value=");
				document.write(dow[i]);
				document.write(">");
				document.write(dodo[i]);
				document.write("</label>");
			}
		</script>
		<p class="tinput">csvファイル</p>
		<input type=file name=jfile size=30>
		<p>※文字コードはUTF-8のみ対応しています。</p>
		<input type=submit value="登録">
	</form>
	</div>

	<div id="undermenu">
	<ul class="underbar">
		<li><a href="javascript:history.back()">＜戻る</a></li>
		<li><a href="../index.php">TOP</a></li>
		<li><a href="javascript:history.go(1)">進む＞</a></li>
	</ul>
</div>
</html>
