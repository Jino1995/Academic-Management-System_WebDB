<?
session_start();

if(!$_SESSION['userid'])
{
	echo "<HTML><head><META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}

function SearchRecord()
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from student where sid = '".$_POST['CheckAcademicRecordt']."'";
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DBŽ�� Error.<br>";
	}
	$studentInfo= mysql_fetch_row($result);
	global $search;

	$query="select * from student where   sid ='".$_POST['CheckAcademicRecord']."'";
	$result = mysql_query($query, $con);
	$searchResult = mysql_fetch_row($result);
	$SID = $searchResult[0];
	$SNAME = $searchResult[1];
	$ADDR = $searchResult[2];
	$TEL = $searchResult[3];
	$SCID = $searchResult[4];
	switch($searchResult[5])
	{
	case 'M':
		$GENDER = '��';
		break;	
	case 'F':
		$GENDER = '��';
		break;	
	}

	$GRADE = $searchResult[6];
	$DNAME = $searchResult[7];
	$STATE = $searchResult[8];
?>
<font size=5>������ȸ</font>
	<table border=1 width=100% height=97%>
	<tr width=30% height=0%>
	<td bgcolor=#F1F0F0>
		<table width=50%>
		<tr>
		<? echo "</td><td width=20%>�й� </td><td width=30%><INPUT type='text' size=20 value='".$SID."' disabled></td><td width=20%>�̸�</td><td width=30%><INPUT type='text' size=20 value='".$SNAME."' disabled></td>";?>
		</tr>
		<tr>
		<? echo "<td>�а� </td><td><INPUT type='text' size=20 value='".$DNAME."' disabled></td><td>   ��ȭ��ȣ</td><td><INPUT type='text' size=20 value='".$TEL."' disabled></td>"; ?>
		</tr>
		<tr>
		<? echo "<td>�ֹι�ȣ </td><td><INPUT type='text' size=20 value='".$SCID."' disabled></td><td>   �ּ�</td><td><INPUT type='text' size=50 value='".$ADDR."' disabled></td>"; ?>
		</tr>
		<tr>
		<? echo "<td>���� </td><td><INPUT type='text' size=20 value='".$GENDER."' disabled></td><td>   �г�</td><td><INPUT type='text' size=1 value='".$GRADE."' disabled></td>"; ?>
		</tr>
		<tr>
		<? echo "<td>���� </td><td><INPUT type='text' size=20 value='".$STATE."' disabled></td>"; ?>
		</tr>
		</table>
	</td>
	</tr>
	<tr>
		<td>
		</td>
	</tr>
	</table>
<?
		break;
}

function SearchAndCreateApp($List)
{
	$array = explode("/", $List);
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from student where sid = '$array[0]'";
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DBŽ�� Error.<br>";
	}
	$studentInfo= mysql_fetch_row($result);

		$query="select * from report where sid='$array[0]'AND rname='$array[1]'"; 
		$result = mysql_query($query, $con);
		$reportInfo = mysql_fetch_row($result);

		$query="select colname from student, department, college where student.sid='$studentInfo[0]' AND student.dname=department.dname AND department.colid=college.colid"; 
		$result = mysql_query($query, $con);
		$collegeInfo = mysql_fetch_row($result);
		switch($array[1])
		{
		case '���н�û��':
?>
<center><font size =3><strong>���н�û��</strong></font></center>
<table border=1 width=100% height = 50% frame=void align=center>
<tr>
<td width=10% height=1% align=center rowspan="4" bgcolor="yellow">�� ��</td><td colspan="2" align=center bgcolor="yellow">�� ��</td><td align=center><? echo $collegeInfo[0]; ?></td><td width=150 height=50 align=center bgcolor="yellow">�к�(��)</td><td align=center><? echo $studentInfo[7]; ?></td>
</tr>
<tr>
<td width=10% height=1% align=center bgcolor="yellow">�� ��</td><td colspan="2" align=center><? echo $studentInfo[0]; ?></td><td width=150 height=50 align=center bgcolor="yellow">�ֹε�Ϲ�ȣ</td><td colspan="2" align=center><? echo $studentInfo[4]; ?></td>
</tr>
<tr>
<td width=10% height=1% align = center bgcolor="yellow">�� ��</td><td colspan="2" align=center><? echo $studentInfo[1]; ?></td><td width=150 height=50 align=center bgcolor="yellow">����ó</td><td colspan="2" align=center><? echo $studentInfo[3]; ?></td>
</tr>
<tr>
<td width=10% height=1% align = center bgcolor="yellow">�ּ�</td><td colspan="5" align=center><? echo $studentInfo[2]; ?></td>
</tr>
<tr>
<td width = 150 height= 300 align = center bgcolor="yellow">���л���</td><td colspan="6"><? echo $reportInfo[3]; ?></td>
</tr>
</table>
</form>
<form method="post" action="process.php">
<? 
$reportNo = $reportInfo[0].","; 
?>
         <button type='submit' value='<? echo $reportNo."O" ?>' name='OK_bt' align='center' style="margin-left: 45%; margin-top: 10px; background: white; border: black solid 1px; font-size: 30px;">����</button> <button type='submit'  value='<? echo $reportNo."X" ?>' name='OK_bt' align='center' style="margin-left: 5%; margin-top: 10px; background: white; border: black solid 1px; font-size: 30px;">�̽���</button>
</form>
<?
			
			break;
		case '���н�û��':
?>
<center><font size =3><strong>���н�û��</strong></font></center>
<table border=1 width=100% height = 50% frame=void align=center>
<tr>
<td width=10% height=1% align=center rowspan="4" bgcolor="yellow">�� ��</td><td colspan="2" align=center bgcolor="yellow">�� ��</td><td align=center><? echo $collegeInfo[0]; ?></td><td width=150 height=50 align=center bgcolor="yellow">�к�(��)</td><td align=center><? echo $studentInfo[7]; ?></td>
</tr>
<tr>
<td width=10% height=1% align=center bgcolor="yellow">�� ��</td><td colspan="2" align=center><? echo $studentInfo[0]; ?></td><td width=150 height=50 align=center bgcolor="yellow">�ֹε�Ϲ�ȣ</td><td colspan="2" align=center><? echo $studentInfo[4]; ?></td>
</tr>
<tr>
<td width=10% height=1% align = center bgcolor="yellow">�� ��</td><td colspan="2" align=center><? echo $studentInfo[1]; ?></td><td width=150 height=50 align=center bgcolor="yellow">����ó</td><td colspan="2" align=center><? echo $studentInfo[3]; ?></td>
</tr>
<tr>
<td width=10% height=1% align = center bgcolor="yellow">�ּ�</td><td colspan="5" align=center><? echo $studentInfo[2]; ?></td>
</tr>
<tr>
<td width = 150 height= 300 align = center bgcolor="yellow">���л���</td><td colspan="6"><? echo $reportInfo[3]; ?></td>
</tr>
</table>
</form>
<form method="post" action="process.php">
<? 
$reportNo = $reportInfo[0].","; 
?>
                        <button type='submit' value='<? echo $reportNo."O" ?>' name='OK_bt' align='center' style="margin-left: 45%; margin-top: 10px; background: white; border: black solid 1px; font-size: 30px;">����</button> <button type='submit'  value='<? echo $reportNo."X" ?>' name='OK_bt' align='center' style="margin-left: 5%; margin-top: 10px; background: white; border: black solid 1px; font-size: 30px;">�̽���</button>
</form>
<?			
			break;
		}
}

function CheckAcademicRecord()
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from college, department, student where student.state='����' AND student.dname=department.dname AND department.colid=college.colid"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DBŽ�� Error.<br>";
	}
	echo "<p align=center><font size=8>���� ��ȸ</font></p>";?><p align=right><button type='submit' name='search' value='������ȸ�ϱ�'>��ȸ</button></p><?
	?><div style="width:49%;height:80%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>�л� ��Ȳ</caption>";
	echo "<thead><tr><th></th><th>����</th><th>�й�</th><th>�̸�</th><th>�ּ�</th><th>��ȭ��ȣ</th></tr></thead>";
	echo "<tbody>";
	for($i=1; $i<=mysql_num_rows($result); $i++)
	{
		$searchResult = mysql_fetch_row($result);
		$colname =$searchResult[1];
		$sid = $searchResult[4];
		$sname =$searchResult[5];
		$addr = $searchResult[6];
		$tel = $searchResult[7];
		echo "<tr align=center>";
		echo "<td><INPUT type='radio' name='CheckAcademicRecord' value='$sid'></td><td>".$colname."</td><td>".$sid."</td><td>".$sname."</td><td>".$addr."</td><td>".$tel."</td>";
		echo "</tr>";
	} 
	echo "</tbody>";
	echo "</table>";
	echo "</div>";
	
	$List = $_POST['CheckAcademicRecord'];
	?><div style="width:50%;height:80%;border:1px solid black;float:right"><?
	if($List)
	{
		SearchRecord();
	}
	echo "</div>";
?>
	

<?
} 

function subscription()
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from report,student where report.sid = student.sid"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DBŽ�� Error.<br>";
	}
	echo "<p align=center><font size=8>��û�� ��Ȳ</font></p>";?><p align=right><button type='submit' name='search' value='��û��ó���ϱ�'>��ȸ</button></p><?
	?><div style="width:49%;height:80%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>��û ��Ȳ</caption>";
	echo "<thead><tr><th></th><th>�й�</th><th>�̸�</th><th>��û��</th><th>��û��</th><th>��û����</th></tr></thead>";
	echo "<tbody>";
	for($i=1; $i<=mysql_num_rows($result); $i++)
	{
		$searchResult = mysql_fetch_row($result);
		$sid =$searchResult[1];
		$rname=$searchResult[2];
		$rcontent=$searchResult[3];
		$date=$searchResult[4];
		$sname=$searchResult[8];
		echo "<tr align=center>";
		$value = $sid."/".$rname;
		echo "<td><INPUT type='radio' name='LeavOfAbsenceList' value=$value></td><td>".$sid."</td><td>".$sname."</td><td>".$rname."</td><td>".$date."</td><td>".$rcontent."</td>";
		echo "</tr>";
	} 
	echo "</tbody>";
	echo "</table>";
	echo "</div>";
	
	$List = $_POST['LeavOfAbsenceList'];
	?><div style="width:50%;height:80%;border:1px solid black;float:right"><?
	if($List)
	{
		SearchAndCreateApp($List);
	}
	echo "</div>";
} 

function ApplyLeaveOfAbsence()
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from report where sid='20141632' AND rname='���н�û��'"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DBŽ�� Error.<br>";
	}
	echo "<p align=center><font size=8>���� ��û</font></p>";?><p align=right><button type='submit' name='search' value='���н�û����ȸ'>��ȸ</button> <input type="button" onclick="location.href='LeavApp.html';" value="��û�� �ۼ�"></p><?
	?><div style="width:49%;height:80%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>��û ��Ȳ</caption>";
	echo "<thead><tr><th></th><th>�й�</th><th>�̸�</th><th>��û��</th><th>����</th><th>�Ұ�����</th></tr></thead>";
	echo "<tbody>";
	for($i=1; $i<=mysql_num_rows($result); $i++)
	{
		$searchResult = mysql_fetch_row($result);
		$date = $searchResult[4];
		$conf = $searchResult[5];
		echo "<tr align=center>";
		echo "<td><INPUT type='radio' name='LeavOfAbsenceList' value=$i></td><td>20141632</td><td>����ȣ</td><td>".$date."</td><td>".$conf."</td><td>�Ұ�����</td>";
		echo "</tr>";
	} 
	echo "</tbody>";
	echo "</table>";
	echo "</div>";
	
	$List = $_POST['LeavOfAbsenceList'];
	?><div style="width:50%;height:80%;border:1px solid black;float:right"><?
	if($List)
	{
		SearchAndCreateApp();
	}
	echo "</div>";
} 


function ApplyReturnToSchool()
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from report where sid='20141632' AND rname='���н�û��'"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DBŽ�� Error.<br>";
	}
	echo "<p align=center><font size=8>���� ��û</font></p>";?><p align=right><button type='submit' name='search' value='���н�û����ȸ'>��ȸ</button> <input type="button" onclick="location.href='ReturnApp.html';" value="��û�� �ۼ�"></p><?
	?><div style="width:49%;height:80%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>��û ��Ȳ</caption>";
	echo "<thead><tr><th></th><th>�й�</th><th>�̸�</th><th>��û��</th><th>����</th><th>�Ұ�����</th></tr></thead>";
	echo "<tbody>";
	for($i=1; $i<=mysql_num_rows($result); $i++)
	{
		$searchResult = mysql_fetch_row($result);
		$date = $searchResult[4];
		$conf = $searchResult[5];
		echo "<tr align=center>";
		echo "<td><INPUT type='radio' name='ReturnOfAbsenceList' value=$i></td><td>20141632</td><td>����ȣ</td><td>".$date."</td><td>".$conf."</td><td>�Ұ�����</td>";
		echo "</tr>";
	} 
	echo "</tbody>";
	echo "</table>";
	echo "</div>";

	$List = $_POST['ReturnOfAbsenceList'];
	?><div style="width:50%;height:80%;border:1px solid black;float:right"><?
	if($List)
	{
		SearchAndCreateApp();
	}
	echo "</div>";
}

function ApplyTransDept()
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from report where sid='20141632' AND rname='������û��'"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DBŽ�� Error.<br>";
	}
	echo "<p align=center><font size=8>���� ��û</font></p>";?><p align=right><input type="button" onclick="location.href='class.html';" value="��ȸ"> <input type="button" onclick="location.href='class.html';" value="��û�� �ۼ�"></p><?
	?><div style="width:49%;height:80%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>��û ��Ȳ</caption>";
	echo "<thead><tr><th></th><th>�й�</th><th>�̸�</th><th>��û��</th><th>����</th><th>�Ұ�����</th></tr></thead>";
	echo "<tbody>";
	for($i=1; $i<=mysql_num_rows($result); $i++)
	{
		$searchResult = mysql_fetch_row($result);
		$date = $searchResult[4];
		$conf = $searchResult[5];
		echo "<tr align=center>";
		echo "<td><INPUT type='radio' name='LeavOfAbsenceList' value=$i></td><td>20141632</td><td>����ȣ</td><td>".$date."</td><td>".$conf."</td><td>�Ұ�����</td>";
		echo "</tr>";
	} 
	echo "</tbody>";
	echo "</table>";
	echo "</div>";
	?><div style="width:50%;height:80%;border:1px solid black;float:right"><?
	
	echo "</div>";
}

$service = $_POST['service_BT'];
$search = $_POST['search'];

?>
<html>
<head>
<title>
GWNU �л���� ��������
</title>
</head>
<body>
<form method="POST" action="gwnu3.php">
<?
echo "<button type='submit'  name='button1' value=1>�α׾ƿ�</button>";
$�α׾ƿ� = 0;
$�α׾ƿ� = $_POST["button1"];
if($�α׾ƿ�==1){
if($_SESSION['login']=='y'){
setcookie(session_name(),session_id(),time()-10);
print "<HTML><head> <META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}
else{
 $_SESSION['errormsg']="�α׾ƿ� ������ �����ϴ�";
print "<HTML><head> <META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}
}
?>
<div style="position:absolute;width:100%;height:100%";>
<center><font size = 10>�������ִ��б� �л�����ý���(������)</font></center><br>
<div style="width:10%;height:1000px;float:left">
<table border=1 width=100%, height=100%>
<tr>
<td align=center>
<details>
	<summary>������ȸ</summary>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='������ȸ'>������ȸ</button>

</details>
</td>
</tr>
<tr>
<td align=center>
<details>
	<summary>��û��ó��</summary>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='��û��ó��'>��û��ó��</button>
</details>
</td>
</tr>
</td>
</table>
</div>
<div style="width:89%;height:1000px;border:1px solid black;float:left">
<?
	if($service == '������ȸ' || $search == '������ȸ�ϱ�')
	{
		CheckAcademicRecord();	
	}
	else if($service == '��û��ó��' || $search == '��û��ó���ϱ�')
	{
		subscription();
	}
?>
</table>
</div>
</div>
</form>
</body>
</html>
