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
				<div class="col-lg-offset-7 col-lg-5 col-sm-offset-8 col-sm-4 col-xs-12">
					<a href="userWelcome.php" class="btn btn-default" id="button"> Home</a>
					<a href="requestService.php" class="btn btn-default" id="button"> Request for services</a>
					<a href="index.html" class="btn btn-default" id="button"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
				</div>
				<div class="col-lg-12 col-sm-12 col-xs-12" style="height:5px;"></div>
			</div>
			
			<div class="row nav_row">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span> 
							</button>
							<a class="navbar-brand visible-xs" href="#">Menu</a>
						</div>
						<div class="collapse navbar-collapse" id="myNavbar">
							<ul class="nav nav-pills nav-justified">
								<li class="active"><a href="userWelcome.php">Home</a></li>
								<li class="dropdown"><a href="#">About</a>
									<ul class="dropdown-menu">
										<li><a href="#">Contact Us</a></li>
									</ul>
								</li>
								<li class="dropdown"><a href="#">Services</a>
									<ul class="dropdown-menu">
										<li><a href="#">Repair Services</a></li>
										<li><a href="#">Maintenance</a></li>
									</ul>
								</li>
								<li><a href="#">Place Request</a></li>
								<li><a href="#">Pricing</a></li>
								<li><a href="#">Partners</a></li>
								<li><a href="#">FAQ</a></li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
			
			<div class="col-lg-12 col-sm-12 col-xs-12" style="height:20px;"></div>
			
			<fieldset>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-sm-12 col-xs-12" style="height:20px;"></div>
						
						<div class="col-lg-11 col-sm-11 col-xs-11">
						<script type="text/javascript">
							var now=new Date();
							var hour= now.getHours();
							if (hour<12)
								document.write("Good Morning, ");
							else if (hour<18)
								document.write("Good Afternoon, ");
							else if (hour<20)
								document.write("Good Evening, ");
							else
								document.write("Good Night, ");
						</script>
							<?php
								$name = $_SESSION['CustomerName'];
								echo $name . "!!!" . '</br>';
								
								$servername = "localhost";
								$username = "root";
								$password = "";
								$dbname = "EzCarCareDB";
								$con = new mysqli($servername, $username, $password, $dbname);
								$CustomerID = $_SESSION['CustomerID'];
								$sql = "SELECT * from request,customer,services where request.customerID=customer.customerID and request.serviceID=services.serviceID and request.customerID='$CustomerID'";
								$result = mysqli_query($con, $sql);
								
								if (mysqli_num_rows($result) > 0)
								{
									echo "<table class='table table-responsive'><h4>Request List</h4>";
									echo "<tr>";
									
									echo "<th>" . "RequestID" . "</th>";
									echo "<th>" . "Service Name" . "</th>";
									echo "<th>" . "Description" . "</th>";
									echo "<th>" . "Car Model" . "</th>";
									echo "<th>" . "DateTime" . "</th>";
									echo "<th>" . "Address" . "</th>";
									echo "<th>" . "State" . "</th>";
									echo "<th>" . "Status" . "</th>";									
									echo "<th>" . "Technician" . "</th>";
									
									echo "</tr>";
									while($row = mysqli_fetch_assoc($result))
									{
										
										echo "<tr>";
										echo "<td>" . $row["requestID"] . "</td>";
										echo "<td>" . $row["serviceName"] . "</td>";
										echo "<td>" . $row["description"] . "</td>";
										echo "<td>" . $row["carModel"] . "</td>";
										echo "<td>" . $row["dateTime"] . "</td>";										
										echo "<td>" . $row["requestAddress"] . "</td>";
										echo "<td>" . $row["requestState"] . "</td>";
										echo "<td>" . $row["status"] . "</td>";
										
										if ($row["techID"] == null )
										{
											echo "<td>-</td>";
										}
										else{
											$techID = $row["techID"];
											$sql2 = "SELECT * from request,technician where request.techID=technician.techID and request.techID='$techID'";
											$result2 = mysqli_query($con, $sql2);
											$row2 = mysqli_fetch_assoc($result2);
											echo "<td>" . $row2["techName"] . "</td>";
										}											
										echo "</tr>";
									}
									echo "</table>";
									echo "</br>";
									
								}
								else
								{
									echo "There are no any entries for the request.";
								}
								
								mysqli_close($con);
							?>
							
						</div>
						<div class="col-lg-12 col-sm-12 col-xs-12" style="height:20px;"></div>
					</div>
				</div>
			</fieldset>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px"></div>
		</div>		
		<div class="container">
				<div class="panel-group" id="calendarBox">
					<div class="panel panel-default">
						<div class="panel-heading" id="calendarPanel">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#calendarBox" href="#openBox"> Calendar </a>
							</h4>
						</div>
						<div id="openBox" class="panel-collapse collapse">
							<div class="panel-body">
								<script type="text/javascript">
			var day_of_week = new Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
			var month_of_year = new Array("January","February","March","April","May","June","July","August","September","October","November","December");
			var Calendar = new Date();
			var year = Calendar.getFullYear();
			var month = Calendar.getMonth();
			var today = Calendar.getDate();
			var weekday = Calendar.getDay();
			var DAYS_OF_WEEK = 7; 
			var DAYS_OF_MONTH = 31;
			var cal;

			Calendar.setDate(1);
			Calendar.setMonth(month);
			var TR_start = "<tr>";
			var TR_end = "</tr>";
			var highlight_start = '<td width="30"><table cellspacing="0" border="1"  style="border-color:#CCCCCC;background-color:#DEDEFF"><tr><td width="20" style="text-align:center;font-weight:bold">';
			var highlight_end   = '</td></tr></table>';
			var TD_start = '<td width="30" style="text-align:center">';
			var TD_end = "</td>";
			
			cal =  '<table width="100%" height="200px" border="1" cellspacing="0" cellpadding="0" style="border-color:#BBBBBB"><tr><td>';
			cal += '<table width="100%" height="200px" border="1" cellspacing="0" cellpadding="2">' + TR_start;
			cal += '<td colspan="' + DAYS_OF_WEEK + '" style="background-color:#EFEFEF;text-align:center;font-weight:bold">';
			cal += month_of_year[month]  + "  " + year + '</B>' + TD_end + TR_end;
			cal += TR_start;
			
			for(var index=0; index < DAYS_OF_WEEK; index++)
			{
				if(weekday == index)
					cal += TD_start + '<b>' + day_of_week[index] + '</b>' + TD_end;
				else
					cal += TD_start + day_of_week[index] + TD_end;
			}

			cal += TD_end + TR_end;
			cal += TR_start;
			
			for(var index=0; index < Calendar.getDay(); index++)
				cal += TD_start + "" + TD_end;

			for(var index=0; index < DAYS_OF_MONTH; index++)
			{
				if( Calendar.getDate() > index )
				{
					week_day =Calendar.getDay();
					if(week_day == 0)
						cal += TR_start;

					if(week_day != DAYS_OF_WEEK)
					{
						var day  = Calendar.getDate();
							if( today==Calendar.getDate() )
								cal += highlight_start + day + highlight_end + TD_end;
							else
								cal += TD_start + day + TD_end;
					}
					if(week_day == DAYS_OF_WEEK)
						cal += TR_end;
				}

				Calendar.setDate(Calendar.getDate()+1);	
			}

			cal += '</td></tr></table></table>';
			document.write(cal);
			</script>
							</div>
						</div>
					</div>
				</div>
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
</html>

