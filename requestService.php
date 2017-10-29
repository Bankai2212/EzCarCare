<!DOCTYPE html>
<html>
	<head>
		<?php
			session_start();
		?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style1.css">
		
		<!-- 1. Link to jQuery (1.8 or later), -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- 33 KB -->
		
		<!-- fotorama.css & fotorama.js. -->
		<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
		
		<title>EzCarCare</title>
	</head>
	
	<body>
		<div class="wrapper">
			<div class="row" id="header">
				<div class="col-lg-12 col-sm-12 col-xs-12" style="height:20px;"></div>
			</div>
			<div class="row" id="header">
				<div class="col-lg-offset-2 col-lg-1 col-md-offset-2 col-md-1 col-sm-offset-2 col-sm-1">
					<a href="userWelcome.php"><img id="headerImage" src="Picture/Logo/EzCarCareLogo.png" alt="EzCarCare Logo" class="img-responsive pull-left"/></a>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2"><a href="userWelcome.php" id="logoTitle"><h1><b>EzCarCare</b></h1></a></div>
			</div>
			<div class="row" id="header">
				<div class="col-lg-offset-2 col-lg-2 col-md-offset-2 col-md-2 col-sm-offset-2 col-sm-2 visible-lg visible-md visible-sm">
					<p id="visitorCount">Visitor Count:<br/>
						<script type="text/javascript" src="http://services.webestools.com/cpt_visits/14398-10-5.js"></script>
						<a href="http://www.webestools.com/" title="Tools services webmasters counters generators scripts tutorials free">
						</a>
					</p>
				</div>
				<div class="col-lg-offset-4 col-lg-4 col-sm-offset-4 col-sm-4 col-xs-12">
					<form class="navbar-form navbar-left" action="search.php" method="post">
						<div class="input-group">
							<input type="text" name="search" class="form-control" placeholder="Search for..." required/>
							<span class="input-group-btn">
							<button class="btn btn-secondary" type="submit" value="Submit"><span class="glyphicon glyphicon-search"></span> Search</button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<div class="container">		
			<div class="row nav_row">
				<div class="col-lg-12 col-sm-12 col-xs-12" style="height:5px;"></div>
				<div class="col-lg-offset-9 col-lg-3 col-sm-offset-8 col-sm-4 col-xs-12">
					<a href="userWelcome.php" class="btn btn-default" id="button"> Home</a>
					<a href="index.html" class="btn btn-default" id="button"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
				</div>
				<div class="col-lg-12 col-sm-12 col-xs-12" style="height:5px;"></div>
			</div>
			
			
			<h3 id="formHead">Request for Services</h3>
			<form class="form-horizontal" action="requestInput.php" method="post">
				<fieldset>
					<legend>Request Details</legend>
					<div class="container">
					
						<div class="row">
							<div class="form-group">
								<label class="control-label col-lg-2 col-sm-3 col-xs-12" id="formLabel">Service
									<span id="required">*</span></label>
								<div class="col-lg-4 col-sm-4 col-xs-12">
									<select class="form-control inputbar" name="service" id="service" required 
										onfocus="focusing(this)" onblur="blurring(this)">
										<option value="">--CHOOSE ONE-- </option>
										<?php																						
											$servername = "localhost";
											$username = "root";
											$password = "";
											$dbname = "EzCarCareDB";
											$con = new mysqli($servername, $username, $password, $dbname);
											
											$sql = "SELECT * from Services";
											$result = mysqli_query($con, $sql);
											
											if (mysqli_num_rows($result) > 0)
											{
												while($row = mysqli_fetch_assoc($result))
												{
													$serviceID = $row["serviceID"];
													$serviceName = $row["serviceName"];
													$fees = $row["fees"];
													
													echo "<option value=\"" . $serviceID . "\">" . $serviceName . " (RM" . $fees . ")" . "</option>";
												}
											}								
																						
											mysqli_close($con);
										?>
									</select>
								</div>
							</div>
						</div>
					
						<div class="row">
							<div class="form-group">
								<label class="control-label col-lg-2 col-sm-3 col-xs-12" id="formLabel">
									Request Description<span id="required">*</span></label>
								<div class="col-lg-6 col-sm-6 col-xs-12">
									<textarea name="description" id="description" class="form-control" required 
											onfocus="focusing(this)" onblur="blurring(this)"></textarea>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="form-group">
								<label class="control-label col-lg-2 col-sm-3 col-xs-12" id="formLabel">
									Request Date<span id="required">*</span></label>
								<div class="col-lg-3 col-sm-3 col-xs-12">
									<input type="date" name="date" class="form-control inputbar" id="date" required 
										onfocus="focusing(this)" onblur="blurring(this)"/>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="form-group">
								<label class="control-label col-lg-2 col-sm-3 col-xs-12" id="formLabel">
									Request Time<span id="required">*</span></label>
								<div class="col-lg-3 col-sm-3 col-xs-12">
									<input type="time" name="time" class="form-control inputbar" id="time" required 
										onfocus="focusing(this)" onblur="blurring(this)"/>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="form-group">
								<label class="control-label col-lg-2 col-sm-3 col-xs-12" id="formLabel">Car Model
									<span id="required">*</span></label>
								<div class="col-lg-3 col-sm-3 col-xs-12">
									<select class="form-control inputbar" name="carModel" id="carModel" required 
										onfocus="focusing(this)" onblur="blurring(this)">
										<option value="">--CHOOSE ONE-- </option>
										<?php
											$customerID = $_SESSION['CustomerID'];
																						
											$servername = "localhost";
											$username = "root";
											$password = "";
											$dbname = "EzCarCareDB";
											$con = new mysqli($servername, $username, $password, $dbname);
											
											$sql = "SELECT carModel1, carModel2, carModel3 from Customer where customerID='$customerID'";
											$result = mysqli_query($con, $sql);
											
											if (mysqli_num_rows($result) > 0)
											{
												$row = mysqli_fetch_assoc($result);
												$carModel1 = $row["carModel1"];
												$carModel2 = $row["carModel2"];
												$carModel3 = $row["carModel3"];
												
												if($carModel1 != "")
													echo "<option value=\"" . $carModel1 . "\">" . $carModel1. "</option>";
												if($carModel2 != "")
													echo "<option value=\"" . $carModel2 . "\">" . $carModel2. "</option>";
												if($carModel3 != "")
													echo "<option value=\"" . $carModel3 . "\">" . $carModel3. "</option>";
											}								
																						
											mysqli_close($con);
										?>
									</select>
								</div>
							</div>
						</div>
										
						<div class="row">
							<div class="form-group">
								<label class="control-label col-lg-2 col-sm-3 col-xs-12" id="formLabel">
									Request Address<span id="required">*</span></label>
								<div class="col-lg-6 col-sm-6 col-xs-12">
									<input type="radio" name="address" value="default" checked="checked" style="margin-top:10px" onclick="chooseDefault()"/> 
										Default address - 
										<?php
											$customerID = $_SESSION['CustomerID'];
																						
											$servername = "localhost";
											$username = "root";
											$password = "";
											$dbname = "EzCarCareDB";
											$con = new mysqli($servername, $username, $password, $dbname);
											
											$sql = "SELECT address from Customer where customerID='$customerID'";
											$result = mysqli_query($con, $sql);
											
											if (mysqli_num_rows($result) > 0)
											{
												$row = mysqli_fetch_assoc($result);
												echo $row["address"] . "</br>";
											}								
																						
											mysqli_close($con);
										?>
									<input type="radio" name="address" value="new" onclick="chooseNew()"/> Other Address
										<textarea name="newAddress" id="newAddress" class="form-control" 
											onfocus="focusing(this)" onblur="blurring(this)" disabled></textarea>
								</div>
							</div>
						</div>
					</div>
				</fieldset>
				
				<div class="col-lg-12 col-sm-12 col-xs-12" style="height:20px;"></div>
				
				<div class="row">
					<div class="form-group">
						<div class="col-lg-offset-8 col-lg-2 col-sm-offset-8 col-sm-2 col-xs-6">
							<input type="submit" name="submit" class="btn btn-success pull-right" id="submitBtn" value="Submit"/>
						</div>
						<div class="col-lg-2 col-sm-2 col-xs-6">
							<input type="reset" class="btn btn-danger" id="resetBtn" value="Reset"/>
						</div>
						<div class="col-lg-12 col-md-12 col-xs-12" style="height:20px;"></div>
					</div>
				</div>
			</form>
			
			<div class="col-lg-12 col-sm-12 col-xs-12" style="height:20px;"></div>
		</div>
		
		<footer>
			<div id="footerbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px"></div>
						<div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-offset-1 col-sm-5 visible-lg visible-md visible-sm">
						
						
						<div class="row">
							
							<div class="col-lg-12 col-sm-12 col-xs-12">
								<h5 id="footerText">WHAT PEOPLE SAY ABOUT US</h5><br/>
								<div id="carousel" class="carousel slide" data-ride="carousel">

								<div class="carousel-inner" role="listbox">
								<div class="item active">
									<small id="footerText">Winston Seng</small><br/><br/>
									<p id="footerText"><small>EzCarCare has provided me with a good and convenient environment. I am sastisfied with their services.</small></p>
								</div>
								<div class="item">
									<small id="footerText">Evelyn Kitty</small><br/><br/>
									<p id="footerText"><small>I love the staffs in EzCarCare as they are very caring, nice and professional. 
									Basically, my experience at EzCarCare was awesome!</small></p>
								</div>
								<div class="item">
									<small id="footerText">Paul Runner</small><br/><br/>
									<p id="footerText"><small>The services provided by EzCarCare has been absolutely amazing and the faculty staff haven been extremely helpful. This is the best 
									car service experience I received. This is a great car servise provider!!!</small></p>
								</div>
								</div>
							</div>
							</div>
						</div>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 visible-lg visible-md visible-sm">
							<h5 id="footerText">OUR SERVICES</h5>
							<ul class="listStyle">
								<li><a href="#"><small>ABOUT</small></a></li>
								<li><a href="#"><small>SERVICES</small></a></li>
								<li><a href="#"><small>PLACE REQUEST</small></a></li>
								<li><a href="#"><small>PRICING</small></a></li>
								<li><a href="#"><small>PARTNERS</small></a></li>
								<li><a href="#"><small>FAQ</small></a></li>
							</ul>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<div class="row">
								<div class="col-lg-12 col-sm-12 col-xs-6">
									<h5 id="footerText">FOLLOW US</h5>
									<p id="footerText"><small>Facebook: </br><a href="https://www.facebook.com/">www.facebook.com</a></small></p>
									
									<div class="row">
										<div class="col-lg-6 col-sm-6 col-xs-6">
											<a href="https://www.facebook.com/">
												<img src="Picture/Footerimage/Facebook.png" alt="Facebook Logo" class="img-responsive" style="height:85px;width:85px">
											</a>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 visible-lg visible-md visible-sm" style="height:20px"></div>
								<div class="col-lg-12 col-sm-12 col-xs-6">
									<h5 id="footerText">LOCATE US</h5>
									<p id="footerText"><small>EzCarCare</br>BZ-2, Pusat Bandar Damansara (Main Block)</br>50490 Kuala Lumpur, Malaysia</br>
									<span class="glyphicon glyphicon-earphone"></span> Tel: +6 03 12309487</br>
									<span class="glyphicon glyphicon-print"></span> Fax: +6 03 12348746</small></p>
									<div class="row">
										<div class="col-lg-6 col-sm-6 col-xs-6">
											<a href="https://www.google.com/maps/">
											<img src="Picture/Footerimage/GoogleMapsIcon.png" alt="google maps icon" class="img-responsive" style="height:100px;width:100px;margin-top:-7px;"></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px"></div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px"></div>
			<div class="container">
				<small class="pull-right"><b>COPYRIGHT &copy; 2017 EzCarCare</b></small> 
			</div>
		</footer>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px"></div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	<script type="text/javascript">
		
		function focusing(x)
		{
			x.style.background = "#e8f8ff";
		}
		
		function blurring(x)
		{
			x.style.background = "white";
		}
		
		function chooseDefault()
		{
			document.getElementById("newAddress").disabled = true;
			document.getElementById("newAddress").style.background = "white";
		}
		
		function chooseNew()
		{
			document.getElementById("newAddress").disabled = false;
			document.getElementById("newAddress").style.background = "#e8f8ff";
		}
	</script>
</html>