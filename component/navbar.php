<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <img src="../assets/images/logo.svg" alt="Logo Alwin Motor" style="height: 32px;">
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
              <a class="nav-link <?php if($pages == "faq"){ echo "active"; }   ?>" href="#faq.php">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($pages == "tentang"){ echo "active"; }   ?>" href="#tentang.php">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($pages == "dealer"){ echo "active"; }   ?>" href="#dealer.php">Dealer</a>
            </li>
          </ul>
        </div>
    </div>
  </div>
</nav>