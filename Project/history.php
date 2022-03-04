<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
  $m = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * from user where mail= '$m'");
  $row = mysqli_fetch_assoc($result);
} else {
  header("Location: User_Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>History</title>
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
    .card {
      border-radius: 8%;
      background-image: linear-gradient(pink,rebeccapurple);
      box-shadow: 6px 8px 6px black;
    }

    .card:hover {
      box-shadow: 6px 12px 6px pink;
    }

    .form-control {
      width: 40px;
      height: 20px;
    }

    .glow {
      font-size: 40px;
      color: #fff;
      text-align: center;
      animation: glow 1s ease-in-out infinite alternate;
    }

    @-webkit-keyframes glow {
      from {
        text-shadow: 0 0 10px #ff80ff, 0 0 20px #ff66ff, 0 0 30px #ff4dff, 0 0 40px #ff33ff, 0 0 50px #ff33ff, 0 0 60px #ff33ff, 0 0 70px #ff33ff;
      }

      to {
        text-shadow: 0 0 20px #ff1aff, 0 0 30px #ff00ff, 0 0 40px #e600e6, 0 0 50px#e600e6, 0 0 60px #e600e6, 0 0 70px #e600e6, 0 0 80px #e600e6;
      }
    }
  </style>
</head>

<body>
  <div class="sidenav">
    <ul class="nav nav-tabs">
      <li><a class="nav-link" href="profile.php"><i class="fa fa-user-circle"></i> User Profile</a></li>
      <li><a class="nav-link" href="Bookings.php"> <i class="fa fa-location-arrow"></i> Bookings</a></li>
      <li><a class="nav-link" href="cancellation.php"> <i class="fa fa-ban"></i> Cancellations</a></li>
      <li class="active"><a class="nav-link" href="history.php"> <i class="fa fa-history"></i> History</a></li>
      <li><a class="nav-link" href="messages.php"> <i class="fa fa-commenting"></i> Messages</a></li>
      <li><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
    </ul>
  </div>

  <!-- Page content -->
  <div class="main">
    <h1 class="glow" align="center" style="margin: 50px;">Memories</h1>
    <?php
    $query = "SELECT * FROM booked where mail = '$m' AND FLAG=1";
    $query_run = mysqli_query($conn, $query);
    $check = mysqli_num_rows($query_run) > 0;
    if ($check) {
      while ($row = mysqli_fetch_assoc($query_run)) {
    ?>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
          <div class="box-container">
            <div class="card" style="margin-bottom: 15px;">
              <div align="center">
                <h3 style="margin-top: 10px;"><i class="fas fa-map-marker-alt"></i> <?php echo $row['place'] ?></h3>
                <h4 style="margin: 0px;">Starts On: <?php echo $row['StartD'] ?> </h4><br>
                <h4 style="margin: 0px;">Ends On: <?php echo $row['EndIng'] ?> </h4><br>
                <h5 style="margin: 0px;">Hotel Name: <?php echo $row['HOTEL'] ?></h5> <br>
                <h5 style="margin: 0px;">Others: <?php echo $row['Others'] ?></h5> <br>
                <h4 style="margin: 0px;">Persons: <b> <?php echo $row['PERSON'] ?> </b> </h4><br>
                <h4 style="margin: 0px;">Total Cost: <b> <?php echo $row['COST'] ?> </b> </h4><br>
                <form action="cancel.php" method="post">
                  <table style="margin-bottom: 15px;">
                    <tr>
                      <td style="padding-top:7px;">
                        <label class="label" for="num">Trip#</label>
                      </td>
                      <td>
                        <input type="text" value="<?php echo $row['NUM']; ?>" class="form-control" id="num" name="num" readonly>
                      </td>
                    </tr>
                  </table>
                  
                </form>
              </div>

            </div>
          </div>
        </div>
    <?php
      }
    }
    ?>
  </div>





</body>

</html>