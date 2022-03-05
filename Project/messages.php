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
    <title>Messages</title>
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
      .glow {
  font-size: 40px;
  color: #fff;
  text-align: center;
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #ffffcc, 0 0 20px #ffffb3, 0 0 30px #ffff99, 0 0 40px #ffff80, 0 0 50px #ffff80, 0 0 60px #ffff80, 0 0 70px #ffff80;
  }
  
  to {
    text-shadow: 0 0 20px #ffff4d, 0 0 30px #ffff33, 0 0 40px #ffff1a, 0 0 50px #ffff1a, 0 0 60px #ffff1a, 0 0 70px #ffff1a, 0 0 80px #ffff1a ;
  }
}

    .label {
      
      color: black;
      font-size: 12px;
    }
    .card{
      height:300px;
      background-color:transparent !important;
      box-shadow: 6px 12px 6px black;
    }
    .form-control{
    width: fit-content;
    margin-top: 10px;
  }
    textarea {
  resize: none;
}
    </style>
</head>
<body style="font-size: 20px;">
<div class="sidenav">
<ul class="nav nav-tabs">
  <li ><a  class= "nav-link" href="profile.php"><i class="fa fa-user-circle"></i> User Profile</a></li>
  <li ><a  class= "nav-link" href="Bookings.php"> <i class="fa fa-location-arrow"></i> Bookings</a></li>
  <li ><a  class= "nav-link" href="cancellation.php"> <i class="fa fa-ban"></i> Cancellations</a></li>
  <li ><a  class= "nav-link" href="history.php"> <i class="fa fa-history"></i> History</a></li>
  <li class="active"><a  class= "nav-link" href="messages.php"> <i class="fa fa-commenting"></i> Messages</a></li>
  <li><a  class= "nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
</ul>
</div>

<!-- Page content -->
<div class="main">
<h1 class="glow" style="margin-top: 50px;" align="center">Message to Admin</h1>
<div class="row mx-3 my-5">
<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3"></div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
<div class="box-container">
            <div class="card" style="margin-bottom: 15px;">
            <div align="center">
            <form action="chat.php" method="post">
                  <table align="center">
                         <tr  align="center">
                          <td>
                            <label class="label" for="mail">Email:</label>
                          </td>
                          <td>
                            <input type="text" style="font-size: 14px;" value="<?php echo $row['mail']; ?>" class="form-control" id="mail" name="mail" readonly>
                          </td>
                          </tr>

                          <tr  align="center">
                          <td>
                            <label class="label" for="name">Name:</label>
                          </td>
                          <td>
                            <input type="text" style="font-size: 14px;" value="<?php echo $row['Name']; ?>" class="form-control" id="name" name="name" readonly>
                          </td>
                          </tr>

                          <tr  align="center">
                          <td>
                          <label class="label" for="msg">Message:</label>
                          </td>
                          <td>
                          <textarea class="form-control" style="font-size: 15px;" rows="5" id="msg" name="msg" required></textarea>
                          </td>
                         </tr>

                          </table>
                          <div class="container bg-light">
                             <div class="col-md-12 text-center">
                             <button style=" margin-top:20px; margin-right:5px;" type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#mymodal<?php echo $row['Phone'] ?>">
            <i class="fas fa-comments"></i>
                </button>
                            <button type="submit" name="send" class="btn btn-warning btn-lg" style="margin-top:20px;" ><i class="fa fa-send"></i> Send</button>
                        </div></div>
                      </form></div>


                <div class="modal" id="mymodal<?php echo $row['Phone'] ?>">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                      <h2>Message From Admin</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <div>
                        <h3> <?php echo $row['rep'] ?> </h3>
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

</div>

          
        

    
</body>
</html>