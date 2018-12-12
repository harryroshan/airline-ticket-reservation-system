<?php
	session_start();
?>
<html>
	<head>
		<title>Delete Flight Schedule Details</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Delete']))
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
				if(empty($_POST['departure_date']))
				{
					$data_missing[]='Departure Date';
				}
				else
				{
					$departure_date=trim($_POST['departure_date']);
				}

				if(empty($data_missing))
				{
					require_once('../mysqli_connect.php');
					$query="DELETE FROM Flight_Details WHERE flight_no=? AND departure_date=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ss",$flight_no,$departure_date);
					mysqli_stmt_execute($stmt);
					$affected_rows=mysqli_stmt_affected_rows($stmt);
					//echo $affected_rows."<br>";
					// mysqli_stmt_bind_result($stmt,$cnt);
					// mysqli_stmt_fetch($stmt);
					// echo $cnt;
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
					/*
					$response=@mysqli_query($dbc,$query);
					*/
					if($affected_rows==1)
					{
						echo "Successfully Deleted";
						header("location: delete_flight_details.php?msg=success");
					}
					else
					{
						echo "Submit Error";
						echo mysqli_error();
						header("location: delete_flight_details.php?msg=failed");
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
				echo "Delete request not received";
			}
		?>
	</body>
</html>