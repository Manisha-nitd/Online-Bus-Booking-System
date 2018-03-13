<?php
$conn=null;
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
function show_booking($usname)
{
	global $conn;
	getconnection();
	$sql="select bookid,username,bid,bname,noofper,seatno,dateofbook,dateofjour,cashpaid,src,dest,status from booking where username='$usname'";
	$resultset=mysql_query($sql,$conn);
	$table=array();
	$i=0;
	while($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		$table[$i]=array();
		$table[$i][0]=$row[0];
		$table[$i][1]=$row[1];
		$table[$i][2]=$row[2];
		$table[$i][3]=$row[3];
		$table[$i][4]=$row[4];
		$table[$i][5]=$row[5];
		$table[$i][6]=$row[6];
		$table[$i][7]=$row[7];
		$table[$i][8]=$row[8];
		$table[$i][9]=$row[9];
		$table[$i][10]=$row[10];
		$table[$i][11]=$row[11];
		$i++;
	}
	closeconnection();
	return $table;
}
function print_ticket($bookid)
{
	global $conn;
	getconnection();
	$sql="select bookid,username,bid,bname,noofper,seatno,dateofbook,dateofjour,cashpaid,src,dest,
	status from booking where bookid='$bookid'";
	$resultset=mysql_query($sql,$conn);
	$table=array();
	while ($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		$table=$row;
	}
	closeconnection();
	return $table;

}
function cancel_ticket($bookid)
{
	global $conn;
	getconnection();
	$sql="update booking set status='CANCELLED',seatno=''  where bookid=$bookid";
	mysql_query($sql,$conn);
	closeconnection();
	return true;
}
function show_amount_day($date)
{
	global $conn;
	getconnection();
	$cash=null;
	$sql="select cashpaid from booking where dateofjour='$date'";
	$resultset=mysql_query($sql,$conn);
	while($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
			$cash+=$row[0];
	}
	closeconnection();
	return $cash;
}
function pick_date_of_journey($bid)
{
	global $conn;
	getconnection();
	$sql="select dateofjour from booking where bookid='$bid'";
	$resultset=mysql_query($sql,$conn);
	$table="";
	while($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
		$table=$row[0];
	}
	closeconnection();
	return $table;
	
}
function get_seatno($bid,$dtofjour)
{
	global $conn;
	getconnection();
	$sql="select seatno from booking where bid='$bid' and dateofjour='$dtofjour'";
	$resultset=mysql_query($sql,$conn);
	//$table=array();
	$table1=array();
	$j=0;
	//$table2=array();
	while ($row=mysql_fetch_array($resultset,MYSQL_BOTH))
	{
       $arr=explode(',', $row[0]);
       for ($i=0;$i<count($arr);$i++)
       	   $table1[$j++]=$arr[$i];
      // $table2=explode(',', $row[1]);
	}
	//$table=$table1+$table2;
	return $table1;
}
?>
