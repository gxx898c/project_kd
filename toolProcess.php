<?php
    session_start(
        
    );

    include 'db.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT role FROM user WHERE username = '".$username."' AND password = '".$password."'";
    
    $result = mysqli_query($con,$query);

   
    if (!$result || mysqli_num_rows($result) == 0){
        header("Location: login.php?login=false");
    }
    else {
        $_SESSION["username"] = $username;
        header("Location: index.php");
    }

    

?>    