<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/DataTables/datatables.js"></script>
    <script type="text/javascript" src="../assets/DataTables/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/DataTables/datatables.css">
    <link rel="icon" href="../assets/images/logo.svg">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/function.js"></script>
    <?php
        include "../config.php";
        session_start();
        if($_SESSION['status']!="login"){
            header("location: ../login.php?alert=login_belum");
        }
    ?>
</head>
<body>
    <div class="sidenav bg-dark text-white ">
        <div class="nav-brand flex-column d-flex my-5">
            <img src="../assets/images/logo.svg" alt="logo" style="width: auto;">
        </div>
        <hr>
        <div class="nav-menu text-center">
            <a href="index.php" >
                <div class="nav-items">
                    Dashboard
                </div>
            </a>
            <a href="merk.php" >
                <div class="nav-items ">
                    Merk
                </div>
            </a>
            <!-- <a href="model.php" >
                <div class="nav-items ">
                    Model
                </div>
            </a> -->
            <!-- <a href="penjual.php" >
                <div class="nav-items ">
                    Data Penjual
                </div>
            </a> -->
            <a href="mobil.php" >
                <div class="nav-items ">
                    Data Mobil
                </div>
            </a>
            <a href="setting.php" >
                <div class="nav-items ">
                    Setting
                </div>
            </a>
            <!-- <a href="index.php" >
                <div class="nav-items ">
                    Statistik
                </div>
            </a> -->
        </div>
        <div class="nav-logout mt-auto justify-content-center d-flex ">
            <a href="logout.php" class="btn btn-sm btn-outline-danger">Logout</a>
        </div>
    </div>
    <div class="content">
        
        <div class="container bg-light rounded mt-4 px-5 py-3 shadow">