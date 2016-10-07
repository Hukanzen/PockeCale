<!doctype html>
<!--- カレンダー登録 -->
<html>
<head>
	<title>create_calender.php</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/template.css">
	<link rel="stylesheet" type="text/css" href="../css/caccount.css">
	<?php
	session_start();
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
	<h1>カレンダー登録</h1>
	<form action="import_calender.php" method=POST>
		<input type=text name=contents placeholder="内容" class="textinput">

		<p class="tinput">日付</p>
		<input type=number name=date_Y value="<?php echo date("Y"); ?>" min=<?php echo date("Y"); ?>>
		<input type=number name=date_m value="<?php echo date("m"); ?>" min=01 max=12>
		<input type=number name=date_d value="<?php echo date("d"); ?>" min=01 max=31>

		<br>
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
