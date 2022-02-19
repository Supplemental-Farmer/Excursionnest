<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $m = $_SESSION["id"];
  $result = mysqli_query($conn,"SELECT * from user where mail= '$m'");
  $row = mysqli_fetch_assoc($result);
  $person = $row["Name"];
  $number = $row["Phone"];
}
else{
  header("Location: User_Login.php");
}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancellations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">

    <style>
        .card{
            background-image: linear-gradient(lightcoral, lightblue);
        }
        .card:hover{
            box-shadow: 6px 12px 6px lightcoral;
        }
        .form-control{
          width : 40px;
          height:20px;
        }

    </style>
  
</head>
<body>
<div class="sidenav">
<ul class="nav nav-tabs">
  <li ><a  class= "nav-link" href="profile.php"><i class="fa fa-user-circle"></i> User Profile</a></li>
  <li ><a  class= "nav-link" href="Bookings.php"> <i class="fa fa-location-arrow"></i> Bookings</a></li>
  <li class="active"><a  class= "nav-link" href="cancellation.php"> <i class="fa fa-ban"></i> Cancellations</a></li>
  <li><a  class= "nav-link" href="history.php"> <i class="fa fa-history"></i> History</a></li>
  <li><a  class= "nav-link" href="messages.php"> <i class="fa fa-commenting"></i> Messages</a></li>
  <li><a  class= "nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
</ul>
</div>

<!-- Page content -->
<div class="main">
<h1 align="center">We prefer not to cancel trips unless any emergency situation occurs</h1>

<div class="row mt-4"></div>
    <?php
    $query = "SELECT * FROM booked where mail = '$m'";
    $query_run = mysqli_query($conn, $query);
    $check = mysqli_num_rows($query_run) > 0;
    if ($check) {
      while ($row = mysqli_fetch_assoc($query_run)) {
    ?>
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
          <div class="box-container">
            <div class="card" style="margin-bottom: 15px;">
              <div align="center">
              <h3 style="margin-top: 10px;"><i class="fas fa-map-marker-alt"></i> <?php echo $row['place']?></h3>
              <h4 style="margin: 0px;">Duration:  <?php echo $row['span']?> </h4><br>
              <h5 style="margin: 0px;">Hotel Name: <?php echo $row['HOTEL']?></h5> <br>
              <h5 style="margin: 0px;">Others: <?php echo $row['Others']?></h5> <br>
              <h4 style="margin: 0px;">Persons: <b> <?php echo $row['PERSON']?> </b> </h4><br>
              <h4 style="margin: 0px;">Total Cost: <b> <?php echo $row['COST']?> </b> </h4><br>
              <form action="cancel.php" method="post">
              <table style="margin-bottom: 15px;">
            <tr>
              <td style="padding-top:7px;">
                <label class ="label" for="num" >Trip#</label>
              </td>
              <td>
              <input type="text" value="<?php echo $row['NUM'];?>" class="form-control" id="num" name="num" readonly>
              </td>
            </tr>
      </table>
  <button type="submit" class="btn btn-danger" name="delete" style="margin-bottom :5px;">
    Cancel
  </button>
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
          </div>      

    
</body>
</html>