<?php
$conn=null;
function getconnection(){
	global $conn;
	$conn=mysql_connect("localhost","root","");
	if(!$conn)
		die("database is not connected");
	mysql_select_db("citylink_db");
	
}
function closeconnection()
{
	global $conn;
	mysql_close($conn);
}
function maxbid()
{
	global $conn;
	getconnection();
	$sql="select count(bookid) from booking";
	$resultset=mysql_query($sql,$conn);
	if($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		$count=$row[0];
	}
	closeconnection();
	return $count;
	
}
function countfare($bid)
{
	global $conn;
	getconnection();
	$sql="select fare from bus where bid='$bid'";
	$resultset=mysql_query($sql,$conn);
	if($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		$fare=$row[0];
	}
	closeconnection();
	return $fare;
}
function showbusinfo($bid)
{
	
	global $conn;
	getconnection();
	$sql="select bname,src,dest,fare from bus where bid='$bid'";
	$resultset=mysql_query($sql,$conn);
	$table=array();
	if($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		$table[0]=$row[0];
		$table[1]=$row[1];
		$table[2]=$row[2];
		$table[3]=$row[3];
		
	}
	closeconnection();
	return $table;
}
function adddataintobooking($bookid,$username,$bid,$bname,$noofper,$seatno,$dateofbook,$dateofjour,$cashpaid,$src,$dest,$status)
{
	global $conn;
	getconnection();
	$sql="insert into booking values('$bookid','$username','$bid','$bname','$noofper','$seatno','$dateofbook','$dateofjour','$cashpaid','$src','$dest','$status')";
	$nor=mysql_query($sql,$conn);
	closeconnection();
	return $nor;
}
?>