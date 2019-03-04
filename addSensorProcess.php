<?php
    session_start();

    include 'db.php';
    $sensorname = $_POST["sensor_name"];
    $unit = $_POST["unit_id"];
    $group = $_POST["group_id"];
    $farm_id = $_SESSION['farm_id'];
    $min = $_POST["min"];
    $max = $_POST["max"];
    $lat = $_POST["lat"];
    $lng = $_POST["lng"];
    $id = 0;
    
    
    $querysensor = "INSERT INTO sensor (sensor_name, unit_id, min, max, lat, lng) 
                VALUES ('".$sensorname."',".$unit.",".$min.",".$max.",".$lat.",".$lng.");";
    $querysensor_id = "SELECT sensor_id FROM sensor WHERE sensor_name = '".$sensorname."'";
    if (mysqli_query($con,$querysensor)) {
        $result = mysqli_query($con,$querysensor_id);
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $id = $row['sensor_id'];
        }
        $query_sensorgroup = "INSERT INTO sensorgroup (sensor_id, group_id) VALUE (".$id.",".$group.")";
        $query_sensor_farm = "INSERT INTO sensor_farm (farm_id, sensor_id) VALUE (".$farm_id.",".$id.")";
        if(mysqli_query($con,$query_sensorgroup)&&mysqli_query($con,$query_sensor_farm)){
            header("Location: index.php");
        }else{
            header("Location: index.php?addSensor=false");
        }
        
    }
    else {
        header("Location: index.php?addSensor=false");
    }

?>    