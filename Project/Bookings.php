<?php
require 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookings</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body style="color: coral;">
  <div class="sidenav">
    <ul class="nav nav-tabs">
      <li><a class="nav-link" href="profile.php"><i class="fa fa-user-circle"></i> User Profile</a></li>
      <li class="active"><a class="nav-link" href="Bookings.php"> <i class="fa fa-location-arrow"></i> Bookings</a></li>
      <li><a class="nav-link" href="cancellation.php"> <i class="fa fa-ban"></i> Cancellations</a></li>
      <li><a class="nav-link" href="history.php"> <i class="fa fa-history"></i> History</a></li>
      <li><a class="nav-link" href="messages.php"> <i class="fa fa-commenting"></i> Messages</a></li>
      <li><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
    </ul>
  </div>

  <!-- Page content -->

  <div class="main">
    <h1 style="color: black;" align="center">Please find your favourite trip</h1>
    <div class="row mt-4"></div>
    <?php
    $query = "SELECT * FROM upcoming";
    $query_run = mysqli_query($conn, $query);
    $check = mysqli_num_rows($query_run) > 0;
    if ($check) {
      while ($row = mysqli_fetch_assoc($query_run)) {
    ?>
        <div class="col-md-3">
          <div class="box-container">
            <div class="card" style="margin-bottom: 15px;">
              <img src="<?php echo $row['Pic']?>" height="200px" alt="">
              <div align="center">
              <h3 style="margin-top: 10px;"><i class="fas fa-map-marker-alt"></i> <?php echo $row['togo']?></h3>
              <h4 style="margin: 0px;">Start From:  <?php echo $row['StartP']?> </h4><br>
              <h5 style="margin: 0px;">Journey Starts on: <?php echo $row['StartD']?></h5> <br>
              <h5 style="margin: 0px;">Journey Ends on: <?php echo $row['EndIng']?></h5> <br>
              <h4 style="margin: 0px;">Stayover At: <b> <?php echo $row['HOTEL']?> </b> </h4><br>
              <div class="price"> <h4><?php echo $row['COST']?> BDT Per Person</h4>   </div> <br>
              <h5><?php echo $row['Others']?></h5>
              <div class="stars" style="margin-bottom: 8px;">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <a href="#" class="btn btn-success" style="margin-bottom: 8px;"><h3 >Book Now</h3></a>
              </div>
              
            </div>
          </div>
        </div>
    <?php
      }
    }
    ?>



  </div>


  </div>





</body>

</html>
