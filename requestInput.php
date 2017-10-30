<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "EzCarCareDB";
	$con = new mysqli($servername, $username, $password, $dbname);
	
	if(isset($_POST['submit']))
	{
		//Saving request details into database
		$customerID = $_SESSION['CustomerID'];
		$serviceID = $_POST['service'];
		$description = $_POST['description'];
		$dateTime = $_POST['dateTime'];
		$carModel = $_POST['carModel'];
		$requestAddress;
		$requestState;
		if($_POST['address'] == "default")
		{
			$sql2 = "SELECT address, state from Customer where customerID='$customerID'";
			$result2 = mysqli_query($con, $sql2);
											
			if (mysqli_num_rows($result2) > 0)
			{
				$row = mysqli_fetch_assoc($result2);
				$requestAddress = $row["address"];
				$requestState = $row["state"];
			}						
		}
		else
		{
			$requestAddress = $_POST['newAddress'];
			$requestState = $_POST["requestState"];
		}
		
		$sql = "INSERT INTO Request (description, dateTime, carModel, requestAddress, requestState, status, serviceID, customerID) 
			VALUES ('$description', '$dateTime', '$carModel', '$requestAddress', '$requestState', 'Pending', '$serviceID', '$customerID')";
		mysqli_query($con, $sql);
	}
	
	mysqli_close($con);
	echo '<script type="text/javascript">alert("The new request has been recorded successfully!");';
	echo 'location.href="requestService.php";</script>';
?>