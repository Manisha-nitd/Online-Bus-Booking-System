<?php 
require 'db_user.php';
$msg="";
session_start();
if (isset($_REQUEST['login']))
{
	$usname=$_REQUEST['usname'];
	$pwd=$_REQUEST['pwd'];
	$bool=login($usname, $pwd);
	if ($bool==true)
	{
		$_SESSION['usname']=$usname;
		header('location: user_home.php?username='.$usname);
		
	}
	else 
		$msg= "Invalid username or password!!";
}
if(isset($_SESSION['usname'])&&isset($_SESSION['bookid']))
{
	header('location:bookfinal.php');
}
?>

<html>
<head>
<title>Login Page</title>
<script type="text/javascript">
function check()
{
	var uname=document.getElementById("usname").value;
	if(uname.length==0)
	{
		alert("please give username");
		return false;
	}
	var pwd=document.getElementById("pwd").value;
	if(pwd.length==0)
	{
		alert("please give password");
		return false;
	}
	return true;
}
</script>
<link rel="stylesheet" type="text/css" href="citylink.css ">
 <link rel="stylesheet" href="bootstrap.min.css">
 <style type="text/css">
 body
 {
 background-image:url("travel1.jpeg.jpg");
 background-repeat:no-repeat;
 background-size:cover;
 text-align:center;
 }
 table
 {
border:2px solid black; 
width:25%;
height:10%;
cell-padding:5px;
 }
 tr,td
 {
 border:2px;
 text-align:right;
 cell-padding:5px;
 
 }
 
 

 </style>
</head>
<body>
<div class="page-header" align=center>
  <h1><img src="logo.PNG" height=130 width=150 align=left></img>
 <font color=black><big> CITY LINK</big><small><font color=red>&nbsp;&nbsp;Connecting India faster</font></small></h1>
</div>
<form method="get" action="">
<table align=center> 
<tr><td><b>USERNAME:</b></td><td><div><input type=text size=25 name=usname id=usname>*</div></td></tr>
<tr><td><b>PASSWORD:</b></td><td><div><input type=password size=25 name=pwd id=pwd>*</div></td></tr>
</table>&nbsp;&nbsp;
<div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=submit name=login value=LOGIN onclick="return check()"><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a  href='forget_usname.php'><u>Forget Password??</u></a>
<a  href='registration.php'><u>New User?</u></a></div>
<a  href='homepage.php'><u>Home</u></a></div>

</form>
<?php 
echo"<font color=red size=4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$msg";
?>
</body>
</html>