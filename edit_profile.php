<?php
session_start();
require 'db_user.php';
$msg="";
$uname="";
$data=array();
if (isset($_SESSION['usname']))
{
	$uname=$_SESSION['usname'];
	$data=view_profile($uname);
	$name=$data[0];
	$uname=$data[1];
	$pwd=$data[2];
	$gen=$data[3];
	$dob=$data[4];
	$cno=$data[5];
	$eid=$data[6];
	$city=$data[7];
	
	if (isset($_REQUEST['save']))
	{
		$con_no=$_REQUEST['cno'];
		$emid=$_REQUEST['eid'];
		$ccity=$_REQUEST['city'];
		edit_profile($uname,$con_no,$emid,$ccity);
		$msg="updated succesfully";
		$data=view_profile($uname);
		$name=$data[0];
		$uname=$data[1];
		$pwd=$data[2];
		$gen=$data[3];
		$dob=$data[4];
		$cno=$data[5];
		$eid=$data[6];
		$city=$data[7];
		//header('location:edit_profile.php?cno='.$_REQUEST['cno'].'&eid='.$_REQUEST['eid'].'&city='.$_REQUEST['city'].'&save=save');
	}
}
else 
	header('location:login.php');

	?>
<html>
<head>
<title>Registration Form</title>
<script type="text/javascript">
function check()
{
	var cno=document.getElementById("cno").value;
	if(cno.length==0)
	{
		alert("please give contact no.");
		return false;
	}
	else if(cno.length!=10 && cno.length!=0)
	{
		alert("please enter a valid contact no.");
		return false;
	}
	var eid=document.getElementById("eid").value;
	if(eid.length==0)
	{
		alert("enter a email");
		return false;
	}
	var city=document.getElementById("city").value;
	if(city.length==0)
	{
		alert("enter a city");
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
border:2px solid black; 
cell-padding:5px;
height:55%;
width:28%;
 }
td
{
font-weight:bold;
border:2px solid black; 
padding:10px;
text-align:left;
}
</style>

</head>
<body bgcolor=pink>
<div class="page-header" align=center>
 <h1><img src="logo.PNG" height=130 width=150 align=left></img>
<font color=black><big> CITY LINK</big></font><small>&nbsp;&nbsp;<font color=red><i>Connecting cities faster</i></font></small></h1>
</div>
<form method="get" action="" class="f1">

<p align=center>
<table table cellpadding="8" width="60%" bgcolor="99FFFF" align="center"cellspacing="7">
<tr><td>Name:</td><td><?php echo "$name"?></td></tr>
<tr><td>username:</td><td><?php echo "$uname"?></td></tr>
<tr><td>Password:</td><td><?php echo "$pwd"?></td></tr>
<tr><td>Gender:</td><td><?php echo "$gen"?></td></tr>
<tr><td>Date of Birth:</td><td><?php echo "$dob"?></td></tr>
<tr><td>Contact No:</td><?php 
if (isset($_REQUEST['save']))
{
	echo "<td>".$cno."</td>";
}
else 
    echo "<td><input type=text size=15 name=cno id=cno value='".$cno."'></td>"
?></tr>
<tr><td>Email ID:</td><?php
if (isset($_REQUEST['save']))
{
	echo "<td>".$eid."</td>";
}
else 
	 echo "<td><input type=text size=40 name=eid id=eid value='".$eid."'></td>"
?></tr>
<tr><td>Current City/Location:</td><?php 
if (isset($_REQUEST['save']))
{
	echo "<td>".$city."</td>";
}
else
    echo "<td><input type=text size=10 name=city id=city value='".$city."'></td>"
?></tr>


</select></td></tr>

</table>
<?php 
if ( isset($_REQUEST['save'])==false)
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit name=save value=SAVE onclick='return check()'>";
?>

<div align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="changepwd.php">Change Password</a></div>
<div align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="user_home.php">HOME</a></div>
<div align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit_profile.php"><button>EDIT</button></a></div>

</form>
<div><?php echo"<font size=3 color=red><p align=center>$msg</p></font>";?></div>
</body>
</html>
