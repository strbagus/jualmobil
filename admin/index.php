<?php
include "header.php";
$rmerk = $conn->query("SELECT * FROM tb_merk");
$jmerk = $rmerk->num_rows;
$rmobil = $conn->query("SELECT * FROM tb_mobil");
$jmobil = $rmobil->num_rows;
?>


<h3 class="text-center">Dashboard</h3>
<hr class="text-black">
<div class="d-flex justify-content-evenly">
    <a href="merk.php" class="col-md-3 text-decoration-none rounded text-white bg-primary p-4">
        <h5 class="text-center">Merk</h5>
        <hr>
        <span>Merk Tersedia: <?= $jmerk ?></span>
    </a>
    <a href="mobil.php" class="col-md-3 text-decoration-none rounded text-white bg-primary p-4">
        <h5 class="text-center">Mobil</h5>
        <hr>
        <span>Mobil Tersedia: <?= $jmobil ?></span>
    </a>
</div>
<?php include "footer.php"?>