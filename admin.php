<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        
        $name= "ExcursionNest";
        $phone= "01313962424";
        $mail= "admin2628@gmail.com";
        $pwd= "Admin2628";
        $location= "Aust";
        
        $s = "select * from administrator where mail = '$mail'";
        $result = mysqli_query($conn,$s);
        
        $n = mysqli_num_rows($result);
        
        if($n==1){
            header('location:signup.html');
        }
        else{
        $sql = "INSERT INTO administrator (Name, Phone ,mail, password,location) VALUES 
                        ('$name', '$phone','$mail', '$pwd', '$location')";
                        
                        if (mysqli_query($conn, $sql)) 
                        { 
                            header('location: Project/admin.html'); 
                        } 
                    }
                    mysqli_close($conn);
    ?>
</body>
</html>