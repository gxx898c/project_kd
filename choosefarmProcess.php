<?php
    session_start();
    $farm_id = $_GET['farm_id']; //19
    $farm_name = $_GET['farm_name']; //19
    $_SESSION['farm_id'] = $farm_id;
    $_SESSION['farm_name'] = $farm_name;

    header("Location: index.php");




    

?>