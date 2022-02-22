<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styleTrips.css">
    <title>Recent Trips</title>
    <style>
        .card:hover {
            box-shadow: 6px 8px 6px burlywood, 6px 8px 6px khaki;
        }

        .card {
            border-radius: 5%;
            background-image: linear-gradient(cyan, lightpink);
            font-size: 8px;
            box-shadow: 6px 8px 6px black;
        }
    </style>
</head>
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jumbotron">
                <a href="Home.php">
                    <h6 align="center"><img src="Pictures/hosse.png"></h6>
                </a>
                <h2 align="center" style="color:crimson;"><b>Previously Completed Trips</b></h2>
            </div>
        </div>

        <?php
        $query = "SELECT * FROM upcoming WHERE FLAG=1";
        $query_run = mysqli_query($conn, $query);
        $check = mysqli_num_rows($query_run) > 0;
        if ($check) {

        ?>
            <div class="row" style="justify-content: center;">
                <?php while ($row = mysqli_fetch_assoc($query_run)) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="box-container">
                            <div class="card" style="margin-bottom: 15px;">
                                <img src="<?php echo $row['Pic'] ?>" height="200px" alt="" style="border-radius: 5%;">
                                <div align="center">
                                    <h5 style="margin-top: 10px;"><i class="fa fa-map-marker"></i> <?php echo $row['togo'] ?></h3>
                                        <h6 style="margin: 0px;">Started From: <?php echo $row['StartP'] ?> </h6><br>
                                        <h6 style="margin: 0px;">Span: <b><?php echo $row['StartD']." to ".$row['EndIng'] ?></b></h6> <br>
                                        <h6 style="margin: 0px;">Stayed At: <b> <?php echo $row['HOTEL'] ?> </b> </h6><br>
                                        <h6 style="margin-bottom: 10px;"><?php echo $row['Others']." (Inc.)" ?></h6>
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