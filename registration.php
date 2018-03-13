<?php 
require_once 'db_user.php';
?>
<?php 
$q1="what is your nickname?";
$q2="who is your favourite author?";
$q3="what is your favourite book?";
$ques="<option>".$q1."</option>"."<option>".$q2."</option>"."<option>".$q3."</option>";

?>
<?php 
if(isset($_REQUEST['submit']))
{
	$uname=$_REQUEST['uname'];
	$usname=$_REQUEST['usname'];
	$pwd=$_REQUEST['pwd'];
	$gender=$_REQUEST['gender'];
	$dob=$_REQUEST['dob'];
	$cno=$_REQUEST['cno'];
	$eid=$_REQUEST['eid'];
	$city=$_REQUEST['city'];
	$sec_ques=$_REQUEST['sec_ques'];
	$sec_ans=$_REQUEST['sec_ans'];
	add_user($uname,$usname,$pwd,$gender,$dob,$cno,$eid,$city,$sec_ques,$sec_ans);
}
?>
<html>
<head>
<title>Registration Form</title>
<script type="text/javascript">
function check()
{
	var uname=document.getElementById("uname").value;
	if(uname.length==0)
	{
		alert("please give your name");
		return false;
	}
	var usname=document.getElementById("usname").value;
	if(usname.length==0)
	{
		alert("please give username");
		return false;
	}
	var pwd=document.getElementById("pwd").value;
	var cpwd=document.getElementById("cpwd").value;
	if(pwd.length<=6 || pwd!=cpwd)
	{
		alert("password mismatch");
		return false;
	}
	var m=document.getElementById("male");
	var f=document.getElementById("female");
	if(m.checked==false && f.checked==false)
	{
		alert("please select gender");
		return false;
	}
	var dob=document.getElementById("dob").value;
	if(dob.length==0)
	{
		alert("please give you date of birth");
		return false;
	}
	var secans=document.getElementById("secans").value;
	if(secans.length==0)
	{
		alert("please select security question and give its respective answer");
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
 min-height:100%;
 background-image:url("travel.jpg");
 background-repeat:no-repeat;
 background-size:cover;
 text-align:center;
}
table
 {
border:3px solid black; 
height:70%;
width:50%;
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
<body bgcolor=pink>
<div class="page-header">
   <h1><img src="logo.PNG" height=130 width=150 align=left></img>
 <font color=black><big> CITY LINK</big></font><small><font color=red>Connecting cities faster</font></small></h1>
</div>
<form method="get" action="">
<p align=center>
<table>
<tr><td>Name:</td><td><div><input type=text size=40 name=uname id=uname>*</div></td></tr>
<tr><td>username:</td><td><div><input type=text size=10 name=usname id=usname>*</div></td></tr>
<tr><td>Password:</td><td><div><input type=password placeholder="please enter atleast 7 digit password" size=15 name=pwd id=pwd>*</div></td></tr>
<tr><td>Confirm Password:</td><td><input type=password size=15 name=cpwd id=cpwd></td></tr>
<tr><td>Gender:</td><td><div><input type=radio name=gender value="male" id=male>Male
<input type=radio name=gender value="female" id=female>Female *</div></td></tr>
<tr><td>Date of Birth:<b>(DDMMYYYY)</b></td><td><div><input type=text name=dob id=dob>*</div></td>
<tr><td>Contact No:</td><td><div><input type=text size=15 name=cno id=cno>*</div></td></tr>
<tr><td>Email ID:</td><td><input type=text size=20 name=eid id=eid></td></tr>
<tr><td>Current City/Location:</td><td><input type=text size=20 name=city id=city></td></tr>
<tr><td>Security Question:</td><td><div>
<select name=sec_ques><option>select</option>
<?php
echo "$ques"; 
?>

</select>*</div></td></tr>
<tr><td>Answer:</td><td><input type=text size=20 name=sec_ans id=secans></td><tr>

</table>
<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><input type="submit" name=submit value=SAVE onclick="return check()"><input type="reset" name=reset value=RESET></b></div>
</form>
</body>
</html>
<?php ?><?php ?>