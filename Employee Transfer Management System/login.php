<?php
require_once('conn.php');
error_reporting(E_ALL);
ini_set('display_errors', 0);
session_start();
if($_SESSION['un'])
{
	header('location: adminpanel.php');
}
if($_SESSION['un1'])
{
	header('location: employeepanel.php');
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>

<body>
<table cellspacing="10">
<h1> Admin Login </h1>
<form method="post" action="login.php" style="border: 1" >

<tr>
<td>User Name </td><td> <input type="text" name="user" required/></td>
</tr>
<tr>
<td>Password </td><td> <input type="password" name="pass" required/></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="btnadm" value="Login" style="float:right; width:75px; height:30px; color:#000; background-color:#CF0; border-radius:20px"/></td>
</tr>

</form>
</table>
<br><br><br>
<h1> Employee Login</h1>

<table cellspacing="10">
<form method="post" action="login.php" >

<tr>
<td>User Name </td> <td> <input type="text" name="user1" required /></td>
</tr>

<tr>
<td>Password </td> <td> <input type="password" name="pass1" required /></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="btnemp" value="Login" style="float:right; width:75px; height:30px; color:#000; background-color:#CF0; border-radius:20px" /></td>
</tr>

</form>

<?php



if(isset($_POST['btnadm']))
{
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	$qry = "SELECT * FROM `admin` WHERE `user` ='$user' AND `pass` = '$pass'";
	$run = mysqli_query($con,$qry);
	$result = mysqli_num_rows($run);
	if($result < 1)
	{
?>
    <script>
	alert(" User id and Password Incorrect");
	window.open('login.php','_self');
	
	</script>
    <?php
	}
	else
	{
		$data = mysqli_fetch_assoc($run);
		$un = $data['user'];
		
		$_SESSION['un']=$un;
		header('location:adminpanel.php');
		
		
	
}
}
?>

<?php

if(isset($_POST['btnemp']))
{
	$user = $_POST['user1'];
	$pass = $_POST['pass1'];
	
	$qry = "SELECT * FROM `employee` WHERE `suser` ='$user' AND `spass` = '$pass'";
	$run = mysqli_query($con,$qry);
	$result = mysqli_num_rows($run);
	if($result < 1)
	{
?>
    <script>
	alert(" User id and Password Incorrect");
	window.open('login.php','_self');
	
	</script>
    <?php
	}
	else
	{
		$data = mysqli_fetch_assoc($run);
		$un = $data['suser'];
		$empid = $data['id'];
		
		$_SESSION['un1']=$un;
		$_SESSION['empid'] = $empid;
	
		
		header('location:employeepanel.php');
		
		
	
}
}

?>

</body>
</html>