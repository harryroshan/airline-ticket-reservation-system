<?php
	session_start();
?>
<html>
	<head>
		<title>Add Flight Schedule Details</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Submit']))
			{
				$data_missing=array();
				if(empty($_POST['flight_no']))
				{
					$data_missing[]='Flight No.';
				}
				else
				{
					$flight_no=trim($_POST['flight_no']);
				}

				if(empty($_POST['origin']))
				{
					$data_missing[]='Origin';
				}
				else
				{
					$origin=$_POST['origin'];
				}
				if(empty($_POST['destination']))
				{
					$data_missing[]='Destination';
				}
				else
				{
					$destination=$_POST['destination'];
				}

				if(empty($_POST['dep_date']))
				{
					$data_missing[]='Departure Date';
				}
				else
				{
					$dep_date=$_POST['dep_date'];
				}
				if(empty($_POST['arr_date']))
				{
					$data_missing[]='Arrival Date';
				}
				else
				{
					$arr_date=$_POST['arr_date'];
				}
				
				if(empty($_POST['dep_time']))
				{
					$data_missing[]='Departure Time';
				}
				else
				{
					$dep_time=$_POST['dep_time'];
				}
				if(empty($_POST['arr_time']))
				{
					$data_missing[]='Arrival Time';
				}
				else
				{
					$arr_time=$_POST['arr_time'];
				}

				if(empty($_POST['seats_eco']))
				{
					$data_missing[]='Seats(Economy)';
				}
				else
				{
					$seats_eco=$_POST['seats_eco'];
				}
				if(empty($_POST['seats_bus']))
				{
					$data_missing[]='Seats(Business)';
				}
				else
				{
					$seats_bus=$_POST['seats_bus'];
				}

				if(empty($_POST['price_eco']))
				{
					$data_missing[]='Price(Economy)';
				}
				else
				{
					$price_eco=$_POST['price_eco'];
				}
				if(empty($_POST['price_bus']))
				{
					$data_missing[]='Price(Business)';
				}
				else
				{
					$price_bus=$_POST['price_bus'];
				}

				if(empty($_POST['jet_id']))
				{
					$data_missing[]='Jet ID';
				}
				else
				{
					$jet_id=$_POST['jet_id'];
				}

				if(empty($data_missing))
				{
					$cnt=-1;
					require_once('../mysqli_connect.php');

					$query="SELECT count(*) FROM Jet_Details WHERE jet_id=? and active='Yes'";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"s",$jet_id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$cnt);
					mysqli_stmt_fetch($stmt);
					mysqli_stmt_close($stmt);

					if($cnt==1)
					{
						$query="INSERT INTO Flight_Details (flight_no,from_city,to_city,departure_date,arrival_date,departure_time,arrival_time,seats_economy,seats_business,price_economy,price_business,jet_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"sssssssiiiis",$flight_no,$origin,$destination,$dep_date,$arr_date,$dep_time,$arr_time,$seats_eco,$seats_bus,$price_eco,$price_bus,$jet_id);
						mysqli_stmt_execute($stmt);
						$affected_rows=mysqli_stmt_affected_rows($stmt);
						mysqli_stmt_close($stmt);
					}
					else
					{
						$affected_rows=0;
					}
					mysqli_close($dbc);
					if($affected_rows==1)
					{
						echo "Successfully Submitted";
						header("location: add_flight_details.php?msg=success");
					}
					else
					{
						echo "Submit Error";
						echo mysqli_error();
						header("location: add_flight_details.php?msg=failed");
					}
				}
				else
				{
					echo "The following data fields were empty! <br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
					}
				}
			}
			else
			{
				echo "Submit request not received";
			}
		?>
	</body>
</html>