<?php
        require 'config.php';
        if(!empty($_SESSION["id"])){
            $m = $_SESSION["id"];
            $result = mysqli_query($conn,"SELECT * from user where mail= '$m'");
            $row = mysqli_fetch_assoc($result);
            $person = $row["Name"];
        }

        if(isset($_POST["reply"])){
          $msg = $_POST["amsg"];
          $sql = "UPDATE user SET rep= '$msg' WHERE mail='$m'";
                
                if (mysqli_query($conn, $sql)) 
                { 
                    header('location: admin_profile.php'); 
                } 
            }
            mysqli_close($conn);

        ?>