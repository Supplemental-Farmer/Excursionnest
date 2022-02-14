<?php

session_start();
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
    $sql = "INSERT INTO pre (StartP, StartD ,togo, EndIng,HOTEL,Others,COST,PERSON) VALUES
    ('$_POST[def]', '$_POST[det]','$_POST[des]','$_POST[ret]', '$_POST[hotel]', '$_POST[other]','$_POST[cost]','$_POST[pers]')";
                
                if (mysqli_query($conn, $sql)) 
                { 
                    // 
                    header('location: admin_profile.php'); 
                } 
            }
            mysqli_close($conn);

?>