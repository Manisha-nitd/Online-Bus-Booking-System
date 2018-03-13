<?php
require 'adminfunctions.php';
if(isset($_REQUEST['submit']))
{
	$bid=$_REQUEST['bid'];
	$bname=$_REQUEST['bname'];
	$source=$_REQUEST['source'];
	$destination=$_REQUEST['destination'];
	$day=$_REQUEST['day'];
	$time=$_REQUEST['time'];
	$nos=$_REQUEST['nos'];
	$btype=$_REQUEST['btype'];
	$route=$_REQUEST['route'];
	$fare=$_REQUEST['fare'];
	adddata($bid, $bname, $source, $destination, $day, $time, $nos, $btype, $route, $fare);
	
	
	
}

?>
<html>
<head>
<title>
Add Bus
</title>
<title>Registration Form</title>
<script type="text/javascript">
function check()
{
	var bid=document.getElementById("bid").value;
	if(bid.length==0)
	{
		alert("please give a bus id");
		return false;
	}
	var bname=document.getElementById("bname").value;
	if(bname.length==0)
	{
		alert("please give a bus name");
		return false;
	}
	var source=document.getElementById("source").value;
	if(source.length==0)
	{
		alert("please give a source");
		return false;
	}
	var dest=document.getElementById("dest").value;
	if(dest.length==0)
	{
		alert("please give a destination");
		return false;
	}
	var day=document.getElementById("day").value;
	if(day.length==0)
	{
		alert("please give valid day e.g MON");
		return false;
	}
	var time=document.getElementById("time").value;
	if(time.length==0)
	{
		alert("please give departing time e.g 07:00PM");
		return false;
	}
	var nos=document.getElementById("nos").value;
	if(nos.length==0)
	{
		alert("please give yhe no of seats");
		return false;
	}
	var btype=document.getElementById("btype").value;
	if(btype.length==0)
	{
		alert("please give the type of bus e.g AC/NONAC");
		return false;
	}
	var route=document.getElementById("route").value;
	if(route.length==0)
	{
		alert("please give a valid route");
		return false;
	}
	var fare=document.getElementById("fare").value;
	if(fare.length==0)
	{
		alert("please give a valid fare");
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
border:4px solid black; 
cell-padding:5px;
height:85%;
width:55%;
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
<body>
<h1 align=center>ADD BUS</h1>
<form name=f1 method=get>
<table align=center>
<tr><td>BUS ID:</td><td><input type=text name=bid size=10 id=bid></td></tr>
<tr><td>Bus Name:</td><td><input type=text name=bname size=25 id=bname></td></tr>
<tr><td>From:</td><td><input type=text name=source size=30 id=source></td></tr>
<tr><td>To:</td><td><input type=text name=destination size=30 id=dest></td></tr>
<tr><td>Day:</td><td><input type=text placeholder="e.g MON" name=day size=20 id=day></td></tr>
<tr><td>Time:</td><td><input type=text placeholder="e.g 07:00PM" name=time size=10 id=time></td></tr>
<tr><td>Number of seats:</td><td><input type=text name=nos size=10 id=nos ></td></tr>
<tr><td>Bus Type:</td><td><input type=text placeholder="AC/NONAC" name=btype size=10 id=btype></td></tr>
<tr><td>Route:</td><td><input type=text name=route size=50 id=route></td></tr>
<tr><td>Fare:</td><td><input type=text name=fare size=10 id=fare></td></tr>
</table>
<p align=center><b><input type=submit name=submit value="ADD" onclick="return check()"></b></p>
</form>
</body>
</html>