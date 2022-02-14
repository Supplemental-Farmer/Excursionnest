<!DOCTYPE html>
<html>
<head>
    <title>ExcursionNest</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    
    <nav class="navbar navbar-default">
        
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
            <a class="navbar-brand" href="Home.php">
                <img src="Pictures/hosse.png">
              </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active"><a href="Home.php"><i class="fa fa-home"></i>  Home</a></li>
            
            <li ><a href="gallery.html"><i class="fa fa-image"></i>  Gallery</a></li>
            <li ><a href="recents.php"><i class="fa fa-list-ul"></i> Recents</a></li>
            
            <li ><a href="aboutus.html"><i class="fa fa-users"></i>  About Us</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li ><a href="User_Login.php"><i class="fa fa-user"></i>  Login</a></li>
            <li ><a href="signup.html"><i class="fa fa-user-plus"></i>  SignUp</a></li>
            <li ><a href="admin.html"><i class="fa fa-lock"></i>  Admin</a></li>
          </ul>
        </div>
        </nav>
        
        <!-- <div class="row">
            <div class="col-xs-4 col-sm-6 col-md-6 col - lg - 12">
                <div class="bg">

                </div>
            </div>
        </div> -->
        <div class="container" style="margin-top: 170px;">
            <form action="" method="GET">
                
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" name="search" id="search" placeholder="Search for Your Destination eg. Cox's Bazar, St. Martin......." name="search">
                    <div class="input-group-btn">
                        
                        <button type="submit" class="btn btn-default">
                            <i class= "glyphicon glyphicon-search"></i></button>
                        
                    </div>
                
                </div>
                
            </form>
        </div>
        <div class="row mx-3 my-5">
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="card mt-20">
                <div class="card-body">
                
                
                
                    <?php
                        $conn = mysqli_connect("localhost","root","","excursionnest");
                        if(isset($_GET['search'])){
                            $filter=$_GET['search'];
                            $query = "SELECT * FROM upcoming WHERE togo LIKE '%$filter%'";
                            $query_run = mysqli_query($conn,$query);
                            if(mysqli_num_rows($query_run)>0){
                                foreach($query_run as $items){
                                    ?>
                                    <table class = "table table-bordered" align="center" style="margin-top: 40px;">
                
                <tr height='10px' bgcolor="coral" align="center"> 
                <td> <b> Departure From </b></td>
                <td> <b>Departure Time</b></td>
                <td> <b>Destination</b></td>
                <td> <b>Return Time</b></td>
                <td> <b>Hotel Name</b></td>
                <td> <b>Cost</b></td>
                <td> <b>Others</b></td>
                 </tr>
                                    <tr bgcolor='wheat' align="center">
                                    <td><?=$items['StartP']?></td>
                                    <td><?=$items['StartD']?></td>
                                    <td><?=$items['togo']?></td>
                                    <td><?=$items['EndIng']?></td>
                                    <td><?=$items['HOTEL']?></td>
                                    <td><?=$items['COST']?></td>
                                    <td><?=$items['Others']?></td>
                                    </tr>
                                    </table>

                                    <?php
                                }
                            }
                            else{
                                ?>
                                <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                
                                <table class = "table table-bordered" align="center" style="margin-top: 40px;">
                                    <tr bgcolor='wheat' align="center">
                                    <td colspan="7"> <b>No Upcoming Trips Found!!!!!!!!</b>
                                    </td></tr></table>
                                <?php
                            }
                        }?>
                
                
                </div>
            </div>
        </div>
        </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>