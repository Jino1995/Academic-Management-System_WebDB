<?php	
	session_start();
	$reportInfo = explode(',', $_POST[OK_bt]);
	echo $reportInfo[0];
	echo $reportInfo[1];
	$database = "lecture_system";

	$connect = mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu') or die("mySQL 서버 연결 Error!");

	mysql_select_db($database,$connect);

	$query = "update report set conf ='".$reportInfo[1]."', mid='".$_SESSION['userid']."' where serial_no='".$reportInfo[0]."'";
	mysql_query($query, $connect);
	mysql_close($connect);

?>
<HTML><head><META http-equiv='refresh' content='0; url=./gwnu3.php'></head></head>
