<?php
include "./component/header.php";
$pages = "etalase"; 
include "./component/navbar.php";

if(isset($_GET['merk'])){
    $fmerk = $_GET['merk'];
    $filter = "WHERE mobil_merk='$fmerk'";
}else if(isset($_GET['harga'])){
    if($_GET['harga'] == 0){
        $filter = "WHERE mobil_harga < 100000000";
    }else if($_GET['harga'] == 1){
        $filter = "WHERE mobil_harga > 100000000 AND mobil_harga < 200000000";
    }else if($_GET['harga'] == 2){
        $filter = "WHERE mobil_harga > 200000000 AND mobil_harga < 300000000";
    }else if($_GET['harga'] == 3){
        $filter = "WHERE mobil_harga > 300000000";
    }
}else{
    $filter = "";
}
$sqlmobil = "SELECT * FROM 
                tb_mobil JOIN tb_mobil_gambar 
                ON 
                tb_mobil.mobil_id = tb_mobil_gambar.mg_mobil
                $filter 
                ORDER BY mobil_id ASC";
$rmobil = $conn->query($sqlmobil);

?>
<div class="container mt-5">
    <h3>Mobil Tersedia |</h3>
    <div class="d-flex justify-content-center flex-wrap mt-3">
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
</div>

<?php
include "./component/carabeli.php";
?>
<div class="mt-5"></div>
<?php
include "./component/footer.php";
?>