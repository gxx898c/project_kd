<?php
    session_start(
        
    );

    include 'db.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT username, role FROM user WHERE username = '".$username."' AND password = '".$password."'";
    
    $result = mysqli_query($con,$query);

   
    if (!$result || mysqli_num_rows($result) == 0){
        header("Location: login.php?login=false");
    }
    else {
        $_SESSION["username"] = $username;

        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $_SESSION["role"] = $row["role"];
        }
        header("Location: index.php");
    }

    

?>    

    