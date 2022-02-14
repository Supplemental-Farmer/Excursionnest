<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<?php

$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "excursionnest"; 

// Create connection 
$conn = mysqli_connect($servername, $username, $password, $dbname); 
// Check connection 
if(!$conn) 
{ 
    die("Connection failed: " . mysqli_connect_error()); 
} 

$mail= $_POST['mail'];
$pass= $_POST['pass'];

$s = "select * from administrator where mail = '$mail' && password= '$pass'";
$result = mysqli_query($conn,$s);

$n = mysqli_num_rows($result);

if($n==1){
    header('location: admin_profile.php');
}
else{
    header('location: admin.html');
                
    }
            mysqli_close($conn);
?>

</body>
</html>