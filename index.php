<?php 
    include 'db.php';
    include "session.php";
    $query = "SELECT A.sensor_id, A.sensor_name, C.unit_name, D.farm_name, E.username FROM sensor AS A 
                JOIN sensor_farm AS B ON A.sensor_id = B.sensor_id 
                JOIN unittype AS C ON A.unit_id = C.unit_id
                JOIN farm AS D ON B.farm_id = D.farm_id
                JOIN user AS E ON D.farm_id = E.user_id
                WHERE D.farm_id=".$_GET['farm_id'];
    $result = mysqli_query($con,$query);
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
                                            <i class="ti-pie-chart"></i>
                                            <span>Charts</span></a>
                                        <ul class="submenu">
                                            <li>
                                                <a href="barchart.html">bar chart</a>
                                            </li>
                                            <li>
                                                <a href="linechart.html">line Chart</a>
                                            </li>
                                            <li>
                                                <a href="piechart.html">pie chart</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu">
                                        <a href="javascript:void(0)">
                                            <i class="ti-palette"></i>
                                            <span>UI Features</span></a>
                                        <ul class="submenu">
                                            <li>
                                                <a href="accordion.html">Accordion</a>
                                            </li>
                                            <li>
                                                <a href="alert.html">Alert</a>
                                            </li>
                                            <li>
                                                <a href="badge.html">Badge</a>
                                            </li>
                                            <li>
                                                <a href="button.html">Button</a>
                                            </li>
                                            <li>
                                                <a href="button-group.html">Button Group</a>
                                            </li>
                                            <li>
                                                <a href="cards.html">Cards</a>
                                            </li>
                                            <li>
                                                <a href="dropdown.html">Dropdown</a>
                                            </li>
                                            <li>
                                                <a href="list-group.html">List Group</a>
                                            </li>
                                            <li>
                                                <a href="media-object.html">Media Object</a>
                                            </li>
                                            <li>
                                                <a href="modal.html">Modal</a>
                                            </li>
                                            <li>
                                                <a href="pagination.html">Pagination</a>
                                            </li>
                                            <li>
                                                <a href="popovers.html">Popover</a>
                                            </li>
                                            <li>
                                                <a href="progressbar.html">Progressbar</a>
                                            </li>
                                            <li>
                                                <a href="tab.html">Tab</a>
                                            </li>
                                            <li>
                                                <a href="typography.html">Typography</a>
                                            </li>
                                            <li>
                                                <a href="form.html">Form</a>
                                            </li>
                                            <li>
                                                <a href="grid.html">grid system</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu">
                                        <a href="javascript:void(0)">
                                            <i class="ti-layers-alt"></i>
                                            <span>Pages</span></a>
                                        <ul class="submenu">
                                            <li>
                                                <a href="login.html">Login</a>
                                            </li>
                                            <li>
                                                <a href="login2.html">Login 2</a>
                                            </li>
                                            <li>
                                                <a href="login3.html">Login 3</a>
                                            </li>
                                            <li>
                                                <a href="register.html">Register</a>
                                            </li>
                                            <li>
                                                <a href="register2.html">Register 2</a>
                                            </li>
                                            <li>
                                                <a href="register3.html">Register 3</a>
                                            </li>
                                            <li>
                                                <a href="register4.html">Register 4</a>
                                            </li>
                                            <li>
                                                <a href="screenlock.html">Lock Screen</a>
                                            </li>
                                            <li>
                                                <a href="screenlock2.html">Lock Screen 2</a>
                                            </li>
                                            <li>
                                                <a href="reset-pass.html">reset password</a>
                                            </li>
                                            <li>
                                                <a href="pricing.html">Pricing</a>
                                            </li>
                                            <li>
                                                <a href="404.html">Error 404</a>
                                            </li>
                                            <li>
                                                <a href="500.html">Error 500</a>
                                            </li>
                                            <li>
                                                <a href="invoice.html">
                                                    <i class="ti-receipt"></i>
                                                    <span>Invoice Summary</span></a>
                                            </li>
                                        </ul>
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
                                        <a href="javascript:void(0)">
                                            <i class="fa fa-table"></i>
                                            <span>Tables</span></a>
                                        <ul class="submenu">
                                            <li>
                                                <a href="table-basic.html">basic table</a>
                                            </li>
                                            <li>
                                                <a href="table-layout.html">table layout</a>
                                            </li>
                                            <li>
                                                <a href="datatable.html">datatable</a>
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
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">อุปกรณ์ตรวจวัดที่ 1
                            </h4>
                            <div class="row">
                                <?php 
                            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
                            $result2 = mysqli_query($con,"SELECT value FROM log WHERE log_id = (SELECT MAX(log_id) FROM log WHERE sensor_id = ".$row['sensor_id']." )");
                            $sensor_value;
                            while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
                            $sensor_value = $row2['value'];        
                            }
                            ?>
                                <div class="col-md-4 mt-5 mb-3">
                                    <div class="card">
                                        <div class="seo-fact sbg1">
                                            <div class="p-4 d-flex justify-content-between align-items-center">
                                                <div class="seofct-icon">
                                       
                                                    <h2><?=$row["sensor_name"] ?></h2></div>
                                                <h2><?=$sensor_value?></h2>
                                            </div>
                                            <div class="p-4 d-flex justify-content-between align-items-center">
                                                <div class="seofct-icon">
                                                <span><?=$row["farm_name"] ?></span></div>
                                                <h5 style="color:white;"><?=$row["unit_name"] ?></h5>
                                                
                                                
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content-inner">
            <div class="container">
                <div class="row">
                    <!-- Statistics area start -->
                    <div class="col-lg-8 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">User Statistics</h4>
                                <div id="user-statistics"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Statistics area end -->
                    <!-- Advertising area start -->
                    <div class="col-lg-4 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Advertising & Marketing</h4>
                                <canvas id="seolinechart8" height="233"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Advertising area end -->
                    <!-- sales area start -->
                    <div class="col-xl-8 col-lg-8 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Sales</h4>
                                <div id="salesanalytic"></div>
                            </div>
                        </div>
                    </div>
                    <!-- sales area end -->
                    <!-- timeline area start -->
                    <div class="col-xl-4 col-lg-4 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Timeline</h4>
                                <div class="timeline-area">
                                    <div class="timeline-task">
                                        <div class="icon bg1">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="tm-title">
                                            <h4>Rashed sent you an email</h4>
                                            <span class="time">
                                                <i class="ti-time"></i>09:35</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio
                                            itaque at.
                                        </p>
                                    </div>
                                    <div class="timeline-task">
                                        <div class="icon bg2">
                                            <i class="fa fa-exclamation-triangle"></i>
                                        </div>
                                        <div class="tm-title">
                                            <h4>Rashed sent you an email</h4>
                                            <span class="time">
                                                <i class="ti-time"></i>09:35</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio
                                            itaque at.
                                        </p>
                                    </div>
                                    <div class="timeline-task">
                                        <div class="icon bg2">
                                            <i class="fa fa-exclamation-triangle"></i>
                                        </div>
                                        <div class="tm-title">
                                            <h4>Rashed sent you an email</h4>
                                            <span class="time">
                                                <i class="ti-time"></i>09:35</span>
                                        </div>
                                    </div>
                                    <div class="timeline-task">
                                        <div class="icon bg3">
                                            <i class="fa fa-bomb"></i>
                                        </div>
                                        <div class="tm-title">
                                            <h4>Rashed sent you an email</h4>
                                            <span class="time">
                                                <i class="ti-time"></i>09:35</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio
                                            itaque at.
                                        </p>
                                    </div>
                                    <div class="timeline-task">
                                        <div class="icon bg3">
                                            <i class="ti-signal"></i>
                                        </div>
                                        <div class="tm-title">
                                            <h4>Rashed sent you an email</h4>
                                            <span class="time">
                                                <i class="ti-time"></i>09:35</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio
                                            itaque at.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- timeline area end -->
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
                            <input class="form-control" type="text" value="" id="addsenname" name="sensor_name">
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