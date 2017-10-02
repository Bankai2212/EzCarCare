<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "EzCarCareDB";
	$con = new mysqli($servername, $username, $password, $dbname);
	
	if(isset($_POST['submit']))
	{
		//Saving service details into database
		$serviceName = $_POST['serviceName'];
		$serviceType = $_POST['serviceType'];
		$fees = (int)$_POST['fees'];
		
		$sql = "INSERT INTO Services (serviceName, serviceType, fees) VALUES ('$serviceName', '$serviceType', '$fees')";
		mysqli_query($con, $sql);
	}
	
	mysqli_close($con);
	echo '<script type="text/javascript">alert("The new service has been recorded successfully!");';
	echo 'location.href="recordService.html";</script>';
?>