<!DOCTYPE html>
<html>

<head>
    <title>ExcursionNest</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  
    <div class="container">
    <a class="navbar-brand" href="Home.php">
                    <img src="Pictures/hosse.png">
                </a>
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="Home.php"><i class="fa fa-home"></i> Home</a></li>

                    <li><a href="gallery.html"><i class="fa fa-image"></i> Gallery</a></li>
                    <li><a href="recents.php"><i class="fa fa-list-ul"></i> Recents</a></li>

                    <li><a href="aboutus.html"><i class="fa fa-users"></i> About Us</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="User_Login.php"><i class="fa fa-user"></i> Login</a></li>
                    <li><a href="signup.html"><i class="fa fa-user-plus"></i> SignUp</a></li>
                    <li><a href="admin.html"><i class="fa fa-lock"></i> Admin</a></li>
                </ul>
            </div>
            </div>
    
</nav>
    <div class="container" style="margin-top: 170px;">
        <form action="" method="GET">

            <div class="input-group mb-3">
                <input type="text" class="form-control" value="<?php if (isset($_GET['search'])) {
                                                                    echo $_GET['search'];
                                                                } ?>" name="search" id="search" placeholder="Search for Your Destination eg. Cox's Bazar, St. Martin......." name="search">
                <div class="input-group-btn">

                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-search"></i></button>

                </div>

            </div>

        </form>
    </div>
    <div class="row mx-3 my-5">
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">



                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "excursionnest");
                    if (isset($_GET['search'])) {
                        $filter = $_GET['search'];
                        $query = "SELECT * FROM upcoming WHERE togo LIKE '%$filter%'";
                        $query_run = mysqli_query($conn, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $items) {
                    ?>

<div class="card" style="margin-top: 10px;">
                <div class="card-body">
                                <div class="row mt-4"></div>

                                <div class="col-md-3">
                                    <div class="box-container">
                                        <div class="card" align="center" style="margin-bottom: 15px;">
                                            <img src="<?php echo $items['Pic'] ?>" height="200px" alt="">
                                            <div align="center">
                                                <h3  style="margin-top: 10px;"><i class="	fa fa-map-marker"></i> <?php echo $items['togo'] ?></h3>
                                                <h4 style="margin: 0px;">Start From: <?php echo $items['StartP'] ?> </h4><br>
                                                <div class="price">
                                                    <h4 style="margin-top: 0px;"><?php echo $items['COST'] ?> BDT Per Person</h4>
                                                </div>
                                                <div class="stars" style="margin-top: 0px;">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                       
                        ?>



                </div>


            <?php
                    } else{
            ?>
                <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

                    <table class="table table-bordered" align="center" style="margin-top: 40px;">
                        <tr bgcolor='wheat' align="center">
                            <td colspan="7"> <b>No Upcoming Trips Found!!!!!!!!</b>
                            </td>
                        </tr>
                    </table>
                <?php
                    }
                }
                ?>


                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>