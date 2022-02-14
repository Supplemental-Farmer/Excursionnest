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
		$sql = "CREATE TABLE user 
		( 
			Name varchar(80), 
			Phone varchar(15), 
			mail varchar(50),
			password varchar(20),
			location varchar(20) 
		)"; 

		if (mysqli_query($conn, $sql)) 
		{ 
			echo "Table user created successfully"; 
		} 
		else 
		{ 
			echo "Error creating table: " . mysqli_error($conn); 
		}
		$sql = "CREATE TABLE administrator 
		( 
			Name varchar(80), 
			Phone varchar(15), 
			mail varchar(50),
			password varchar(20),
			location varchar(20) 
		)"; 

		if (mysqli_query($conn, $sql)) 
		{ 
			echo "Table admin created successfully"; 
		} 
		else 
		{ 
			echo "Error creating table: " . mysqli_error($conn); 
		} 
		mysqli_close($conn); 
	?>

</body>
</html>