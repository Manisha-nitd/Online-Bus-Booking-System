<?php
require_once 'db_bus.php';
$city=get_city();
$result=array();
if(isset($_REQUEST['sub1'])|| isset($_REQUEST['bus_info']))
{
	$from=$_REQUEST['from'];
	$to=$_REQUEST['to'];
	$table=show_bus($from,$to);
}
if(isset($_REQUEST['bus_info']))
{
	$bid=$_REQUEST['bus_info'];
	$check=strpos($bid,'C');
	$bid=str_replace('C','',$bid);
	$bid=str_replace('B','',$bid);
	$bid=ltrim($bid," ");
	if($check==1)
		$cash=show_amount_bus($bid);
	else
		$result=show_booking_report($bid);
}
?>
<html>
<head>
<title>Bus Wise Cash Collection</title>
<link rel="stylesheet" type="text/css" href="citylink.css ">
 <link rel="stylesheet" href="bootstrap.min.css">
<style>
p.head {font-size:200%; color:red; text-align:left }
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
 margin-top:50px;
border:4px solid black; 
cell-padding:5px;
 }
td
{
font-weight:bold;
border:2px solid black; 
padding:5px;
text-align:center;
}
</style>
</head>
<body>
<div class="page-header">
   <h1><img src="logo.PNG" height=130 width=150 align=left></img>
 <font color=black><big>CITY LINK</big></font><small><font color=red><i>Connecting cities faster</i></font></small></h1>
</div>
<p class=head><u>BUS WISE CASH COLLECTION</u></p>
<form action="" method=get name=f1>
<font style="font-weight:bold;">
FROM:
<select name=from>
<option>SELECT</option>
<?php 
foreach($city as $val)
{
	if(isset($_REQUEST['from']))
	{
		if($_REQUEST['from']==$val)
			echo"<option selected>$val</option>";
		else
			echo"<option>$val</option>";
	}
	else
		echo"<option>$val</option>";
}
?>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
TO:
<select name=to>
<option>SELECT</option>
<?php 
foreach($city as $val)
{
	if(isset($_REQUEST['to']))
	{
		if($_REQUEST['to']==$val)
			echo"<option selected>$val</option>";
		else
			echo"<option>$val</option>";
	}
	else
		echo"<option>$val</option>";
}
?>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=submit name=sub1 value="SUBMIT">
</font>
<div>
<?php 
if(count($table)!=0)
{
	echo"<table border=1 bgcolor=yellow align=center>";
	echo"<tr bgcolor=cyan><td>Bus ID</td><td>Bus Name</td><td>Cash collection</td><td>Booking Report</td></tr>";
	for($i=0;$i<count($table);$i++)
	{
		echo"<tr>";
		for($j=0;$j<count($table[$i]);$j++)
		{
			echo"<td>".$table[$i][$j]."</td>";
		}
		if(isset($_REQUEST['bus_info']))
		{
			if($_REQUEST['bus_info']==$table[$i][0].'C')
				echo"<td><input type=radio checked name=bus_info onclick='document.f1.submit()' value='".$table[$i][0]."C'></td>";
			else
				echo"<td ><input type=radio name=bus_info onclick='document.f1.submit()' value='".$table[$i][0]."C'></td>";
		}
		else
		{		echo"<td><input type=radio name=bus_info onclick='document.f1.submit()' value='".$table[$i][0]."C'></td>";
		}
		if(isset($_REQUEST['bus_info']))
		{
			if($_REQUEST['bus_info']=='B'.$table[$i][0])
				echo"<td><input type=radio checked name=bus_info onclick='document.f1.submit()' value='B".$table[$i][0]."'></td>";
			else
				echo"<td ><input type=radio name=bus_info onclick='document.f1.submit()' value='B".$table[$i][0]."'></td>";
		}
		else
		{
			echo"<td><input type=radio name=bus_info onclick='document.f1.submit()' value='B".$table[$i][0]."'></td>";
		}
		echo"</tr>";
	}
	echo"</table>";
}
if(count($table)==0 && isset($_REQUEST['sub1']))
	echo "No Bus Exist!";

?>
</div>
<div>
<?php 
if(isset($_REQUEST['bus_info']) && $check==1)
	echo"<font size=6 color=green><b>Cash collection is :".$cash."</b></font>";
if(isset($_REQUEST['bus_info']) && $check==false)

{
	$i=0;
	$nos=$result[$i++];
	$seat=$result[$i];
	echo"<font size=6 color=green><b>Total number of seats :"."$nos"."</b></font>"."<br>";
	echo"<font size=6 color=green><b>No of seats booked :"."$seat"."</b></font>";
	
}
?>
<a href="Admin_home.php">HOME</a>
</div>.
</form>
</body>
</html>