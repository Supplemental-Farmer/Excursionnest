<html>
<head>
	<title>	
	</title>
</head>
<body>

	<?php 
		$servername = "localhost"; 
		$username = "root"; 
		$password = "";
		$dbname = "excursionnest"; 
		// Create connection 
		$conn = mysqli_connect($servername, $username, $password, $dbname); 
		// Check connection 
		if (!$conn) 
		{ 
			die("Connection failed: " . mysqli_connect_error()); 
		} 

		// sql to create table 
		$sql = "CREATE TABLE pre(
			StartP VARCHAR(80),
			StartD VARCHAR (80),
			togo VARCHAR (80),
			EndIng VARCHAR(80),
			HOTEL VARCHAR(80),
			Others VARCHAR(80),
			COST INT,
			PERSON INT,
			NUM INT
		)";


		if (mysqli_query($conn, $sql)) 
		{ 
			echo "Table previous created successfully"; 
		} 
		else 
		{ 
			echo "Error creating table: " . mysqli_error($conn); 
		}
		mysqli_close($conn); 
	?>

</body>
</html>