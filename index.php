<?php
date_default_timezone_set("Asia/Jakarta");
session_start();
require "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SISTEM PENGAJUAN CUTI INTIPRATAMA GROUP</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
</head>
<body>

<!-- cek status login -->
<?php 
    if($_SESSION['status']!="y"){
        header("Location:login.php");
    }
?>


<nav class="navbar navbar-dark bg-primary border navbar-expand-sm fixed-top">
    <a class="navbar-brand" href="#">INTIPRATAMA GROUP</a>
    <ul class="navbar-nav">
        <li class="nav-item active"><a class="nav-link" href="index.php"><i class="	fas fa-home"></i> Home </a></li>
        <?php
            if($_SESSION['level'] =="HRD"){
        ?>
        <li class="nav-item active"><a class="nav-link" href="?page=users"><i class="fas fa-portrait"></i> Users </a></li>
        <li class="nav-item active"><a class="nav-link" href="?page=datacuti"><i class="far fa-file-alt"></i> Data Cuti </a></li>
        <li class="nav-item active"><a class="nav-link" href="?page=report"><i class="fas fa-print"></i> Report data cuti </a></li>

            <?php
            }else{
            ?>
            <li class="nav-item active"><a class="nav-link" href="?page=karyawan"><i class="fas fa-users"></i> Data Karyawan </a></li>
            <li class="nav-item active"><a class="nav-link" href="?page=pengajuan"><i class="far fa-paper-plane"></i> Pengajuan Cuti </a></li>
            <li class="nav-item active"><a class="nav-link" href="?page=datacuti"><i class="far fa-file-alt"></i> Data Cuti </a></li>
            <li class="nav-item active"><a class="nav-link" href="?page=report"><i class="fas fa-print"></i> Report data cuti </a></li>
            <?php
            }   
            ?>
            <li class="nav-item active"><a class="nav-link" href="?page=logout"><i class="fas fa-power-off"></i> Logout </a></li>

    </ul>
</nav>

<div class="container" style="margin-top:100px;margin-bottom:100px">
    <?php

        // pengaturan menu
        $page = isset($_GET['page']) ? $_GET['page'] : "";
        $action = isset($_GET['action']) ? $_GET['action'] : "";

        if ($page==""){
            include "welcome.php";
        }elseif ($page=="karyawan"){
            if ($action==""){
                include "tampil_karyawan.php";
            }elseif($action=="tambah"){
                include "tambah_karyawan.php";
            }elseif($action=="update"){
                include "update_karyawan.php";
            }else{
                include "hapus_karyawan.php";
            }
        }elseif ($page=="pengajuan"){
            if ($action==""){
                include "tampil_pengajuan.php";
            }elseif($action=="tambah"){
                include "tambah_pengajuan.php";
            }elseif($action=="update"){
                include "update_pengajuan.php";
            }else{
                include "hapus_pengajuan.php";
            }
        }elseif ($page=="datacuti"){
            if ($action==""){
                include "datacuti.php";
            }
        }elseif ($page=="users"){
            if ($action==""){
                include "tampil_users.php";
            }elseif($action=="tambah"){
                include "tambah_users.php";
            }elseif($action=="update"){
                include "update_users.php";
            }else{
                include "hapus_users.php";
            }

        }elseif ($page=="report"){
            if ($action==""){
                include "report.php";
            }
        }else{
            if ($action==""){
                include "logout.php";
    
        }
    }
    ?>
</div>

    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/all.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script>
       $(document).ready(function () {
           $('#myTable').dataTable();
       });
    </script>

    <script src="assets/js/chosen.jquery.min.js"></script>
    <script>
     $(function() {
       $('.chosen').chosen();
     });
    </script>

</body>
</html>