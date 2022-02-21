<?php
        require 'config.php';
        if(!empty($_SESSION["id"])){
            $m = $_SESSION["id"];
            $result = mysqli_query($conn,"SELECT * from user where mail= '$m'");
            $row = mysqli_fetch_assoc($result);
            $person = $row["Name"];
        }

        if(isset($_POST["send"])){
          $msg = $_POST["msg"];
          $sql = "UPDATE user SET Msg= '$msg',rep=NULL WHERE mail='$m' AND Name='$person'";
                
                if (mysqli_query($conn, $sql)) 
                { 
                    header('location: messages.php'); 
                } 
            }
            mysqli_close($conn);

        ?>