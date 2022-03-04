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
    if(isset($_POST['submit'])){
        $file = $_FILES['image']['name'];
        
        $query = "INSERT INTO upcoming (StartP, StartD ,togo, EndIng,HOTEL,Others,COST,Pic) values ('$_POST[def]', '$_POST[det]','$_POST[des]','$_POST[ret]', '$_POST[hotel]', '$_POST[other]','$_POST[cost]','$file')";
        $res = mysqli_query($conn,$query);
        if($res){
            move_uploaded_file($_FILES['image']['tmp_name'],"$file");
        }
        header('location: admin_profile.php');
        }

    if (isset($_POST['update'])) {
        $n = $_POST["sl"];

        $query = "UPDATE upcoming SET HOTEL='$_POST[hotel]',Others='$_POST[other]',COST= '$_POST[cost]' WHERE NUM = $n";
        $sql3 = "DELETE FROM booked WHERE NUM = $n";
        $res = mysqli_query($conn, $query);
        if ($res) {
            if (mysqli_query($conn, $sql3))
                    {
                        header('location: admin_profile.php');
                    }
        }
    }
    if (isset($_POST['delete'])) {
        $n = $_POST["sl"];
        $sql = "DELETE FROM upcoming WHERE NUM = $n";
        $sql2 = "DELETE FROM booked WHERE NUM = $n";

        if (mysqli_query($conn, $sql)) {
            if (mysqli_query($conn, $sql2)) {
                header('location: admin_profile.php');
            }
        }
    }
}


mysqli_close($conn);

?>