<?php

    include 'db.php';
    
    $user = mysqli_query($con,"SELECT * FROM user");
    while($row = mysqli_fetch_array($user,MYSQLI_ASSOC)){
        echo $row["username"];
    }
?>