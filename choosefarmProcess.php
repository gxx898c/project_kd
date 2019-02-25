<?php

    include 'db.php';
    include 'session.php';
    $farmname = $_POST["farm_name"];
    $lat = $_POST["lat"];
    $lng = $_POST["lng"];
    
    $id = 0;
    
    $queryfarm = "INSERT INTO farm (farm_name, lat, lng) 
                VALUES ('".$farmname."',".$lat.",".$lng.");";
    $queryfarm_id = "SELECT farm_id FROM farm WHERE farm_name = '".$farmname."'";

    
    
    if (mysqli_query($con,$queryfarm)) {
        $result = mysqli_query($con,$queryfarm_id);
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
       $id = $row['farm_id'];
    }
        $query_user_acc = "INSERT INTO farm_user_acc (farm_id, user_id)
                        VALUE (".$id.",".$_SESSION["user_id"].")";
        if (mysqli_query($con,$query_user_acc)){
            header("Location: choosefarm.php");
        }
        else{
            header("Location: choosefarm.php?addFarm=false".$id.",".$_SESSION["user_id"]."");

        }
    }
    else {
        header("Location: choosefarm.php?addFarm=false");
    }

?>    