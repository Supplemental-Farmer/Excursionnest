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
if(isset($_POST["update"])){
  $na = $_POST["updatedname"];
  $pa = $_POST["updatedpass"];
  $po = $_POST["updatednum"];
  $area = $_POST["updatedarea"];
  mysqli_query($conn,"UPDATE user SET name = '$na', Phone = '$po', Location = '$area', Password = '$pa' WHERE mail='$m'");
  header("Location: profile.php");
}
?>