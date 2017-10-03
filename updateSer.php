<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "EzCarCareDB";
	$con = new mysqli($servername, $username, $password, $dbname);
	
	if(isset($_POST['submit']))
	{
		
		$serviceName = $_POST['serviceName'];
		$serviceType = $_POST['serviceType'];
		$fees = (int)$_POST['fees'];
		$id=$_SESSION['serviceID'];
		$sql = "UPDATE Services SET serviceName='$serviceName', servicetype='$serviceType', fees='$fees' WHERE serviceID='$id'";
		mysqli_query($con, $sql);
	}
	
	mysqli_close($con);
	echo '<script type="text/javascript">alert("The service has been updated!");';
	echo 'location.href="updateService.php";</script>';
?>