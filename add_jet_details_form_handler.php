<?php
	session_start();
?>
<html>
	<head>
		<title>Add Aircraft Details</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Submit']))
			{
				$data_missing=array();
				if(empty($_POST['jet_id']))
				{
					$data_missing[]='Jet ID';
				}
				else
				{
					$jet_id=trim($_POST['jet_id']);
				}

				if(empty($_POST['jet_type']))
				{
					$data_missing[]='Jet Type';
				}
				else
				{
					$jet_type=$_POST['jet_type'];
				}

				if(empty($_POST['jet_capacity']))
				{
					$data_missing[]='Jet Capacity';
				}
				else
				{
					$jet_capacity=$_POST['jet_capacity'];
				}

				if(empty($data_missing))
				{
					require_once('../mysqli_connect.php');
					$query="INSERT INTO Jet_Details (jet_id,jet_type,total_capacity,active) VALUES (?,?,?,'Yes')";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ssi",$jet_id,$jet_type,$jet_capacity);
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
						echo "Successfully Submitted";
						header("location: add_jet_details.php?msg=success");
					}
					else
					{
						echo "Submit Error";
						echo mysqli_error();
						header("location: add_jet_details.php?msg=failed");
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