<?php 
$conn=null;
$table=array();
function getconnection()
{
	global $conn;
	$conn=mysql_connect("localhost","root","");
	if($conn==false)
		die ("Connection not established");
	mysql_select_db('citylink_db');
}
function closeconnection()
{
	global $conn;
	mysql_close($conn);
}
function show_bus($from,$to)
{
	global $conn;
	getconnection();
	$sql="select bid,bname from bus where src='$from' and dest='$to'";
	$resultset=mysql_query($sql,$conn);
	$table=array();
	$i=0;
	while($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		$table[$i]=array();
		$table[$i][0]=$row[0];
		$table[$i++][1]=$row[1];

	}
	closeconnection();
	return $table;
}
function show_amount_bus($bid)
{
	global $conn;
	getconnection();
	$sql="select cashpaid from booking where bid='$bid'";
	$resultset=mysql_query($sql,$conn);
	$cash=null;
	$i=0;
	while($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		$cash+=$row[0];
	}
	closeconnection();
	return $cash;
}
function show_booking_report($bid)
{
	global $conn;
	$seat_booked=null;
	$nos="";
	$result=array();
	$i=0;
	getconnection();
	$sql="select nos from bus where bid='$bid'";
	$resultset=mysql_query($sql,$conn);
	if($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		$nos=$row[0];
	}
	$result[$i++]=$nos;
	$sql="select noofper from booking where bid='$bid'";
	$resultset=mysql_query($sql,$conn);
	while($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		$seat_booked+=$row[0];
	}
	$result[$i]=$seat_booked;
	closeconnection();
	return $result;
}
function get_city()
{
	global $conn;
	getconnection();
	$sql="select distinct src from bus UNION select distinct dest from bus ";
	$resultset=mysql_query($sql,$conn);
	$city=array();
	$i=0;
	while($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		$city[$i++]=$row[0];
	}
	closeconnection();
	return $city;
}

?>