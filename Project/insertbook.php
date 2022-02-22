<?php
        require 'config.php';
        if(!empty($_SESSION["id"])){
            $m = $_SESSION["id"];
            $result = mysqli_query($conn,"SELECT * from user where mail= '$m'");
            $row = mysqli_fetch_assoc($result);
            $person = $row["Name"];
            $number = $row["Phone"];
        }

        if(isset($_POST["calculate"])){
          $oth = $_POST["req4"];
          $p = $_POST["person"];
          $c = $_POST["req1"]*$p;
          $startd = $_POST["date1"];
          $end = $_POST["date2"];
          $hotel = $_POST["req3"];
          $togo = $_POST["req7"];
          $sql = "INSERT INTO booked (mail,p_name,phone,place,StartD,EndIng,HOTEL,Others, COST, PERSON) VALUES 
				('$m', '$person','$number','$togo','$startd','$end','$hotel','$oth',$c,$p)";
                
                if (mysqli_query($conn, $sql)) 
                { 
                    header("location: Bookings.php");
                } 
            }
            mysqli_close($conn);

        ?>