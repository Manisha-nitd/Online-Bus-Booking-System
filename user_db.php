<?php
$conn=null;
$table=array();
function getconnection()
{
	global $conn;
	$conn=mysql_connect("localhost","root","");
	if(!$conn)
		die ("Connection not established");
	mysql_select_db('citylink_db');
	
}
function closeconnection()
{
	global $conn;
	mysql_close($conn);
}
function add_user($uname,$usname,$pwd,$gender,$dob,$cno,$eid,$city,$sec_ques,$sec_ans)
{
	global $conn;
	getconnection();
	$sql="insert into user (name,gender,dob,contactno,emailid,password,username,city,sec_ques,sec_ans) values('$uname','$gender','$dob','$cno','$eid','$pwd','$usname','$city','$sec_ques','$sec_ans')";
	$nor=mysql_query($sql,$conn);
	if($nor>0)
	{
		echo"Registered successfully!";
	}
	else 
		echo"Not registered!";
		
	closeconnection();
}
function change_password($usname,$newpwd)
{
	global $conn;
	getconnection();
	$sql="update user set password='$newpwd' where usname='$usname'";
	$nor=mysql_query($sql,$conn);
	if($nor>0)
	{
		echo"Password changed successfully!";
	}
	else
		echo"Password not changed!";
	
	closeconnection();
}
function bring_question($usname)
{
	global $conn;
	getconnection();
	$sql="select sec_ques from user where usname='$usname'";
	$resultset=mysql_query($sql,$conn);
	if($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		$ques=$row[0];
	}
	closeconnection();
	return $ques;
}
function check_sec_ans($usname,$sec_ans)
{
	global $conn;
	getconnection();
	$sql="select sec_ans from user where usname='$usname'";
	$resultset=mysql_query($sql,$conn);
	if($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		if($sec_ques==$row[0])
		{
			header('location:changepwd.php');
		}
		else 
		{
			echo"Wrong answer!!";
			header('location:forgetpwd.php');
		}
	}
	closeconnection();
}

?>