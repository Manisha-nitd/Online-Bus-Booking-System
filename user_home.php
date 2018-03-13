<?php
session_start();
$usname=$_SESSION['usname'];
if(!isset($_SESSION['usname']))
{
	header("location:login.php");
}
$from=array("KOLKATA","MUMBAI","DELHI");
$to=array("KOLKATA","MUMBAI","DELHI");
$msgfrom="";
$msgto="";
foreach ($from as $val)
	$msgfrom=$msgfrom."<option>$val</option>";
foreach ($to as $val)
	$msgto=$msgto."<option>$val</option>";
if(isset($_REQUEST['submit']))
{

	$_SESSION['from']=$_REQUEST['src'];
	$_SESSION['to']=$_REQUEST['dest'];
	$datepick=$_REQUEST['date1'];
	$dayfromcal = date('Y-m-d', strtotime($datepick));
	
	$_SESSION['dateofjour']=$dayfromcal;
	$dayofweek = date('D', strtotime($datepick));
	$day=strtoupper($dayofweek);
	$_SESSION['dayofweek']=$day;
	header('location:searchresult.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="citylink.css ">
 <link rel="stylesheet" href="bootstrap.min.css">
<title>User Homepage</title>
<script language="javascript" type="text/javascript" src="datetimepicker.js"></script>
<script type="text/javascript">
function check()
{
	var date=document.getElementById("date").value;
	if(date.length==0)
	{
		alert("please give date");
		return false;
	}
	return true;
}
</script>
<style type="text/css">
body
{
 min-height:100%;
 background-image:url("travel1.jpeg.jpg");
 background-repeat:no-repeat;
 background-size:cover;
 text-align:center;

}
div.search
{
vertical-align:middle;
 position: absolute;
    left: 500px;
    top: 300px;
    text-align: center;
    font-family:"Times New Roman";
    font-size:large;
    font-style: bold;
    padding: 1em 0 1em 0;
}
div.foot
{
position:fixed;
bottom:0;
right:50;
background-color:black;
white-space:pre;
display:block;

}
</style>
</head>
<body>
<form method="post">
<div class="page-header">
  <h4 align=right><span><b>WELCOME<?php echo" "."$usname"."!!";?></b></span></h4>
   <h1><img src="logo.PNG" height=130 width=150 align=left></img>
 <font color=black><big> CITY LINK</big></font><small><font color=red>Connecting cities faster</font></small></h1>
</div>
<nav>
<p align=right><a href="edit_profile.php" ><font color=red>Edit Profile</font></a>
<a href="booking_hist.php"><font color=red>BOOKING HISTORY</font></a>
<a href="logout.php"><font color=red>LOGOUT</font></a>
</p>
</nav>
<div align=center class=search>
FROM:
<select name=src>
<option> SELECT</option>
<?php
echo $msgfrom; 
?>
</select>
TO:
<select name=dest>
<option>SELECT</option>
<?php 
echo $msgto;
?>
</select>
DATE:
<input type=text size=20 style="background-color :#CCCCCC;" id="datepicker1" name="date1">
<a href="javascript:NewCal('datepicker1','ddmmyyyy')"><img src="cal.gif" width="20" height="20" border="3" alt="Pick a date"></a>
<input type= submit name=submit value=SEARCH onclick="return check()">
</div>
<div class=foot>


<footer >
               						 					Contact Information:               		  Tel No. 033-23545698                     	 Email:customercare@citylink.com                                                         												
                           Privacy Policy           	                	  Terms of Service                             Copyright Information		                                                                                               

                                                                                                                   Built with<img src="heart.jpg" height=30 width=50> by Sayantan,Manisha and Soumajit.											
</footer>

</div>
</form>
</body>
</html>