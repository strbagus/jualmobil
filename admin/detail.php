<?php
include "header.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header("mobil.php");
}
$sqlmobil = "SELECT * FROM tb_mobil WHERE mobil_id='$id'";
$rmobil = $conn->query($sqlmobil);
$dmobil = $rmobil->fetch_assoc();
$sqlgambar = "SELECT * FROM tb_mobil_gambar WHERE mg_mobil='$id'";
$rgambar = $conn->query($sqlgambar);
$dgambar = $rgambar->fetch_assoc();

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
    
    $sqlmobil = "UPDATE 
                    tb_mobil 
                    SET
                    mobil_nama='$nama',mobil_tahun='$tahun',mobil_merk='$merk',mobil_type='$type',mobil_transmisi='$transmisi',mobil_warna='$warna',,mobil_bahanbakar='$bahanbakar',mobil_jarak='$jarak',mobil_kapmesin='$kapmesin',mobil_deskripsi='$deskripsi',mobil_harga='$harga'
                    WHERE mobil_id='$id'";
    $resultmobil = $conn->query($sqlmobil);
    if($resultmobil){
        header("location: mobil.php");
    }
}
?>

    <h3 class="text-center">Detail & Edit - <?= $dmobil['mobil_nama']?></h3>
    <hr>
    <div class="row mb-5">
        <div class="col-md-6">
            <div class="gambar"
                style="
                    width: 100%;
                    height: 250px;
                    background-color: gray;
                    border-radius: 15px;"
                >
                <img src="../assets/images/mobil/<?= $dgambar['mg_filename'] ?>" 
                    alt="Gambar Mobil <?= $dgambar['mg_filename'] ?>"
                    style="
                        width:100%;
                        border-radius: 15px">
            </div>
        </div>
        <div class="col-md-6">
            <a href="#" class="btn-primary btn disabled">Ubah Gambar</a> 
        </div>
    </div>
    <form action="" method="post">
        <div class="d-flex justify-content-evenly">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $dmobil['mobil_nama'] ?>" required="required">
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="number" class="form-control" name="tahun" value="<?= $dmobil['mobil_tahun'] ?>" required="required">
                </div>
                <div class="form-group">
                    <label for="merk">Merk</label>
                    <select name="merk" required="required" class="form-control">
                        <option selected value="<?= $dmobil['mobil_merk'] ?>" ><?= $dmobil['mobil_merk'] ?></option>
                        <?php
                        $sqlmerk = "SELECT * FROM tb_merk";
                        $rmerk = $conn->query($sqlmerk);
                        while($dmerk = $rmerk->fetch_array()){
                            ?>
                            <option value="<?= $dmerk['merk_id'] ?>"><?= $dmerk['merk_nama'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" name="type"  value="<?= $dmobil['mobil_type'] ?>"required="required">
                </div>
                <div class="form-group">
                    <label for="transmisi">Transmisi</label>
                    <select class="form-control" name="transmisi" required="required">
                        <option selected value="<?= $dmobil['mobil_transmisi'] ?>"><?= $dmobil['mobil_transmisi'] ?></option>
                        <option value="Manual">Manual</option>
                        <option value="Matic">Matic</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="warna">Warna</label>
                    <input type="text" class="form-control" name="warna" value="<?= $dmobil['mobil_warna'] ?>" required="required">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="bahanbakar">Bahan Bakar</label>
                    <select class="form-control" name="bahanbakar" required="required">
                        <option selected value="<?= $dmobil['mobil_bahanbakar'] ?>"><?= $dmobil['mobil_bahanbakar'] ?></option>
                        <option value="Bensin">Bensin</option>
                        <option value="Solar">Solar</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jarak">Jarak Tempuh</label>
                    <input type="text" class="form-control" name="jarak"  value="<?= $dmobil['mobil_jarak'] ?>"required="required" placeholder="contoh: 50.000KM">
                </div>
                <div class="form-group">
                    <label for="kapmesin">Kapasitas Mesin</label>
                    <input type="text" class="form-control" name="kapmesin"  value="<?= $dmobil['mobil_kapmesin'] ?>"required="required" placeholder="contoh: 1.300CC">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea type="text" class="form-control" name="deskripsi"  value="<?= $dmobil['mobil_deskripsi'] ?>"placeholder="Boleh Kosong"></textarea>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="Number" class="form-control" name="harga"  value="<?= $dmobil['mobil_harga'] ?>"required="required">
                </div>
                
            </div>
        </div>
        
        <div class="d-flex justify-content-center mt-5">
            <input type="submit" value="Simpan Perubahan" name="tambahMobil" class="disabled btn btn-primary">
        </div>
        <div class="d-flex justify-content-center">
            <span>note: hanya jika ingin merubah data</span>
        </div>
        
    </form>
<?php
include "footer.php";
?>