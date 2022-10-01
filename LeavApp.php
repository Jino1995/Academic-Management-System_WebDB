<?
session_start();

if(!$_SESSION['userid'])
{
	echo "<HTML><head><META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}

$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
mysql_select_db('lecture_system',$con);

$date =date("Y-m-d");
$query="select * from report where sid='".$_SESSION['userid']."' AND date='$date' AND conf is null AND rname='휴학신청서'"; 
$result = mysql_query($query, $con);
if(mysql_num_rows($result))
{
	echo "<HTML><head><META http-equiv='refresh' content='0; url=./gwnu.php'></head></head>";
}
else
{
$query="select * from student where sid='".$_SESSION['userid']."'"; 
$result = mysql_query($query, $con);
$studentInfo = mysql_fetch_row($result);
?>
<html>
<head>
<title>휴학신청서</title></head>
<body>
<center><font size =7>휴학신청서</font></center>
<table border=1 width=1000 height = 100 frame=void align=center>
<form action="reportToDB.php" method="post">
<tr>
<td width=150 height=50 align=center bgcolor="yellow">학 부</td><td><input type="text" value="<? echo $studentInfo[7]; ?>" name="department" disabled></td><td width=150 height=50 align=center bgcolor="yellow">성 명</td><td><input type="text" value="<? echo $studentInfo[1]; ?>" name="name" disabled></td>
</tr>
<tr>
<td width=150 height=50 align=center bgcolor="yellow">학 번</td><td><input type="text" value="<? echo $studentInfo[0]; ?>" name="sid" disabled></td><td width=150 height=50 align=center bgcolor="yellow">학 년</td><td><input type="text" value="<? echo $studentInfo[6]; ?>" name="grade" disabled></td>
</tr>
<tr>
<td width=150 height=50 align=center bgcolor="yellow">주민등록번호</td><td width=150 height=50><input type="text" value="<? echo $studentInfo[4]; ?>" name="residentregistrationnumber" disabled></td><td width=150 height=50 align=center bgcolor="yellow">연락처</td><td><input type="text" value="<? echo $studentInfo[3]; ?>" name="phonenumber" disabled></td>
</tr>
<tr>
<td width=150 height=50 align=center bgcolor="yellow">주소</td><td colspan="3"><input type="text" value="<? echo $studentInfo[2]; ?>" name="address" disabled></td>
</table>

<table border=1 width=1000 height =100 frame=void align=center>
<tr>
<td width=150 height=50 align=center colspan="4" bgcolor="yellow">휴학사유</td>
</tr>
<tr>
<td><TEXTAREA name="reason" rows=10 cols=100>

</TEXTAREA></td>
</tr>
</table>

<input type="hidden" name="rname" value="휴학신청서">
<input type="submit" value="제출" align="center" style="margin-left: 45%; margin-top: 10px; background: white; border: black solid 1px; font-size: 30px;">
<input type="button" onclick="location.href='gwnu.php';" value="취소" align="center" style="margin-left: 5%; margin-top: 10px; background: white; border: black solid 1px; font-size: 30px;">
</form>
</body>
</html>
<?
}
