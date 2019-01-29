<?php
    session_start();

    include 'db.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "UPDATE user SET password = '".$password."'  WHERE username =  '".$username."'";
    
    if (mysqli_query($con,$query)) {
        header("Location: usermanagement.php");
    }
    else {
        header("Location: usermanagement.php?edit=false");
    }

?>    