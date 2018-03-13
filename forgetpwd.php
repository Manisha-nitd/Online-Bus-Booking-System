<?php 
require_once 'db_user.php';
session_start();
$usname=$_SESSION['usname'];
if(isset($_REQUEST['submit']))
{
	$sec_ans=$_REQUEST['sec_ans'];
	check_sec_ans($usname,$sec_ans);
}
$ques=bring_question($usname);
?>
<html>
<head>
<title>Forget Password</title>
<link rel="stylesheet" type="text/css" href="citylink.css ">
 <link rel="stylesheet" href="bootstrap.min.css">
<style>
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
 width:55%;
border:2px solid black; 
cell-padding:5px;
 }
 td
{
font-weight:bold;
border:2px solid black; 
padding:2px;
text-align:left;
}
</style>

<script type="text/javascript">
function check()
{
	var secans=document.getElementById("secans").value;
	if(secans.length==0)
	{
		alert("please give answer");
		return false;
	}
	return true;
}
</script>
</head>
<body>
<div class="page-header" align=center>
 <h1><img src="logo.PNG" height=130 width=150 align=left></img>
<font color=black><big> CITY LINK</big></font><small>&nbsp;&nbsp;<font color=red><i>Connecting cities faster</i></font></small></h1>
</div>
<form action="" method=get>
<table align=center>
<tr><td>Answer the Sequrity Question:</td><td><input type=text size=50 value='
<?php 
echo "$ques";
?>
'></td></tr>
<tr><td>Answer:</td><td><input type=password size=20 name=sec_ans id=secans></td></tr>
</table>&nbsp;&nbsp;
<input type=submit name=submit value="SUBMIT"  onclick="return check()">
</form>
</body>
</html>