<?
//�������� �ڽ��� ������ȣ(���̵�) ����
session_start();
ini_set('error_reporting','E_ALL ^ E_NOTICE');
if(!$_SESSION['userid'])
{
    echo "<HTML><head><META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}
function CheckAcademicGrade()
{
$���Ǹ�=$_POST[service_BT];
$strTok=explode( "*&" , $���Ǹ�); 
	$������ȣ = $_SESSION['userid'];
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query3="select count(Sid) as 'count'  from lecture,class where Lname='"."$strTok[1]"."' and lecture.Lnum=class.Lid";
	//�ش� ������ �л� �� �˻�
	$result3 = mysql_query($query3, $con);
	$�л���=mysql_result($result3,0,"count");
?>
	<div style="width:100%;height:100%; overflow:auto">
	<br>
	<font size=5><?echo $strTok[1];?> ���� �Է�</font>
	<table width=100% height=90%>
	<tr width=30% height=0%>
	
		<tr>
		</tr><?
		$query4="select Sid,score,Lid  from class,lecture where Lname='"."$strTok[1]"."' and lecture.Lnum=class.Lid";
		//�ش� ������ �л��� �й� ���� �˻�
		$result4 = mysql_query($query4, $con);
		for($j=0;$j<$�л���;$j++){
			$�й�1 =mysql_result($result4,$j,"Sid");
			$����1 =mysql_result($result4,$j,"score");
			$���ǹ�ȣ1 =mysql_result($result4,$j,"Lid");
			
		echo "<tr><td width=20%>�й� </td><td width=30%><INPUT type='text' size=20  name=�й�$j value=$�й�1 readonly></td><td width=20%>����</td><td width=30%><INPUT type='text' size=20 name=����$j value=$����1 ></td><td width=20%></td><td width=10%><INPUT type='hidden' size=2 name=���ǹ�ȣ$j value=$���ǹ�ȣ1><INPUT type='hidden' size=2 name=�й�$j value=$�й�1><INPUT type='hidden' size=2 name=�л��� value=$�л���></td></tr>";
		}
		
		?><button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='���μ����Է�'>�Է�</button></table></div><?
} 
function Input_Data()
{	
	
	?>
	<font size=5>�Է°��</font>
	<table border=1 width=100% height=90%>
	<tr width=30% height=0%>
	<td bgcolor=#F1F0F0>
	<table width=50% height=40%>
	<?	$�л��� = $_POST[�л���];
		for($j=0;$j<$�л���;$j++){ 
		$�й� = $_POST[�й�.$j];
		$���� = $_POST[����.$j];
		$���ǹ�ȣ = $_POST[���ǹ�ȣ.$j];
		echo "<tr><td>$�й� $���� $���ǹ�ȣ</td></tr>";
		//�����ͺ��̽��� ���� �Է�
		$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
		mysql_select_db('lecture_system',$con);
		$query="update class set score="."'"."$����"."'"." where Sid="."'"."$�й�"."'"."and Lid="."'"."$���ǹ�ȣ"."'";
		$result = mysql_query($query, $con);
		}
	?></table><?
}
function Checklectureform_Select($num){
$������ȣ = $_SESSION['userid'];
$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="select Lname from lecture where Pid='"."$������ȣ"."'"; 
	$result = mysql_query($query, $con);
	$query2="select count(Lname) as 'count' from lecture where Pid='"."$������ȣ"."'"; 
	$result2 = mysql_query($query2, $con);
	$���Ǽ� = mysql_result($result2,0,"count");
	echo "���� ����<br>";
	for($i=0;$i<$���Ǽ�;$i++){
		$���Ǹ�[$i]=mysql_result($result,$i,"Lname");
		if($num==1)
		echo "<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value=���ǰ�ȹ������*&$���Ǹ�[$i]>$���Ǹ�[$i]</button><br>";
		else if($num==2)
		echo "<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value=���ǰ�ȹ���Է¼���*&$���Ǹ�[$i]>$���Ǹ�[$i]</button><br>";
		else if($num==3)
		echo "<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value=�����Է¼���*&$���Ǹ�[$i]>$���Ǹ�[$i]</button><br>";
	}
	

}


function Checklectureform()
{
$���Ǹ�=$_POST[service_BT];
$strTok=explode( "*&" , $���Ǹ�); 
echo $strTok[1];
$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
mysql_select_db('lecture_system',$con);
$query="select * from lecture_plan,lecture where lecture.Lname="."'"."$strTok[1]"."'"." and lecture.Lnum=lecture_plan.Lid"; 
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
}else{
 echo "<br>�Էµ� ���ǰ�ȹ���� �����ϴ�.";
}
}

}


function Input_lectureform()
{

$���Ǹ�=$_POST[service_BT];
$strTok=explode( "*&" , $���Ǹ�); 
echo $strTok[1];
$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
mysql_select_db('lecture_system',$con);
$query="select * from lecture_plan,lecture where lecture.Lname="."'"."$strTok[1]"."'"." and lecture.Lnum=lecture_plan.Lid"; 
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
}
/////////////////
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
<td width=150 height=50 align=right><input type ="text" value="<? echo $����1[0]; ?>" name="����1"></td><td align=right><input type ="text" value="<? echo $����1[1]; ?>"name="����2"></td><td align=right><input type ="text" value="<? echo $����1[2]; ?>"name="����3"></td><td align=right><input type ="text" value="<? echo $����1[3]; ?>"name="����4"></td><td align=right><input type ="text" value="<? echo $����1[4]; ?>"name="����5"></td><td align=right><input type ="text" value="<? echo $����1[5]; ?>"name="����6"></td>
</tr>
</table>
<table border=1 width=1000 height =100 frame=void>
<tr>
<td width=150 height=50 align=center>���� �ٽɿ���</td><td><input type="text" value="<? echo $����1[6]; ?>" name="����7"></td>
</tr>
<tr>
<td width=150 height=50 align=center>��������</td><td><TEXTAREA name="����8" row=10 cols=50>��������</TEXTAREA></td>
</table>
<pre>
2.������ ����
</pre>
<table border=1 width=1000 height=100 frame=void>
<tr>
<td width=150 height=20 align=center>�������</td><td><input type="text" value="<? echo $����2[0]; ?>" name="����9"></td><td>���¹�ȣ</td><td><input type="text" value="<? echo $����2[1]; ?>" name="����10"></td><td>����/�ü�</td><td><input type="text" value="<? echo $����2[2]; ?>" name="����11"></td>
</tr>
<tr>
<td width=150 height=20 align=center>���ǿ���</td><td><input type="text" value="<? echo $����2[3]; ?>" name="����12"></td><td>�������</td><td><input type="text" value="<? echo $����2[4]; ?>" name="����13"></td><td>��㰡�ɽð�</td><td><input type="text" value="<? echo $����2[5]; ?>" name="����14"></td>
</tr>
<tr>
<td width=150 height=40 align=center>��米��</td><td><input type="text" value="<? echo $����2[6]; ?>" name="����15"></td><td>������</td><td><input type="text" value="<? echo $����2[7]; ?>" name="����16"></td><td>�����̸���</td><td><input type="text" value="<? echo $����2[8]; ?>" name="����17"></td>
</tr>
<tr>
<td width=150 height=20 align=center>��ȭ</td><td><input type="text" value="<? echo $����2[9]; ?>" name="����18"></td><td>�̼�����</td><td><input type="text" value="<? echo $����2[10]; ?>" name="����19"></td><td>�Է�����</td><td><input type ="text" value ="<? echo $����2[11]; ?>" name="����20"></td>
</tr>



<table border=1 width=1000 height=100 frame=void>
<pre>
3.������ǥ
</pre>
<tr>
<td><TEXTAREA name="����21" rows=8 cols=100><? echo $����3[0]; ?>
</TEXTAREA></td>
</tr>
<table border=1 width=1000 height=100 frame=void>
<pre>
4.������ ����
</pre>
<tr>
<td><TEXTAREA name="����22"  rows=8 cols=100><? echo $����4[0]; ?>
</TEXTAREA></td>
</tr>

<table border=1 width=1000 height=100 frame=void>
<pre>
5.�������� �� �����н�����
</pre>
<tr>
<td width=150 height=70 align=center>���� ����</td><td><TEXTAREA name="����23" rows=4 cols=100>
<? echo $����5[0]; ?>
</TEXTAREA></td>
</tr>
<tr>
<td width=150 height=70 align=center>�����н�����</td><td><TEXTAREA name ="����24" rows=2 cols=50>
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
<td width=150 height=25 align=right><input type ="text" value="<? echo $����6[0]; ?>"name="����25"></td><td align=right><input type ="text" value="<? echo $����6[1]; ?>"name="����26"></td><td align=right><input type ="text" value="<? echo $����6[2]; ?>"name="����27"></td><td align=right><input type ="text" value="<? echo $����6[3]; ?>"name="����28"></td><td align=right><input type ="text" value="<? echo $����6[4]; ?>"name="����29"></td><td align=right><input type ="text" value="<? echo $����6[5]; ?>"name="����30"></td><td align=right><input type ="text" value="<? echo $����6[6]; ?>"name="����31"></td>
</tr>
</table>
<table>
<tr>
<td width=150 height=50><TEXTAREA name="����32" rows=10 cols=100>
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
<td width=150 height=25 align=right><input type ="text" value="<? echo $����7[0]; ?>"name="����33"></td><td align=right><input type ="text" value="<? echo $����7[1]; ?>"name="����34"></td><td align=right><input type ="text" value="<? echo $����7[2]; ?>"name="����35"></td><td align=right><input type ="text" value="<? echo $����7[3]; ?>"name="����36"></td>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>
8.�н� �� ��Ȱ��
</pre>
<tr>
<td width=150 height=50><TEXTAREA name="����37" rows=12 cols=100>
<? echo $����8[0]; ?>
</TEXTAREA></td>
</tr>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>
9.������� ����� �񱳰� Ȱ��
</pre>
<tr>
<td width=150 height=50><TEXTAREA name="����38" rows=4 cols=100>
<? echo $����9[0]; ?>
</TEXTAREA></td>
</tr>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>
10.����,�ʵ����嵵�� �� ������
</pre>
<tr>
<td width=150 height=50><TEXTAREA name="����39" rows=3 cols=100>
<? echo $����10[0]; ?>
</TEXTAREA></td>
</tr>
</table>
<table border=1 width=1000 height = 100 frame=void>
<pre>


<?
///////////////
echo "</table></table><button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='���ǰ�ȹ���Է�Ȯ��*&$strTok[1]'>�Է�</button>";
}
}
function confirm_lectureform(){
$���Ǹ�=$_POST[service_BT];
$strTok=explode( "*&" , $���Ǹ�);
	$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="select Lnum from lecture where Lname="."'"."$strTok[1]"."'"; 
	$result = mysql_query($query, $con);
	$���ǹ�ȣ = mysql_result($result,0,"Lnum");
	$query="select count(Lid) as 'count' from lecture_plan where Lid="."'"."$���ǹ�ȣ"."'"; 
	$result = mysql_query($query, $con);
	$�����ڷῩ�� = mysql_result($result,0,"count");
	

	for($i=1;$i<=8;$i++){
	$�ٽɿ���=$�ٽɿ���.$_POST[����.$i]."*&";
	}
	for($i=9;$i<=20;$i++){
	$�����񰳿�=$�����񰳿�.$_POST[����.$i]."*&";
	}
	for($i=21;$i<=21;$i++){
	$������ǥ=$������ǥ.$_POST[����.$i]."*&";
	}
	for($i=22;$i<=22;$i++){
	$�����񳻿�=$�����񳻿�.$_POST[����.$i]."*&";
	}
	for($i=23;$i<=24;$i++){
	$��������=$��������.$_POST[����.$i]."*&";
	}
	for($i=25;$i<=32;$i++){
	$�����=$�����.$_POST[����.$i]."*&";
	}
	for($i=33;$i<=36;$i++){
	$������=$������.$_POST[����.$i]."*&";
	}
	for($i=37;$i<=37;$i++){
	$�н�����=$�н�����.$_POST[����.$i]."*&";
	}
	for($i=38;$i<=38;$i++){
	$������������=$������������.$_POST[����.$i]."*&";
	}
	for($i=39;$i<=39;$i++){
	$�����ʵ�����=$�����ʵ�����.$_POST[����.$i]."*&";
	}
	
	
	
	if($�����ڷῩ��==0){
	$query="insert into lecture_plan values("."'"."$���ǹ�ȣ"."','"."$�ٽɿ���"."','"."$�����񰳿�"."','"."$������ǥ"."','"."$�����񳻿�"."','"."$��������"."','"."$�����"."','"."$������"."','"."$�н�����"."','"."$������������"."','"."$�����ʵ�����"."','"."$�����ʵ�����"."','"."$�����ʵ�����"."','"."$�����ʵ�����"."')"; 
	//$query="insert into lecture_plan values("."'"."$���ǹ�ȣ"."','"."$�ٽɿ���"."','"."$�����񰳿�"."'".",'4','5','6','7','8','9','10','11','12','13')"; 
	$result = mysql_query($query, $con);
	if($result){
		echo "�Է��� �Ϸ�Ǿ����ϴ�.";
		}
	}
	else{
	$query="delete from lecture_plan where Lid="."'"."$���ǹ�ȣ"."'";
	$result = mysql_query($query, $con);
	$query="insert into lecture_plan values("."'"."$���ǹ�ȣ"."','"."$�ٽɿ���"."','"."$�����񰳿�"."','"."$������ǥ"."','"."$�����񳻿�"."','"."$��������"."','"."$�����"."','"."$������"."','"."$�н�����"."','"."$������������"."','"."$�����ʵ�����"."','"."$�����ʵ�����"."','"."$�����ʵ�����"."','"."$�����ʵ�����"."')"; 
	$result = mysql_query($query, $con);
	if($result){
		echo "������ �Ϸ�Ǿ����ϴ�.";
		}
	}
	if(!$result){
		echo "�Է� ����";
		}
		
}
function LectureCreate(){

?><table border=1 width=100% height=90%>
<tr>
<td height=20%>�����̸�<br><input type ="text" value="�����̸�"name="�����̸�"></td>
<td>���ǽð�<br><input type ="text" value="���ǽð�"name="���ǽð�"></td>
<td>���ǽ�<br><input type ="text" value="���ǽ�"name="���ǽ�"></td>
<td>�ִ�����ο�<br><input type ="text" value="10"name="�ִ�����ο�"></td></tr>
<tr><button type='submit' style='width:100pt;height:20pt;' name='service_BT' value=���ǰ���Ȯ��>���ǰ���Ȯ��</button></tr>

<?

}
function LectureCreate_Confirm(){
$������ȣ=$_SESSION['userid'];
$�����̸� = $_POST['�����̸�'];
$���ǽð� = $_POST['���ǽð�'];
$���ǽ� = $_POST['���ǽ�'];
$���ǹ�ȣ=0;
$�ִ�����ο� = $_POST['�ִ�����ο�'];
$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="select count(Lnum) as count from lecture where Lname="."'"."$�����̸�"."'";
	$result = mysql_query($query, $con);
if(mysql_result($result,0,"count")==0){
for($i=1;$i<100;$i++){
$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="select count(Lnum) as count from lecture where Lnum="."'"."$i"."'";
	$result = mysql_query($query, $con);
	if(mysql_result($result,0,"count")==0){
		$���ǹ�ȣ=$i;
		break;
		}
}
$con=mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')or die("mySQL ���� ���� Error!");
	mysql_select_db('lecture_system',$con);
	$query="insert into lecture values('"."$���ǹ�ȣ"."','"."$������ȣ"."','"."$�����̸�"."','"."$���ǽð�"."','"."$���ǽ�"."','"."$�ִ�����ο�"."','"."0')";
	$result = mysql_query($query, $con);
	if($result){
		echo $�����̸�."������ �����Ǿ����ϴ�.";
	}
	else if(!$result){
		echo "�Է� ����";
		}
	
}
else{
	echo "�̹� ������ ���Ǹ����� ������ ������ �����մϴ�.";
}
}
$service = $_POST['service_BT'];
$������ȣ = $_SESSION['userid'];
?>
<html>
<head>
<title>
GWNU �л���� ��������
</title>
</head>
<body>
<form method="POST" action="gwnu2.php">
<div style="position:absolute;width:100%;height:100%";>
<?
echo "<button type='submit'  name='button1' value=1>�α׾ƿ�</button>";echo $������ȣ;
$�α׾ƿ� = 0;
$�α׾ƿ� = $_POST["button1"];
if($�α׾ƿ�==1){
if($_SESSION['login']=='y'){
 //$_SESSION['errormsg']="�α׾ƿ��Ǿ����ϴ�";
setcookie(session_name(),session_id(),time()-10);
print "<HTML><head> <META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}
else{
 $_SESSION['errormsg']="�α׾ƿ� ������ �����ϴ�";
print "<HTML><head> <META http-equiv='refresh' content='0; url=./login.html'></head></head>";
}
}?>
<center><font size = 10>�������ִ��б� �л�����ý���(������)</font></center>
<div style="width:10%;height:1000px;float:left">
<table border=1 width=100%, height=100%>
<tr>
<td align=center>
<details>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='���ǰ�ȹ���Է�'>���ǰ�ȹ�� �Է�</button>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='���ǰ�ȹ����ȸ'>���ǰ�ȹ����ȸ</button>
</details>
</td>
</tr>
<tr>
<td align=center>
<details>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='���ǰ���'>���ǰ���</button>
</details>
</td>
</tr>
<tr>
<td align=center>
<details>
	<button type='submit' style='width:100pt;height:20pt;' name='service_BT' value='�����Է�'>�����Է�</button>
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
	if($service == '�����Է�')
	{
		Checklectureform_Select(3);	
	}
	else if(strpos($service,'�����Է¼���')!==false)
	{
		CheckAcademicGrade();
	}
	else if($service == '���μ����Է�')
	{
		Input_Data();	
	}
	else if($service == '���ǰ�ȹ����ȸ')
	{
		Checklectureform_Select(1);
	}else if($service == '���ǰ���')
	{
		LectureCreate();
	}else if($service == '���ǰ���Ȯ��')
	{
		LectureCreate_Confirm();
	}
	else if(strpos($service,'���ǰ�ȹ������')!==false)
	{
		Checklectureform();
	}
	else if($service == '���ǰ�ȹ���Է�')
	{
		Checklectureform_Select(2);
	}
	else if(strpos($service,'���ǰ�ȹ���Է¼���')!==false)
	{
		Input_lectureform();
	}
	else if(strpos($service,'���ǰ�ȹ���Է�Ȯ��')!==false)
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
