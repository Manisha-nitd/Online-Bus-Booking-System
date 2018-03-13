<html>
<head>
<title>Seat Layout</title>
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
 </style>
</head>
<body>
<div class="page-header">
   <h1><img src="logo.PNG" height=70 width=70 align=left></img>
 <font color=black><big>CITY LINK</big></font><small><font color=red><i>Connecting cities faster</i></font></small></h1>
</div>
<form method=get>

<?php
require 'db_booking.php';
session_start();

//if (isset('b".$cnt."'))
$bid=$_SESSION['busid'];
$dt=$_SESSION['dateofjour'];
$table=array();
if(isset($_SESSION['totseats']))
{
	
	for($x=1;$x<=40;$x++)
	{
		if(isset($_REQUEST['b'.$x]))
		{
			$t=$_SESSION['totseats'];
			$t[count($t)]=$_REQUEST['b'.$x];
			$_SESSION['totseats']=$t;
		}
	}	
	$table=$_SESSION['totseats'];
}
else 
{
	$table=get_seatno($bid, $dt);
	$_SESSION['totseats']=$table;
}

sort($table);


echo "Driver<br>";
$cnt=1;
$k=0;
for ($i=0;$i<10;$i++)
{
	$pos=1;
	for ($J=0;$J<4;$J++)
	{
	       if(isset($table[$k])==true)
	       {
			if ($table[$k]==$cnt)
			{
				echo "<input style='color:red' type=submit name='b".$cnt."' value='".$cnt++."' disabled>";
				$k++;
			}
			else 
		     	echo "<input type=submit name='b".$cnt."' value='".$cnt++."'>";			
	       }
	       else 
	       		echo "<input type=submit name='b".$cnt."' value='".$cnt++."'>";
	       if($pos==2)
	       	{
	       		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";	       		
	       	}	
	       	if($pos==4)
	       	{
	       		echo "<br>";
	       		$pos=1;
	       	}	       
	       	
	       	$pos++;	       	
    }
}
for ($i=0;$i<40;$i++)
{
	
	$seat="b".$i;
	if (isset($_REQUEST[$seat]))
	{
		if(isset($_SESSION['seats']))
     		$_SESSION['seats']=$_SESSION['seats'].",".$_REQUEST[$seat];
		else 
			$_SESSION['seats']=$_REQUEST[$seat];
	}
}
if(isset($_SESSION['seats']))
{
 echo "Selected seats are:".$_SESSION['seats'];
 $countseat=count(explode(',', $_SESSION['seats']));
 $_SESSION['countseat']=$countseat;
echo "<br><br><br>";
}
if(isset($_REQUEST['book1']))
{
	header('location:bookfinal.php');
}

   ?>
<input type=submit name=book1 value="BOOK NOW">
<div align="center"><a href="user_home.php">Home</a></div>
	
</form>
</body>
<