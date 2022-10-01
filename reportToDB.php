<?php

if(!$_SESSION['userid'])
{
	echo "<HTML><head><META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}

	session_start();
	$stuID = $_SESSION['userid'];
	$reportName = $_POST['rname'];
	$rcontent = $_POST['reason'];
	
	

	$database = "lecture_system";

	$connect = mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu') or die("mySQL 서버 연결 Error!");

	mysql_select_db($database,$connect);
	$date =date("Y-m-d");
	$query = "insert into report(sid, rname, rcontent,date) values('$stuID','$reportName','$rcontent','$date')";


	$result = mysql_query($query, $connect);
	mysql_close($connect);
?>
<HTML><head><META http-equiv='refresh' content='0; url=./gwnu.php'></head></head>

