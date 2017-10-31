<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "EzCarCareDB";
	$con = new mysqli($servername, $username, $password, $dbname);
	
	//Admin Validation
	$AdminName = $_POST['AdminName'];
	$AdminPassword = $_POST['AdminPassword'];
	
	$sql = "SELECT * from Admin WHERE userName = '$AdminName' AND password = '$AdminPassword'";
	$result = mysqli_query($con, $sql);
	
	if (mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_assoc($result);
		$_SESSION['AdminName'] = $row['userName'];
		$_SESSION['AdminID'] = $row['adminID'];
		header('location:adminWelcome.php');
	}
	else
	{
		header('location:invalidLogin.html');
	}
	
	mysqli_close($con);
?>