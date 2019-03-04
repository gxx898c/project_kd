<?php
    session_start();

    include 'db.php';
    $farmname = $_POST["farm_name"];
    $addfarm = $_POST["chooseUser"];
    $min = $_POST["min"];
    $max = $_POST["max"];
    $lat = $_POST["lat"];
    $lng = $_POST["lng"];
    $id = 0;
 
    

    
    if (mysqli_query($con,$query)) {
        header("Location: choosefarm.php");
    }
    else {
        header("Location: choosefarm.php?addFarm=false");
    }


    $query = "INSERT INTO farm (farm_name, min, max, lat, lng) 
                VALUES ('".$farmname."',".$min.",".$max.",".$lat.",".$lng.");";

    $queryfarm_id = "SELECT farm_id FROM farm WHERE farm_name = '".$farmname."'";



    if (mysqli_query($con,$queryfarm)) {
    $result = mysqli_query($con,$queryfarm_id);
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $id = $row['farm_id'];
    }
    $query_user_acc = "INSERT INTO farm_user_acc (farm_id, user_id)
                VALUE (".$id.",".$addfarm.")";
    if (mysqli_query($con,$query_user_acc)){
    header("Location: choosefarm.php");
    }
    else{
    header("Location: choosefarm.php?addFarm=false".$id.",".$addfarm."");

    }
    }
    else {
    header("Location: choosefarm.php?addFarm=false");
    }
?>    