<?php
include "./component/header.php";
include "./component/navbar.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header("location: etalase.php");
}
$sqlmobil = "SELECT * FROM 
                tb_mobil JOIN tb_mobil_gambar 
                ON 
                tb_mobil.mobil_id = tb_mobil_gambar.mg_mobil
                WHERE tb_mobil.mobil_id='$id'";
$rmobil = $conn->query($sqlmobil);
$dmobil = $rmobil->fetch_assoc();
?>
<div class="container my-4">
    <div class="row">
        <div class="col-md-7 p-2">
        <img 
            src="./assets/images/mobil/<?= $dmobil['mg_filename'] ?>" 
            alt="<?= $dmobil['mg_filename'] ?>"
            style="width: 100%">
        </div>
        <div class="col-md-5 p-2 d-flex flex-column justify-content-between">
            <div class="top">
                <h3><?= $dmobil['mobil_tahun']."&nbsp;".$dmobil['mobil_nama'] ?></h3>
                <h6><?= $dmobil['mobil_jarak']." | ".$dmobil['mobil_transmisi'] ?></h6>
                <h3 class="text-warning"><?= "Rp. ".number_format($dmobil['mobil_harga']) ?></h3>
            </div>
            <div class="bot text-center">
                <div 
                    class="bg-secondary rounded px-3  py-1 text-center"
                    style="background-color: #c9c9c9">
                    Alwin Motor, Sleman, Daerah Istimewa Yogyakarta 55584
                </div>
                <a href="https://wa.me/+6281229895577" 
                    class="text-warning btn mt-2 fw-bold"
                    style="background-color: #002f49;">Cek Sekarang</a>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <h3 class="text-center">Detail Mobil</h3>
        <hr>
        <div class="col-md-6 p-4">
            <div class="d-flex justify-content-between border-bottom my-4">
                <span>Tahun</span>
                <span><?= $dmobil['mobil_tahun'] ?></span>
            </div>
            <div class="d-flex justify-content-between border-bottom my-4">
                <span>Type</span>
                <span><?= $dmobil['mobil_type'] ?></span>
            </div>
             <div class="d-flex justify-content-between border-bottom my-4">
                <span>Transmisi</span>
                <span><?= $dmobil['mobil_transmisi'] ?></span>
            </div>
        </div>
        
        <div class="col-md-6 p-4">
            <div class="d-flex justify-content-between border-bottom my-4">
                <span>Kap. Mesin</span>
                <span><?= $dmobil['mobil_kapmesin'] ?></span>
            </div>
            <div class="d-flex justify-content-between border-bottom my-4">
                <span>Warna</span>
                <span><?= $dmobil['mobil_warna'] ?></span>
            </div>
            <div class="d-flex justify-content-between border-bottom my-4">
                <span>Bahan Bakar</span>
                <span><?= $dmobil['mobil_bahanbakar'] ?></span>
            </div>
        </div>
    </div>
    <?php
    if($dmobil['mobil_deskripsi'] != ""){
        ?>
        <div class="row mt-5">
            <h3>Informasi Tambahan</h3>
            <hr>
            <div class="col-md-6">
                <p>
                    <?= $dmobil['mobil_deskripsi'] ?>
                </p>
            </div>
        </div>
        
        <?php
    }
    ?>
</div>
<?php
include "./component/footer.php";
?>

