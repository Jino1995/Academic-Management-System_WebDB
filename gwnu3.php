<?
session_start();

if(!$_SESSION['userid'])
{
	echo "<HTML><head><META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}

function SearchRecord()
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from student where sid = '".$_POST['CheckAcademicRecordt']."'";
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DB탐색 Error.<br>";
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
		$GENDER = '남';
		break;	
	case 'F':
		$GENDER = '여';
		break;	
	}

	$GRADE = $searchResult[6];
	$DNAME = $searchResult[7];
	$STATE = $searchResult[8];
?>
<font size=5>학적조회</font>
	<table border=1 width=100% height=97%>
	<tr width=30% height=0%>
	<td bgcolor=#F1F0F0>
		<table width=50%>
		<tr>
		<? echo "</td><td width=20%>학번 </td><td width=30%><INPUT type='text' size=20 value='".$SID."' disabled></td><td width=20%>이름</td><td width=30%><INPUT type='text' size=20 value='".$SNAME."' disabled></td>";?>
		</tr>
		<tr>
		<? echo "<td>학과 </td><td><INPUT type='text' size=20 value='".$DNAME."' disabled></td><td>   전화번호</td><td><INPUT type='text' size=20 value='".$TEL."' disabled></td>"; ?>
		</tr>
		<tr>
		<? echo "<td>주민번호 </td><td><INPUT type='text' size=20 value='".$SCID."' disabled></td><td>   주소</td><td><INPUT type='text' size=50 value='".$ADDR."' disabled></td>"; ?>
		</tr>
		<tr>
		<? echo "<td>성별 </td><td><INPUT type='text' size=20 value='".$GENDER."' disabled></td><td>   학년</td><td><INPUT type='text' size=1 value='".$GRADE."' disabled></td>"; ?>
		</tr>
		<tr>
		<? echo "<td>상태 </td><td><INPUT type='text' size=20 value='".$STATE."' disabled></td>"; ?>
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
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from student where sid = '$array[0]'";
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DB탐색 Error.<br>";
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
		case '휴학신청서':
?>
<center><font size =3><strong>휴학신청서</strong></font></center>
<table border=1 width=100% height = 50% frame=void align=center>
<tr>
<td width=10% height=1% align=center rowspan="4" bgcolor="yellow">학 적</td><td colspan="2" align=center bgcolor="yellow">대 학</td><td align=center><? echo $collegeInfo[0]; ?></td><td width=150 height=50 align=center bgcolor="yellow">학부(과)</td><td align=center><? echo $studentInfo[7]; ?></td>
</tr>
<tr>
<td width=10% height=1% align=center bgcolor="yellow">학 번</td><td colspan="2" align=center><? echo $studentInfo[0]; ?></td><td width=150 height=50 align=center bgcolor="yellow">주민등록번호</td><td colspan="2" align=center><? echo $studentInfo[4]; ?></td>
</tr>
<tr>
<td width=10% height=1% align = center bgcolor="yellow">성 명</td><td colspan="2" align=center><? echo $studentInfo[1]; ?></td><td width=150 height=50 align=center bgcolor="yellow">연락처</td><td colspan="2" align=center><? echo $studentInfo[3]; ?></td>
</tr>
<tr>
<td width=10% height=1% align = center bgcolor="yellow">주소</td><td colspan="5" align=center><? echo $studentInfo[2]; ?></td>
</tr>
<tr>
<td width = 150 height= 300 align = center bgcolor="yellow">휴학사유</td><td colspan="6"><? echo $reportInfo[3]; ?></td>
</tr>
</table>
</form>
<form method="post" action="process.php">
<? 
$reportNo = $reportInfo[0].","; 
?>
         <button type='submit' value='<? echo $reportNo."O" ?>' name='OK_bt' align='center' style="margin-left: 45%; margin-top: 10px; background: white; border: black solid 1px; font-size: 30px;">승인</button> <button type='submit'  value='<? echo $reportNo."X" ?>' name='OK_bt' align='center' style="margin-left: 5%; margin-top: 10px; background: white; border: black solid 1px; font-size: 30px;">미승인</button>
</form>
<?
			
			break;
		case '복학신청서':
?>
<center><font size =3><strong>복학신청서</strong></font></center>
<table border=1 width=100% height = 50% frame=void align=center>
<tr>
<td width=10% height=1% align=center rowspan="4" bgcolor="yellow">학 적</td><td colspan="2" align=center bgcolor="yellow">대 학</td><td align=center><? echo $collegeInfo[0]; ?></td><td width=150 height=50 align=center bgcolor="yellow">학부(과)</td><td align=center><? echo $studentInfo[7]; ?></td>
</tr>
<tr>
<td width=10% height=1% align=center bgcolor="yellow">학 번</td><td colspan="2" align=center><? echo $studentInfo[0]; ?></td><td width=150 height=50 align=center bgcolor="yellow">주민등록번호</td><td colspan="2" align=center><? echo $studentInfo[4]; ?></td>
</tr>
<tr>
<td width=10% height=1% align = center bgcolor="yellow">성 명</td><td colspan="2" align=center><? echo $studentInfo[1]; ?></td><td width=150 height=50 align=center bgcolor="yellow">연락처</td><td colspan="2" align=center><? echo $studentInfo[3]; ?></td>
</tr>
<tr>
<td width=10% height=1% align = center bgcolor="yellow">주소</td><td colspan="5" align=center><? echo $studentInfo[2]; ?></td>
</tr>
<tr>
<td width = 150 height= 300 align = center bgcolor="yellow">복학사유</td><td colspan="6"><? echo $reportInfo[3]; ?></td>
</tr>
</table>
</form>
<form method="post" action="process.php">
<? 
$reportNo = $reportInfo[0].","; 
?>
                        <button type='submit' value='<? echo $reportNo."O" ?>' name='OK_bt' align='center' style="margin-left: 45%; margin-top: 10px; background: white; border: black solid 1px; font-size: 30px;">승인</button> <button type='submit'  value='<? echo $reportNo."X" ?>' name='OK_bt' align='center' style="margin-left: 5%; margin-top: 10px; background: white; border: black solid 1px; font-size: 30px;">미승인</button>
</form>
<?			
			break;
		}
}

function CheckAcademicRecord()
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from college, department, student where student.state='재학' AND student.dname=department.dname AND department.colid=college.colid"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DB탐색 Error.<br>";
	}
	echo "<p align=center><font size=8>학적 조회</font></p>";?><p align=right><button type='submit' name='search' value='학적조회하기'>조회</button></p><?
	?><div style="width:49%;height:80%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>학생 현황</caption>";
	echo "<thead><tr><th></th><th>대학</th><th>학번</th><th>이름</th><th>주소</th><th>전화번호</th></tr></thead>";
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
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from report,student where report.sid = student.sid"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DB탐색 Error.<br>";
	}
	echo "<p align=center><font size=8>신청서 현황</font></p>";?><p align=right><button type='submit' name='search' value='신청서처리하기'>조회</button></p><?
	?><div style="width:49%;height:80%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>신청 현황</caption>";
	echo "<thead><tr><th></th><th>학번</th><th>이름</th><th>신청서</th><th>신청일</th><th>신청내용</th></tr></thead>";
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
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from report where sid='20141632' AND rname='휴학신청서'"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DB탐색 Error.<br>";
	}
	echo "<p align=center><font size=8>휴학 신청</font></p>";?><p align=right><button type='submit' name='search' value='휴학신청서조회'>조회</button> <input type="button" onclick="location.href='LeavApp.html';" value="신청서 작성"></p><?
	?><div style="width:49%;height:80%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>신청 현황</caption>";
	echo "<thead><tr><th></th><th>학번</th><th>이름</th><th>신청일</th><th>승인</th><th>불가사유</th></tr></thead>";
	echo "<tbody>";
	for($i=1; $i<=mysql_num_rows($result); $i++)
	{
		$searchResult = mysql_fetch_row($result);
		$date = $searchResult[4];
		$conf = $searchResult[5];
		echo "<tr align=center>";
		echo "<td><INPUT type='radio' name='LeavOfAbsenceList' value=$i></td><td>20141632</td><td>서진호</td><td>".$date."</td><td>".$conf."</td><td>불가사유</td>";
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
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from report where sid='20141632' AND rname='복학신청서'"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DB탐색 Error.<br>";
	}
	echo "<p align=center><font size=8>복학 신청</font></p>";?><p align=right><button type='submit' name='search' value='복학신청서조회'>조회</button> <input type="button" onclick="location.href='ReturnApp.html';" value="신청서 작성"></p><?
	?><div style="width:49%;height:80%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>신청 현황</caption>";
	echo "<thead><tr><th></th><th>학번</th><th>이름</th><th>신청일</th><th>승인</th><th>불가사유</th></tr></thead>";
	echo "<tbody>";
	for($i=1; $i<=mysql_num_rows($result); $i++)
	{
		$searchResult = mysql_fetch_row($result);
		$date = $searchResult[4];
		$conf = $searchResult[5];
		echo "<tr align=center>";
		echo "<td><INPUT type='radio' name='ReturnOfAbsenceList' value=$i></td><td>20141632</td><td>서진호</td><td>".$date."</td><td>".$conf."</td><td>불가사유</td>";
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
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from report where sid='20141632' AND rname='전과신청서'"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DB탐색 Error.<br>";
	}
	echo "<p align=center><font size=8>전과 신청</font></p>";?><p align=right><input type="button" onclick="location.href='class.html';" value="조회"> <input type="button" onclick="location.href='class.html';" value="신청서 작성"></p><?
	?><div style="width:49%;height:80%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>신청 현황</caption>";
	echo "<thead><tr><th></th><th>학번</th><th>이름</th><th>신청일</th><th>승인</th><th>불가사유</th></tr></thead>";
	echo "<tbody>";
	for($i=1; $i<=mysql_num_rows($result); $i++)
	{
		$searchResult = mysql_fetch_row($result);
		$date = $searchResult[4];
		$conf = $searchResult[5];
		echo "<tr align=center>";
		echo "<td><INPUT type='radio' name='LeavOfAbsenceList' value=$i></td><td>20141632</td><td>서진호</td><td>".$date."</td><td>".$conf."</td><td>불가사유</td>";
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
GWNU 학사관리 웹페이지
</title>
</head>
<body>
<form method="POST" action="gwnu3.php">
<?
echo "<button type='submit'  name='button1' value=1>로그아웃</button>";
$로그아웃 = 0;
$로그아웃 = $_POST["button1"];
if($로그아웃==1){
if($_SESSION['login']=='y'){
setcookie(session_name(),session_id(),time()-10);
print "<HTML><head> <META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}
else{
 $_SESSION['errormsg']="로그아웃 권한이 없습니다";
print "<HTML><head> <META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}
}
?>
<div style="position:absolute;width:100%;height:100%";>
<center><font size = 10>강릉원주대학교 학사관리시스템(관리자)</font></center><br>
<div style="width:10%;height:1000px;float:left">
<table border=1 width=100%, height=100%>
<tr>
<td align=center>
<details>
	<summary>학적조회</summary>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='학적조회'>학적조회</button>

</details>
</td>
</tr>
<tr>
<td align=center>
<details>
	<summary>신청서처리</summary>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='신청서처리'>신청서처리</button>
</details>
</td>
</tr>
</td>
</table>
</div>
<div style="width:89%;height:1000px;border:1px solid black;float:left">
<?
	if($service == '학적조회' || $search == '학적조회하기')
	{
		CheckAcademicRecord();	
	}
	else if($service == '신청서처리' || $search == '신청서처리하기')
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
