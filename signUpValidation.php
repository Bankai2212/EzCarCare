<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "EzCarCareDB";
	$con = new mysqli($servername, $username, $password, $dbname);
	
	if(isset($_POST['submit']))
	{
		$UserName = $_POST['userName'];
		$UserEmail = $_POST['userEmail'];
		$UserPhone = $_POST['userPhone'];
		$UserPassword = $_POST['userPassword'];
		$UserAddress = $_POST['userAddress'];
		$UserState = $_POST['userState'];
		$carModel1 = $_POST['carModel1'];
		$carModel2 = $_POST['carModel2'];
		$carModel3 = $_POST['carModel3'];
									
		$sql1 = "SELECT * FROM customer WHERE userName = '$UserName'";
		$result = mysqli_query($con, $sql1);
		if (mysqli_num_rows($result) > 0)
		{
			echo '<script type="text/javascript">alert("The user name has already exists!");';
			echo 'location.href="signup.html";</script>';
		}
		else
		{
			$sql2 = "INSERT INTO customer (userName, password, telNo, address, state, email, carModel1, carModel2, carModel3) 
					VALUES ('$UserName', '$UserPassword', '$UserPhone', '$UserAddress', '$UserState', '$UserEmail', '$carModel1', '$carModel2', '$carModel3')";
			if(mysqli_query($con, $sql2))
			{
				echo '<script type="text/javascript">alert("New account is signed up successfully!");';
				echo 'location.href="login.html";</script>';
			}
			else
			{
				echo "Error occurs: " . mysqli_error($con);
			}
		}
	}
?>