<?php
    session_start();

    include 'db.php';
    $sensorname = $_POST["sensor_name"];
    $unit = $_POST["unit_id"];
    $min = $_POST["min"];
    $max = $_POST["max"];
    $lat = $_POST["lat"];
    $lng = $_POST["lng"];
 
    
    $query = "INSERT INTO sensor (sensor_name, unit_id, min, max, lat, lng) 
                VALUES ('".$sensorname."',".$unit.",".$min.",".$max.",".$lat.",".$lng.");";
    
    if (mysqli_query($con,$query)) {
        header("Location: index.php");
    }
    else {
        header("Location: index.php?addSensor=false");
    }

?>    