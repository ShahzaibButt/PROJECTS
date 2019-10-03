<?php
require_once('conn.php');
session_start();
if($_SESSION['un'])
{
	echo "";
}
else
{
	header("location: login.php");
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Transfer Requests Check</title>
<style>
.c1 td{
	width:130px;
	height:60px;
	text-align:center;
}
</style>
</head>

<body>


<?php

$qry1= "SELECT * FROM `transfer`";
$emp_data1 = mysqli_query($con,$qry1);


echo" 
<table border='2' class='c1'>
<caption><h1>Transfer Applications</h1></caption>
<tr bgcolor='#006666'>
<td>Transfer ID</td><td>Employee ID</td><td>Full Name</td><td>From Designation</td><td>To Designation</td><td>Joining Date</td><td>Work Experience</td><td>Salary</td><td>Reason</td><td>Status</td>
</tr>
";
while($res = mysqli_fetch_array($emp_data1))
{
echo"<tr>
<td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td><td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td><td>".$res[7]."</td><td>".$res[8]."</td><td>".$res[9]."</td>
</tr>
";
}
echo "</table>";
?>

<br><br>
<hr>
<br><br>

<form method="post">
<table cellspacing="10">
<tr>
<td>Transfer ID</td><td><input type="text" name="txt0" /></td>
</tr>
<tr>
<td>Employee ID</td><td><input type="text" name="txt1" /></td>
</tr>
<tr>
<td>Designation</td><td><input type="text" name="txt2"/></td>
</tr>
<tr>
<td>New Salary</td><td><input type="text" name="txt3"/></td>
</tr>
<tr>
<td><input type="submit" name="bttra" value="Appprove" style=" width:75px; height:30px; color:#000; background-color:#0C6; border-radius:20px"/></td>
<td><input type="submit" name="btnback" value="Back" style=" width:75px; height:30px; color:#000; background-color:#0C6; border-radius:20px"/>
<input type="submit" name="btrej" value="Reject" style=" margin-left:20px; width:75px; height:30px; color:#000; background-color:#F03; border-radius:20px"/></td>
</tr>
</table>
</form>

<?php

if(isset($_POST['bttra']))
{
	
	for($i = 0;$i < 4; $i++)
	{
		$data[$i] = $_POST['txt'.$i];
	}
	
	$qry1 = "UPDATE `emp_details` SET`designation`= '$data[2]',`salary`= '$data[3]' WHERE `empid` = '$data[1]'";
	$res1 = mysqli_query($con,$qry1);
	

	$qry2 = "UPDATE `transfer` SET `req_status`= 'Approved' WHERE `trans_id` = '$data[0]'";
	$res2 = mysqli_query($con,$qry2);
	header("location: admintrans.php");
	


}
?>

<?php

if(isset($_POST['btrej']))

{
	
	$data = $_POST['txt0'];
	$qry3 = "UPDATE `transfer` SET `req_status`= 'Rejected' WHERE `trans_id` = '$data'";
	$res3 = mysqli_query($con,$qry3);
	header("location: admintrans.php");
	
}
?>

<?php

if(isset($_POST['btnback']))

{
	header("location: adminpanel.php");
	
}
?>
</body>
</html>