<?
session_start();

if(!$_SESSION['userid'])
{
	echo "<HTML><head><META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}

function Checklectureform($lecName)
{
$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
mysql_select_db('lecture_system',$con);
$query="select * from lecture_plan,lecture where lecture.Lname="."'"."$lecName"."'"." and lecture.Lnum=lecture_plan.Lid"; 

$result = mysql_query($query, $con);
if($result){
if(mysql_result($result,0,"Ccomp")){
$���� = mysql_result($result,0,"Ccomp");
$����1=explode( "*&" , $����); 

$���� = mysql_result($result,0,"outline");
$����2=explode( "*&" , $����); 

$���� = mysql_result($result,0,"object");
$����3=explode( "*&" , $����); 

$���� = mysql_result($result,0,"content");
$����4=explode( "*&" , $����); 

$���� = mysql_result($result,0,"prelec");
$����5=explode( "*&" , $����); 

$���� = mysql_result($result,0,"oper");
$����6=explode( "*&" , $����); 

$���� = mysql_result($result,0,"eval");
$����7=explode( "*&" , $����); 

$���� = mysql_result($result,0,"learn");
$����8=explode( "*&" , $����); 

$���� = mysql_result($result,0,"Comspsbjt");
$����9=explode( "*&" , $����); 

$���� = mysql_result($result,0,"bood");
$����10=explode( "*&" , $����); 

$���� = mysql_result($result,0,"note");
$����11=explode( "*&" , $����); 

//////////////////////////

?>

<pre>

1.�ٽɿ���
.6�� �ٽɿ������� ���ü�
</pre>
<table border=1 width=1000 height = 100 frame=void>
<fron action="" method=post">
<tr>
<td width=150 height=50 align=center>â������</td><td align=center>��������</td><td align=center>�ǻ����</td><td align=center>�������</td><td align=center>�ڱ����</td><td align=center>��������</td>
</tr>
<tr>
<td width=150 height=50 align=right><input type ="text" value="<? echo $����1[0]; ?>" name="����1" readonly></td><td align=right><input type ="text" value="<? echo $����1[1]; ?>"name="����2"readonly></td><td align=right><input type ="text" value="<? echo $����1[2]; ?>"name="����3"readonly></td><td align=right><input type ="text" value="<? echo $����1[3]; ?>"name="����4"readonly></td><td align=right><input type ="text" value="<? echo $����1[4]; ?>"name="����5"readonly></td><td align=right><input type ="text" value="<? echo $����1[5]; ?>"name="����6"readonly></td>
</tr>
</table>
<table border=1 width=1000 height =100 frame=void>
<tr>
<td width=150 height=50 align=center>���� �ٽɿ���</td><td><input type="text" value="<? echo $����1[6]; ?>" name="����7"readonly></td>
</tr>
<tr>
<td width=150 height=50 align=center>��������</td><td><TEXTAREA name="����8" row=10 cols=50 readonly>��������</TEXTAREA></td>
</table>
<pre>
2.������ ����
</pre>
<table border=1 width=1000 height=100 frame=void>
<tr>
<td width=150 height=20 align=center>�������</td><td><input type="text" value="<? echo $����2[0]; ?>" name="����9"readonly></td><td>���¹�ȣ</td><td><input type="text" value="<? echo $����2[1]; ?>" name="����10"readonly></td><td>����/�ü�</td><td><input type="text" value="<? echo $����2[2]; ?>" name="����11"readonly></td>
</tr>
<tr>
<td width=150 height=20 align=center>���ǿ���</td><td><input type="text" value="<? echo $����2[3]; ?>" name="����12"readonly></td><td>�������</td><td><input type="text" value="<? echo $����2[4]; ?>" name="����13"readonly></td><td>��㰡�ɽð�</td><td><input type="text" value="<? echo $����2[5]; ?>" name="����14"readonly></td>
</tr>
<tr>
<td width=150 height=40 align=center>��米��</td><td><input type="text" value="<? echo $����2[6]; ?>" name="����15"readonly></td><td>������</td><td><input type="text" value="<? echo $����2[7]; ?>" name="����16"readonly></td><td>�����̸���</td><td><input type="text" value="<? echo $����2[8]; ?>" name="����17"readonly></td>
</tr>
<tr>
<td width=150 height=20 align=center>��ȭ</td><td><input type="text" value="<? echo $����2[9]; ?>" name="����18"readonly></td><td>�̼�����</td><td><input type="text" value="<? echo $����2[10]; ?>" name="����19"readonly></td><td>�Է�����</td><td><input type ="text" value ="<? echo $����2[11]; ?>" name="����20"readonly></td>
</tr>



<table border=1 width=1000 height=100 frame=void>
<pre>
3.������ǥ
</pre>
<tr>
<td><TEXTAREA name="����21" rows=8 cols=100 readonly><? echo $����3[0]; ?>
</TEXTAREA></td>
</tr>
<table border=1 width=1000 height=100 frame=void>
<pre>
4.������ ����
</pre>
<tr>
<td><TEXTAREA name="����22"  rows=8 cols=100 readonly><? echo $����4[0]; ?>
</TEXTAREA></td>
</tr>

<table border=1 width=1000 height=100 frame=void>
<pre>
5.�������� �� �����н�����
</pre>
<tr>
<td width=150 height=70 align=center>���� ����</td><td><TEXTAREA name="����23" rows=4 cols=100 readonly>
<? echo $����5[0]; ?>
</TEXTAREA></td>
</tr>
<tr>
<td width=150 height=70 align=center>�����н�����</td><td><TEXTAREA name ="����24" rows=2 cols=50 readonly>
<? echo $����5[1]; ?>
</TEXTAREA></td>
</tr>
<table border=1 width=1000 height = 100 frame=void>
<pre>
6.�����
</pre>
<tr>
<td width=150 height=25 align=center>����</td><td align=center>����/���</td><td align=center>����/�ǽ�</td><td align=center>�����н�</td><td align=center>����/������ǥ</td><td align=center>÷������</td><td align=center>��Ÿ</td>
</tr>
<tr>
<td width=150 height=25 align=right><input type ="text" value="<? echo $����6[0]; ?>"name="����25"readonly></td><td align=right><input type ="text" value="<? echo $����6[1]; ?>"name="����26"readonly></td><td align=right><input type ="text" value="<? echo $����6[2]; ?>"name="����27"readonly></td><td align=right><input type ="text" value="<? echo $����6[3]; ?>"name="����28"readonly></td><td align=right><input type ="text" value="<? echo $����6[4]; ?>"name="����29"readonly></td><td align=right><input type ="text" value="<? echo $����6[5]; ?>"name="����30"readonly></td><td align=right><input type ="text" value="<? echo $����6[6]; ?>"name="����31"readonly></td>
</tr>
</table>
<table>
<tr>
<td width=150 height=50><TEXTAREA name="����32" rows=10 cols=100 readonly>
<? echo $����6[7]; ?>
</TEXTAREA></td>
</tr>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>
7.������ ��� �� ���� ����
</pre>
<tr>
<td width=150 height=25 align=center>�߰����</td><td align=center>������Ʈ</td><td align=center>�⼮</td><td align=center>��Ÿ</td>
</tr>
<td width=150 height=25 align=right><input type ="text" value="<? echo $����7[0]; ?>"name="����33"readonly></td><td align=right><input type ="text" value="<? echo $����7[1]; ?>"name="����34"readonly></td><td align=right><input type ="text" value="<? echo $����7[2]; ?>"name="����35"readonly></td><td align=right><input type ="text" value="<? echo $����7[3]; ?>"name="����36"readonly></td>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>
8.�н� �� ��Ȱ��
</pre>
<tr>
<td width=150 height=50><TEXTAREA name="����37" rows=12 cols=100 readonly>
<? echo $����8[0]; ?>
</TEXTAREA></td>
</tr>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>
9.������� ����� �񱳰� Ȱ��
</pre>
<tr>
<td width=150 height=50><TEXTAREA name="����38" rows=4 cols=100 readonly>
<? echo $����9[0]; ?>
</TEXTAREA></td>
</tr>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>
10.����,�ʵ����嵵�� �� ������
</pre>
<tr>
<td width=150 height=50><TEXTAREA name="����39" rows=3 cols=100 readonly>
<? echo $����10[0]; ?>
</TEXTAREA></td>
</tr>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>

<?



//////////////////////////
}
}
}
function SearchAndCreateApp()
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from student where sid='".$_SESSION['userid']."'"; 
	$result = mysql_query($query, $con);
	$studentInfo = mysql_fetch_row($result);
	global $search;
	switch($search)
	{
	case '���н�û����ȸ':
		$query="select * from report where sid='".$_SESSION['userid']."'AND rname='���н�û��' AND conf is null"; 
		$result = mysql_query($query, $con);
		$reportInfo = mysql_fetch_row($result);
?>
<center><font size =3>���н�û��</font></center>
<table border=1 width=100% height = 50% frame=void align=center>
<tr>
<td width=10% height=1% align=center bgcolor="yellow">�� ��</td><td align=center><? echo $studentInfo[7]; ?></td><td align=center bgcolor="yellow">�� ��</td><td align=center><? echo $studentInfo[1]; ?></td>
</tr>
<tr>
<td width=10% height=1% align=center bgcolor="yellow">�� ��</td><td align=center><? echo $studentInfo[0]; ?></td><td align=center bgcolor="yellow">�� ��</td><td align=center><? echo $studentInfo[6]; ?></td>
</tr>
<tr>
<td width=10% height=1% align=center bgcolor="yellow">�ֹε�Ϲ�ȣ</td><td align=center><? echo $studentInfo[4]; ?></td><td align=center bgcolor="yellow">����ó</td><td align=center><? echo $studentInfo[3]; ?></td>
</tr>
<tr>
<td width=10% height=1% align=center bgcolor="yellow">�ּ�</td><td align=center><? echo $studentInfo[2]; ?></td>
</table>
<table border=1 width=100% height =10% frame=void align=center>
<tr>
<td width=150 height=50 align=center colspan="4" bgcolor="yellow">���л���</td>
</tr>
<tr>
<td><? echo $reportInfo[3]; ?></td>
</tr>
</table>
<?
		break;
	case '���н�û����ȸ':
		$query="select * from report where sid='".$_SESSION['userid']."'AND rname='���н�û��' AND conf is null"; 
		$result = mysql_query($query, $con);
		$reportInfo = mysql_fetch_row($result);

		$query="select colname from student, department, college where student.sid='$studentInfo[0]' AND student.dname=department.dname AND department.colid=college.colid"; 
		$result = mysql_query($query, $con);
		$collegeInfo = mysql_fetch_row($result);
?>
<center><font size =3>���н�û��</font></center>
<table border=1 width=100% height = 50% frame=void align=center>
<form action="q.php" method="post">
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
<?
		break;
	}
}

function CheckAcademicRecord()
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from student where sid='".$_SESSION['userid']."'"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DBŽ�� Error.<br>";
	}
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
	<font size=5>���� ��ȸ</font>
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
} 

function ApplyLeaveOfAbsence()
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from report where sid='".$_SESSION['userid']."' AND rname='���н�û��'"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DBŽ�� Error.<br>";
	}
	echo "<p align=center><font size=8>���� ��û</font></p>";?><p align=right><button type='submit' name='search' value='���н�û����ȸ'>��ȸ</button> <input type="button" onclick="location.href='LeavApp.php';" value="��û�� �ۼ�"></p><?
	?><div style="width:49%;height:80%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>��û ��Ȳ</caption>";
	echo "<thead><tr><th></th><th>�й�</th><th>�̸�</th><th>��û��</th><th>����</th></tr></thead>";
	echo "<tbody>";

	$query="select sid, sname from student where sid='".$_SESSION['userid']."'"; 
	$result2 = mysql_query($query, $con);
	$result2Info = mysql_fetch_row($result2);

	for($i=1; $i<=mysql_num_rows($result); $i++)
	{
		$searchResult = mysql_fetch_row($result);
		$date = $searchResult[4];
		$conf = $searchResult[5];
		echo "<tr align=center>";
		echo "<td><INPUT type='radio' name='LeavOfAbsenceList' value=$i></td><td>$result2Info[0]</td><td>$result2Info[1]</td><td>".$date."</td><td>".$conf."</td>";
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
	$query="select * from report where sid='".$_SESSION['userid']."' AND rname='���н�û��'"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DBŽ�� Error.<br>";
	}
	echo "<p align=center><font size=8>���� ��û</font></p>";?><p align=right><button type='submit' name='search' value='���н�û����ȸ'>��ȸ</button> <input type="button" onclick="location.href='ReturnApp.php';" value="��û�� �ۼ�"></p><?
	?><div style="width:49%;height:80%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>��û ��Ȳ</caption>";
	echo "<thead><tr><th></th><th>�й�</th><th>�̸�</th><th>��û��</th><th>����</th></tr></thead>";
	echo "<tbody>";
	
	$query="select sid, sname from student where sid='".$_SESSION['userid']."'"; 
	$result2 = mysql_query($query, $con);
	$result2Info = mysql_fetch_row($result2);

	for($i=1; $i<=mysql_num_rows($result); $i++)
	{
		$searchResult = mysql_fetch_row($result);
		$date = $searchResult[4];
		$conf = $searchResult[5];
		echo "<tr align=center>";
		echo "<td><INPUT type='radio' name='ReturnOfAbsenceList' value=$i></td><td>$result2Info[0]</td><td>$result2Info[1]</td><td>".$date."</td><td>".$conf."</td>";
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

function SignUpLecture()
{
	global $search;
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$applyCourse = $_POST['CoursesApplied'];
	if($applyCourse)
	{
		if($search == '������û')
		{
			$query="select * from class where Sid='".$_SESSION['userid']."' AND Lid='$applyCourse'"; 
			$result = mysql_query($query, $con);
			if(!(mysql_num_rows($result)))
			{
				$query="select max, current from lecture where lecture.Lnum=$applyCourse"; 
				$result = mysql_query($query, $con);	
				$resultLecture = mysql_fetch_row($result);
				
				if($resultLecture[0] == $resultLecture[1])
				{
					echo "���� ���� : ���� �ο� �ʰ�";
				}
				else
				{
					$query="select term from student where sid='".$_SESSION['userid']."'";
					$result = mysql_query($query, $con);
					$userTerm = mysql_fetch_row($result);

					$query="insert into class values('".$_SESSION['userid']."', '$applyCourse', '0', '$userTerm[0]')"; 
					mysql_query($query, $con);

					$resultLecture[1] += 1;
					$query="update lecture set current='$resultLecture[1]' where Lnum='$applyCourse'"; 
					mysql_query($query, $con);
				}
			}
			else
			{
				echo "�̹� ��û�� ���� �Դϴ�.";
			}
		}
	}

	$query="select * from lecture"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DBŽ�� Error.<br>";
	}
	echo "<p align=center><font size=8>���� ��û</font></p>";?><p align=right><button type='submit' name='search' value='���ǰ�ȹ����ȸ'>���ǰ�ȹ�� ��ȸ</button> <button type='submit' name='search' value='������û'>������û</button></p><?
	?><div style="width:49%;height:80%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>��û ��Ȳ</caption>";
	echo "<thead><tr><th></th><th>���� ��ȣ</th><th>���� ��</th><th>��� ����</th><th>�ִ� ������ ��</th><th>���� ������ ��</th></tr></thead>";
	echo "<tbody>";

	for($i=1; $i<=mysql_num_rows($result); $i++)
	{
		$searchResult = mysql_fetch_row($result);
		
		$query="select Pname from professor where professor.Pid=$searchResult[1]"; 
		$result2 = mysql_query($query, $con);
		$searchResult2 = mysql_fetch_row($result2);

		echo "<tr align=center>";
		echo "<td><INPUT type='radio' name='CoursesApplied' value=$searchResult[0]></td><td>$searchResult[0]</td><td>$searchResult[2]</td><td>$searchResult2[0]</td><td>$searchResult[5]</td><td>$searchResult[6]</td>"; 
		echo "</tr>";
	} 
	echo "</tbody>";
	echo "</table>";
	echo "</div>";
	?><div style="width:50%;height:80%;border:1px solid black;float:right; overflow:auto"><?
	if($search == '���ǰ�ȹ����ȸ')
	{
			$query="select Lname from lecture where Lnum='$applyCourse'"; 
			$result = mysql_query($query, $con);
			$resultLecture = mysql_fetch_row($result);
			Checklectureform($resultLecture[0]);
	}
	echo "</div>";
}

function CheckGrade()
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);

	$query="select term from student where sid='".$_SESSION['userid']."'"; 
	$result = mysql_query($query, $con);
	$searchResult = mysql_fetch_row($result);
	$currentTerm = $searchResult[0];

	$query="select Lid, lecture.Lname, professor.Pname, class.score from class, lecture, professor where class.Sid='".$_SESSION['userid']."' AND class.term='$currentTerm' AND class.Lid=lecture.Lnum AND lecture.Pid=professor.Pid;"; 
	$result = mysql_query($query, $con);

	?><div style="width:100%;height:100%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>�������� ����</caption>";
	echo "<thead><tr><th>���� ��ȣ</th><th>���� ��</th><th>��� ����</th><th>����</th></tr></thead>";
	echo "<tbody>";
	
	$lectureNum = 0;
	$totalScore = 0.0;
	for($i=1; $i<=mysql_num_rows($result); $i++)
	{
		$searchResult = mysql_fetch_row($result);

		echo "<tr align=center>";
		echo "<td>$searchResult[0]</td><td>$searchResult[1]</td><td>$searchResult[2]</td><td>$searchResult[3]</td>";

		switch($searchResult[3])
		{
		case 'A+':
			$totalScore += 4.5;
			break;
		case 'A':
			$totalScore += 4.0;
			break;
		case 'B+':
			$totalScore += 3.5;
			break;
		case 'B':
			$totalScore += 3.0;
			break;
		case 'C+':
			$totalScore += 2.5;
			break;
		case 'C':
			$totalScore += 2.0;
			break;
		case 'D+':
			$totalScore += 1.5;
			break;
		case 'D':
			$totalScore += 1.0;
			break;
		case 'F':
			break;
		}

		$lectureNum++;
		echo "</tr>";
	} 
	echo "</tbody>";
	echo "</table>";
	if($lectureNum > 0)
		echo "<font size=5>��� : ".round($totalScore / $lectureNum, 2)."</font>";
	echo "</div>";
}

function CheckTotalGrade()
{
	global $search;
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	
	$query="select term from student where sid='".$_SESSION['userid']."'"; 
	$result = mysql_query($query, $con);
	$searchResult = mysql_fetch_row($result);
	$currentTerm = $searchResult[0];

	$query="select * from lecture"; 
	$result = mysql_query($query, $con);
	
	echo "<p align=center><font size=8>���� ��ȸ</font></p>";?><p align=right><button type='submit' name='search' value='������ȸ'>������ȸ</button> <button type='submit' name='search' value='�Ѽ�����ȸ'>�� ������ȸ</button></p><?
	?><div style="width:30%;height:30%;border:1px solid black;float:left;"><?
	echo "<table border=1 width=100%>";
	echo "<caption>�б� ��Ȳ</caption>";
	echo "<thead><tr><th></th><th>�г�</th><th>�б�</th></thead>";
	echo "<tbody>";
	
	$sem = 0;
	$grade = 0;
	for($i=0; $i<$currentTerm; $i++)
	{
		$current = $i+1;
		$sem = ($i%2)+1;
		$grade = ($i/2)+1;		
		echo "<tr align=center>";
		echo "<td><INPUT type='radio' name='semester' value=$current></td><td>".floor($grade)."</td><td>".$sem."</td>"; 
		echo "</tr>";
	} 
	echo "</tbody>";
	echo "</table>";
	echo "</div>";

	$semNum = $_POST['semester'];
	?><div style="width:67%;height:85%;border:1px solid black;float:right;"><?
	if($search == '�Ѽ�����ȸ')
	{
		PrintTotalGrade();	
	}
	else if($semNum)
	{
		PrintSemGrade($semNum);
	}
	
	echo "</div>";
}

function PrintTotalGrade()
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="select term, Lid, lecture.Lname, professor.Pname, class.score from class, lecture, professor where class.Sid='".$_SESSION['userid']."' AND class.Lid=lecture.Lnum AND lecture.Pid=professor.Pid ORDER BY term;";
	$result = mysql_query($query, $con);

	echo "<table border=1 width=100%>";
	echo "<caption>�������� ����</caption>";
	echo "<thead><tr><th>�г�</th><th>�б�</th><th>���� ��ȣ</th><th>���� ��</th><th>��� ����</th><th>����</th></tr></thead>";
	echo "<tbody>";
	
	$lectureNum = 0;
	$totalScore = 0.0;
	for($i=1; $i<=mysql_num_rows($result); $i++)
	{
		$searchResult = mysql_fetch_row($result);
		$grade = ($searchResult[0]-1)/2 + 1;
		$semester = ($searchResult[0]-1)%2 + 1;
		echo "<tr align=center>";
		echo "<td>".floor($grade)."</td><td>$semester</td><td>$searchResult[1]</td><td>$searchResult[2]</td><td>$searchResult[3]</td><td>$searchResult[4]</td>";

		switch($searchResult[4])
		{
		case 'A+':
			$totalScore += 4.5;
			break;
		case 'A':
			$totalScore += 4.0;
			break;
		case 'B+':
			$totalScore += 3.5;
			break;
		case 'B':
			$totalScore += 3.0;
			break;
		case 'C+':
			$totalScore += 2.5;
			break;
		case 'C':
			$totalScore += 2.0;
			break;
		case 'D+':
			$totalScore += 1.5;
			break;
		case 'D':
			$totalScore += 1.0;
			break;
		case 'F':
			break;
		}

		$lectureNum++;
		echo "</tr>";
	}
	echo "<tr><td colspan='6' align=center><font size=5>��� : ".round($totalScore / $lectureNum, 2)."</font></td></tr>";
	echo "</tbody>";
	echo "</table>";
}

function PrintSemGrade($semNum)
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="select Lid, lecture.Lname, professor.Pname, class.score from class, lecture, professor where class.Sid='".$_SESSION['userid']."' AND term='$semNum' AND class.Lid=lecture.Lnum AND lecture.Pid=professor.Pid;";
	$result = mysql_query($query, $con);

	echo "<table border=1 width=100%>";
	echo "<caption>�������� ����</caption>";
	echo "<thead><tr><th>���� ��ȣ</th><th>���� ��</th><th>��� ����</th><th>����</th></tr></thead>";
	echo "<tbody>";
	
	$lectureNum = 0;
	$totalScore = 0.0;
	for($i=1; $i<=mysql_num_rows($result); $i++)
	{
		$searchResult = mysql_fetch_row($result);
		echo "<tr align=center>";
		echo "<td>$searchResult[0]</td><td>$searchResult[1]</td><td>$searchResult[2]</td><td>$searchResult[3]</td>";

		switch($searchResult[3])
		{
		case 'A+':
			$totalScore += 4.5;
			break;
		case 'A':
			$totalScore += 4.0;
			break;
		case 'B+':
			$totalScore += 3.5;
			break;
		case 'B':
			$totalScore += 3.0;
			break;
		case 'C+':
			$totalScore += 2.5;
			break;
		case 'C':
			$totalScore += 2.0;
			break;
		case 'D+':
			$totalScore += 1.5;
			break;
		case 'D':
			$totalScore += 1.0;
			break;
		case 'F':
			break;
		}

		$lectureNum++;
		echo "</tr>";
	}
	if($lectureNum > 0)
		echo "<tr><td colspan='4' align=center><font size=5>��� : ".round($totalScore / $lectureNum, 2)."</font></td></tr>";
	echo "</tbody>";
	echo "</table>";
}

function CancelLecture()
{
	global $search;
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	
	$lectureNum = $_POST['lectureNum'];
	if($search == '�������' && $lectureNum > 0)
	{
		$query="delete from class where Sid='".$_SESSION['userid']."' AND Lid='$lectureNum';"; 
		mysql_query($query, $con);
		$query="update lecture set current=current-1 where Lnum='$lectureNum'"; 
		mysql_query($query, $con);
	}
	
	$query="select lecture.Lnum, lecture.Lname, professor.Pname from lecture, professor where lecture.Pid=professor.Pid AND lecture.Lnum IN (select class.Lid from class, student where student.sid='".$_SESSION['userid']."' AND student.term=class.term);"; 
	$result = mysql_query($query, $con);
	
	echo "<p align=center><font size=8>���� ���</font></p>";?><p align=right><button type='submit' name='search' value='�������'>�������</button></p><?
	?><div style="width:95%;height:80%;border:1px solid black;margin: auto"><?
	echo "<table border=1 width=100%>";
	echo "<caption>������û ����</caption>";
	echo "<thead><tr><th></th><th>���� ��ȣ</th><th>���� ��</th><th>��� ����</th></tr></thead>";
	echo "<tbody>";
	
	for($i=1; $i<=mysql_num_rows($result); $i++)
	{
		$searchResult = mysql_fetch_row($result);
		
		echo "<tr align=center>";
		echo "<td><INPUT type='radio' name='lectureNum' value=$searchResult[0]></td><td>$searchResult[0]</td><td>$searchResult[1]</td><td>$searchResult[2]</td>";
		echo "</tr>";
	} 
	echo "</tbody>";
	echo "</table>";
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
<form method="POST" action="gwnu.php">
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
<center><font size = 10>�������ִ��б� �л�����ý���(�л�)</font></center><br>
<div style="width:10%;height:1000px;float:left">
<table border=1 width=100%, height=100%>
<tr>
<td align=center>
<details>
	<summary>��������</summary>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='������ȸ'>������ȸ</button>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='���н�û'>���н�û</button>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='���н�û'>���н�û</button>
</details>
</td>
</tr>
<tr>
<td align=center>
<details>
	<summary>��������</summary>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='������û'>������û</button>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='������û���'>������û ���</button>
</details>
</td>
</tr>
<tr>
<td align=center>
<details>
	<summary>��������</summary>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='������������ȸ'>������������ȸ</button>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='Ȯ��������ȸ'>Ȯ��������ȸ</button>
</details>
</td>
</tr>
</td>
</table>
</div>
<div style="width:89%;height:1000px;border:1px solid black;float:left; overflow:auto">
<?
	if($service == '������ȸ')
	{
		CheckAcademicRecord();	
	}
	else if($service == '���н�û' || $search == '���н�û����ȸ' || $search == '���н�û���ۼ�')
	{
		ApplyLeaveOfAbsence();
	}
	else if($service == '���н�û' || $search == '���н�û����ȸ' || $search == '���н�û���ۼ�')
	{
		ApplyReturnToSchool();
	}
	else if($service == '������û' || $search == '���ǰ�ȹ����ȸ' || $search == '������û')
	{
		SignUpLecture();
	}
	else if($service == '������û���' || $search == '�������')
	{
		CancelLecture();
	}
	else if($service == '������������ȸ')
	{
		CheckGrade();
	}
	else if($service == 'Ȯ��������ȸ' ||  $search == '������ȸ' || $search == '�Ѽ�����ȸ')
	{
		CheckTotalGrade();
	}
?>
</table>
</div>
</div>
</form>
</body>
</html>
