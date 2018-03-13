
<html>
<head>
<title>Update Bus</title>
<script type="text/javascript">
function check()
{
	var newnos=document.getElementById("newnos").value;
	if(newnos.length==0)
	{
		alert("please give Valid Seat No.s");
		return false;
	}
	var newfare=document.getElementById("newfare").value;
	if(newfare.length==0)
	{
		alert("please give Valid Fare");
		return false;
	}
	return true;
}
</script>
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
 table
 {
 margin-top:-200px;
top:50%;
border:4px solid black; 
cell-padding:3px;
width:90%;
 }
td
{
font-weight:bold;
border:2px solid black; 
padding:7px;
text-align:center;
}
 </style>
</head>
<body>
<div class="page-header">
   <h1><img src="logo.PNG" height=130 width=150 align=left></img>
 <font color=black><big>CITY LINK</big></font><small><font color=red><i>Connecting cities faster</i></font></small></h1>
</div>
<form name=f2 method=GET action="" >
<?php
require 'adminfunctions.php';
$source=array("KOLKATA","MUMBAI","DELHI");
$destination=array("KOLKATA","MUMBAI","DELHI");
$msgfrom="";
$msgto="";
$table=array();
if(isset($_REQUEST['save']))
{
	$newnos=$_REQUEST['newnos'];
	$newfare=$_REQUEST['newfare'];

	$bid=$_REQUEST['edit'];
	update_price($bid,$newfare,$newnos);


	echo "Updated Successfully!!";
	header('location:update.php?source='.$_REQUEST['source'].'&destination='.$_REQUEST['destination'].'&submit=SUBMIT');
	
}

foreach ($source as $val)
{
	if(isset($_REQUEST['source']))
	{
		if($_REQUEST['source']==$val)
			$msgfrom=$msgfrom."<option selected>$val</option>";
		else 
			$msgfrom=$msgfrom."<option>$val</option>";
	}
	else 
		 $msgfrom=$msgfrom."<option>$val</option>";
	
	
	
}
foreach ($destination as $val )
{

	
	if(isset($_REQUEST['destination']))
	{
		if($_REQUEST['destination']==$val)
		$msgto=$msgto."<option selected>$val</option>";
		else 
			$msgto=$msgto."<option>$val</option>";
	}
	else 
		$msgto=$msgto."<option>$val</option>";
	
}
?>
<div style="font-weight:bold" align=center>
FROM:<select name=source >
<option>SELECT</option>
<?php echo $msgfrom;?>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
TO:
<select name=destination>
<option>SELECT</option>
<?php echo $msgto;?>
</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<i><input type=submit name=submit value=SUBMIT></i>

</div>
<?php 

if(isset($_REQUEST['submit']) || isset($_REQUEST['subedit']))
{
	$from=$_REQUEST['source'];
	$to=$_REQUEST['destination'];
	if($from==$to)
	{
		echo "<font color=red size=4>Source and Destination is same !!</font>";
	}
	$table=showbus($from, $to);
	if(count($table)==0)
		echo "<font color=red size=4>NO RECORD FOUND!!</font>" ;
	if(count($table)!=0)
	{
	
		echo "<table border=1 bgcolor=pink align=center>";
		echo "<tr bgcolor=cyan><td>BUS ID</td><td>BUS NAME</td><td>FROM</td><td>TO</td><td>NO OF SEATS</td><td>BUS TYPE</td><td>DAY</td><td>TIME</td><td>FARE</td><td>ROUTE</td><td>EDIT</td><td>REMOVE</td></tr>";
		for($i=0;$i<count($table);$i++)
		{
	
			echo "<tr>";
			$cnt=1;
			for($j=0;$j<count($table[$i]);$j++)
			{
				if($cnt!=5 && $cnt!=9)
					echo "<td>".$table[$i][$j]."</td>";
				else
					if(isset($_REQUEST['edit']))
	
						if($_REQUEST['edit']==$table[$i][0])
						{
	
							if($cnt==5)
								echo "<td><input type=text size=10 name=newnos value=".$table[$i][$j]." id=newnos></td>";
							if($cnt==9)
								echo "<td><input type=text size=10 name=newfare value=".$table[$i][$j]." id=newfare></td>";
						}
					else
						echo "<td>".$table[$i][$j]."</td>";
	
	
					else
						echo "<td>".$table[$i][$j]."</td>";
	
					$cnt++;
	
			}
			if(isset($_REQUEST['edit']) )
			{
				if($_REQUEST['edit']==$table[$i][0] && isset($_REQUEST['save'])==false)
					echo "<td><input type=radio checked name=edit onclick='document.f2.submit()' value='".$table[$i][0]."'></td>";
				else
					echo "<td><input type=radio name=edit onclick='document.f2.submit()' value='".$table[$i][0]."'></td>";
			}
			else
				echo "<td><input type=radio name=edit onclick='document.f2.submit()' value='".$table[$i][0]."'></td>";
			
	
	
			echo "<td><a href='update.php?source=".$_REQUEST['source']."&destination=".$_REQUEST['destination']."&bid=".$table[$i][0]."&delete=true&submit=SUBMIT'>Delete</a></td>";
	
			echo "</tr>";
		}
		/*	echo "</tr>";*/
		echo "</table>";
		echo "<b><input type=submit name=subedit value=SUBMIT><b><br><br>";
	}
	
	
}
if(isset($_REQUEST['confirm']))
{
	$bid=$_REQUEST['bbid'];
	
	$confirm=$_REQUEST['confirm'];
	echo "".$confirm;
	if($confirm=='yes'){
		delete_product($bid);
		header('location:update.php?source='.$_REQUEST['source'].'&destination='.$_REQUEST['destination'].'&submit=SUBMIT');
	}
	else
		echo "not deleted";
}



?>



<?php 
if(isset($_REQUEST['delete']))
{
	echo "confirm it:"."<input type=submit name=confirm value=yes><input type=submit name=confirm value=no>";
	echo "<input type=hidden name=bbid value='".$_REQUEST['bid']."'>";


}

?>
<?php 
if(isset($_REQUEST['edit']) && isset($_REQUEST['save'])==false)
{
	echo "<input type=submit name=save value=save onclick='return check()'>";
}


?>



</form>
</body>
</html>