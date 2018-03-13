<?php
require_once 'db_booking.php';
$date="";
if(isset($_REQUEST['date']))
{
	$date=$_REQUEST['date'];
	$cash=show_amount_day($date);
}
?>
<html>
<head>
<title>
Day Wise Cash Collection
</title>
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
</style>
</head>
<body>
<div class="page-header">
   <h1><img src="logo.PNG" height=130 width=150 align=left></img>
 <font color=black><big>CITY LINK</big></font><small><font color=red><i>Connecting cities faster</i></font></small></h1>
</div>
<p class=head><u>DAY WISE CASH COLLECTION</u></p>
<form action="" method=get name=f1>
<p style="font-weight:bold;">
ENTER DATE:
<input type =text size=20 name=date placeholder=YYYY-MM-DD value='<?php echo"$date";?>'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=submit name=submit value=SUBMIT>
</p>
</form>
<div>
<?php 
if(isset($_REQUEST['date']))
	echo"<font size=6 color=green><b>Cash collection is :".$cash."</b></font>";
?>
<a href="Admin_home.php">HOME</a>
</div>
</body>
</html>