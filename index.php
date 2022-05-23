<?php 
include "./component/header.php";
$pages = "beranda";
include "./component/navbar.php";

$sqlmerk = "SELECT * FROM tb_merk";
$resultmerk = $conn->query($sqlmerk);
$sqlmobil = "SELECT * FROM 
                tb_mobil JOIN tb_mobil_gambar 
                ON 
                tb_mobil.mobil_id = tb_mobil_gambar.mg_mobil 
                ORDER BY mobil_id DESC LIMIT 4";
$rmobil = $conn->query($sqlmobil);
?>

<div 
class="banner-img" 
style="
    height: 300px;
    background-color: #002f49;
    width: 100%;
">
    <img 
    src="" 
    alt="Gambar Banner"
    style="
        height: 300px; 
        width: 100%
    ">
</div>
<div class="container">
    <div class="filter-search rounded p-4 shadow" style="
        margin-top: -50px;
        background-color: #d2dadd;">
        <h4>Beli Mobil</h4>
        <hr>
        <!-- <div class="search-bar">
            <form method="post">
                <div class="form-group d-flex">
                    <input 
                        type="text" 
                        name="search-mobil"
                        required="required" 
                        placeholder="Cari Mobil Disini..."
                        class="form-control mx-2">
                    <input 
                        type="submit"  
                        value="Cari" 
                        name="submit-mobil" 
                        class="btn btn-primary mx-2">
                </div>
            </form>
        </div> -->
        <div class="list-merk d-flex mt-5 justify-content-center flex-wrap">
            <?php
            while($dmerk = $resultmerk->fetch_array()){
                ?>
                    <a href="etalase.php?merk=<?= $dmerk["merk_id"] ?>" 
                        class="mobil-merk d-flex flex-column mx-4 text-decoration-none">
                        <img
                            src="./assets/images/favicon.svg" 
                            alt="merk mobil logo"
                            style="height: 64px"
                            >
                        <span class="text-center text-black"><?= $dmerk["merk_nama"] ?></span>
                    </a>
                <?php
            }
            ?>
        </div>
        <div class="filter-harga d-flex mt-2 justify-content-center">
            <?php 
            $rentangHarga = ["Dibawah Rp 100jt","Rp 100jt - Rp 200jt","Rp 200jt - Rp 300jt","Diatas Rp 300jt",];
            for ($i=0; $i < count($rentangHarga)  ; $i++) { 
            ?>
                <a href="etalase.php?harga=<?= $i ?>" 
                    class="py-1 px-3 mx-4 bg-white text-decoration-none" 
                    style="border-radius: 50px">
                    <?= $rentangHarga[$i] ?>
                </a>
                <?php
            }
            ?>
            
        </div>
    </div>
</div>
<div 
    class="mobil-list mt-5 pb-4"
    style="background-color: #002f49">
    <div class="container">
        <div 
            class="bg-warning text-center fw-bolder"
            style="
                width: 250px;
                border-radius: 0px 0px 50px 50px;
                margin-left: 50%;
                transform: translateX(-50%);
                ">
            Beli Mobil Alwin Motor
        </div>
        <div class="d-flex mt-2 justify-content-center fw-bold ">
        <?php 
        $mobilListSubTitle = ["175 Titik Inspeksi", "Harga Pasti, Tidak Ada Biaya Tersembunyi", "Garansi Satu Tahun", "Jaminan 5 Hari Uang Kembali"];
        for ($i=0; $i < count($mobilListSubTitle)  ; $i++) { 
            ?>
            <div class="mx-4" style="color: #786849;">
                <?= $mobilListSubTitle[$i] ?>
            </div>
            
            <?php
        }
        ?>
        </div>
        <!-- CATALOG MOBIL -->
        <div class="d-flex justify-content-center mt-3">
            <?php
            while($dmobil = $rmobil->fetch_array()){
                ?>
                <a class="col-md-3 p-2 text-decoration-none" href="mobil.php?id=<?= $dmobil['mobil_id'] ?>">
                    <div 
                        class="bg-white"
                        style="border-radius: 25px">
                        <div class="row">
                            <img 
                                src="./assets/images/mobil/<?= $dmobil['mg_filename'] ?>" 
                                alt="Gambar mobil"
                                style="
                                    width: 100%;
                                    border-radius: 25px 25px 0 0">
                        </div>
                        <div class="row px-4 py-2">
                            <h6 class="text-black"><?= $dmobil['mobil_nama'] ?></h6>
                            <div class="d-flex justify-content-between">
                                <div 
                                    class="bg-secondary px-1 text-white"
                                    style="border-radius: 25px"><?= $dmobil['mobil_jarak'] ?></div>
                                <div
                                    class="bg-secondary px-1 text-white"
                                    style="border-radius: 25px"><?= $dmobil['mobil_transmisi'] ?></div>
                            </div>
                            <h5 class="text-warning mt-2 fw-bold">Rp &nbsp;<?= number_format($dmobil['mobil_harga']) ?></h5>
                        </div>
                    </div>
                </a>
                <?php
            }  
            ?>
        </div>
        <div class="d-flex justify-content-end">
            <a href="etalase.php" class="btn-primary btn-sm btn">Lihat Selengkapnya..</a>
        </div>
    </div>
</div>
<?php
include "./component/carabeli.php"
?>
<div class="mt-5"></div>
<?php 
include "./component/footer.php";
?>