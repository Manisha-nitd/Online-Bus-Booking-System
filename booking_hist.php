<?php
session_start();
require 'db_booking.php';
$uname="";
$msg="";
$dtofjour="";
$table=array();
if (isset($_SESSION['usname']))
{
	$uname=$_SESSION['usname'];
	if (!isset($_REQUEST['print'])&&!isset($_REQUEST['cancel']))
	{
	$table=show_booking($uname);
	if(count($table)==0)
		$msg="No Booking Exist";
	}
	if (isset($_REQUEST['print']))
	{
		$bookid=$_REQUEST['print'];
		$table=print_ticket($bookid);
		
	}
	if (isset($_REQUEST['confirm1']))
	{
		$id=$_REQUEST['ppid'];
		$dt1=pick_date_of_journey($id);
		
		$dt2=date_create();
		$dt22=date_format($dt2, "Y-m-d");
		$diff=strtotime($dt1)-strtotime($dt22);
		if($diff<0||$diff==0)
		{
			echo "cancellation not possible";
		}
		else
		{
		cancel_ticket($id);
		$table=show_booking($uname);
		if(count($table)==0)
			$msg="No Booking Exist";
		$msg="Cancelled succesfully";
		}
		
	}
	if (isset($_REQUEST['cancel']))
	{
		$table=show_booking($uname);
		if(count($table)==0)
			$msg="No Booking Exist";
	}
}

	
?>
<html>
<style type="text/css">
 body
{
 
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
<body>
<div class="page-header">
   <h1><img src="logo.PNG" height=130 width=150 align=left></img>
 <font color=black><big> CITY LINK</big></font><small><font color=red>Connecting cities faster</font></small></h1>
</div>
<form name=f1 method=get>
<?php
if (!isset($_REQUEST['print'])&&!isset($_REQUEST['cancel'])&&!isset($_REQUEST['confirm1']))
{
if(count($table)!=0)
{
	echo "<table >";
	echo "<tr ><td>Book ID</td><td>username</td><td>Bus ID</td><td>Bus Name</td>
		<td>No. Of Persons</td><td>Seat No.</td><td>Date Of Booking</td><td>Date Of Journey</td>
		<td>Cash Paid</td><td>Source</td><td>Destination</td><td>Booking Status</td><td>print</td><td>Cancel</td></tr>";
	for($i=0;$i<count($table);$i++)
	{
		echo "<tr>";
	
		for($j=0;$j<count($table[$i]);$j++)
		{
		
			echo "<td>".$table[$i][$j]."</td>";

		}
		echo "<td><input type=radio name=print onclick='document.f1.submit()' value='".$table[$i][0]."'></td>";
		echo "<td><a href='booking_hist.php?&bookid=".$table[$i][0]."&cancel=true'>cancel</a></td>";
		
		
		echo "</tr>";
	}
		echo "</table>";
}
}
?>
<pre>
<?php 
if (isset($_REQUEST['print']))
{
    echo "<table cellpadding='8'>";
	echo "<tr><td>Booking Id:$table[0]</td><td>Username:$table[1]</td></tr>";
	echo "<tr><td>Bus Id:$table[2]</td><td>Busname:$table[3]</td></tr>";
	echo "<tr><td>No. of persons:$table[4]</td><td>Seat no.:$table[5]</td></tr>";
	echo "<tr><td>Date Of Booking:$table[6]</td><td>Date of Journey:$table[7]</td></tr>";
	echo "<tr><td>Source:$table[9]</td><td>Destination:$table[10]</td></tr>";
	echo "<tr><td>Cash paid:$table[8]</td><td>Status:$table[11]</td></tr>";
	echo "</table>";
}
?>
</pre>
<?php 
if (isset($_REQUEST['confirm1']))
{

	if(count($table)!=0)
	{
		echo "<table >";
		echo "<tr ><td>Book ID</td><td>username</td><td>Bus ID</td><td>Bus Name</td>
		<td>No. Of Persons</td><td>Seat No.</td><td>Date Of Booking</td><td>Date Of Journey</td>
		<td>Cash Paid</td><td>Source</td><td>Destination</td><td>Booking Status</td><td>print</td><td>Cancel</td></tr>";
		for($i=0;$i<count($table);$i++)
		{
			echo "<tr>";
	
			for($j=0;$j<count($table[$i]);$j++)
			{
	
				echo "<td>".$table[$i][$j]."</td>";
	
			}
			echo "<td><input type=radio name=print onclick='document.f1.submit()' value='".$table[$i][0]."'></td>";
			echo "<td><a href='booking_hist.php?bookid=".$table[$i][0]."&cancel=true'>cancel</a></td>";
	
			echo "</tr>";
		}
		echo "</table>";
     }
	
}

?>
<?php 
if (isset($_REQUEST['cancel']))
{
	
	
	if(count($table)!=0)
	{
		echo "<table >";
		echo "<tr ><td>Book ID</td><td>username</td><td>Bus ID</td><td>Bus Name</td>
		<td>No. Of Persons</td><td>Seat No.</td><td>Date Of Booking</td><td>Date Of Journey</td>
		<td>Cash Paid</td><td>Source</td><td>Destination</td><td>Booking Status</td><td>print</td><td>Cancel</td></tr>";
		for($i=0;$i<count($table);$i++)
		{
		echo "<tr>";
	
		for($j=0;$j<count($table[$i]);$j++)
		{
	
		echo "<td>".$table[$i][$j]."</td>";
	
		}
				echo "<td><input type=radio name=print onclick='document.f1.submit()' value='".$table[$i][0]."'></td>";
				echo "<td><a href='booking_hist.php?bookid=".$table[$i][0]."&cancel=true'>cancel</a></td>";
	
			echo "</tr>";
		}
		echo "</table>";
	}
echo "Confirm it.<input type=submit name=confirm1 value=YES><input type=submit name=confirm2 value=No>";
echo "<input type=hidden name=ppid value='".$_REQUEST['bookid']."'>";
	

}
?>
		
<div align="center"><a href="user_home.php">Home</a></div>

</form>
<div><?php echo $msg;?></div>
</body>
</html>
