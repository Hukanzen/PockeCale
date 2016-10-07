<!doctype html>
<!-- ログインページ -->
<html>
<head>
	<title>login_page.php</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/template.css">
	<link rel="stylesheet" type="text/css" href="../css/caccount.css">
</head>
<body>
	<div id="main">
	<h1>ログイン</h1>
	<p>アカウントをもっていない方は<a href="./create_account.php">こちら</a></p>
	
	<p>ユーザIDとパスワードを入力してログインして下さい</p>
	<form action="login_prcs.php" method=POST>
		<input type=text name="UserID" placeholder="ユーザーID" class="textinput">
		<input type=password name="UserPW" placeholder="パスワード" class="textinput">
		<br>
		<input type=submit value="ログイン">
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
