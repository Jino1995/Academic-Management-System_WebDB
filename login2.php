<?
session_start();
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
else{
	 $table="users";
	 $con = mysql_connect('myedb2.cf7tn4nos14x.us-east-2.rds.amazonaws.com:3306', '8Truck', 'gwnu')  or die("mySQL 서버 연결 Error!");
	 mysql_select_db('lecture_system',$con);
	 $userid=$_POST['userid'];
	 $passwd=$_POST['passwd'];
	 $query="select id, pass,sequre from $table where id='$userid'";
	 $result =mysql_query($query, $con);
	 if(!mysql_num_rows($result)){
		 $_SESSION['errormsg']="계정이 없습니다";
		print "<HTML><head> <META http-equiv='refresh' content='0; url=./login.html'></head></head>";
	 }
 	else {
		 $dbid=mysql_result($result,0,"id");
		 $dbpasswd = mysql_result($result, 0, "pass");
		 $dbsequre = mysql_result($result, 0, "sequre");
		 if($dbid==$userid AND $dbpasswd == $passwd){
		 	$_SESSION['login']='y';	
			 $_SESSION['userid']=$userid;
			 setcookie(session_name(),session_id(),time()+1000);
			if($dbsequre==1)
				print "<HTML><head> <META http-equiv='refresh' content='0; url=./gwnu.php'></head></head>";				//로그인 성공 시 메인화면으로
			else if($dbsequre==2)
				print "<HTML><head> <META http-equiv='refresh' content='0; url=./gwnu2.php'></head></head>";	
			else if($dbsequre==3)
				print "<HTML><head> <META http-equiv='refresh' content='0; url=./gwnu3.php'></head></head>";	
		}
		else {
			$_SESSION['errormsg']=$userid."님 패스워드가 틀렸습니다";
			print "<HTML><head> <META http-equiv='refresh' content='0; url=./login.html'></head></head>";
		}
 	}
}
?>
