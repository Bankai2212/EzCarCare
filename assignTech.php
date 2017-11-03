<html>
<head>
<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "EzCarCareDB";
	$con = new mysqli($servername, $username, $password, $dbname);
	
	if(isset($_POST['submit']))
	{
		
		$a= count($_SESSION['requestID']);
		for ($i=0;$i<$a;$i++){
			$b=$i+1;
			$assign=$_POST["assignTech$b"];
			$adminID= $_SESSION["AdminID"];
			if ($assign!=""){
				$id=$_SESSION["requestID"][$i];
				$sql="UPDATE request SET techID='$assign', status='In-progress', adminID='$adminID' WHERE requestID=$id";
				mysqli_query($con, $sql);
				
			}
			
		}
		
		echo '<script type="text/javascript">alert("Technician assigned successfully!");';
		echo 'location.href="adminWelcome.php";</script>';
	}
	
	
	
	mysqli_close($con);

?>
</head>
<body></body>
</html>