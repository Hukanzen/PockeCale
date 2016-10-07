<!doctype html>
<!-- 生徒用ページ -->
<html>
<head>
	<title>student.php</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/template.css">
	<link rel="stylesheet" type="text/css" href="../css/stutea.css">
	<?php
	require_once(dirname(__FILE__).'/mysqli_connection.php');

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

	$aSQL=array(
		"SELECT UserID,FirstName,LastName,GroupID,Sex,Type,Created FROM u22.User WHERE UserID=\"$_SESSION[UserID]\";",
		"SELECT * FROM u22.Group WHERE GroupID=\"$_SESSION[GroupID]\";",
		"SELECT * FROM u22.Calender WHERE GroupID=\"$_SESSION[GroupID]\";",
		"SELECT * FROM u22.TimeTable WHERE GroupID=\"$_SESSION[GroupID]\";",
		"SELECT * FROM u22.Planlist WHERE GroupID=\"$_SESSION[GroupID]\";",

		"SELECT * FROM u22.Mon_ClassSchedule WHERE GroupID=\"$_SESSION[GroupID]\";",
		"SELECT * FROM u22.Tue_ClassSchedule WHERE GroupID=\"$_SESSION[GroupID]\";",
		"SELECT * FROM u22.Wed_ClassSchedule WHERE GroupID=\"$_SESSION[GroupID]\";",
		"SELECT * FROM u22.Thu_ClassSchedule WHERE GroupID=\"$_SESSION[GroupID]\";",
		"SELECT * FROM u22.Fri_ClassSchedule WHERE GroupID=\"$_SESSION[GroupID]\";",

		"SELECT ID,Name FROM u22.Subject WHERE GroupID=\"$_SESSION[GroupID]\";"
		);

	$link_id=db_connect();
	$data=db_a_fetch_assoc($aSQL,$link_id);
	db_close($link_id);
?>
</head>
<body>
	<h1>生徒用ページ</h1>
	<h5 class="tinput">ユーザ情報</h5 class="tinput">
	<table border="1">
		<tr><th>ユーザID</th><th>名前</th><th>苗字</th><th>グループID</th><th>性別</th><th>タイプ</th><th>作成日時</th></tr>
	<?php 
		foreach($data[0] as $line){
			echo "<tr>";
			foreach($line as $cell){
				echo "<td>";
				echo "$cell";
				echo "</td>";
			}
			echo "</tr>";
		}
	?>
	</table>

	<h5 class="tinput">所属グループ</h5 class="tinput">
	<table border="1">
		<tr><th>グループID</th><th>学校名</th><th>学年</th><th>クラス</th><th>人数</th><th>学校タイプ</th></tr>
	<?php 
		foreach($data[1] as $line){
			echo "<tr>";
			foreach($line as $cell){
				echo "<td>";
				echo "$cell";
				echo "</td>";
			}
			echo "</tr>";
		}
	?>
	</table>

	<h5 class="tinput">カレンダー情報</h5 class="tinput">
	<table border="1">
		<tr><th>ID</th><th>グループID</th><th>日時</th><th>内容</th></tr>
	<?php 
		foreach($data[2] as $line){
			echo "<tr>";
			foreach($line as $cell){
				echo "<td>";
				echo "$cell";
				echo "</td>";
			}
			echo "</tr>";
		}
	?>
	</table>

	<h5 class="tinput">授業変更情報</h5 class="tinput">
	<table border="1">
		<tr><th>ID</th><th>グループID</th><th>変更前日付</th><th>変更前時限</th><th>変更前授業</th><th>変更内容</th><th>変更後授業</th></tr>
	<?php 
		foreach($data[3] as $line){
			echo "<tr>";
			foreach($line as $cell){
				echo "<td>";
				echo "$cell";
				echo "</td>";
			}
			echo "</tr>";
		}
	?>
	</table>

	<h5 class="tinput">計画情報</h5 class="tinput">
	<table border="1">
		<tr><th>ID</th><th>グループID</th><th>内容</th><th>授業名</th><th>締め切り日</th><th>締め切り時間</th></tr>
	<?php 
		foreach($data[4] as $line){
			echo "<tr>";
			foreach($line as $cell){
				echo "<td>";
				echo "$cell";
				echo "</td>";
			}
			echo "</tr>";
		}
	?>
	</table>

	<?php 
	$dow=array("月","火","水","木","金");
	for($i=5;$i<5+5;$i++){
	?>
		<h5 class="tinput"><?php echo $dow[$i-5];?>曜日</h5 class="tinput">
		<table border="1">
			<tr>
				<th>ID</th>
				<script type="text/javascript">
					for(var i=1;i<=8;i++){
						document.write("<th>"+i+"限</th>");
					}
				</script>
			</tr>

		<?php 
			foreach($data[$i] as $line){
				echo "<tr>";
				$j=0;
				foreach($line as $cell){
					echo "<td>";
					if($j==0) echo $cell;
					else echo $data[10][$cell-1]["Name"];
					echo "</td>";
					$j++;
				}
				echo "</tr>";
			}
		?>
		</table>
	<?php
	}
	?>
<!--
	<div id="undermenu">
		<ul class="underbar">
			<li><a href="javascript:history.back()">＜戻る</a></li>
			<li><a href="javascript:history.go(1)">進む＞</a></li>
		</ul>
	</div>-->
	<div id="undermenu">
	<ul class="underbar">
		<li><a href="javascript:history.back()">＜戻る</a></li>
		<li><a href="../index.php">TOP</a></li>
		<li><a href="javascript:history.go(1)">進む＞</a></li>
	</ul>
</div>
</body>
</html>
