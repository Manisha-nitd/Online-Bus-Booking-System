<?php
$conn=null;
function getconnection()
{
	global $conn;
	$conn=mysql_connect("localhost","root","");
	if($conn==false)
		die ("Connection not established");
	mysql_select_db('citylink_db');
}
function closeconnection()
{
	global $conn;
	mysql_close($conn);
}
function login($usname,$pwd)
{
	global $conn;
	getconnection();
	$flag=false;
	$sql="select password from user where username='$usname'";
	$resultset=mysql_query($sql,$conn);
	while ($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		if ($row[0]==$pwd)
		{
			$flag=true;
		}
	}
		
	if ($flag==true)
		return true;
    else
    	return false; 
	closeconnection();

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
	$sql="update user set password='$newpwd' where username='$usname'";
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
	$sql="select sec_ques from user where username='$usname'";
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
	$sql="select sec_ans from user where username='$usname'";
	$resultset=mysql_query($sql,$conn);
	if($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		if($sec_ans==$row[0])
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
function view_profile($usname)
{
	global $conn;
	getconnection();
	$sql="select name,username,password,gender,dob,contactno,emailid,city from user where username='$usname'";
	$resultset=mysql_query($sql,$conn);
	$data=array();
	//$i=0;
	while ($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		$data=$row;
	}
	return $data;
}
function edit_profile($usname,$con,$emid,$city)
{
    global $conn;
	getconnection();
	$sql="update user set contactno='$con',emailid='$emid',city='$city' where username='$usname'";
	mysql_query($sql,$conn);
	closeconnection();
	return true;
}
function confirm_username($usname)
{
	global $conn;
	getconnection();
	$sql="select username from user where username='$usname'";
	$resultset=mysql_query($sql,$conn);
	if ($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		return true;
	}
	return false;
	closeconnection();
	
}
?>