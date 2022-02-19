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
          $startd = $_POST["date"];
          $hotel = $_POST["req3"];
          $togo = $_POST["req7"];
          $sql = "INSERT INTO booked (mail,p_name,phone,place,span,HOTEL,Others, COST, PERSON) VALUES 
				('$m', '$person','$number','$togo','$startd','$hotel','$oth',$c,$p)";
                
                if (mysqli_query($conn, $sql)) 
                { 
                    header('location: profile.php'); 
                } 
            }
            mysqli_close($conn);

        ?>