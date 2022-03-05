<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
  $m = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * from user where mail= '$m'");
  $row = mysqli_fetch_assoc($result);
  $person = $row["Name"];
  $number = $row["Phone"];
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
  <title>Bookings</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css">

  <style>
    .card{
            border-radius: 5%;
            background-image: linear-gradient(darkseagreen,plum);
            box-shadow: 6px 8px 6px black;
        }
    .card:hover {
      box-shadow: 6px 12px 6px aqua;
    }
    .form-control{
    width: fit-content;
    margin-top: 10px;
}

    .label {

      color: black;
      font-size: 12px;
    }
    .glow {
  font-size: 40px;
  color: #fff;
  text-align: center;
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #dfbf9f, 0 0 20px #d9b38c, 0 0 30px #d2a679, 0 0 40px #cc9966, 0 0 50px #cc9966, 0 0 60px #cc9966, 0 0 70px #cc9966;
  }
  
  to {
    text-shadow: 0 0 20px #c68c53, 0 0 30px #bf8040, 0 0 40px #ac7339, 0 0 50px#996633, 0 0 60px #996633, 0 0 70px #996633, 0 0 80px #996633 ;
  }
}
  </style>

</head>

<body>
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
    <h1 class="glow" style=" margin:50px;" align="center">Available Trips</h1>
    <div class="row mt-4"></div>
    <?php
    $query = "SELECT * FROM upcoming WHERE FLAG=0";
    $query_run = mysqli_query($conn, $query);
    $check = mysqli_num_rows($query_run) > 0;
    if ($check) {
      while ($row = mysqli_fetch_assoc($query_run)) {
    ?>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
          <div class="box-container">
            <div class="card" style="margin-bottom: 15px;">
              <img src="<?php echo $row['Pic'] ?>" height="200px" alt="" style="border-radius: 5%;">
              <div align="center">
                <h3 style="margin-top: 10px;"><i class="fas fa-map-marker-alt"></i> <?php echo $row['togo'] ?></h3>
                <h4 style="margin: 0px;">Start From: <?php echo $row['StartP'] ?> </h4><br>
                <h5 style="margin: 0px;">Journey Starts on: <?php echo $row['StartD'] ?></h5> <br>
                <h5 style="margin: 0px;">Journey Ends on: <?php echo $row['EndIng'] ?></h5> <br>
                <h4 style="margin: 0px;">Stayover At: <b> <?php echo $row['HOTEL'] ?> </b> </h4><br>
                <h5><?php echo $row['Others'] ?></h5>
                <div class="stars" style="margin-bottom: 8px;">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  
                </div>
                <h4>Trip#<b> <?php echo $row['NUM'] ?> </b> </h4><br>

                <button style="margin-bottom: 10px;" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#mymodal<?php echo $row['NUM'] ?>">
                  Book Now
                </button>


                <div class="modal" id="mymodal<?php echo $row['NUM'] ?>">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title"><?php echo $row['StartP'] . "-" . $row['togo'] ?></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <img src="<?php echo $row['Pic'] ?>" width=100% height=100%>
                        <div>
                          <form action="insertbook.php" method="post">
                            <table style="margin: 15px;">
                              <tr>
                                <td>
                                  <label class="label" for="person">Persons:</label>
                                </td>
                                <td>
                                  <input type="number" min='1' class="form-control" id="person" placeholder="Enter Total Persons" name="person" required>
                                </td>
                              </tr>
                              <tr>
                              <td>
                                <label class="label" for="number">Trip#</label>
                              </td>
                              <td>
                                <input type="number" value="<?php echo $row['NUM']; ?>" class="form-control" id="number"  name="number" readonly>
                              </td>
                              </tr>
                              <tr>
                              <td>
                                <label class="label" for="req1">Cost Per Person:</label>
                              </td>
                              <td>
                                <input type="text" value="<?php echo $row['COST']; ?>" class="form-control" id="req1" placeholder="(If Any....)" name="req1" readonly>
                              </td>
                              </tr>

                              <tr>
                                <td>
                                  <label class="label" for="req7">Place:</label>
                                </td>
                                <td>
                                  <input type="text" value="<?php echo $row['StartP'] . " to " . $row['togo']; ?>" class="form-control" id="req7" placeholder="(If Any....)" name="req7" readonly>
                                </td>
                              </tr>

                              <tr>
                                <td>
                                  <label class="label" for="date">Starts On:</label>
                                </td>
                                <td>
                                  <input type="text" value="<?php echo $row['StartD'];?>" class="form-control" id="date1" placeholder="(If Any....)" name="date1" readonly>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="label" for="date">Ends on:</label>
                                </td>
                                <td>
                                  <input type="text" value="<?php echo  $row['EndIng'];?>" class="form-control" id="date2" placeholder="(If Any....)" name="date2" readonly>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="label" for="req3">Stayover At:</label>
                                </td>
                                <td>
                                  <input type="text" value="<?php echo $row['HOTEL']; ?>" class="form-control" id="req3" placeholder="(If Any....)" name="req3" readonly>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="label" for="req4">Others:</label>
                                </td>
                                <td>
                                  <input type="text" value="<?php echo $row['Others']; ?>" class="form-control" id="req4" placeholder="(If Any....)" name="req4" readonly>
                                </td>

                              </tr>

                            </table>
                            <button type="submit" name="calculate" class="btn btn-success">Book</button>
                          </form>

                        </div>
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">

                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      </div>

                    </div>
                  </div>
                </div>

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