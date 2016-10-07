<!doctype html>
<!-- 教科登録 -->
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
?>
</head>
<body>
	<div id="main">
	<h1>教科登録</h1>
	<form action="import_subject.php" method=POST>
		<input type=text name=name placeholder="教科名" class="textinput">
		<!--<input type=number name=CTime> -->
		<input type=submit value="登録">
	</form>
	<br><br>
	<form action="upload_subject.php" method=POST enctype=multipart/form-data>
	<p>csvファイルで時間割を読み込むことができます</p>
	サンプルファイルは<a href="./upload_subject.csv" download="sample_subject.csv">こちら</a>から
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
</body>
</html>
