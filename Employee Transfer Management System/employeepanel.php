<?php
require_once('conn.php');

session_start();

if($_SESSION['un1'])
 {
echo "<h1> Welcome Employee ".$_SESSION['un1']."</h1>";
 }
 else
 {
	 header('location: login.php');
 }

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
.c1 td{
	width:100px;
	text-align:center;
	height:60px;
}
.c2 td{
    width:382px;
	text-align:center;
	height:60px;
}

</style>
</head>

<body>
<form method="post">
<input type="submit" name="logout" value="Logout" style="width:90px; height:35px; color:#FFF; background-color:#F00; border-radius:20px"/>
</form>

<?php

if(isset($_POST['logout']))
{
	
	session_destroy();
	header('location:login.php');
}
?>

<?php

$empid = $_SESSION['empid'];
$qry1 =  "SELECT * FROM `emp_details` WHERE `empid` = '$empid'";
$result = mysqli_query($con ,$qry1);

echo 
"<table border='1' class='c1'>
<tr bgcolor='#006666'>
<td> ID </td><td> First Name </td><td> Last Name </td><td> Address </td><td> Contact </td><td> Designation </td><td> Nationlity </td><td> CNIC </td><td> Joining Date </td> <td> Work Experience </td><td> Salary </td>
</tr>";

while($row = mysqli_fetch_array($result))
{
	echo "<tr>
<td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td>".$row[10]."</td>
</tr>";	
}
echo "</table>";



?>

<h2>Press Transfer Button To Make Transfer Request</h2>
<form method="post">
<input type="submit" name="btntrans" value="Transfer" style="width:100px; height:40px; color:#FFF; background-color:#000; border-radius:20px;"/>
</form>
<?php
if(isset($_POST['btntrans']))
{
	header('location: transfer.php');
}
?>

<?php

$sql = "SELECT `trans_id`,`request`, `req_status` FROM `transfer` WHERE empid = '$empid'";
$trans1 = mysqli_query($con,$sql);

echo "<table border='1' class='c2'>
<tr bgcolor='#006666'>
<td>Transfer No.</td><td>Application</td><td>Request Status</td>
</tr>";
while($trans = mysqli_fetch_array($trans1))
{
echo "<tr>
<td>".$trans[0]."</td><td>".$trans[1]."</td><td>".$trans[2]."</td>
</tr>";
}

echo "</table>";

?>
</body>
</html>