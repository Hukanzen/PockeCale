<!doctype html>
<!-- 課題登録 -->
<html>
<head>
	<title>create_plan</title>
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
	<h1>計画作成</h1>
	<form action="import_plan.php" method=POST>
		<input type=text name="Class_Name" placeholder="授業名" class="textinput">
		<input type=text name="Submit_Name" placeholder="締め切りの内容" class="textinput">
		<p></p><p class="tinput">締め切り期限</p>
		<input type=number name=deadl_Y value="<?php echo date("Y"); ?>" min=<?php echo date("Y"); ?>>
		<input type=number name=deadl_m value="<?php echo date("m"); ?>" min=01 max=12 >
		<input type=number name=deadl_d value="<?php echo date("d"); ?>" min=01 max=31 >
		<p></p><p class="tinput">締め切り時間</p>
		<input type=number name=deadt_h min=00 max=23 placeholder="00">
		<input type=number name=deadt_m min=00 max=59 placeholder="00">

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
