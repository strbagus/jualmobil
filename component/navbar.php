<?php
$tlog = "SELECT * FROM tb_tema WHERE tema_id='2'";
$rlog = $conn->query($tlog);
$dlog = $rlog->fetch_assoc();
?>
<div class="bg-warning">
  <div class="container d-flex justify-content-end" >
    <a class="text-decoration-none text-black" href="https://wa.me/+6281804280777" target="blank">0818-0428-0777</a>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <img src="../assets/images/tema/<?= $dlog['tema_filename'] ?>" alt="Logo Alwin Motor" style="height: 32px;">
    <div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php if($pages == "beranda"){ echo "active"; }   ?>"href="index.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($pages == "etalase"){ echo "active"; }   ?>" href="etalase.php">Beli Mobil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($pages == "faq"){ echo "active"; }   ?>" href="faq.php">FAQ</a>
            </li>
          </ul>
        </div>
    </div>
  </div>
</nav>