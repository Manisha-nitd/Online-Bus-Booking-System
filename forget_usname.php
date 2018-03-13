<?php
require_once 'db_user.php';
session_start();
if(isset($_REQUEST['sub1']))
{
	$usname=$_REQUEST['usname'];
	$_SESSION['usname']=$usname;
	$bool=confirm_username($usname);
	if($bool==true)
	{
		header("location:forgetpwd.php");
	}
	echo"Invalid username!!";
}
?>
<html>
<head>
<title>User Name</title>
<script type="text/javascript">
function check()
{
	var usname=document.getElementById("usname").value;
	if(usname.length==0)
	{
		alert("please give username");
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
</style>
</head>
<body>
<div class="page-header" align=center>
 <h1><img src="logo.PNG" height=130 width=150 align=left></img>
<font color=black><big> CITY LINK</big></font><small>&nbsp;&nbsp;<font color=red><u>Connecting cities faster</u></font></small></h1>
</div>
<form name=form method=post>
<h3><b>Enter your Username:</b><input type=text size=20 name=usname id=usname ></h3>
<input type=submit name=sub1 value="SUBMIT" onclick="return check()">
</form>
</body>
</html>
