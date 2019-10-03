<?php
 require_once('conn.php');
 session_start();
 if($_SESSION['un'])
 {
	 echo "<h1>Welcome Admin</h1>";
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
<style>
.c1 td{
	width:130px;
	height:60px;
	text-align:center;
}
.btns{
	width:130px; height:35px; color:#FFF; background-color:#F03; border-radius:20px;
}
</style>
<title>Admin Panel</title>
</head>

<body>
<form method="post">
<input type="submit" name="logout" value="Logout" style="width:130px; height:35px; color:#FFF; background-color:#F03; border-radius:20px"/>
</form>

<?php

if(isset($_POST['logout']))
{
	
	session_destroy();
	header('location:login.php');
}
?>

<?php

$qry1= "SELECT * FROM `emp_details` ORDER BY empid";
$emp_data1 = mysqli_query($con,$qry1);


echo" 
<table border='2' class='c1'>
<caption><h1>All Employees Data</h1></caption>
<tr bgcolor='#006666'>
<td>Employee ID</td><td>First Name</td><td>Last Name</td><td>Address</td><td>Contact</td><td>Designation</td><td>Nationality</td><td>CNIC No.</td><td>Joining Date</td><td>Work Experience</td><td>Salary</td>
</tr>
";
while($res = mysqli_fetch_array($emp_data1))
{
echo"<tr>
<td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td><td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td><td>".$res[7]."</td><td>".$res[8]."</td><td>".$res[9]."</td><td>".$res[10]."</td>
</tr>
";
}

echo "</table>";
?>
<br><br>
<hr>
<br><br>

<form method="post" style="margin-left:500px;">
<input type="submit" name="btnins" value="Insert Data" class="btns" />
<input type="submit" name="btnup"  value="Update Data" class="btns"/>
<input type="submit" name="btndel"  value="Delete Data" class="btns"/>
<input type="submit" name="btntra"  value="Transfer Requests" class="btns"/>
</form>
<?php
if(isset($_POST['btnins']))
{
	header("location: insert.php");
	
}

if(isset($_POST['btnup']))
{
	header("location: update.php");
	
}
if(isset($_POST['btndel']))
{
	header("location: delete.php");
	
}
if(isset($_POST['btntra']))
{
	header("location: admintrans.php");
	
}
?>
</body>
</html>