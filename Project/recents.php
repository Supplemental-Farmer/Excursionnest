<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

     <link rel="stylesheet" type="text/css" href="styleTrips.css">
    <title>Recent Trips</title>
</head>
<body>
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jumbotron">
                <a href="Home.php"><h6 align = "center" ><img src="Pictures/hosse.png" ></h6></a>
                    <h2 align="center" style="color:crimson;" ><b>Previously Completed Trips</b></h2>

                    <?php
                    //error_reporting(0);
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
                        echo "<table align = 'Center' border=5px width=1000px style= 'margin-top: 40px'>"; 
                        echo "<tr height='20px' bgcolor='coral' align='center'>"; 
                        echo "<td> <b> Departure From </b></td>
                        <td> <b> Departure Time </b></td>
                        <td> <b> Destination </b></td>
                        <td> <b> Return Time </b></td>
                        <td> <b> Hotel Name </b></td>
                        <td> <b> Cost </b></td>
                        <td> <b> Persons </b></td>
                        <td> <b> Others </b></td>"; 
                        echo "</tr>"; 
                
                        if (mysqli_num_rows($result) > 0) 
                        { 
                             // output data of each row 
                             while($row = mysqli_fetch_assoc($result)) 
                             { 
                                 echo "<tr height='20px' bgcolor='white' align='center'>"; 
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
</body>
</html>