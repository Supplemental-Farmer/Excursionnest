<?php
require 'config.php';
$_SESSION=[];
session_unset();
session_destroy();
header("Location: User_Login.php")
?>