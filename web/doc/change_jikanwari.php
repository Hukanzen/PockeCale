<!doctype html>
<!-- 時間割変更 -->
<html>
<head>
	<title></title>
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
	<h1>時間割変更</h1>
	<form action="change_ex_jikanwari.php" method=POST>
		<p class="tinput">変更日</p>
		<!--<input type=date name=oDate value="<?php //echo date("Y-m-d"); ?>"> -->
		<input type=number name=oDate_Y value="<?php echo date("Y"); ?>" min=<?php echo date("Y"); ?>>
		<input type=number name=oDate_m value="<?php echo date("m"); ?>" min=01 max=12 >
		<input type=number name=oDate_d value="<?php echo date("d"); ?>" min=01 max=31 >

		<p class="tinput">変更時間</p>
		<input type=number name=oCTime min=01>

		<p class="tinput">変更内容</p>
		<ul class="ulist">
			<li><label><input type=radio name=chCt value=0>休講</label></li>
			<li><label><input type=radio name=chCt value=1>変更</label></li>
		</ul>

		<p class="tinput">変更前教科</p>
		<ul class="ulist">
		<!--		<input type=number name=chCID value="1" min="1"> -->
		<?php
					//var_dump($data);
					foreach($data as $tmp){
						echo "<li><label><input type=radio name=o_subject value=".$tmp['ID'].">";
						echo $tmp['Name']."</label></li>";
					}
		?>
		</ul>
		
				<p class="tinput">変更後教科</p>
		<ul class="ulist">
		<!--		<input type=number name=chCID value="1" min="1"> -->
		<?php
					//var_dump($data);
					foreach($data as $tmp){
						echo "<li><label><input type=radio name=subject value=".$tmp['ID'].">";
						echo $tmp['Name']."</li></label>";
					}
		?>
		</ul>

		<input type=submit value="登録">
	</form>
	</div>
	<div id="undermenu">
	<ul class="underbar">
		<li><a href="javascript:history.back()">＜戻る</a></li>
		<li><a href="../index.php">TOP</a></li>
		<li><a href="javascript:history.go(1)">進む＞</a></li>
	</ul>
</body>
</html>
