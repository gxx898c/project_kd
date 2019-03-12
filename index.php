<?php 
    include 'db.php';
    include "session.php";
    $query = "SELECT a.sensor_id, a.sensor_name, a.unit_id, a.min, a.max, a.lat, a.lng, b.group_id, c.group_name, d.unit_name 
    FROM sensor AS a LEFT JOIN sensorgroup AS b ON a.sensor_id = b.sensor_id 
    LEFT JOIN groupsensor AS c ON b.group_id = c.group_id 
    LEFT JOIN unittype AS d ON a.unit_id = d.unit_id 
    WHERE a.sensor_id IN (SELECT sensor_id FROM sensor_farm WHERE farm_id = ".$_SESSION['farm_id'].")";
    $result = mysqli_query($con,$query);
    $group;
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        if ($row['group_id'] == null){
            $group[-1][] = $row;
        }
        else
            $group[$row['group_id']][] = $row;
    }
    
    
?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="assets/images/icon/map.png">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/metisMenu.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/slicknav.min.css">
        <!-- amchart css -->
        <link
            rel="stylesheet"
            href="https://www.amcharts.com/lib/3/plugins/export/export.css"
            type="text/css"
            media="all"/>
        <!-- others css -->
        <link rel="stylesheet" href="assets/css/typography.css">
        <link rel="stylesheet" href="assets/css/default-css.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <!-- modernizr css -->
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body class="body-bg">
        <!--[if lt IE 8]> <p class="browserupgrade">You are using an
        <strong>outdated</strong> browser. Please <a
        href="http://browsehappy.com/">upgrade your browser</a> to improve your
        experience.</p> <![endif]-->
        <!-- preloader area start -->
        <div id="preloader">
            <div class="loader"></div>
        </div>
        <!-- preloader area end -->
        <!-- main wrapper start -->
        <div class="horizontal-main-wrapper">
            <!-- main header area start -->
            <div class="mainheader-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <div class="dashboard">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                        <!-- profile info & task notification -->
                        <div class="col-md-9 clearfix text-right">
                            <div class="d-md-inline-block d-block mr-md-4">
                                <ul class="notification-area">
                                    <li id="full-view">
                                        <i class="ti-fullscreen"></i>
                                    </li>
                                    <li id="full-view-exit">
                                        <i class="ti-zoom-out"></i>
                                    </li>

                                    <?php   if($_SESSION["role"] == 1) { ?>
                                    <li class="settings-btn">
                                        <i class="fa fa-plus-circle"></i>
                                    </li>
                                    <?php   } ?>

                                </ul>
                            </div>
                            <div class="clearfix d-md-inline-block d-block">
                                <div class="user-profile m-0">
                                    <img
                                        class="avatar user-thumb"
                                        src="assets/images/author/avatar.png"
                                        alt="avatar">
                                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                                        <!-- username -->
                                        <?=$_SESSION["username"]?>
                                        <i class="fa fa-angle-down"></i>
                                    </h4>

                                    <div class="dropdown-menu">
                                        <?php   if($_SESSION["role"] == 1) { ?>
                                        <a class="dropdown-item" href="usermanagement.php">User Management</a>
                                        <?php   } ?>
                                        <a class="dropdown-item" href="choosefarm.php">Choose farm</a>
                                        <a class="dropdown-item" href="logoutProcess.php">Log Out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main header area end -->
            <!-- header area start -->
            <div class="header-area header-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-9  d-none d-lg-block">
                            <div class="horizontal-menu">
                                <nav>
                                    <ul id="nav_menu">
                                        <li>
                                        <li >
                                            <a href="index.php">
                                                <i class="ti-dashboard"></i>
                                                <span>แผงควบคุม</span></a>
                                        </li>
                                    </li>
                                    <li>
                                        <li>
                                            <a href="graph.php">
                                                <i class="ti-pie-chart"></i>
                                                <span>กราฟ</span></a>
                                        </li>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="ti-slice"></i>
                                            <span>icons</span></a>
                                        <ul class="submenu">
                                            <li>
                                                <a href="fontawesome.html">fontawesome icons</a>
                                            </li>
                                            <li>
                                                <a href="themify.html">themify icons</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="maps.php">
                                            <i class="ti-map-alt"></i>
                                            <span>แผนที่</span></a>
                                    </li>
                                    <li>
                                        <a href="sensorinfo.php">
                                            <i class="ti-help"></i>
                                            <span>ข้อมูลเซนเซอร์</span></a>
                                    </li>
                                    <li>
                                        <a href="log.php">
                                            <i class="ti-help"></i>
                                            <span>ประวัติข้อมูล</span></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- nav and search button -->
                    <!-- mobile_menu -->
                    <div class="col-12 d-block d-lg-none">
                        <div id="mobile_menu"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header area end -->
        <!-- page title area end -->
        <div class="main-content-inner">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">ยินดีต้อนรับเช้าสู่
                                <?=$_SESSION['farm_name']?>
                            </h4>

                            <?php  foreach ($group as $value) { ?>
                            <div class="row">
                                <h4 class="header-title pt-3"><?=($value[0]["group_name"]==null)? "ไม่ทราบกลุ่ม" : $value[0]["group_name"] ?></h4>
                            </div>
                            <div class="row">
                                <?php foreach ($value as $row) {
                                    $result2 = mysqli_query($con,"SELECT value FROM log WHERE log_id = (SELECT MAX(log_id) FROM log WHERE sensor_id = ".$row['sensor_id']." )");
                                    $sensor_value;
                                    while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
                                    $sensor_value = $row2['value'];        
                                    }
                                ?>

                                <div class="col-md-3 pt-3">
                                    <div class="card">
                                        <div class="seo-fact sbg1">
                                            <div
                                                class="p-3 d-flex justify-content-between align-items-center"
                                                style="min-height:120px">
                                                <div class="seofct-icon">

                                                    <h2><?=$row["sensor_name"] ?></h2>
                                                </div>
                                                <h2><?=$sensor_value?></h2>
                                            </div>
                                            <div class="p-3 d-flex justify-content-between align-items-center">
                                                <div class="seofct-icon">
                                                    <span><?=$row["group_name"] ?></span></div>
                                                <h5 style="color:white;"><?=$row["unit_name"] ?></h5>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                            <?php }?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by
                    <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- main wrapper start -->
    <!-- offset area start -->
    <?php   if($_SESSION["role"] == 1) { ?>
    <div class="offset-area">
        <div class="offset-close">
            <i class="ti-close"></i>
        </div>
        <ul class="nav offset-menu-tab">
            <li>
                <a class="active" data-toggle="tab" href="#addsensor">เพิ่มเซนเซอร์</a>
            </li>
            <li>
                <a data-toggle="tab" href="#editsensor">แก้ไข</a>
            </li>
        </ul>
        <div class="offset-content tab-content">
            <div id="addsensor" class="tab-pane fade in show active">
                <div>
                    <form action="addSensorProcess.php" method="POST">
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">ชื่อ</label>
                            <input
                                class="form-control"
                                type="text"
                                value=""
                                id="addsenname"
                                name="sensor_name">
                            <label class="col-form-label">หน่วย</label>
                            <select class="custom-select" name="unit_id">
                                <option selected="selected">กรุณาเลือก</option>
                                <?php  
                            $query = "SELECT * FROM unittype"; 
                            $result = mysqli_query($con,$query);
                            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
                                <option value="<?=$row["unit_id"]?>"><?=$row["unit_name"]?></option>
                                <?php } ?>
                            </select>
                            <label class="col-form-label">กลุ่ม</label>
                            <select class="custom-select" name="group_id">
                                <option selected="selected">กรุณาเลือก</option>
                                <?php  
                            $query = "SELECT * FROM groupsensor"; 
                            $result = mysqli_query($con,$query);
                            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
                                <option value="<?=$row["group_id"]?>"><?=$row["group_name"]?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="example-text-input" class="col-form-label">ค่าต่ำสุด</label>
                            <input class="form-control" type="text" value="" id="addmin" name="min">
                        </div>
                        <div class="col-md-6">
                            <label for="example-text-input" class="col-form-label">ค่าสูงสุด</label>
                            <input class="form-control" type="text" value="" id="addmax" name="max">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="example-text-input" class="col-form-label">ละติจูด</label>
                            <input class="form-control" type="text" value="" id="addlat" name="lat">
                        </div>
                        <div class="col-md-6">
                            <label for="example-text-input" class="col-form-label">ลองจิจูด</label>
                            <input class="form-control" type="text" value="" id="addlng" name="lng">
                        </div>
                    </div>
                    <!-- <label for="example-text-input" class="col-form-label">คำอธิบาย</label>
                    <input class="form-control" type="text" value="" id="addinfo" name="username">
                    -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body text-right">
                                <input type="submit" class="btn btn-success" value="บันทึก">
                            </div>
                        </div>
                        <div class="col-md-6 text-left">
                            <div class="card-body">
                                <button type="button" class="btn btn-danger" onclick="cancelfunction()">ล้างค่า</button>
                                <script>
                                    function cancelfunction() {
                                        document
                                            .getElementById("sensor_name")
                                            .value = "";
                                        document
                                            .getElementById("min")
                                            .value = "";
                                        document
                                            .getElementById("max")
                                            .value = "";
                                        document
                                            .getElementById("lat")
                                            .value = "";
                                        document
                                            .getElementById("lng")
                                            .value = "";
                                        // document.getElementById("addinfo").value="";
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div id="editsensor" class="tab-pane fade">
                <div class="offset-settings">
                    <div>
                        <form action="editSensorProcess.php" method="POST">
                            <div class="form-group">
                                <label class="col-form-label">ชื่อ</label>

                                <select class="custom-select" name="sensor_id">
                                    <option selected="selected">กรุณาเลือก</option>
                                    <?php  
                                        $query1 = "SELECT * FROM sensor"; 
                                        $result1 = mysqli_query($con,$query1);
                                        while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC)){ ?>
                                    <option value="<?=$row["sensor_id"]?>"><?=$row["sensor_name"]?></option>
                                    <?php } ?>
                                </select>
                                <label for="example-text-input" class="col-form-label">ชื่อใหม่</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    value=""
                                    id="editSensor_name"
                                    name="editSensor_name">
                                <label class="col-form-label">หน่วย</label>

                                <select class="custom-select" name="editUnit_id">
                                    <option selected="selected">กรุณาเลือก</option>
                                    <?php  
                                        $query2 = "SELECT * FROM unittype"; 
                                        $result2 = mysqli_query($con,$query2);
                                        while($row = mysqli_fetch_array($result2,MYSQLI_ASSOC)){ ?>
                                    <option value="<?=$row["unit_id"]?>"><?=$row["unit_name"]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="example-text-input" class="col-form-label">ค่าต่ำสุด</label>
                                <input class="form-control" type="text" value="" id="editMin" name="editMin">
                            </div>
                            <div class="col-md-6">
                                <label for="example-text-input" class="col-form-label">ค่าสูงสุด</label>
                                <input class="form-control" type="text" value="" id="editMax" name="editMax">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="example-text-input" class="col-form-label">ละติจูด</label>
                                <input class="form-control" type="text" value="" id="editLat" name="editLat">
                            </div>
                            <div class="col-md-6">
                                <label for="example-text-input" class="col-form-label">ลองจิจูด</label>
                                <input class="form-control" type="text" value="" id="editLng" name="editLng">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body text-right">
                                    <input type="submit" class="btn btn-success mb-3" value="ตกลง">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body text-left">
                                    <button type="button" class="btn btn-danger" onclick="cancelfunction1()">ล้างค่า</button>
                                    <script>
                                        function cancelfunction1() {
                                            document
                                                .getElementById("editSensor_name")
                                                .value = "";
                                            document
                                                .getElementById("editMin")
                                                .value = "";
                                            document
                                                .getElementById("editMax")
                                                .value = "";
                                            document
                                                .getElementById("editLat")
                                                .value = "";
                                            document
                                                .getElementById("editLng")
                                                .value = "";
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<!-- offset area end -->
<!-- jquery latest version -->
<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>

<!-- start chart js -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- start highcharts js -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<!-- start amcharts -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/ammap.js"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<!-- all line chart activation -->
<script src="assets/js/line-chart.js"></script>
<!-- all pie chart -->
<script src="assets/js/pie-chart.js"></script>
<!-- all bar chart -->
<script src="assets/js/bar-chart.js"></script>
<!-- all map chart -->
<script src="assets/js/maps.js"></script>
<!-- others plugins -->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/scripts.js"></script>
</body>

</html>