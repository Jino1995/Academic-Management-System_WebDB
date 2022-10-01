<?
session_start();

if(!$_SESSION['userid'])
{
	echo "<HTML><head><META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}

function Checklectureform($lecName)
{
$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
mysql_select_db('lecture_system',$con);
$query="select * from lecture_plan,lecture where lecture.Lname="."'"."$lecName"."'"." and lecture.Lnum=lecture_plan.Lid"; 

$result = mysql_query($query, $con);
if($result){
if(mysql_result($result,0,"Ccomp")){
$내용 = mysql_result($result,0,"Ccomp");
$내용1=explode( "*&" , $내용); 

$내용 = mysql_result($result,0,"outline");
$내용2=explode( "*&" , $내용); 

$내용 = mysql_result($result,0,"object");
$내용3=explode( "*&" , $내용); 

$내용 = mysql_result($result,0,"content");
$내용4=explode( "*&" , $내용); 

$내용 = mysql_result($result,0,"prelec");
$내용5=explode( "*&" , $내용); 

$내용 = mysql_result($result,0,"oper");
$내용6=explode( "*&" , $내용); 

$내용 = mysql_result($result,0,"eval");
$내용7=explode( "*&" , $내용); 

$내용 = mysql_result($result,0,"learn");
$내용8=explode( "*&" , $내용); 

$내용 = mysql_result($result,0,"Comspsbjt");
$내용9=explode( "*&" , $내용); 

$내용 = mysql_result($result,0,"bood");
$내용10=explode( "*&" , $내용); 

$내용 = mysql_result($result,0,"note");
$내용11=explode( "*&" , $내용); 

//////////////////////////

?>

<pre>

1.핵심역량
.6대 핵심역량과의 관련성
</pre>
<table border=1 width=1000 height = 100 frame=void>
<fron action="" method=post">
<tr>
<td width=150 height=50 align=center>창의융합</td><td align=center>도전정신</td><td align=center>의사소통</td><td align=center>배려협력</td><td align=center>자기관리</td><td align=center>전문역량</td>
</tr>
<tr>
<td width=150 height=50 align=right><input type ="text" value="<? echo $내용1[0]; ?>" name="내용1" readonly></td><td align=right><input type ="text" value="<? echo $내용1[1]; ?>"name="내용2"readonly></td><td align=right><input type ="text" value="<? echo $내용1[2]; ?>"name="내용3"readonly></td><td align=right><input type ="text" value="<? echo $내용1[3]; ?>"name="내용4"readonly></td><td align=right><input type ="text" value="<? echo $내용1[4]; ?>"name="내용5"readonly></td><td align=right><input type ="text" value="<? echo $내용1[5]; ?>"name="내용6"readonly></td>
</tr>
</table>
<table border=1 width=1000 height =100 frame=void>
<tr>
<td width=150 height=50 align=center>중점 핵심역량</td><td><input type="text" value="<? echo $내용1[6]; ?>" name="내용7"readonly></td>
</tr>
<tr>
<td width=150 height=50 align=center>전문역량</td><td><TEXTAREA name="내용8" row=10 cols=50 readonly>전문역량</TEXTAREA></td>
</table>
<pre>
2.교과목 개요
</pre>
<table border=1 width=1000 height=100 frame=void>
<tr>
<td width=150 height=20 align=center>교과목명</td><td><input type="text" value="<? echo $내용2[0]; ?>" name="내용9"readonly></td><td>강좌번호</td><td><input type="text" value="<? echo $내용2[1]; ?>" name="내용10"readonly></td><td>학점/시수</td><td><input type="text" value="<? echo $내용2[2]; ?>" name="내용11"readonly></td>
</tr>
<tr>
<td width=150 height=20 align=center>강의요일</td><td><input type="text" value="<? echo $내용2[3]; ?>" name="내용12"readonly></td><td>수강대상</td><td><input type="text" value="<? echo $내용2[4]; ?>" name="내용13"readonly></td><td>면담가능시간</td><td><input type="text" value="<? echo $내용2[5]; ?>" name="내용14"readonly></td>
</tr>
<tr>
<td width=150 height=40 align=center>담당교수</td><td><input type="text" value="<? echo $내용2[6]; ?>" name="내용15"readonly></td><td>연구실</td><td><input type="text" value="<? echo $내용2[7]; ?>" name="내용16"readonly></td><td>교수이메일</td><td><input type="text" value="<? echo $내용2[8]; ?>" name="내용17"readonly></td>
</tr>
<tr>
<td width=150 height=20 align=center>전화</td><td><input type="text" value="<? echo $내용2[9]; ?>" name="내용18"readonly></td><td>이수구분</td><td><input type="text" value="<? echo $내용2[10]; ?>" name="내용19"readonly></td><td>입력일자</td><td><input type ="text" value ="<? echo $내용2[11]; ?>" name="내용20"readonly></td>
</tr>



<table border=1 width=1000 height=100 frame=void>
<pre>
3.교육목표
</pre>
<tr>
<td><TEXTAREA name="내용21" rows=8 cols=100 readonly><? echo $내용3[0]; ?>
</TEXTAREA></td>
</tr>
<table border=1 width=1000 height=100 frame=void>
<pre>
4.교과목 내용
</pre>
<tr>
<td><TEXTAREA name="내용22"  rows=8 cols=100 readonly><? echo $내용4[0]; ?>
</TEXTAREA></td>
</tr>

<table border=1 width=1000 height=100 frame=void>
<pre>
5.선수과목 및 선수학습내용
</pre>
<tr>
<td width=150 height=70 align=center>선수 과목</td><td><TEXTAREA name="내용23" rows=4 cols=100 readonly>
<? echo $내용5[0]; ?>
</TEXTAREA></td>
</tr>
<tr>
<td width=150 height=70 align=center>선수학습내용</td><td><TEXTAREA name ="내용24" rows=2 cols=50 readonly>
<? echo $내용5[1]; ?>
</TEXTAREA></td>
</tr>
<table border=1 width=1000 height = 100 frame=void>
<pre>
6.수업운영
</pre>
<tr>
<td width=150 height=25 align=center>강의</td><td align=center>토의/토론</td><td align=center>실험/실습</td><td align=center>현장학습</td><td align=center>개별/팀별발표</td><td align=center>첨삭지도</td><td align=center>기타</td>
</tr>
<tr>
<td width=150 height=25 align=right><input type ="text" value="<? echo $내용6[0]; ?>"name="내용25"readonly></td><td align=right><input type ="text" value="<? echo $내용6[1]; ?>"name="내용26"readonly></td><td align=right><input type ="text" value="<? echo $내용6[2]; ?>"name="내용27"readonly></td><td align=right><input type ="text" value="<? echo $내용6[3]; ?>"name="내용28"readonly></td><td align=right><input type ="text" value="<? echo $내용6[4]; ?>"name="내용29"readonly></td><td align=right><input type ="text" value="<? echo $내용6[5]; ?>"name="내용30"readonly></td><td align=right><input type ="text" value="<? echo $내용6[6]; ?>"name="내용31"readonly></td>
</tr>
</table>
<table>
<tr>
<td width=150 height=50><TEXTAREA name="내용32" rows=10 cols=100 readonly>
<? echo $내용6[7]; ?>
</TEXTAREA></td>
</tr>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>
7.성적평가 방법 및 배점 비율
</pre>
<tr>
<td width=150 height=25 align=center>중간고사</td><td align=center>프로젝트</td><td align=center>출석</td><td align=center>기타</td>
</tr>
<td width=150 height=25 align=right><input type ="text" value="<? echo $내용7[0]; ?>"name="내용33"readonly></td><td align=right><input type ="text" value="<? echo $내용7[1]; ?>"name="내용34"readonly></td><td align=right><input type ="text" value="<? echo $내용7[2]; ?>"name="내용35"readonly></td><td align=right><input type ="text" value="<? echo $내용7[3]; ?>"name="내용36"readonly></td>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>
8.학습 및 평가활동
</pre>
<tr>
<td width=150 height=50><TEXTAREA name="내용37" rows=12 cols=100 readonly>
<? echo $내용8[0]; ?>
</TEXTAREA></td>
</tr>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>
9.교과목과 연계된 비교과 활동
</pre>
<tr>
<td width=150 height=50><TEXTAREA name="내용38" rows=4 cols=100 readonly>
<? echo $내용9[0]; ?>
</TEXTAREA></td>
</tr>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>
10.교재,필독권장도서 및 참고문헌
</pre>
<tr>
<td width=150 height=50><TEXTAREA name="내용39" rows=3 cols=100 readonly>
<? echo $내용10[0]; ?>
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
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from student where sid='".$_SESSION['userid']."'"; 
	$result = mysql_query($query, $con);
	$studentInfo = mysql_fetch_row($result);
	global $search;
	switch($search)
	{
	case '휴학신청서조회':
		$query="select * from report where sid='".$_SESSION['userid']."'AND rname='휴학신청서' AND conf is null"; 
		$result = mysql_query($query, $con);
		$reportInfo = mysql_fetch_row($result);
?>
<center><font size =3>휴학신청서</font></center>
<table border=1 width=100% height = 50% frame=void align=center>
<tr>
<td width=10% height=1% align=center bgcolor="yellow">학 부</td><td align=center><? echo $studentInfo[7]; ?></td><td align=center bgcolor="yellow">성 명</td><td align=center><? echo $studentInfo[1]; ?></td>
</tr>
<tr>
<td width=10% height=1% align=center bgcolor="yellow">학 번</td><td align=center><? echo $studentInfo[0]; ?></td><td align=center bgcolor="yellow">학 년</td><td align=center><? echo $studentInfo[6]; ?></td>
</tr>
<tr>
<td width=10% height=1% align=center bgcolor="yellow">주민등록번호</td><td align=center><? echo $studentInfo[4]; ?></td><td align=center bgcolor="yellow">연락처</td><td align=center><? echo $studentInfo[3]; ?></td>
</tr>
<tr>
<td width=10% height=1% align=center bgcolor="yellow">주소</td><td align=center><? echo $studentInfo[2]; ?></td>
</table>
<table border=1 width=100% height =10% frame=void align=center>
<tr>
<td width=150 height=50 align=center colspan="4" bgcolor="yellow">휴학사유</td>
</tr>
<tr>
<td><? echo $reportInfo[3]; ?></td>
</tr>
</table>
<?
		break;
	case '복학신청서조회':
		$query="select * from report where sid='".$_SESSION['userid']."'AND rname='복학신청서' AND conf is null"; 
		$result = mysql_query($query, $con);
		$reportInfo = mysql_fetch_row($result);

		$query="select colname from student, department, college where student.sid='$studentInfo[0]' AND student.dname=department.dname AND department.colid=college.colid"; 
		$result = mysql_query($query, $con);
		$collegeInfo = mysql_fetch_row($result);
?>
<center><font size =3>복학신청서</font></center>
<table border=1 width=100% height = 50% frame=void align=center>
<form action="q.php" method="post">
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
<?
		break;
	}
}

function CheckAcademicRecord()
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from student where sid='".$_SESSION['userid']."'"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DB탐색 Error.<br>";
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
	<font size=5>학적 조회</font>
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
} 

function ApplyLeaveOfAbsence()
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from report where sid='".$_SESSION['userid']."' AND rname='휴학신청서'"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DB탐색 Error.<br>";
	}
	echo "<p align=center><font size=8>휴학 신청</font></p>";?><p align=right><button type='submit' name='search' value='휴학신청서조회'>조회</button> <input type="button" onclick="location.href='LeavApp.php';" value="신청서 작성"></p><?
	?><div style="width:49%;height:80%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>신청 현황</caption>";
	echo "<thead><tr><th></th><th>학번</th><th>이름</th><th>신청일</th><th>승인</th></tr></thead>";
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
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select * from report where sid='".$_SESSION['userid']."' AND rname='복학신청서'"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DB탐색 Error.<br>";
	}
	echo "<p align=center><font size=8>복학 신청</font></p>";?><p align=right><button type='submit' name='search' value='복학신청서조회'>조회</button> <input type="button" onclick="location.href='ReturnApp.php';" value="신청서 작성"></p><?
	?><div style="width:49%;height:80%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>신청 현황</caption>";
	echo "<thead><tr><th></th><th>학번</th><th>이름</th><th>신청일</th><th>승인</th></tr></thead>";
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
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$applyCourse = $_POST['CoursesApplied'];
	if($applyCourse)
	{
		if($search == '수강신청')
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
					echo "수강 실패 : 수강 인원 초과";
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
				echo "이미 신청한 강의 입니다.";
			}
		}
	}

	$query="select * from lecture"; 
	$result = mysql_query($query, $con);
	if(!$result)
	{
		print "DB탐색 Error.<br>";
	}
	echo "<p align=center><font size=8>수강 신청</font></p>";?><p align=right><button type='submit' name='search' value='강의계획서조회'>강의계획서 조회</button> <button type='submit' name='search' value='수강신청'>수강신청</button></p><?
	?><div style="width:49%;height:80%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>신청 현황</caption>";
	echo "<thead><tr><th></th><th>강의 번호</th><th>강의 명</th><th>담당 교수</th><th>최대 수강자 수</th><th>현재 수강자 수</th></tr></thead>";
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
	if($search == '강의계획서조회')
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
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);

	$query="select term from student where sid='".$_SESSION['userid']."'"; 
	$result = mysql_query($query, $con);
	$searchResult = mysql_fetch_row($result);
	$currentTerm = $searchResult[0];

	$query="select Lid, lecture.Lname, professor.Pname, class.score from class, lecture, professor where class.Sid='".$_SESSION['userid']."' AND class.term='$currentTerm' AND class.Lid=lecture.Lnum AND lecture.Pid=professor.Pid;"; 
	$result = mysql_query($query, $con);

	?><div style="width:100%;height:100%;border:1px solid black;float:left"><?
	echo "<table border=1 width=100%>";
	echo "<caption>수강과목 성적</caption>";
	echo "<thead><tr><th>강의 번호</th><th>강의 명</th><th>담당 교수</th><th>학점</th></tr></thead>";
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
		echo "<font size=5>평균 : ".round($totalScore / $lectureNum, 2)."</font>";
	echo "</div>";
}

function CheckTotalGrade()
{
	global $search;
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	
	$query="select term from student where sid='".$_SESSION['userid']."'"; 
	$result = mysql_query($query, $con);
	$searchResult = mysql_fetch_row($result);
	$currentTerm = $searchResult[0];

	$query="select * from lecture"; 
	$result = mysql_query($query, $con);
	
	echo "<p align=center><font size=8>성적 조회</font></p>";?><p align=right><button type='submit' name='search' value='성적조회'>성적조회</button> <button type='submit' name='search' value='총성적조회'>총 성적조회</button></p><?
	?><div style="width:30%;height:30%;border:1px solid black;float:left;"><?
	echo "<table border=1 width=100%>";
	echo "<caption>학기 현황</caption>";
	echo "<thead><tr><th></th><th>학년</th><th>학기</th></thead>";
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
	if($search == '총성적조회')
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
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select term, Lid, lecture.Lname, professor.Pname, class.score from class, lecture, professor where class.Sid='".$_SESSION['userid']."' AND class.Lid=lecture.Lnum AND lecture.Pid=professor.Pid ORDER BY term;";
	$result = mysql_query($query, $con);

	echo "<table border=1 width=100%>";
	echo "<caption>수강과목 성적</caption>";
	echo "<thead><tr><th>학년</th><th>학기</th><th>강의 번호</th><th>강의 명</th><th>담당 교수</th><th>학점</th></tr></thead>";
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
	echo "<tr><td colspan='6' align=center><font size=5>평균 : ".round($totalScore / $lectureNum, 2)."</font></td></tr>";
	echo "</tbody>";
	echo "</table>";
}

function PrintSemGrade($semNum)
{
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select Lid, lecture.Lname, professor.Pname, class.score from class, lecture, professor where class.Sid='".$_SESSION['userid']."' AND term='$semNum' AND class.Lid=lecture.Lnum AND lecture.Pid=professor.Pid;";
	$result = mysql_query($query, $con);

	echo "<table border=1 width=100%>";
	echo "<caption>수강과목 성적</caption>";
	echo "<thead><tr><th>강의 번호</th><th>강의 명</th><th>담당 교수</th><th>학점</th></tr></thead>";
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
		echo "<tr><td colspan='4' align=center><font size=5>평균 : ".round($totalScore / $lectureNum, 2)."</font></td></tr>";
	echo "</tbody>";
	echo "</table>";
}

function CancelLecture()
{
	global $search;
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	
	$lectureNum = $_POST['lectureNum'];
	if($search == '수강취소' && $lectureNum > 0)
	{
		$query="delete from class where Sid='".$_SESSION['userid']."' AND Lid='$lectureNum';"; 
		mysql_query($query, $con);
		$query="update lecture set current=current-1 where Lnum='$lectureNum'"; 
		mysql_query($query, $con);
	}
	
	$query="select lecture.Lnum, lecture.Lname, professor.Pname from lecture, professor where lecture.Pid=professor.Pid AND lecture.Lnum IN (select class.Lid from class, student where student.sid='".$_SESSION['userid']."' AND student.term=class.term);"; 
	$result = mysql_query($query, $con);
	
	echo "<p align=center><font size=8>수강 취소</font></p>";?><p align=right><button type='submit' name='search' value='수강취소'>수강취소</button></p><?
	?><div style="width:95%;height:80%;border:1px solid black;margin: auto"><?
	echo "<table border=1 width=100%>";
	echo "<caption>수강신청 과목</caption>";
	echo "<thead><tr><th></th><th>강의 번호</th><th>강의 명</th><th>담당 교수</th></tr></thead>";
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
GWNU 학사관리 웹페이지
</title>
</head>
<body>
<form method="POST" action="gwnu.php">
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
<center><font size = 10>강릉원주대학교 학사관리시스템(학생)</font></center><br>
<div style="width:10%;height:1000px;float:left">
<table border=1 width=100%, height=100%>
<tr>
<td align=center>
<details>
	<summary>학적관리</summary>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='학적조회'>학적조회</button>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='휴학신청'>휴학신청</button>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='복학신청'>복학신청</button>
</details>
</td>
</tr>
<tr>
<td align=center>
<details>
	<summary>수업관리</summary>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='수강신청'>수강신청</button>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='수강신청취소'>수강신청 취소</button>
</details>
</td>
</tr>
<tr>
<td align=center>
<details>
	<summary>성적관리</summary>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='수강과목성적조회'>수강과목성적조회</button>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='확정성적조회'>확정성적조회</button>
</details>
</td>
</tr>
</td>
</table>
</div>
<div style="width:89%;height:1000px;border:1px solid black;float:left; overflow:auto">
<?
	if($service == '학적조회')
	{
		CheckAcademicRecord();	
	}
	else if($service == '휴학신청' || $search == '휴학신청서조회' || $search == '휴학신청서작성')
	{
		ApplyLeaveOfAbsence();
	}
	else if($service == '복학신청' || $search == '복학신청서조회' || $search == '복학신청서작성')
	{
		ApplyReturnToSchool();
	}
	else if($service == '수강신청' || $search == '강의계획서조회' || $search == '수강신청')
	{
		SignUpLecture();
	}
	else if($service == '수강신청취소' || $search == '수강취소')
	{
		CancelLecture();
	}
	else if($service == '수강과목성적조회')
	{
		CheckGrade();
	}
	else if($service == '확정성적조회' ||  $search == '성적조회' || $search == '총성적조회')
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
