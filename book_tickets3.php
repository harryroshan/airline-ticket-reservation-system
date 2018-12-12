<?php
	session_start();
?>
<html>------------------------------------------------------------------------------------------!-!_!_!-!-!
	<head>
		<title>
			Enter Ticket/Travel Details
		</title>
		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 20px;
			}
			input[type=number] {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 5px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 490px
			}
			select {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 6.5px 25px;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="stylesheet" href="http:\\localhost\font-awesome-4.7.0\css\font-awesome.min.css">
	</head>
	<body>
		<div class="logo">
			<img src="shutterstock_22.jpg" width=75px/> 
		</div>
		<h1>
			&nbsp;
			AADITH AIRLINES
		</h1>
		<div>
			<ul>
				<li><a href="home_page.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="customer_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="home_page.php"><i class="fa fa-plane" aria-hidden="true"></i> About Us</a></li>
				<li><a href="home_page.php"><i class="fa fa-phone" aria-hidden="true"></i> Contact Us</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
		<br>
		<?php
			$no_of_pass=$_SESSION['no_of_pass'];
			$class=$_SESSION['class'];
			$count=$_SESSION['count'];
			$pass_name=array();
			echo "<h2>ADD PASSENGERS DETAILS</h2>";
			echo "<form action=\"add_passengers_form_handler.php\" method=\"post\">";
			while($count<=$no_of_pass)
			{
					echo "<p><strong>PASSENGER ".$count."<strong></p>";
					echo "<table cellpadding=\"5\">";
					echo "<tr>";
					echo "<td class=\"fix_table\">Passenger's Name</td>";
					echo "<td class=\"fix_table\">Passenger's Age</td>";
					echo "<td class=\"fix_table\">Passenger's Gender</td>";
					echo "<td class=\"fix_table\">Passenger's Inflight Meal</td>";
					echo "<td class=\"fix_table\">Passenger's Frequent Flier ID (if applicable)</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td class=\"fix_table\"><input type=\"text\" name=\"pass_name[]\"></td>";
					echo "<td class=\"fix_table\"><input type=\"number\" name=\"pass_age[]\"></td>";
					echo "<td class=\"fix_table\">";
					echo "<select name=\"pass_gender[]\">";
  					echo "<option value=\"male\">Male</option>";
  					echo "<option value=\"female\">Female</option>";
  					echo "<option value=\"other\">Other</option>";
  					echo "</select>";
  					echo "</td>";
  					echo "<td class=\"fix_table\">";
					echo "<select name=\"pass_meal[]\">";
  					echo "<option value=\"yes\">Yes</option>";
  					echo "<option value=\"no\">No</option>";
  					echo "</select>";
  					echo "</td>";
  					echo "<td class=\"fix_table\"><input type=\"text\" name=\"pass_ff_id[]\"></td>";
					echo "</tr>";
					echo "</table>";
					echo "<br><hr>";
					$count=$count+1;
				}
				echo "<input type=\"submit\" value=\"Submit Passengers Details\" name=\"Submit\">";
				echo "</form>";
		?>
		<!--Following data fields were empty!
			...
			ADD VIEW FLIGHT DETAILS AND VIEW JETS/ASSETS DETAILS for ADMIN
			PREDEFINED LOCATION WHEN BOOKING TICKETS
		-->
	</body>
</html>
