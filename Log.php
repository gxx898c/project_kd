<?php 
    include "session.php";
    include 'db.php';
    $log = mysqli_query($con,"SELECT l.log_id, l.sensor_id, l.value, l.time, s.sensor_name, c.group_name, c.group_id
    FROM log AS l
    JOIN sensor AS s ON l.sensor_id = s.sensor_id
    LEFT JOIN sensorgroup AS b ON s.sensor_id = b.sensor_id
    LEFT JOIN groupsensor AS c ON b.group_id = c.group_id");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sensor info</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="body-bg">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
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
                                        <li id="full-view"><i class="ti-fullscreen"></i></li>
                                        <li id="full-view-exit"><i class="ti-zoom-out"></i></li>                        
                                    </ul>
                            </div>
                        <div class="clearfix d-md-inline-block d-block">
                            <div class="user-profile m-0">
                                <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                                    
                                <?=$_SESSION["username"]?>
                                
                                <i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">
                                <?php   if($_SESSION["role"] == 1) { ?>
                                    <a class="dropdown-item" href="usermanagement.php">User Management</a>
                                <?php   } ?>   

                                
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
                                            <li><a href="index.php"><i class="ti-dashboard"></i> <span>แผงควบคุม</span></a></li>
                                    </li>
                                    <li>
                                            <li><a href="graph.php"><i class="ti-pie-chart"></i> <span>กราฟ</span></a></li>
                                    </li>
                                    
                                    <li>
                                        <a href="javascript:void(0)"><i class="ti-slice"></i><span>icons</span></a>
                                        <ul class="submenu">
                                            <li><a href="fontawesome.html">fontawesome icons</a></li>
                                            <li><a href="themify.html">themify icons</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li><a href="maps.php"><i class="ti-map-alt"></i> <span>แผนที่</span></a></li>
                                    <li><a href="sensorinfo.php"><i class="ti-help"></i> <span>ข้อมูลเซนเซอร์</span></a></li>
                                    <li class="active"><a href="Log.php"><i class="ti-help"></i> <span>ประวัติข้อมูล</span></a></li>
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
                <!-- data table start -->
                <div class="col-12 mt-5 ">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="header-title" >ข้อมูลเซนเซอร์</h4>
                            <div class="data-tables text-center" align="center">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อเซนเซอร์</th>
                                    <th scope="col">กลุ่ม</th>
                                    <th scope="col">ข้อมูล</th>
                                    <th scope="col">วัน / เดือน / ปี</th>
                                    </tr>
                                </thead>
                            <tbody>
                            <?php 
                            while($row = mysqli_fetch_array($log,MYSQLI_ASSOC)){ ?>
                                <tr>
                                <td><?=$row["log_id"] ?></td>
                                <td><?=$row["sensor_name"] ?></td>
                                <td><?=$row["group_name"] ?></td>
                                <td><?=$row["value"] ?></td>
                                <td><?=$row["time"] ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- data table end -->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- main wrapper start -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#addsensor">เพิ่มเซนเซอร์</a></li>
            <li><a data-toggle="tab" href="#editsensor">แก้ไข</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="addsensor" class="tab-pane fade in show active">
                <div>
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">ชื่อ</label>
                        <input class="form-control" type="text" value="..." id="example-text-input">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">หน่วย</label>
                        <select class="custom-select">
                            <option selected="selected">กรุณาเลือก</option>
                            <option value="1">องศาเซลเซียส</option>
                            <option value="2">ความชื้นสัมพัทธ์</option>
                            <option value="3">กิโลเมตร/ชั่วโมง</option>
                            <option value="4">UV</option>
                            <option value="4">ลูกบาศก์เซนติเมตร</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-form-label">ค่าต่ำสุด</label>
                        <input class="form-control" type="text" value="..." id="example-text-input">
                    </div>
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-form-label">ค่าสูงสุด</label>
                        <input class="form-control" type="text" value="..." id="example-text-input">
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="example-text-input" class="col-form-label">ละติจูด</label>
                            <input class="form-control" type="text" value="..." id="example-text-input">
                        </div>
                        <div class="col-md-6">
                            <label for="example-text-input" class="col-form-label">ลองจิจูด</label>
                            <input class="form-control" type="text" value="..." id="example-text-input">
                        </div>
                    </div>
                    <label for="example-text-input" class="col-form-label">คำอธิบาย</label>
                    <input class="form-control" type="text" value="..." id="example-text-input">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <button type="button" class="btn btn-success mb-3" >ตกลง</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <button type="button" class="btn btn-danger mb-3" >ยกเลิก</button>
                            </div>
                        </div>
                    </div>        
            </div>
            <div id="editsensor" class="tab-pane fade">
                <div class="offset-settings">
                        <div>
                                <div class="form-group">
                                        <label class="col-form-label">ชื่อ</label>
                                        <select class="custom-select">
                                            <option selected="selected">กรุณาเลือก</option>
                                            <option value="1">ลม1</option>
                                            <option value="2">ชื้น1</option>
                                            <option value="3">น้ำ1</option>
                                            <option value="4">UV1</option>
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label class="col-form-label">หน่วย</label>
                                    <select class="custom-select">
                                        <option selected="selected">กรุณาเลือก</option>
                                        <option value="1">องศาเซลเซียส</option>
                                        <option value="2">ความชื้นสัมพัทธ์</option>
                                        <option value="3">กิโลเมตร/ชั่วโมง</option>
                                        <option value="4">UV</option>
                                        <option value="5">ลูกบาศก์เซนติเมตร</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="example-text-input" class="col-form-label">ค่าต่ำสุด</label>
                                    <input class="form-control" type="text" value="..." id="example-text-input">
                                </div>
                                <div class="col-md-6">
                                    <label for="example-text-input" class="col-form-label">ค่าสูงสุด</label>
                                    <input class="form-control" type="text" value="..." id="example-text-input">
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="example-text-input" class="col-form-label">ละติจูด</label>
                                        <input class="form-control" type="text" value="..." id="example-text-input">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="example-text-input" class="col-form-label">ลองจิจูด</label>
                                        <input class="form-control" type="text" value="..." id="example-text-input">
                                    </div>
                                </div>
                                <label for="example-text-input" class="col-form-label">คำอธิบาย</label>
                                <input class="form-control" type="text" value="..." id="example-text-input">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <button type="button" class="btn btn-success mb-3" >ตกลง</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <button type="button" class="btn btn-danger mb-3" >ยกเลิก</button>
                                        </div>
                                    </div>
                                </div>        
                        </div>
                </div>
            </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
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
