<html>
<head>
<title>Bus Search</title>
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
<body>
<div class="page-header">
   <h1><img src="logo.PNG" height=130 width=150 align=left></img>
 <font color=black><big> CITY LINK</big></font><small><font color=red>Connecting cities faster</font></small></h1>
</div>
<h3><u>SEARCH RESULTS</u></h3>&nbsp;&nbsp;
<form name=f2 method=GET action="">
<?php
require 'adminfunctions.php';
if(isset($_SESSION['from']))
{
	header('location:homepage.php');
}

session_start();
$from=$_SESSION['from'];
$to=$_SESSION['to'];
$dayofweek=$_SESSION['dayofweek'];
if(isset($_REQUEST['book']))
{
	$_SESSION['busid']=$_REQUEST['book'];
	header('location:seat_layout.php');
}
if($from==$to)
{
	echo "Source and Destination is same !!";
}
else{
$table=showbusdaywise($from,$to,$dayofweek);
if(count($table)==0)
	echo "No Bus Available in this date for the given route!!" ;
if(count($table)!=0)
{

	echo "<table border=2 bgcolor=pink align=center>";
	echo "<tr bgcolor=cyan><td>BUS ID</td><td>BUS NAME</td><td>FROM</td><td>TO</td><td>NO OF SEATS</td><td>BUS TYPE</td><td>DAY</td><td>TIME</td><td>FARE</td><td>ROUTE</td><td>BOOK NOW</td></tr>";
	for($i=0;$i<count($table);$i++)
	{
		echo "<tr>";

		for($j=0;$j<count($table[$i]);$j++)
		{
				
			echo "<td>".$table[$i][$j]."</td>";

				

		}
		echo "<td><input type=radio  name=book onclick='document.f2.submit()' value='".$table[$i][0]."'></td>";
			
		echo "</tr>";
	}
	echo "</table>";
}
}
?>

</form>
</body>
</html>