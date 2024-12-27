<?php
session_name("dashboard_report_session");
session_start();
include '../../../app/_include/header_include.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Dashboard Report</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="../../../app/assets/images/JNE.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../../../app/assets/css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="../../../app/assets/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="../../../app/assets/css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="../../../app/assets/css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="../../../app/assets/css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="../../../app/assets/css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="../../../app/assets/css/custom.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <!-- SweetAlert JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                    <div class="sidebar_user_info">
                        <div class="icon_setting"></div>
                        <div class="user_profle_side">
                            <div class="user_img"><img class="img-responsive" src="../../../app/assets/images/User_jne.png" alt="#" /></div>
                            <div class="user_info">
                                <h6><?= $user1 ?></h6>
                                <p><span class="online_animation"></span> Online</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar_blog_2">
                    <h4><?= $nama ?></h4>
                    <ul class="list-unstyled components">
                        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>
                        <li><a href="../maintenance/index.php"><i class="fa fa-gear blue2_color"></i> <span>Report Maintenance</span></a></li>
                        <li>
                            <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-edit orange_color"></i> <span>Form Request</span></a>
                            <ul class="collapse list-unstyled" id="apps">
                                <li><a href="../form_request/hybrid_mec.php">- <span>User Hybrid & MEC</span></a></li>
                                <li><a href="../data_users/index.php">- <span>ID Courier SCA</span></a></li>
                                <li><a href="../resi_cancel/resi_cancel.php">- <span>Resi Cancel</span></a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-database purple_color"></i> <span>Data Agen & KP</span></a>
                            <ul class="collapse list-unstyled" id="element">
                                <li><a href="../data_counter/index.php">- <span>Agen & KP</span></a></li>
                                <li><a href="../data_users/index.php">- <span>Data Users</span></a></li>
                                <li><a href="../agen_tutup/index.php">- <span>Data Agen Tutup</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-male green_color"></i> <span>Super Courier App</span></a>
                            <ul class="collapse list-unstyled" id="dashboard">
                                <li><a href="../sca/pickup.php">- <span>Sca Pickup</span></a></li>
                                <li><a href="../sca/delivery.php">- <span>Sca Delivery</span></a></li>
                            </ul>
                        </li>
                        <li><a href="../data_mail/index.php"><i class="fa fa-envelope red_color"></i> <span>Data Email</span></a></li>
                        <li><a href="../link_pass/index.php"><i class="fa fa-group blue1_color"></i> <span>Link & Password</span></a></li>
                        <li><a href="../user_app/index.php"><i class="fa fa-cog green_color"></i> <span>Users</span></a></li>
                        <br>
                        <li style="border-top: 1px solid #ddd; padding-top: 10px;"><a href="../login/logout.php"><i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>
                        <!-- <li><a href="../tb_laporan/index.php"><i class="fa fa-file-text orange_color"></i> <span>Laporan</span></a></li> -->
                    </ul>
                </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                <div class="topbar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="full">
                            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                            <div class="logo_section">
                                <a href="#"><img class="img-responsive" src="../../../app/assets/images/JNE.png" alt="#" /></a>
                            </div>
                            <div class="right_topbar">
                                <div class="icon_info">
                                    <ul class="user_profile_dd">
                                        <li>
                                            <a class="dropdown-toggle" data-toggle="dropdown"><span class="name_user">Log Out</span></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="../login/logout.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <!-- end topbar -->