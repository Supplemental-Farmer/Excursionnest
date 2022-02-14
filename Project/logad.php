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
else{
if (isset($_POST["submit"])) 
{
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $s = "select * from administrator where mail = '$mail' && password= '$pass'";
    $result = mysqli_query($conn,$s);

    // $n = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){
        if($pass==$row["password"])
       { 
           $_SESSION["login"]=true;
           $_SESSION["id"]=$row["Phone"];
           header('location: admin_profile.php');
     } 
    }
    else{
        echo "Login Failed";
    }
}
else{
    echo "No Submit";
}
}

            mysqli_close($conn);
?>