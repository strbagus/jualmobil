<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jual Mobil</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/DataTables/datatables.js"></script>
    <script type="text/javascript" src="assets/DataTables/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.css">
    
    <?php
        include "config.php";
    
        $tfav = "SELECT * FROM tb_tema WHERE tema_id='1'";
        $rfav = $conn->query($tfav);
        $dfav = $rfav->fetch_assoc();
    ?>
    <link rel="icon" href="../assets/images/tema/<?= $dfav['tema_filename'] ?>">
    <style>
        body{
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>