<?php
    session_start();

    include 'db.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $farminfo = $_POST["farm_info"];
    $query = "INSERT INTO user (username, password, farm_info) VALUES ('".$username."','".$password."','".$farminfo."');";
    
    if (mysqli_query($con,$query)) {
        header("Location: usermanagement.php");
    }
    else {
        header("Location: usermanagement.php?add=false");
    }

?>    