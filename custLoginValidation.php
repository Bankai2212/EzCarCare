<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "EzCarCareDB";
	$con = new mysqli($servername, $username, $password, $dbname);
	
	//Admin Validation
	$CustomerName = $_POST['CustomerName'];
	$CustomerPassword = $_POST['CustomerPassword'];
	
	$sql = "SELECT * from Customer WHERE userName = '$CustomerName' AND password = '$CustomerPassword'";
	$result = mysqli_query($con, $sql);
	
	if (mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_assoc($result);
		$_SESSION['CustomerName'] = $row['userName'];
		$_SESSION['CustomerID'] = $row['customerID'];
		header('location:userWelcome.php');
	}
	else
	{
		header('location:invalidLogin.html');
	}
	
	mysqli_close($con);
?>