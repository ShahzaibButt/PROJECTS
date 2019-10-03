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
<title>Insert Record</title>
</head>

<body>
<h1>" Insert Record "</h1>
<form method="post">
<table cellspacing="10">


<tr>
<td>User Name</td><td><input type="text" name="txt0" required/></td>
</tr>
<tr>
<td>Password</td><td><input type="text" name="txt1" required/></td>
</tr
<tr>
<td>First Name</td><td><input type="text" name="txt2" required/></td>
</tr>
<tr>
<td>Last Name</td><td><input type="text" name="txt3" required/></td>
</tr>
<tr>
<td>Address</td><td><input type="text" name="txt4" required/></td>
</tr>
<tr>
<td>Contact</td><td><input type="text" name="txt5" required/></td>
</tr>
<tr>
<td>Designation</td><td><input type="text" name="txt6" required/></td>
</tr>
<tr>
<td>Nationality</td><td><input type="text" name="txt7" required/></td>
</tr>
<tr>
<td>CNIC</td><td><input type="text" name="txt8" required/></td>
</tr>
<tr>
<td>Joining Date</td><td><input type="text" name="txt9" required/></td>
</tr>
<tr>
<td>Working Experience</td><td><input type="text" name="txt10" required/></td>
</tr>
<tr>
<td>Salary</td><td><input type="text" name="txt11" required/></td>
</tr>
<tr>
<td></td><td></td>
</tr>
<tr>
<td></td><td><input type="submit" name="btins" value="Insert" style="float:right; width:75px; height:30px; color:#000; background-color:#CF0; border-radius:20px"/></td>
</tr>
</table>
</form>

<?php

if(isset($_POST['btins']))
{
	
	for($i = 0;$i < 12; $i++)
	{
		$data[$i] = $_POST['txt'.$i];
	}
	
	
	$qry1 = "INSERT INTO `employee`(`suser`, `spass`) VALUES ('$data[0]','$data[1]')";
	$qry2 = "INSERT INTO `emp_details`(`first_name`, `last_name`, `address`, `contact`, `designation`, `nationality`, `cnic`, `jdate`, `workexp`, `salary`) VALUES ('$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]')";
	
	$res1 = mysqli_query($con,$qry1);
	$res2 = mysqli_query($con,$qry2);
	
	header("location: adminpanel.php");
}

?>

</body>
</html>