<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
    <link rel="stylesheet" type="text/css" href="profile_admin.css">
</head>
<body>

    <div class="container">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-location-arrow"></i> Upcoming Trips</a></li>
          <li><a data-toggle="tab" href="#menu1"><i class="fa fa-globe"></i> Previous Trips</a></li>
          <li><a data-toggle="tab" href="#menu2"><i class="fa fa-users"></i> Clients</a></li>
          <li><a data-toggle="tab" href="#menu3"><i class="fa fa-commenting"></i> Messages</a></li>
        </ul>
        
        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <h3>Upcoming Trips</h3>

            <div class="row ">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
        <div class="card">
        <div align ="left">
        <form action="EntryUp.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class ="label" for="def" >Departure From:</label>
                <input type="text" class="form-control" id="def" placeholder="Departure From" name="def" required>
              </div>
              <div class="form-group">
                <label class ="label" for="det">Departure Date:</label>
                <input type="date" class="form-control" id="det" placeholder="Departure Time" 
                name="det" required >
              </div>
              <div class="form-group">
                <label class ="label" for="des">Destination:</label>
                <input type="text" class="form-control" id="des" placeholder="Destination Place Name" name="des" required>
              </div>
              <div class="form-group">
                <label  class ="label" for="hotel">Hotel :</label>
                <input type="text" class="form-control" id="hotel" placeholder="Hotel Name" 
                name="hotel" required >
              </div>
              <div class="form-group">
                <label  class ="label" for="cost">Cost:</label>
                <input type="number" class="form-control" id="cost" placeholder="Cost per person" 
                name="cost" step = '500' min="1000" required >
              </div>
              <div class="form-group">
                <label class ="label" for="other">Others :</label>
                <input type="text" class="form-control" id="other" placeholder="Additional information" name="other" required>
              </div>
              <div class="form-group">
                <label  class ="label" for="ret">Return Date:</label>
                <input type="date" class="form-control" id="ret" placeholder="Returning Time" 
                name="ret" required >
              </div>
              <div class="form-group">
                <label  class ="label" for="image">Location:</label>
                <input type="file" name="image" class="form-control" id="image" placeholder="" 
                name="ret" required >
              </div>
          <button type="submit" name="submit" class="btn btn-primary">ADD</button></form>
          <form action="DeleteUp.php" method="post">
              <div class="form-group">
                <label  class ="label" for="sl">Sl No:</label>
                <input type="number" step="1" class="form-control" id="sl" placeholder="SL number for delete" 
                name="sl" >
              </div>
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </div>
      </div>
      </div>
      

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
      <div class="card">
      <?php
        error_reporting(0);
        
        $servername = "localhost"; 
        $username = "root"; 
        $password = "";
        $dbname = "excursionnest"; 

        // Create connection 
        $conn = mysqli_connect($servername, $username, $password, $dbname); 
        // Check connection 
        if(!$conn) 
            { 
                die("Connection failed: " . mysqli_connect_error()); 
            }
             
            $sql = "SELECT * FROM upcoming"; 
            $result = mysqli_query($conn, $sql); 
            echo "<h3 align='center'>Upcoming Possible Trips</h3>";
            echo "<table align = 'Center' border=2px width=750px style= 'margin-top: 40px'>"; 

            echo "<tr height='20px' bgcolor='coral' align='center'>"; 
            echo "<td> <b>Serial No</b></td>
            <td> <b> Departure From </b></td>
            <td> <b>Departure Time</b></td>
            <td> <b>Destination</b></td>
            <td> <b>Return Time</b></td>
            <td> <b>Hotel Name</b></td>
            <td> <b>Cost</b></td>
            <td> <b>Others</b></td>"; 
            echo "</tr>"; 
    
            if (mysqli_num_rows($result) > 0) 
            { 
                 // output data of each row 
                 while($row = mysqli_fetch_assoc($result)) 
                 { 
                     echo "<tr height='20px' bgcolor='wheat' align='center'>"; 
                     echo "<td>" . $row['NUM'] . "</td>";
                     echo "<td>" . $row['StartP'] . "</td>"; 
                     echo "<td>" . $row['StartD'] . "</td>"; 
                     echo "<td>" . $row['togo'] . "</td>";  
                     echo "<td>" . $row['EndIng'] . "</td>"; 
                     echo "<td>" . $row['HOTEL'] . "</td>"; 
                     echo "<td>" . $row['COST'] . "</td>"; 
                     echo "<td>" . $row['Others'] . "</td>";   
                     echo "</tr>"; 
                 } 
            } 
            else 
            { 
                echo "0 results"; 
            } 
            echo "</table>"; 
	
           ?>      

      </div>

      </div>
      </div>
      </div>
          
        <div id="menu1" class="tab-pane fade">
        <h3>Previous Trips</h3>
        <div class="row ">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
        <div class="card">
        <div align ="left">
        <form action="Entry.php" method="post">
            <div class="form-group">
                <label class ="label" for="def" >Departure From:</label>
                <input type="text" class="form-control" id="def" placeholder="Departure From" name="def" required>
              </div>
              <div class="form-group">
                <label class ="label" for="det">Departure Date:</label>
                <input type="date" class="form-control" id="det" placeholder="Departure Time" 
                name="det" required >
              </div>
              <div class="form-group">
                <label class ="label" for="des">Destination:</label>
                <input type="text" class="form-control" id="des" placeholder="Destination Place Name" name="des" required>
              </div>
              <div class="form-group">
                <label  class ="label" for="hotel">Hotel :</label>
                <input type="text" class="form-control" id="hotel" placeholder="Hotel Name" 
                name="hotel" required >
              </div>
              <div class="form-group">
                <label class ="label" for="pers">Persons:</label>
                <input type="number" class="form-control" id="pers" placeholder="Number of Persons" name="pers" min = "1" required>
              </div>
              <div class="form-group">
                <label  class ="label" for="cost">Cost:</label>
                <input type="number" class="form-control" id="cost" placeholder="Total Expense" 
                name="cost" step ='1000' min="1000" required >
              </div>
              <div class="form-group">
                <label class ="label" for="other">Others :</label>
                <input type="text" class="form-control" id="other" placeholder="Additional information" name="other" required>
              </div>
              <div class="form-group">
                <label  class ="label" for="ret">Return Date:</label>
                <input type="date" class="form-control" id="ret" placeholder="Returning Time" 
                name="ret" required >
              </div>
          <button type="submit" class="btn btn-primary"> ADD</button></form>
          <form action="Deletetrip_pre.php" method="post">
              <div class="form-group">
                <label  class ="label" for="sl">Sl No:</label>
                <input type="number" step="1" class="form-control" id="sl" placeholder="SL number for delete" 
                name="sl" >
              </div>
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </div>
      </div>
      </div>
      

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
      <div class="card">
      <?php
        error_reporting(0);
        $servername = "localhost"; 
        $username = "root"; 
        $password = "";
        $dbname = "excursionnest"; 

        // Create connection 
        $conn = mysqli_connect($servername, $username, $password, $dbname); 
        // Check connection 
        if(!$conn) 
            { 
                die("Connection failed: " . mysqli_connect_error()); 
            } 
            $sql = "SELECT * FROM pre"; 
            $result = mysqli_query($conn, $sql); 
            
            echo "<h3 align='center'>Previously Completed Trips</h3>";
            echo "<table align = 'Center' border=2px width=850px style= 'margin-top: 40px'>"; 

            echo "<tr height='20px' bgcolor='coral' align='center'>"; 
            echo "<td> <b>Serial No</b></td>
            <td> <b> Departure From </b></td>
            <td> <b>Departure Time</b></td>
            <td> <b>Destination</b></td>
            <td> <b>Return Time</b></td>
            <td> <b>Hotel Name</b></td>
            <td> <b>Cost</b></td>
            <td> <b>Persons</td> </b>
            <td> <b>Others</b></td>"; 
            echo "</tr>";


    
            if (mysqli_num_rows($result) > 0) 
            { 
                 // output data of each row 
                 while($row = mysqli_fetch_assoc($result)) 
                 { 
                    
                     echo "<tr height='20px' bgcolor='wheat' align='center'>"; 
                     echo "<td>" . $row['NUM'] . "</td>";
                     echo "<td>" . $row['StartP'] . "</td>"; 
                     echo "<td>" . $row['StartD'] . "</td>"; 
                     echo "<td>" . $row['togo'] . "</td>";  
                     echo "<td>" . $row['EndIng'] . "</td>"; 
                     echo "<td>" . $row['HOTEL'] . "</td>"; 
                     echo "<td>" . $row['COST'] . "</td>";
                     echo "<td>" . $row['PERSON'] . "</td>"; 
                     echo "<td>" . $row['Others'] . "</td>";   
                     echo "</tr>"; 
                 } 
            } 
            else 
            { 
                echo "0 results"; 
            } 
            echo "</table>"; 
 
	
           ?>      

      </div>

      </div>
      </div>
      </div>


          
          <div id="menu2" class="tab-pane fade">
            <h3 align ="center" style="margin-top: 80px">Clients Information</h3>
        <?php 
        
		$servername = "localhost"; 
		$username = "root"; 
		$password = "";
		$dbname = "excursionnest"; 
		
		// Create connection 
		$conn = mysqli_connect($servername, $username, $password, $dbname); 
		// Check connection 
		if(!$conn) 
		{ 
			die("Connection failed: " . mysqli_connect_error()); 
		} 
        $sql = "SELECT * FROM user"; 
		$result = mysqli_query($conn, $sql); 
    echo "<table align = 'center' border=2px width=850px style= 'margin-top: 40px'>";
    echo "<tbody bgcolor='wheat'>";
    echo "<tr height='20px' bgcolor='coral' align='center'>"; 
		echo "<th>Name</th>
    <th>Phone</th>
    <th>Mail</th>
    <th>Location</th>"; 
		echo "</tr>"; 

		if (mysqli_num_rows($result) > 0) 
		{ 
			 // output data of each row 
			 while($row = mysqli_fetch_assoc($result)) 
			 { 
				 echo "<tr>"; 
          echo "<td>" . $row['Name'] . "</td>";
				 echo "<td>" . $row['Phone'] . "</td>"; 
				 echo "<td>" . $row['mail'] . "</td>";  
				 echo "<td>" . $row['location'] . "</td>";   
				 echo "</tr>"; 
			 } 
		} 
		else 
		{ 
			echo "0 results"; 
		} 
    echo "</tbody>";
		echo "</table>"; 
		mysqli_close($conn); 
	?>
            
          </div>
          
          <div id="menu3" class="tab-pane fade">
            <h3>Messages</h3>
            
          </div>
</body>
</html> 
