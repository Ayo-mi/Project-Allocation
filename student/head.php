<?php
session_start();
require_once '../util/data-process.php';
if (!isset($_SESSION['pa-student'])) {
    header('location: ../sign-in');
}
$stid=$_SESSION['pa-student'];
$student = getStudent($stid, 'all');
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>:: Student :: Home</title>
<link rel="icon" href="assets/favicon.ico" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
<link rel="stylesheet" href="assets/plugins/charts-c3/plugin.css"/>

<link rel="stylesheet" href="assets/plugins/morrisjs/morris.min.css" />
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/style.min.css">
<script src="../assets/jq3.6.0.js"></script>
<script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->
<script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="student.js"></script>
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/loader.svg" width="48" height="48" alt="Aero"></div>
        <p>Please wait...</p>
    </div>
</div>

<div class="body" style="display: none;">
    <div class="jsdemo-notification-button">
        <button type="button" class="btn btn-raised m-b-10 btn-danger waves-effect" data-placement-from="bottom" data-placement-align="left" data-animate-enter="" data-animate-exit="" data-color-name="alert-danger"> DANGER </button>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>


<!-- Right Icon menu Sidebar -->
<div class="navbar-right">
    <ul class="navbar-nav">
        <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li><a class="mega-menu sign-out2" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
    </ul>
</div>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="../"><img src="assets/images/logo.svg" width="25" alt="Aero"><span class="m-l-10">Project Allocation</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="./"><img src="<?php if($student['img'] ==''){
                            echo '../no_image.png';
                        }else echo $student['img'] ?>" alt="User"></a>
                    <div class="detail">
                        <h4><?php if($student['first_name'] ==''){
                            echo $student['matric_number'];
                        }else echo $student['first_name'] ?></h4>
                        <small>Student</small>                        
                    </div>
                </div>
            </li>
            <li class="<?php if(isset($isProfile)) echo 'active';?> open"><a href="./"><i class="zmdi zmdi-home"></i><span>Profile</span></a></li>
            <li class="<?php if(isset($isProject)) echo 'active';?> open"><a href="projects"><i class="zmdi zmdi-assignment"></i><span>Projects</span></a></li>
            <li class="<?php if(isset($isCustom)) echo 'active';?> open"><a href="custom-projects"><i class="zmdi zmdi-assignment"></i><span>Custom Projects</span></a></li>
            <li class="<?php if(isset($isTicket)) echo 'active';?> open"><a href="tickets"><i class="zmdi zmdi-notifications"></i><span>Tickets</span></a></li>
            
        </ul>
    </div>
</aside>

<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs sm">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Theme Option</h6>
                    <div class="light_dark">
                        <div class="radio">
                            <input type="radio" name="radio1" id="lighttheme" value="light" checked="">
                            <label for="lighttheme">Light Mode</label>
                        </div>
                        <div class="radio mb-0">
                            <input type="radio" name="radio1" id="darktheme" value="dark">
                            <label for="darktheme">Dark Mode</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h6>Color Skins</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple"><div class="purple"></div></li>
                        <li data-theme="blue"><div class="blue"></div></li>
                        <li data-theme="cyan"><div class="cyan"></div></li>
                        <li data-theme="green"><div class="green"></div></li>
                        <li data-theme="orange"><div class="orange"></div></li>
                        <li data-theme="blush" class="active"><div class="blush"></div></li>
                    </ul>                                        
                </div>                
            </div>                
        </div>
    </div>
</aside>
