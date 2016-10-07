<!doctype html>
<!-- 学校登録 -->
<html>
<head>
	<title>create_school.php</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/template.css">
	<link rel="stylesheet" type="text/css" href="../css/caccount.css">
	<?php
	//session_start();
	//if((empty($_SESSION["UserID"])) || (($_SESSION["Type"]!="Teacher"))){
	//	echo "<div id='main'>
	//	<h1>先生用アカウントでログインして下さい</h1>
	//	</div>
	//	<div id='undermenu'>
	//	<ul class='underbar'>
	//		<li><a href='javascript:history.back()''>＜戻る</a></li>
	//		<li><a href='../index.php'>TOP</a></li>
	//		<li><a href='javascript:history.go(1)''>進む＞</a></li>
	//	</ul>
	//	</div>";
	//	exit;
	//}
	?>
</head>
<body>
	<div id="main">
	<h1>学校登録</h1>
	<form action="import_school.php" method=POST>
		<input type=text name="school_name" placeholder="学校名" class="textinput">
		<input type=number name="grade" min=0 placeholder="学年" class="textinput">
		<input type=text name="class" placeholder="クラス" class="textinput">
		<input type=number name="num" min=0 placeholder="生徒数" class="textinput">
		<input type=text name="type" placeholder="タイプ" class="textinput">

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
