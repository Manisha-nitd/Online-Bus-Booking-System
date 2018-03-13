<?php
require 'bookingrelateddb.php';
session_start();
if(isset($_SESSION['usname']))
{
	$username=$_SESSION['usname'];
}
else
	echo "<a href='login.php'>PLEASE LOG IN FIRST BEFORE SEAT BOOK</a>";

$bookid=maxbid()+1;
date_default_timezone_set("Asia/Kolkata");
$dateofbook=date("Y-m-d");
$dateofjour=$_SESSION['dateofjour'];

$_SESSION['bookid']=$bookid;
$bid=$_SESSION['busid'];

$seatno=$_SESSION['seats'];
$noofper=$_SESSION['countseat'];
$table=showbusinfo($bid);
if(count($table)==0)
	echo "no record found" ;
if(count($table)!=0)
{
	$bname=$table[0];
	$src=$table[1];
	$dest=$table[2];
	$fare=$table[3];
	
}

$cashpaid=$noofper * $fare;

?>
<html>
<head>
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
padding:10px;
text-align:center;
}
 </style>


</head>
<body >
<form method="get" action="">
<div class="page-header">
   <h1><img src="logo.PNG" height=130 width=150 align=left></img>
 <font color=black><big> CITY LINK</big></font><small><font color=red>Connecting cities faster</font></small></h1>
</div>

<p align=center>
<table>
<tr><td>DATE OF BOOK:</td><td><?php echo "$dateofbook";?></td></tr>
<tr><td>DATE OF JOURNEY:</td><td><?php echo "$dateofjour";?></td></tr>
<tr><td>BUS ID:</td><td><?php echo "$bid";?></td></tr>

<tr><td>BUS NAME:</td><td><?php echo "$bname";?></td></tr>

<tr><td>FROM:</td><td><?php echo "$src";?></td></tr>
<tr><td>TO:</td><td><?php echo "$dest";?></td></tr>
<tr><td>SEAT NUMBERS BOOKED:</td><td><?php echo "$seatno";?></td></tr>
<tr><td>NUMBER OF PERSON:</td><td><?php echo "$noofper";?></td></tr>
<tr><td>CASH TO BE PAID:</td><td><?php echo "$cashpaid";?></td></tr>
</table>
<pre>
<?php 
if ( isset($_REQUEST['booknow'])==false && isset($_SESSION['usname']))
	echo "                                                                             <input type=submit name=booknow value='BOOK NOW'>";
?>
<?php 
if ( isset($_REQUEST['booknow']) && isset($_SESSION['usname']))
{
	$status="BOOKED";
	$nor=adddataintobooking($bookid,$username,$bid,$bname,$noofper,$seatno,$dateofbook,$dateofjour,$cashpaid,$src,$dest,$status);
	if($nor>0)
		echo "booking successfully done";
	else 
		echo "please try again later";
}
?>
</pre>
<div align="center"><a href="seat_layout.php">Change seat numbers</a></div>
<div align="center"><a href="user_home.php">Home</a></div>
<div align="center"><a href="logout.php">Logout</a></div>

</form>

</body>
</html>