<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $m = $_SESSION["id"];
  $result = mysqli_query($conn,"SELECT * from user where mail= '$m'");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: User_Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
    .glow {
  font-size: 40px;
  color: #fff;
  text-align: center;
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #99ff99, 0 0 20px #80ff80, 0 0 30px #66ff66, 0 0 40px #4dff4d, 0 0 50px #4dff4d, 0 0 60px #4dff4d, 0 0 70px #4dff4d;
  }
  
  to {
    text-shadow: 0 0 20px #33ff33, 0 0 30px #1aff1a, 0 0 40px #00ff00, 0 0 50px#00e600, 0 0 60px #00e600, 0 0 70px #00e600, 0 0 80px #00e600 ;
  }
}
.form-control{
  border-width: 5px;
  border-color: lightgreen;
  font-size: 15px;
}
.label{
  font-size: 12px;
  margin-top: 60px;
}

.card{
  width: auto;
  background-color: transparent; 
  margin-top: 60px;
  box-shadow: 6px 8px 6px black;
}
</style>
</head>
<body background="white">
<div class="sidenav">
<ul class="nav nav-tabs">
  <li class="active"><a href="profile.php"><i class="fa fa-user-circle"></i> User Profile</a></li>
  <li><a class= "nav-link" href="Bookings.php"> <i class="fa fa-location-arrow"></i> Bookings</a></li>
  <li><a class= "nav-link" href="cancellation.php"> <i class="fa fa-ban"></i> Cancellations</a></li>
  <li><a class= "nav-link" href="history.php"> <i class="fa fa-history"></i> History</a></li>
  <li><a class= "nav-link" href="messages.php"> <i class="fa fa-commenting"></i> Messages</a></li>
  <li><a class= "nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
</ul>
</div>

<!-- Page content -->
<div class="main">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
  <div class="box-container">
<div class="jumbotron" style="margin-top: 30px;">
                <a href="Home.php"><h6 align = "center" ><img src="Pictures/hosse.png" ></h6></a>
<h2 class="glow" align="center" style="margin-top: 20px;">Welcome <?php echo $row["Name"] ?></h2>
</div>
<div class="row">
<div class="col-xs-0 col-sm-0 col-md-0 col-lg-4" align="center"></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4" align="center">
  <div class="card">
                
                
              
    <form action="update.php" method="POST">
      <?php
        $sql = "SELECT * FROM user WHERE mail='$m'";
        $new = mysqli_query($conn,$sql);

        if(mysqli_num_rows($new)>0){
          while($row = mysqli_fetch_array($new)){
            ?>
            
                <label class ="label" for="updatedmail" >Mail:</label>
                
                <input type="text" style="margin-bottom: 16px;margin-top: 5px;" name="updatedmail" class="form-control" value="<?php echo $row["mail"] ;?>" readonly>  
                
                <label class ="label" for="updatedname">Name:</label>
                
                <input type="text" style="margin-bottom: 16px;margin-top: 5px;" name="updatedname" class="form-control" value="<?php echo $row["Name"];?>" required>  
                
                <label class ="label" for="updatednum">Phone:</label>
                
                <input type="text" style="margin-bottom: 16px;margin-top: 5px;" name="updatednum" class="form-control" value="<?php echo $row['Phone'];?>" required>
                
                <label class ="label" for="updatedarea">Location:</label>
              
                <input type="text" style="margin-bottom: 16px;margin-top: 5px;" name="updatedarea" class="form-control" value="<?php echo $row['location'];?>" required>
                
                <label class ="label" for="updatedpass">Password:</label>
                
                
                <input type="password" style="margin-bottom: 16px;margin-top: 5px;" name="updatedpass" class="form-control" value="<?php echo $row['password'];?>" required>
                
                <input type="submit" name="update" class="btn btn-info btn-lg" style="margin-top: 20px;margin-bottom: 10px;" value="Update">
            <?php
            
          }
        }
      ?>

    </form>
    </div>
  </div>
</div></div>
        </div> </div>
</body>
</html>