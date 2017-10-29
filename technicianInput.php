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
		$techName = $_POST['techName'];
		$techTelNo = $_POST['techTelNo'];
		$techAddress = $_POST['techAddress'];
		$techState = $_POST['techState'];
		$techEmail = $_POST['techEmail'];
		$specialty = $_POST['specialty'];
		
		$sql = "INSERT INTO Technician (techName, techTelNo, techAddress, techState, techEmail, specialty) 
			VALUES ('$techName', '$techTelNo', '$techAddress', '$techState', '$techEmail', '$specialty')";
		mysqli_query($con, $sql);
	}
	
	mysqli_close($con);
	echo '<script type="text/javascript">alert("The new technician has been recorded successfully!");';
	echo 'location.href="recordTechnician.html";</script>';
?>