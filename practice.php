<?php
require 'Project/config.php';
if(isset($_POST['upload'])){
$file = $_FILES['image']['name'];

$query = "INSERT INTO upload(image) values ('$file')";
$res = mysqli_query($conn,$query);
if($res){
    move_uploaded_file($_FILES['image']['tmp_name'],"$file");
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image</title>
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center" >UPLOAD IMAGE</h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="image" id="" class="form-control">
                        <input type="submit" name="upload" value="Upload" class="btn btn-success my-3">
                    </form>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center" >Display Image</h3>
                    <?php
      $sel = "SELECT * FROM upload";
      $que = mysqli_query($conn,$sel);
      $output = "";
      if(mysqli_num_rows($que)<1){
          $output.= "<h3 class= 'text-center' >No image Uploaded</h3>";
      }
      while($row = mysqli_fetch_array($que)){
        $output .= "<img src='".$row['image']."' class = 'my-3' style=width:400;height:400;'>";
      }
      echo $output;
      ?>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>