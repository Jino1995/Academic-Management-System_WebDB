<?
session_start();

if(!$_SESSION['userid'])
{
	echo "<HTML><head><META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}

$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
mysql_select_db('lecture_system',$con);

$date =date("Y-m-d");
$query="select * from report where sid='".$_SESSION['userid']."' AND date='$date' AND conf is null AND rname='���н�û��'"; 
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
<title>���н�û��</title>
</head>
<body>
<center><font size =7>���н�û��</font></center>
<table border=1 width=1000 height = 500 frame=void align=center>
<form action="reportToDB.php" method="post">
<tr>
<td width=100 height=50 align=center rowspan="4" bgcolor="yellow">�� ��</td><td width=150 height=50 align=center bgcolor="yellow">�к�(��)</td><td colspan="2"><input type="text" value="<? echo $studentInfo[7]; ?>" name="department" disabled></td><td width=150 height=50 align=center bgcolor="yellow">����</td><td colspan="2"><input type="text" value="<? echo $studentInfo[7]; ?>" name="major" disabled></td>
</tr>
<tr>
<td width=150 height=50 align=center bgcolor="yellow">�� ��</td><td colspan="2"><input type="text" value="<? echo $studentInfo[0]; ?>" name='sid' disabled></td><td width=150 height=50 align=center bgcolor="yellow">�ֹε�Ϲ�ȣ</td><td colspan="2"><input type="text" value="<? echo $studentInfo[4]; ?>" name="residentregistrationnumber" disabled></td>
</tr>
<tr>
<td width =150 height=50 align = center bgcolor="yellow">�� ��</td><td colspan="2"><input type="text" value="<? echo $studentInfo[1]; ?>" name="name" disabled></td><td width=150 height=50 align=center bgcolor="yellow">����ó</td><td colspan="2""><input type="text" value="<? echo $studentInfo[3]; ?>" name="phonenumber" disabled></td>
</tr>
<tr>
<td width = 150 height=50 align = center bgcolor="yellow">�ּ�</td><td colspan="5"><input type="text" value="<? echo $studentInfo[2]; ?>" name="adress" disabled></td>
</tr>
<tr>
<td width = 150 height= 300 align = center bgcolor="yellow">���л���</td><td colspan="6"><TEXTAREA name="reason" rows=10 cols=50>
</TEXTAREA></td>
</tr>
</table>
<pre align=center>
���� ��û���� �����Ͽ��� �㰡�Ͽ� �ֽñ� �ٶ��ϴ�.
</pre>

<input type="hidden" name="rname" value="���н�û��">
<input type="submit" value="����" align="center" style="margin-left: 45%; margin-top: 10px; background: white; border: black solid 1px; font-size: 30px;">
<input type="button" onclick="location.href='gwnu.php';" value="���" align="center" style="margin-left: 5%; margin-top: 10px; background: white; border: black solid 1px; font-size: 30px;">
</form>
</body>
</html>
<?
}
