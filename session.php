<?php
    session_start();
    include 'db.php';

    $username = $_SESSION["username"];
    $query = "SELECT username FROM user WHERE username = '".$username."'";
    
    $result = mysqli_query($con,$query);

   
    if (!$result || mysqli_num_rows($result) == 0){
       header("Location: login.php");
    }
    
?>