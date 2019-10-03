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
<title>Delete Record</title>
</head>

<body>
<h1>" Delete Record "</h1>
<form method="post">
<table cellspacing="10">
<tr>
<td>Enter Employee ID</td><td><input type="text" name="txt0" required/></td>
</tr>
<tr>
<td></td><td><input type="submit" name="btdel" value="Delete" style="float:right; width:75px; height:30px; color:#000; background-color:#CF0; border-radius:20px"/></td>
</tr>
</table>
</form>

<?php

if(isset($_POST['btdel']))
{
	
		$data = $_POST['txt0'];
	
	
	$qry1 = "DELETE FROM `emp_details` WHERE `empid` = $data";
	$res = mysqli_query($con,$qry1);
	header("location: adminpanel.php");


}
?>
</body>
</html>