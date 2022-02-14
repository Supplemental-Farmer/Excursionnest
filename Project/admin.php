
<?php
session_start();
$conn = mysqli_connect('localhost','root','','excursionnest');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="styleA.css">

    <title>Admin Login</title>
</head>
<body>
    <div class="container">
        <!--<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">-->
            <div class="jumbotron">
                <a href="Home.php"><h6 align = "center" ><img src="Pictures/hosse.png" ></h6></a>
                    <h2 align="center" style="color:crimson;" ><b>Admin Login</b></h2>
                    </div>
                    <div align ="center">
                        <form method="post">
                            <div class="form-group">
                                <label class ="label" for="mail">E-mail:</label>
                                <input type="text" class="form-control" id="mail" placeholder="Mail" name="mail" required>
                              </div>
                              <div class="form-group">
                                <label  class ="label" for="phone">Password:</label>
                                <input type="password" class="form-control" id="pass" placeholder="Password" name="pass" required >
                              </div>
                              <div class="checkbox" style="padding: 5px;">
                                <label style="color:red;"><input type="checkbox" name="remember"> Remember me</label>
                              </div>
                              <input type="submit" name="login" value="login">
                              </form></div>
                              <?php


if (isset($_POST["login"])) 
{
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $s = mysqli_query($conn,"select * from administrator where mail = '$mail' && password= '$pass'");

    $row = mysqli_fetch_array($s);
    if(is_array($row)){
        if($pass==$row["password"])
       { 
           $_SESSION["mail"]=$row["mail"];
           $_SESSION["pass"]=$row["password"];
           header('location: admin_profile.php');
     }
     else{
         echo '<script type = "text/javascript">';
         echo 'alert("Invalid mail or Password")';
         echo 'window.location.href = "admin.php"';
         echo '</script>';
     } 
    }
    if(isset($_SESSION["mail"])){
        header("Location: admin_profile.php");
    }
}

?>
</body>
</html>
