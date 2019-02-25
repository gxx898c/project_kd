<?php
    session_start();

    include 'db.php';
    $sensorname = $_POST["editSensor_name"];
    $unit = $_POST["editUnit_id"];
    $sensorid = $_POST["sensor_id"];
    $min = $_POST["editMin"];
    $max = $_POST["editMax"];
    $lat = $_POST["editLat"];
    $lng = $_POST["editLng"];
 
    
    $query = "UPDATE sensor SET sensor_name = '".$sensorname."',unit_id= ".$unit.",min=".$min.", max=".$max.",lat=".$lat.",lng=".$lng." WHERE sensor_id = ".$sensorid; 
                
    if (mysqli_query($con,$query)) {
        header("Location: index.php");
    }
    else {
        header("Location: index.php?addSensor=false");
    }

?>    