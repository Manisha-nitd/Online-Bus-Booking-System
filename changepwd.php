<?php
require_once 'db_user.php';
session_start();
if(!isset($_SESSION['usname']))
{
	echo"Unauthenticated Access! Please<a href=login.php> login.";
	return ;
}
$usname=$_SESSION['usname'];
if(isset($_REQUEST['submit']))
{
	$newpwd=$_REQUEST['newpwd'];
	change_password($usname,$newpwd);
}
?>
<html>
<head>
<title>Change Password</title>
<script type="text/javascript">
function check()
{
	
var pwd=document.getElementById("newpwd").value;
	var cpwd=document.getElementById("newcpwd").value;

	if(pwd.length==0)
	{
		alert("please give password");
		return false;
	}
	if(pwd.length<=6 || pwd!=cpwd)
	{
		alert("password mismatch");
		return false;
	}
	return true;
}
</script>
<link rel="stylesheet" type="text/css" href="citylink.css ">
 <link rel="stylesheet" href="bootstrap.min.css">
<style>
 body
{
 min-height:100%;
 background-image:url("travel.jpg");
 background-repeat:no-repeat;
 background-size:cover;
 text-align:center;
}
table
 {
border:3px solid black; 
 }
td,tr
{
font-weight:bold;
border:2px solid black; 
padding:5px;
text-align:left;
}
</style>
</head>
<body>
<div class="page-header" align=center>
 <h1><img src="logo.PNG" height=130 width=150 align=left></img>
<font color=black><big> CITY LINK</big></font><small><font color=red>Connecting cities faster</font></small></h1>
</div>
<form action="" method=get>
<p align=center>
<table>
<tr><td>New Password:</td><td><input type=password size=20 placeholder="please enter atleast 7 digit password" name=newpwd id=newpwd></td></tr>
<tr><td>Confirm New Password:</td><td><input type=password size=20 name=cpwd id=newcpwd></td></tr><br>
</table>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit name=submit value=SUBMIT onclick="return check()">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="user_home.php">HOME</a></div>

</p>
</form>
</body>
</html>