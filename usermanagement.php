<?php 
    include "session.php";
    include 'db.php';
    
    $user = mysqli_query($con,"SELECT * FROM user");
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
                                    <a class="dropdown-item" href="usermanagement.php">User Management</a>
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
                                        <a href="javascript:void(0)"><i class="ti-pie-chart"></i><span>Charts</span></a>
                                        <ul class="submenu">
                                            <li><a href="barchart.html">bar chart</a></li>
                                            <li><a href="linechart.html">line Chart</a></li>
                                            <li><a href="piechart.html">pie chart</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu">
                                        <a href="javascript:void(0)"><i class="ti-palette"></i><span>UI Features</span></a>
                                        <ul class="submenu">
                                            <li><a href="accordion.html">Accordion</a></li>
                                            <li><a href="alert.html">Alert</a></li>
                                            <li><a href="badge.html">Badge</a></li>
                                            <li><a href="button.html">Button</a></li>
                                            <li><a href="button-group.html">Button Group</a></li>
                                            <li><a href="cards.html">Cards</a></li>
                                            <li><a href="dropdown.html">Dropdown</a></li>
                                            <li><a href="list-group.html">List Group</a></li>
                                            <li><a href="media-object.html">Media Object</a></li>
                                            <li><a href="modal.html">Modal</a></li>
                                            <li><a href="pagination.html">Pagination</a></li>
                                            <li><a href="popovers.html">Popover</a></li>
                                            <li><a href="progressbar.html">Progressbar</a></li>
                                            <li><a href="tab.html">Tab</a></li>
                                            <li><a href="typography.html">Typography</a></li>
                                            <li><a href="form.html">Form</a></li>
                                            <li><a href="grid.html">grid system</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu">
                                        <a href="javascript:void(0)"><i class="ti-layers-alt"></i> <span>Pages</span></a>
                                        <ul class="submenu">
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="login2.html">Login 2</a></li>
                                            <li><a href="login3.html">Login 3</a></li>
                                            <li><a href="register.html">Register</a></li>
                                            <li><a href="register2.html">Register 2</a></li>
                                            <li><a href="register3.html">Register 3</a></li>
                                            <li><a href="register4.html">Register 4</a></li>
                                            <li><a href="screenlock.html">Lock Screen</a></li>
                                            <li><a href="screenlock2.html">Lock Screen 2</a></li>
                                            <li><a href="reset-pass.html">reset password</a></li>
                                            <li><a href="pricing.html">Pricing</a></li>
                                            <li><a href="404.html">Error 404</a></li>
                                            <li><a href="500.html">Error 500</a></li>
                                            <li><a href="invoice.html"><i class="ti-receipt"></i> <span>Invoice Summary</span></a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="ti-slice"></i><span>icons</span></a>
                                        <ul class="submenu">
                                            <li><a href="fontawesome.html">fontawesome icons</a></li>
                                            <li><a href="themify.html">themify icons</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="fa fa-table"></i>
                                            <span>Tables</span></a>
                                        <ul class="submenu">
                                            <li><a href="table-basic.html">basic table</a></li>
                                            <li><a href="table-layout.html">table layout</a></li>
                                            <li><a href="datatable.html">datatable</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="maps.php"><i class="ti-map-alt"></i> <span>แผนที่</span></a></li>
                                    <li><a href="sensorinfo.php"><i class="ti-help"></i> <span>ข้อมูลเซนเซอร์</span></a></li>
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
        <div class="user-management">
            <h2>User Management</h2>
        </div>
                <div class="container">
                    <div class="row">                      
                        <div class="col-md-12">
                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#addusername">เพิ่มผู้ใช้งาน</button>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">ชื่อผู้ใช้</th>
                                <th scope="col">ตำแหน่ง</th>
                                <th scope="col">แก้ไข/ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            while($row = mysqli_fetch_array($user,MYSQLI_ASSOC)){ ?>
                                <tr>
                                <th scope="row"><?=$no++ ?></th>
                                <td> <?=$row["username"] ?></td>

                                <td><?=($row["role"]==1)? "ผู้ดูแลระบบ": "ผู้ใช้งาน" ?></td>
                                <td class="row">
                                    <button class="btn btn-info col-md-6" type="button" data-toggle="modal" data-target="#editpassword" onclick='setusername("<?=$row["username"] ?>")'>แก้ไข</button>
 
                                    <!-- <button class="btn btn-danger col-md-6" type="button" data-toggle="modal" data-target="#deleteusername">ลบ</button> -->
                                </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <form action="addProcess.php" method="POST"> 
                        <div class="modal fade" id="addusername">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">เพิ่มผู้ใช้งาน</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <label for="example-text-input" class="col-form-label">ชื่อผู้ใช้งาน</label>                                                    
                                                    <input class="form-control" type="text" value="" id="addCencel1" name="username"> 
                                                    <label for="example-text-input" class="col-form-label">รหัสผ่าน</label>
                                                    <input class="form-control" type="password" value="" id="addCencel2" name="password"> 
                                                    <label for="example-text-input" class="col-form-label">คำอธิบาย</label>
                                                    <input class="form-control" type="text" value="" id="addCencel3" name="farm_info"> 

                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="addfunction()">ยกเลิก</button>
                                                <script>
                                                    function addfunction() {
                                                    document.getElementById("addCencel1").value="";
                                                    document.getElementById("addCencel2").value="";
                                                    document.getElementById("addCencel3").value="";
                                                    }
                                                </script>
                                                <input type="submit" class="btn btn-primary" value="บันทึก">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        <!-- <div class="modal fade" id="deleteusername">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">ลบ</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">

                                                <div >
                                                    <p>ลบแล้วไม่สามารถย้อนกลับได้</p>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                <button type="button" class="btn btn-primary">บันทึก</button>
                                            </div>
                                        </div>
                                    </div>
                            </div> -->
                            <form action="editProcess.php" method="POST">  
                                <div class="modal fade" id="editpassword">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">แก้ไข</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">

                                                <div >
                                                    <label for="example-text-input" class="col-form-label">รหัสผ่านใหม่</label>
                                                    <input class="form-control" type="password" value="" id="newpass" name="password"> 
                                                    <input type="hidden" value="" id="newusername" name="username">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="myFunction()">ยกเลิก</button>
                                                <script>
                                                    function myFunction() {
                                                    document.getElementById("newpass").value="";
                                                    }
                                                    function setusername(username) {
                                                    document.getElementById("newusername").value=username;
                                                    }
                                                </script>
                                                <input type="submit" class="btn btn-primary" value="บันทึก">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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
