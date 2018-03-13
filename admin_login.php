<?php
session_start();
if(isset($_REQUEST['submit']))
{
	$uid=$_REQUEST['adname'];
	$pwd=$_REQUEST['adpwd'];
	if($uid=='admin' && $pwd=="admin")
	{
		$_SESSION['adname']=$_REQUEST['adname'];
		header('location:Admin_home.php');
	}
	echo "Invalid user ID";
}
?>
<html>
<head>
<title> Admin Login</title>
<link rel="stylesheet" type="text/css" href="citylink.css ">
 <link rel="stylesheet" href="bootstrap.min.css">
<style type="text/css">
body
{
 background-image:url("travel.jpg");
 background-repeat:no-repeat;
 background-size:cover;
 text-align:center;
}
table
 {
border:2px solid black; 
cell-padding:5px;
 }
td
{
font-weight:bold;
border:2px solid black; 
padding:5px;
text-align:left;
}
</style>
</head>
<body>
<div class="page-header">
   <h1><img src="logo.PNG" height=130 width=150 align=left></img>
 <font color=black><big> CITY LINK</big></font><small><font color=red><i>Connecting cities faster</i></font></small></h1>
</div>
<form action="" name=f1 method=post>
<table align=center>
<tr><td>Admin Name:</td><td><input type=text size=20 name=adname></td></tr>
<tr><td>Password:</td><td><input type=password size=20 name=adpwd></td></tr>
</table>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit name=submit value=LOGIN>
<a href="homepage.php">HOME</a></div>
</form>
<div align=center>
</div>
</body>
</html>