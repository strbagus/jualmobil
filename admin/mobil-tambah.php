<?php
include "header.php";
$sqlmerk = "SELECT * FROM tb_merk";
$resultmerk = $conn->query($sqlmerk);

//Insert
if(isset($_POST['tambahMobil'])){
    $nama = $_POST['nama'];
    $tahun = $_POST['tahun'];
    $merk = $_POST['merk'];
    $type = $_POST['type'];
    $transmisi = $_POST['transmisi'];
    $warna = $_POST['warna'];
    $bahanbakar = $_POST['bahanbakar'];
    $jarak = $_POST['jarak'];
    $kapmesin = $_POST['kapmesin'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    
    $sqlmobil = "INSERT INTO 
                    tb_mobil 
                    (mobil_nama, mobil_tahun, mobil_merk, mobil_type, mobil_transmisi, mobil_warna, mobil_bahanbakar, mobil_jarak, mobil_kapmesin, mobil_deskripsi, mobil_harga)
                    VALUES
                    ('$nama','$tahun','$merk','$type','$transmisi','$warna','$bahanbakar','$jarak','$kapmesin','$deskripsi','$harga' )";
    $resultmobil = $conn->query($sqlmobil);
    if($resultmobil){
        header("location: mobil-gambar.php");
    }
}
?>
<h3 class="text-center">Form Tambah Mobil</h3>
<hr>
<div class="col-md-5 mx-auto">
    <form action="" method="post">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" required="required">
        </div>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="number" class="form-control" name="tahun" required="required">
        </div>
        <div class="form-group">
            <label for="merk">Merk</label>
            <select name="merk" required="required" class="form-control">
                <option selected disabled>--Pilih Merk--</option>
                <?php
                while($dmerk = $resultmerk->fetch_array()){
                    ?>
                    <option value="<?= $dmerk['merk_id'] ?>"><?= $dmerk['merk_nama'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" name="type" required="required">
        </div>
        <div class="form-group">
            <label for="transmisi">Transmisi</label>
            <select class="form-control" name="transmisi" required="required">
                <option selected disabled>--Pilih Transmisi--</option>
                <option value="Manual">Manual</option>
                <option value="Matic">Matic</option>
            </select>
        </div>
        <div class="form-group">
            <label for="warna">Warna</label>
            <input type="text" class="form-control" name="warna" required="required">
        </div>
        <div class="form-group">
            <label for="bahanbakar">Bahan Bakar</label>
            <select class="form-control" name="bahanbakar" required="required">
                <option selected disabled>--Pilih Bahan Bakar--</option>
                <option value="Bensin">Bensin</option>
                <option value="Solar">Solar</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jarak">Jarak Tempuh</label>
            <input type="text" class="form-control" name="jarak" required="required" placeholder="contoh: 50.000KM">
        </div>
        <div class="form-group">
            <label for="kapmesin">Kapasitas Mesin</label>
            <input type="text" class="form-control" name="kapmesin" required="required" placeholder="contoh: 1.300CC">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea type="text" class="form-control" name="deskripsi" placeholder="Boleh Kosong"></textarea>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="Number" class="form-control" name="harga" required="required">
        </div>
        
        <div class="d-flex justify-content-center mt-5">
            <input type="submit" value="Simpan" name="tambahMobil" class="btn btn-primary">
        </div>
    </form>

</div>
<div class="d-flex justify-content-end mt-3">
    <a href="mobil.php" class="btn btn-warning">Kembali</a>
</div>
<?php
include "footer.php";
?>