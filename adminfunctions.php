<?php
$conn=null;
function getconnection()
{
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
function adddata($bid,$bname,$source,$destination,$day,$time,$nos,$btype,$route,$fare)
{
	global $conn;
	getconnection();
	$sql="insert into bus values('$bid','$bname','$source','$destination','$nos','$btype','$day','$time','$fare','$route')";
	$nor=mysql_query($sql,$conn);
	if($nor>0)
				echo "inserted successfully";
		
	else 
		echo "there is an error while insertion";
	closeconnection();
}
function showbus($source,$destination)
{
	global $conn;
	getconnection();
	$sql="select bid,bname,src,dest,nos,ac,days,time,fare,route from bus where src='$source' and dest='$destination'";
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
		$i++;
		
		
	}
	
	closeconnection();
	return $table;
}
function showbusdaywise($source,$destination,$dayofweek)
{
	global $conn;
	getconnection();
	$sql="select bid,bname,src,dest,nos,ac,days,time,fare,route from bus where src='$source' and dest='$destination' and days='$dayofweek'";
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
		$i++;
	
	
	}
	
	closeconnection();
	return $table;
}
function update_price($bid, $newfare,$newnos)
{
	global $conn;
	getconnection();
	$sql="update bus set nos='$newnos',fare='$newfare' where bid='$bid'";
	mysql_query($sql,$conn);
	closeconnection();
	return true;

}
function delete_product($bid)
{
	
	global $conn;
	getconnection();
	$sql="delete from bus where bid=$bid";
	mysql_query($sql,$conn);
	closeconnection();
	return true;
	
	
}
?>