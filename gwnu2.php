<?
//세션으로 자신의 교수번호(아이디) 받음
session_start();
ini_set('error_reporting','E_ALL ^ E_NOTICE');
if(!$_SESSION['userid'])
{
    echo "<HTML><head><META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}
function CheckAcademicGrade()
{
$강의명=$_POST[service_BT];
$strTok=explode( "*&" , $강의명); 
	$교수번호 = $_SESSION['userid'];
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query3="select count(Sid) as 'count'  from lecture,class where Lname='"."$strTok[1]"."' and lecture.Lnum=class.Lid";
	//해당 강의의 학생 수 검색
	$result3 = mysql_query($query3, $con);
	$학생수=mysql_result($result3,0,"count");
?>
	<div style="width:100%;height:100%; overflow:auto">
	<br>
	<font size=5><?echo $strTok[1];?> 성적 입력</font>
	<table width=100% height=90%>
	<tr width=30% height=0%>
	
		<tr>
		</tr><?
		$query4="select Sid,score,Lid  from class,lecture where Lname='"."$strTok[1]"."' and lecture.Lnum=class.Lid";
		//해당 강의의 학생들 학번 성적 검색
		$result4 = mysql_query($query4, $con);
		for($j=0;$j<$학생수;$j++){
			$학번1 =mysql_result($result4,$j,"Sid");
			$성적1 =mysql_result($result4,$j,"score");
			$강의번호1 =mysql_result($result4,$j,"Lid");
			
		echo "<tr><td width=20%>학번 </td><td width=30%><INPUT type='text' size=20  name=학번$j value=$학번1 readonly></td><td width=20%>성적</td><td width=30%><INPUT type='text' size=20 name=성적$j value=$성적1 ></td><td width=20%></td><td width=10%><INPUT type='hidden' size=2 name=강의번호$j value=$강의번호1><INPUT type='hidden' size=2 name=학번$j value=$학번1><INPUT type='hidden' size=2 name=학생수 value=$학생수></td></tr>";
		}
		
		?><button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='내부성적입력'>입력</button></table></div><?
} 
function Input_Data()
{	
	
	?>
	<font size=5>입력결과</font>
	<table border=1 width=100% height=90%>
	<tr width=30% height=0%>
	<td bgcolor=#F1F0F0>
	<table width=50% height=40%>
	<?	$학생수 = $_POST[학생수];
		for($j=0;$j<$학생수;$j++){ 
		$학번 = $_POST[학번.$j];
		$성적 = $_POST[성적.$j];
		$강의번호 = $_POST[강의번호.$j];
		echo "<tr><td>$학번 $성적 $강의번호</td></tr>";
		//데이터베이스에 성적 입력
		$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
		mysql_select_db('lecture_system',$con);
		$query="update class set score="."'"."$성적"."'"." where Sid="."'"."$학번"."'"."and Lid="."'"."$강의번호"."'";
		$result = mysql_query($query, $con);
		}
	?></table><?
}
function Checklectureform_Select($num){
$교수번호 = $_SESSION['userid'];
$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select Lname from lecture where Pid='"."$교수번호"."'"; 
	$result = mysql_query($query, $con);
	$query2="select count(Lname) as 'count' from lecture where Pid='"."$교수번호"."'"; 
	$result2 = mysql_query($query2, $con);
	$강의수 = mysql_result($result2,0,"count");
	echo "강의 선택<br>";
	for($i=0;$i<$강의수;$i++){
		$강의명[$i]=mysql_result($result,$i,"Lname");
		if($num==1)
		echo "<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value=강의계획서선택*&$강의명[$i]>$강의명[$i]</button><br>";
		else if($num==2)
		echo "<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value=강의계획서입력선택*&$강의명[$i]>$강의명[$i]</button><br>";
		else if($num==3)
		echo "<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value=성적입력선택*&$강의명[$i]>$강의명[$i]</button><br>";
	}
	

}


function Checklectureform()
{
$강의명=$_POST[service_BT];
$strTok=explode( "*&" , $강의명); 
echo $strTok[1];
$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
mysql_select_db('lecture_system',$con);
$query="select * from lecture_plan,lecture where lecture.Lname="."'"."$strTok[1]"."'"." and lecture.Lnum=lecture_plan.Lid"; 
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
}else{
 echo "<br>입력된 강의계획서가 없습니다.";
}
}

}


function Input_lectureform()
{

$강의명=$_POST[service_BT];
$strTok=explode( "*&" , $강의명); 
echo $strTok[1];
$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
mysql_select_db('lecture_system',$con);
$query="select * from lecture_plan,lecture where lecture.Lname="."'"."$strTok[1]"."'"." and lecture.Lnum=lecture_plan.Lid"; 
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
}
/////////////////
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
<td width=150 height=50 align=right><input type ="text" value="<? echo $내용1[0]; ?>" name="내용1"></td><td align=right><input type ="text" value="<? echo $내용1[1]; ?>"name="내용2"></td><td align=right><input type ="text" value="<? echo $내용1[2]; ?>"name="내용3"></td><td align=right><input type ="text" value="<? echo $내용1[3]; ?>"name="내용4"></td><td align=right><input type ="text" value="<? echo $내용1[4]; ?>"name="내용5"></td><td align=right><input type ="text" value="<? echo $내용1[5]; ?>"name="내용6"></td>
</tr>
</table>
<table border=1 width=1000 height =100 frame=void>
<tr>
<td width=150 height=50 align=center>중점 핵심역량</td><td><input type="text" value="<? echo $내용1[6]; ?>" name="내용7"></td>
</tr>
<tr>
<td width=150 height=50 align=center>전문역량</td><td><TEXTAREA name="내용8" row=10 cols=50>전문역량</TEXTAREA></td>
</table>
<pre>
2.교과목 개요
</pre>
<table border=1 width=1000 height=100 frame=void>
<tr>
<td width=150 height=20 align=center>교과목명</td><td><input type="text" value="<? echo $내용2[0]; ?>" name="내용9"></td><td>강좌번호</td><td><input type="text" value="<? echo $내용2[1]; ?>" name="내용10"></td><td>학점/시수</td><td><input type="text" value="<? echo $내용2[2]; ?>" name="내용11"></td>
</tr>
<tr>
<td width=150 height=20 align=center>강의요일</td><td><input type="text" value="<? echo $내용2[3]; ?>" name="내용12"></td><td>수강대상</td><td><input type="text" value="<? echo $내용2[4]; ?>" name="내용13"></td><td>면담가능시간</td><td><input type="text" value="<? echo $내용2[5]; ?>" name="내용14"></td>
</tr>
<tr>
<td width=150 height=40 align=center>담당교수</td><td><input type="text" value="<? echo $내용2[6]; ?>" name="내용15"></td><td>연구실</td><td><input type="text" value="<? echo $내용2[7]; ?>" name="내용16"></td><td>교수이메일</td><td><input type="text" value="<? echo $내용2[8]; ?>" name="내용17"></td>
</tr>
<tr>
<td width=150 height=20 align=center>전화</td><td><input type="text" value="<? echo $내용2[9]; ?>" name="내용18"></td><td>이수구분</td><td><input type="text" value="<? echo $내용2[10]; ?>" name="내용19"></td><td>입력일자</td><td><input type ="text" value ="<? echo $내용2[11]; ?>" name="내용20"></td>
</tr>



<table border=1 width=1000 height=100 frame=void>
<pre>
3.교육목표
</pre>
<tr>
<td><TEXTAREA name="내용21" rows=8 cols=100><? echo $내용3[0]; ?>
</TEXTAREA></td>
</tr>
<table border=1 width=1000 height=100 frame=void>
<pre>
4.교과목 내용
</pre>
<tr>
<td><TEXTAREA name="내용22"  rows=8 cols=100><? echo $내용4[0]; ?>
</TEXTAREA></td>
</tr>

<table border=1 width=1000 height=100 frame=void>
<pre>
5.선수과목 및 선수학습내용
</pre>
<tr>
<td width=150 height=70 align=center>선수 과목</td><td><TEXTAREA name="내용23" rows=4 cols=100>
<? echo $내용5[0]; ?>
</TEXTAREA></td>
</tr>
<tr>
<td width=150 height=70 align=center>선수학습내용</td><td><TEXTAREA name ="내용24" rows=2 cols=50>
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
<td width=150 height=25 align=right><input type ="text" value="<? echo $내용6[0]; ?>"name="내용25"></td><td align=right><input type ="text" value="<? echo $내용6[1]; ?>"name="내용26"></td><td align=right><input type ="text" value="<? echo $내용6[2]; ?>"name="내용27"></td><td align=right><input type ="text" value="<? echo $내용6[3]; ?>"name="내용28"></td><td align=right><input type ="text" value="<? echo $내용6[4]; ?>"name="내용29"></td><td align=right><input type ="text" value="<? echo $내용6[5]; ?>"name="내용30"></td><td align=right><input type ="text" value="<? echo $내용6[6]; ?>"name="내용31"></td>
</tr>
</table>
<table>
<tr>
<td width=150 height=50><TEXTAREA name="내용32" rows=10 cols=100>
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
<td width=150 height=25 align=right><input type ="text" value="<? echo $내용7[0]; ?>"name="내용33"></td><td align=right><input type ="text" value="<? echo $내용7[1]; ?>"name="내용34"></td><td align=right><input type ="text" value="<? echo $내용7[2]; ?>"name="내용35"></td><td align=right><input type ="text" value="<? echo $내용7[3]; ?>"name="내용36"></td>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>
8.학습 및 평가활동
</pre>
<tr>
<td width=150 height=50><TEXTAREA name="내용37" rows=12 cols=100>
<? echo $내용8[0]; ?>
</TEXTAREA></td>
</tr>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>
9.교과목과 연계된 비교과 활동
</pre>
<tr>
<td width=150 height=50><TEXTAREA name="내용38" rows=4 cols=100>
<? echo $내용9[0]; ?>
</TEXTAREA></td>
</tr>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>
10.교재,필독권장도서 및 참고문헌
</pre>
<tr>
<td width=150 height=50><TEXTAREA name="내용39" rows=3 cols=100>
<? echo $내용10[0]; ?>
</TEXTAREA></td>
</tr>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>


<?
///////////////
echo "</table></table><button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='강의계획서입력확인*&$strTok[1]'>입력</button>";
}
}
function confirm_lectureform(){
$강의명=$_POST[service_BT];
$strTok=explode( "*&" , $강의명);
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select Lnum from lecture where Lname="."'"."$strTok[1]"."'"; 
	$result = mysql_query($query, $con);
	$강의번호 = mysql_result($result,0,"Lnum");
	$query="select count(Lid) as 'count' from lecture_plan where Lid="."'"."$강의번호"."'"; 
	$result = mysql_query($query, $con);
	$기존자료여부 = mysql_result($result,0,"count");
	

	for($i=1;$i<=8;$i++){
	$핵심역량=$핵심역량.$_POST[내용.$i]."*&";
	}
	for($i=9;$i<=20;$i++){
	$교과목개요=$교과목개요.$_POST[내용.$i]."*&";
	}
	for($i=21;$i<=21;$i++){
	$교육목표=$교육목표.$_POST[내용.$i]."*&";
	}
	for($i=22;$i<=22;$i++){
	$교과목내용=$교과목내용.$_POST[내용.$i]."*&";
	}
	for($i=23;$i<=24;$i++){
	$선수과목=$선수과목.$_POST[내용.$i]."*&";
	}
	for($i=25;$i<=32;$i++){
	$수업운영=$수업운영.$_POST[내용.$i]."*&";
	}
	for($i=33;$i<=36;$i++){
	$성적평가=$성적평가.$_POST[내용.$i]."*&";
	}
	for($i=37;$i<=37;$i++){
	$학습및평가=$학습및평가.$_POST[내용.$i]."*&";
	}
	for($i=38;$i<=38;$i++){
	$교과목과연계된=$교과목과연계된.$_POST[내용.$i]."*&";
	}
	for($i=39;$i<=39;$i++){
	$교재필독권장=$교재필독권장.$_POST[내용.$i]."*&";
	}
	
	
	
	if($기존자료여부==0){
	$query="insert into lecture_plan values("."'"."$강의번호"."','"."$핵심역량"."','"."$교과목개요"."','"."$교육목표"."','"."$교과목내용"."','"."$선수과목"."','"."$수업운영"."','"."$성적평가"."','"."$학습및평가"."','"."$교과목과연계된"."','"."$교재필독권장"."','"."$교재필독권장"."','"."$교재필독권장"."','"."$교재필독권장"."')"; 
	//$query="insert into lecture_plan values("."'"."$강의번호"."','"."$핵심역량"."','"."$교과목개요"."'".",'4','5','6','7','8','9','10','11','12','13')"; 
	$result = mysql_query($query, $con);
	if($result){
		echo "입력이 완료되었습니다.";
		}
	}
	else{
	$query="delete from lecture_plan where Lid="."'"."$강의번호"."'";
	$result = mysql_query($query, $con);
	$query="insert into lecture_plan values("."'"."$강의번호"."','"."$핵심역량"."','"."$교과목개요"."','"."$교육목표"."','"."$교과목내용"."','"."$선수과목"."','"."$수업운영"."','"."$성적평가"."','"."$학습및평가"."','"."$교과목과연계된"."','"."$교재필독권장"."','"."$교재필독권장"."','"."$교재필독권장"."','"."$교재필독권장"."')"; 
	$result = mysql_query($query, $con);
	if($result){
		echo "수정이 완료되었습니다.";
		}
	}
	if(!$result){
		echo "입력 오류";
		}
		
}
function LectureCreate(){

?><table border=1 width=100% height=90%>
<tr>
<td height=20%>강의이름<br><input type ="text" value="강의이름"name="강의이름"></td>
<td>강의시간<br><input type ="text" value="강의시간"name="강의시간"></td>
<td>강의실<br><input type ="text" value="강의실"name="강의실"></td>
<td>최대수강인원<br><input type ="text" value="10"name="최대수강인원"></td></tr>
<tr><button type='submit' style='width:100pt;height:20pt;' name='service_BT' value=강의개설확인>강의개설확인</button></tr>

<?

}
function LectureCreate_Confirm(){
$교수번호=$_SESSION['userid'];
$강의이름 = $_POST['강의이름'];
$강의시간 = $_POST['강의시간'];
$강의실 = $_POST['강의실'];
$강의번호=0;
$최대수강인원 = $_POST['최대수강인원'];
$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select count(Lnum) as count from lecture where Lname="."'"."$강의이름"."'";
	$result = mysql_query($query, $con);
if(mysql_result($result,0,"count")==0){
for($i=1;$i<100;$i++){
$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="select count(Lnum) as count from lecture where Lnum="."'"."$i"."'";
	$result = mysql_query($query, $con);
	if(mysql_result($result,0,"count")==0){
		$강의번호=$i;
		break;
		}
}
$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL 서버 연결 Error!");
	mysql_select_db('lecture_system',$con);
	$query="insert into lecture values('"."$강의번호"."','"."$교수번호"."','"."$강의이름"."','"."$강의시간"."','"."$강의실"."','"."$최대수강인원"."','"."0')";
	$result = mysql_query($query, $con);
	if($result){
		echo $강의이름."과목이 개설되었습니다.";
	}
	else if(!$result){
		echo "입력 오류";
		}
	
}
else{
	echo "이미 동일한 강의명으로 개설된 과목이 존재합니다.";
}
}
$service = $_POST['service_BT'];
$교수번호 = $_SESSION['userid'];
?>
<html>
<head>
<title>
GWNU 학사관리 웹페이지
</title>
</head>
<body>
<form method="POST" action="gwnu2.php">
<div style="position:absolute;width:100%;height:100%";>
<?
echo "<button type='submit'  name='button1' value=1>로그아웃</button>";echo $교수번호;
$로그아웃 = 0;
$로그아웃 = $_POST["button1"];
if($로그아웃==1){
if($_SESSION['login']=='y'){
 //$_SESSION['errormsg']="로그아웃되었습니다";
setcookie(session_name(),session_id(),time()-10);
print "<HTML><head> <META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}
else{
 $_SESSION['errormsg']="로그아웃 권한이 없습니다";
print "<HTML><head> <META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}
}?>
<center><font size = 10>강릉원주대학교 학사관리시스템(교수용)</font></center>
<div style="width:10%;height:1000px;float:left">
<table border=1 width=100%, height=100%>
<tr>
<td align=center>
<details>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='강의계획서입력'>강의계획서 입력</button>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='강의계획서조회'>강의계획서조회</button>
</details>
</td>
</tr>
<tr>
<td align=center>
<details>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='강의개설'>강의개설</button>
</details>
</td>
</tr>
<tr>
<td align=center>
<details>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='성적입력'>성적입력</button>
</details>
</td>
</tr>
</td>
</table>
</div>
<div style="width:89%;height:1000px; overflow:auto">
<table border=1 width=100%, height=100%>
<tr>
<td>

<?
	if($service == '성적입력')
	{
		Checklectureform_Select(3);	
	}
	else if(strpos($service,'성적입력선택')!==false)
	{
		CheckAcademicGrade();
	}
	else if($service == '내부성적입력')
	{
		Input_Data();	
	}
	else if($service == '강의계획서조회')
	{
		Checklectureform_Select(1);
	}else if($service == '강의개설')
	{
		LectureCreate();
	}else if($service == '강의개설확인')
	{
		LectureCreate_Confirm();
	}
	else if(strpos($service,'강의계획서선택')!==false)
	{
		Checklectureform();
	}
	else if($service == '강의계획서입력')
	{
		Checklectureform_Select(2);
	}
	else if(strpos($service,'강의계획서입력선택')!==false)
	{
		Input_lectureform();
	}
	else if(strpos($service,'강의계획서입력확인')!==false)
	{
		confirm_lectureform();
	}
?>


</td>
</tr>
</table>
</div>
</div>
</form>
</body>
</html>
