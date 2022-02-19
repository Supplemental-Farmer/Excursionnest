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
if(isset($_POST["delete"])){
    $n = $_POST["num"];
  mysqli_query($conn,"DELETE FROM booked WHERE NUM= $n");
  header("Location: cancellation.php");
}
?>