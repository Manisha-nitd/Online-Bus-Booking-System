<?php
$from=array("KOLKATA","MUMBAI","DELHI");
$to=array("KOLKATA","MUMBAI","DELHI");
$msgfrom="";
$msgto="";
session_start();
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
<html>
<head>
<title>Home  Page</title>
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
<link rel="stylesheet" type="text/css" href="citylink.css ">
 <link rel="stylesheet" href="bootstrap.min.css">
<title>User Homepage</title>
<style type="text/css">
body
{
 background-image:url("travel.jpg");
 background-repeat:no-repeat;
 background-size:cover;
 text-align:center;
}
form.search
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
position:absolute;
bottom:0;
left:0;
background-color:black;
white-space:pre;
display:block;

}
</style>
</head>
<body>
<div class="page-header">
   <h1><img src="logo.PNG" height=130 width=150 align=left></img>
 <font color=black><big> CITY LINK</big></font><small><font color=red>Connecting cities faster</font></small></h1>
</div>
<div align=right>
New User?<a href="registration.php">Sign up!</a><br>
Existing user? <a href="login.php">Login!!</a>
</div>
<div align=left>
<a href="admin_login.php"><button>ADMIN LOGIN</button></a>
</div>
<form class=search>
FROM:
<select name=src>
<option> SELECT</option>
<?php 
echo $msgfrom;?>
</select>
TO:
<select name=dest>
<option>SELECT</option>
<?php echo $msgto?>
</select>
DATE:
<input type=text size=20 style="background-color :#CCCCCC;" id="datepicker1" name="date1" >
<a href="javascript:NewCal('datepicker1','ddmmyyyy')"><img src="cal.gif" width="20" height="20" border="3" alt="Pick a date"></a>
<input type= submit name=submit value=SEARCH onclick="return check()">
</form>
<div class=foot>
<footer >
               						 					Contact Information:               		  Tel No. 033-23545698                     	 Email:customercare@citylink.com                                                         												
                           Privacy Policy           	                	  Terms of Service                             Copyright Information		                                                                                               

                                                                                                                   Built with<img src="heart.jpg" height=30 width=50> by Sayantan,Manisha and Soumajit.											
</footer>

</div>
</body>
</html>