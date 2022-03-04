<?php
require 'config.php';
if(isset($_POST["submit"])){
    $m = $_POST["mail"];
    $p = $_POST["pass"];
    $r = mysqli_query($conn,"SELECT * FROM user WHERE mail='$m'");
    $row = mysqli_fetch_assoc($r);
    if(mysqli_num_rows($r)>0){
        if($p == $row["password"]){
            $_SESSION["login"]=true;
            $_SESSION["id"] = $row["mail"];
            header("Location: profile.php");
        }
        else{
            echo "<script>alert('Wrong Password')</script>";
        }
    }
    else{
        echo "<script>alert ('User Not Registered')</script>";
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Login</title>
    <style>
        body{
	height: 100%;
    background: url("Pictures/back5.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    
}
.form-control{
    width: fit-content;
    margin-top: 10px;
}
.container {
    background-color:transparent !important;
}

.label{
   text-emphasis-color: brown;
} 
.jumbotron{
    position: relative;
    top: 0px;
    padding-top: 60px;
    background-color:transparent !important;
}
    </style>
</head>
<body>
    
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jumbotron">
                <a href="Home.php"><h6 align = "center" ><img src="Pictures/hosse.png" ></h6></a>
                    <h2 align="center" style="color:crimson;" ><b>Login</b></h2>
                    </div>
                    <div align ="center">
                        <form class="" action="" method="post">
                            <table align="center">
                                <tr align="center">
                                    <td>
                                    <label class ="label" for="mail">E-mail:</label>
                                    </td>
                                    <td><input type="text" class="form-control" id="mail" placeholder="Registered Mail" name="mail" height="10px" required >
                                    </td>
                                    </tr>
                                    <tr><br></tr>
                                    <td>
                                    <label  class ="label" for="pass">Password:</label>
                                    </td>
                                    <td><input type="password" class="form-control" id="pass" height="10px" placeholder="Password" name="pass" required >
                                    </td>
                                    </tr>
                            </table>
                            <!-- <div class="form-group">
                                <label class ="label" for="mail">E-mail:</label>
                                <input type="text" class="form-control" id="mail" placeholder="Registered Mail" name="mail" height="10px" required >
                              </div> -->
                              <!-- <div class="form-group">
                                <label  class ="label" for="phone">Password:</label>
                                <input type="password" class="form-control" id="pass" height="10px" placeholder="Password" name="pass" required >
                              </div> -->
                              <div class="checkbox" style="padding: 5px;">
                                <label style="color:red;"><input type="checkbox" name="remember"> Remember me</label>
                              </div>
                              <button type="submit" name="submit" class="btn btn-success">Login</button>
                              </form></div></div>
</body>

</html>