
<?php
require 'config.php';
if(isset($_POST["submit"])){
    $m = $_POST["mail"];
    $p = $_POST["pass"];
    $r = mysqli_query($conn,"SELECT * FROM administrator WHERE mail='$m'");
    $row = mysqli_fetch_assoc($r);
    if(mysqli_num_rows($r)>0){
        if($p == $row["password"]){
            $_SESSION["login"]=true;
            $_SESSION["id"] = $row["mail"];
            header("Location: admin_profile.php");
        }
        else{
            echo "<script>alert('Wrong Password')</script>";
        }
    }
    else{
        echo "<script>alert ('Unregistered Admin')</script>";
        
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

    <link rel="stylesheet" type="text/css" href="styleA.css">


    <title>Admin Login</title>
    <style>
        .form-control{
    width: fit-content;
    margin-top: 10px;
}
    </style>
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
                        <table align="center">
                                <tr align="center">
                                    <td>
                                    <label class ="label" for="mail">E-mail:</label>
                                    </td>
                                    <td><input type="text" class="form-control" id="mail" placeholder="Mail" name="mail" required>
                                    </td>
                                    </tr>
                                    <tr><br></tr>
                                    <td>
                                    <label  class ="label" for="pass">Password:</label>
                                    </td>
                                    <td><input type="password" class="form-control" id="pass" placeholder="Password" name="pass" required >
                                    </td>
                                    </tr>
                            </table>


                              <div class="checkbox" style="padding: 5px;">
                                <label style="color:red;"><input type="checkbox" name="remember"> Remember me</label>
                              </div>
                              <button type="submit" class="btn btn-success" name="submit">Login</button>
                              </form></div>
</body>
</html>
