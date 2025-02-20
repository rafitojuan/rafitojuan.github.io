<?php
include "../function/function.php";
include "session/session.php";

// Select semua table
$qTeknisi = mysqli_query($conn, "SELECT * FROM teknisi");
$qUser = mysqli_query($conn, "SELECT * FROM user");
$qPelanggan = mysqli_query($conn, "SELECT * FROM keluhan_pelanggan");

// Mencari jumlah data dalam 
$rowTeknisi = mysqli_num_rows($qTeknisi);
$rowUser = mysqli_num_rows($qUser);
$rowPelanggan = mysqli_num_rows($qPelanggan);

// Jumlah data dalam tabel pelanggan
$queryAll = mysqli_query($conn, "SELECT * FROM keluhan_pelanggan");
$query0 = mysqli_query($conn, "SELECT * FROM keluhan_pelanggan WHERE status = 0");
$query1 = mysqli_query($conn, "SELECT * FROM keluhan_pelanggan WHERE status = 1");
$query2 = mysqli_query($conn, "SELECT * FROM keluhan_pelanggan WHERE status = 2");
$query3 = mysqli_query($conn, "SELECT * FROM keluhan_pelanggan WHERE status = 3");
$query4 = mysqli_query($conn, "SELECT * FROM keluhan_pelanggan WHERE status = 4");

$rowAll = mysqli_num_rows($queryAll);
$row0 = mysqli_num_rows($query0);
$row1 = mysqli_num_rows($query1);
$row2 = mysqli_num_rows($query2);
$row3 = mysqli_num_rows($query3);
$row4 = mysqli_num_rows($query4);

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Semudah</title>
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

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <a href="teknisi.php">Teknisi</a>
                            </li>
                            <li>
                                <a href="user.php">User</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">Pelanggan</a>
                                <ul class="collapse">
                                    <li><a href="pelanggan-all.php">Semua Pelanggan <span class="badge badge-light"><?= $rowAll ?></span></a></li>
                                    <li><a href="pelanggan-0.php">Menunggu Konfirmasi <span class="badge badge-light"><?= $row0 ?></span></a></li>
                                    <li><a href="pelanggan-1.php">Bayar DP <span class="badge badge-light"><?= $row1 ?></span></a></li>
                                    <li><a href="pelanggan-2.php">Sedang Dijemput <span class="badge badge-light"><?= $row2 ?></span></a></li>
                                    <li><a href="pelanggan-3.php">Sedang Dikerjakan <span class="badge badge-light"><?= $row3 ?></span></a></li>
                                    <li><a href="pelanggan-4.php">Selesai Dikerjakan <span class="badge badge-light"><?= $row4 ?></span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="riwayat.php">Riwayat Pelanggan</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li class="dropdown">
                                <?php

                                //menghitung jumlah pesan dari tabel pesan
                                $query = mysqli_query($conn, "SELECT COUNT(id_keluhan) as jumlah FROM keluhan_pelanggan WHERE status = 0");

                                //menampilkan data
                                $hasil = mysqli_fetch_array($query);

                                //membuat data json
                                // echo json_encode(array('jumlah' => $hasil['jumlah']));
                                ?>

                                <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                    <span id="notif"><?= $hasil['jumlah'] ?></span>
                                </i>
                                <div id="pesan" class="dropdown-menu bell-notify-box notify-box">

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= $_SESSION['username'] ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="session/logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-btc"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Teknisi</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2><?= $rowTeknisi ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-btc"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">User</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2><?= $rowUser ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-btc"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Pelanggan</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2><?= $rowPelanggan ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sales report area end -->
                <!-- overview area start -->

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
        <!-- start zingchart js -->
        <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
        <script>
            zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
            ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
        </script>
        <!-- all line chart activation -->
        <script src="assets/js/line-chart.js"></script>
        <!-- all pie chart -->
        <script src="assets/js/pie-chart.js"></script>
        <!-- others plugins -->
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/tampil.js"></script>
</body>

</html>