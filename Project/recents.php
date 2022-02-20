<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styleTrips.css">
    <title>Recent Trips</title>
    <style>
        .card:hover{
            box-shadow: 6px 8px 6px burlywood,6px 8px 6px khaki;
        }

        .card{
            background-color: linear-gradient(hotpink,khaki);
            font-size: 8px;
            box-shadow: 6px 8px 6px black;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jumbotron">
                <a href="Home.php">
                    <h6 align="center"><img src="Pictures/hosse.png"></h6>
                </a>
                <h2 align="center" style="color:crimson;"><b>Previously Completed Trips</b></h2>

                <?php
                //error_reporting(0);
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "excursionnest";

                // Create connection 
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection 
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $sql = "SELECT * FROM pre";
                $result = mysqli_query($conn, $sql);
                // echo "<table align = 'Center' border=5px width=1000px style= 'margin-top: 40px'>";
                // echo "<tr height='20px' bgcolor='coral' align='center'>";
                // echo "<td> <b> Departure From </b></td>
                //         <td> <b> Departure Time </b></td>
                //         <td> <b> Destination </b></td>
                //         <td> <b> Return Time </b></td>
                //         <td> <b> Hotel Name </b></td>
                //         <td> <b> Cost </b></td>
                //         <td> <b> Persons </b></td>
                //         <td> <b> Others </b></td>";
                // echo "</tr>";

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row 
                    ?>
                    <div align="center">
                    <div class="card-group" style="justify-content: center;margin-top: 50px;">
                        <?php
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                    
                        <div class="card" style="max-width: 18rem;background-color: peachpuff; margin: 10px;">
                            <div class="card-body">
                                <h5 class="card-header"><?php echo $row['StartP']."-".$row['togo'];?></h5>
                                <p class="card-text" style="margin-bottom: 5px;">
                                    <h6 style="margin: 0px;">Date: <b><?php echo $row['StartD']." to ".$row['EndIng'];?></b></h6>
                                    <h6 style="margin: 0px;">Stayed in: <b><?php echo $row['HOTEL']?></b></h6>
                                    <h6 style="margin: 0px;">Cost Per Person: <b> <?php echo $row['COST']?></b></h6>
                                    <h6 style="margin: 0px;"> Number of Persons:<b> <?php echo $row['PERSON']?></b></h6>
                                    <h6>Included: <b><?php echo $row['Others'];?></b></h6>
                                    </p>
                            </div>
                            </div>
                            
                            <!-- echo "<tr height='20px' bgcolor='white' align='center'>"; 
                                 echo "<td>" . $row['StartP'] . "</td>"; 
                                 echo "<td>" . $row['StartD'] . "</td>"; 
                                 echo "<td>" . $row['togo'] . "</td>";  
                                 echo "<td>" . $row['EndIng'] . "</td>"; 
                                 echo "<td>" . $row['HOTEL'] . "</td>"; 
                                 echo "<td>" . $row['COST'] . "</td>"; 
                                 echo "<td>" . $row['PERSON'] . "</td>"; 
                                 echo "<td>" . $row['Others'] . "</td>";   
                                 echo "</tr>";  -->
                    <?php
                    }
                } else {
                    echo "0 results";
                 }
                // echo "</table>";


                    ?>
                        
                    
            </div>
</body>

</html>