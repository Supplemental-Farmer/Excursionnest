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
<?php
if(isset($_POST["update"])){
    $na = $_POST["updatedname"];
    $pa = $_POST["updatedpass"];
    $po = $_POST["updatednum"];
    $area = $_POST["updatedarea"];
    $r = mysqli_query($conn,"UPDATE user SET name = '$na', Phone = '$po', Location = '$area', Password = '$pa' WHERE mail='$m'");
    
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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <!-- <style>
    .form-control{
    width: fit-content;
    margin-top: 10px;
}</style> -->
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
<div class="jumbotron">
                <a href="Home.php"><h6 align = "center" ><img src="Pictures/hosse.png" ></h6></a>
<h2 align="center">Welcome <?php echo $row["Name"] ?></h2>
<h3 align="center">Mail:  <?php echo $row["mail"] ?></h1>

<div class="row">
  <div class="col" align="center">
    <form action="" method="POST">
      <?php
        $sql = "SELECT * FROM user WHERE mail='$m'";
        $new = mysqli_query($conn,$sql);
        if(mysqli_num_rows($new)>0){
          while($row = mysqli_fetch_array($new)){
            ?>
            <table align="center">
              <tr align="center">
                <td>
                <label class ="label" for="updatedname">Name:</label>
                </td>
                <td>
                <input type="text" name="updatedname" class="form-control" value="<?php echo $row["Name"];?>">  
                </td>
              </tr>
              <!-- <tr align="center">
                <td>
                <label class ="label" for="updatedmail">Email:</label>
                </td>
                <td>
                <input type="email" name="updatedmail" class="form-control" value="<?php echo $row['mail'];?>">
                </td>
              </tr> -->

              <tr align="center">
                <td>
                <label class ="label" for="updatednum">Phone:</label>
                </td>
                <td>
                <input type="text" name="updatednum" class="form-control" value="<?php echo $row['Phone'];?>">
                </td>
              </tr>

              <tr align="center">
                <td>
                <label class ="label" for="updatedarea">Location:</label>
                </td>
                <td>
        <input type="text" name="updatedarea" class="form-control" value="<?php echo $row['location'];?>">
                </td>
              </tr>

              <tr align="center">
                <td>
                <label class ="label" for="updatedpass">Password:</label>
                </td>
                <td>
                <input type="password" name="updatedpass" class="form-control" value="<?php echo $row['password'];?>">
                </td>
              </tr>
      

      
        
      </table>
      <input type="submit" name="update" class="btn btn-info" style="margin-top: 10px;" value="Update">
            <?php
          }
        }
      ?>
      <!-- <div class="form-group">
        <input type="text" name="updatedname" class="form-control" value="">
      </div>
      <div class="form-group">
        <input type="email" name="updatedmail" class="form-control" value="">
      </div>
      <div class="form-group">
        <input type="text" name="updatednum" class="form-control" value="">
      </div>
      <div class="form-group">
        <input type="text" name="updatedarea" class="form-control" value="">
      </div>
      <div class="form-group">
        <input type="password" name="updatedpass" class="form-control" value="">
      </div>

      <div class="form-group">
        <input type="submit" name="update" class="btn btn-info" value="Update">
      </div> -->

    </form>
  </div>
</div></div>

<!-- <div class="container">
  
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-user-circle"></i> User Profile</a></li>
            <li><a data-toggle="tab" href="#menu0"><i class="fa fa-location-arrow"></i> Booking</a></li>
          <li><a data-toggle="tab" href="#menu1"><i class="fa fa-ban"></i> Cancellation</a></li>
          <li><a data-toggle="tab" href="#menu2"><i class="fa fa-history"></i> History</a></li>
          <li><a data-toggle="tab" href="#menu3"><i class="fa fa-commenting"></i> Messages</a></li>
        </ul>
        
        <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3 align='center'>User Profile</h3>
            
          </div>

      <div id="menu0" class="tab-pane fade">
            <h3 align='center'>Bookings</h3>
            
          </div>
          <div id="menu1" class="tab-pane fade">
            <h3 align='center'>Cancellations</h3>
            
          </div>
          <div id="menu2" class="tab-pane fade">
            <h3 align='center'>History</h3>
            
          </div>
          <div id="menu3" class="tab-pane fade">
            <h3 align='center'>Messages</h3>
            
          </div></div></div> -->


        </div>

          
        

    
</body>
</html>