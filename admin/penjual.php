<?php
include "header.php";

//CRUDelete
if(isset($_GET['hapus'])){
    $id = $_GET['id'];
    $sqldel = "DELETE FROM tb_penjual WHERE penjual_id=$id";
    $resultdel = $conn->query($sqldel);
    header("location: penjual.php");
    
}
//CreateRUD
if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $nowa = $_POST['nowa'];
    $alamat = $_POST['alamat'];
    $sqltambah = "INSERT INTO tb_penjual 
                (penjual_nama, penjual_wa, penjual_alamat) 
                VALUES 
                ('$nama', '$nowa', '$alamat')";
    $resulttambah = $conn->query($sqltambah);
    if(!$resulttambah){
        echo "Gagal Menambahkan Data";
    }
}
//CRUpdateD
if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nowa = $_POST['nowa'];
    $alamat = $_POST['alamat'];
    $sqlubah = "UPDATE tb_penjual SET 
                penjual_nama='$nama', penjual_wa='$nowa', penjual_alamat='$alamat' 
                WHERE 
                penjual_id='$id'";
    $resultubah = $conn->query($sqlubah);
    if($resultubah){
        header("location: penjual.php");
    }

}
function url($url){
    header("location:".$url);
}
?>
<h3 class="text-center">Data Penjual</h3>
<hr>
<div id="form-block"></div>
<div id="form-tambah" class="col-md-5 mx-auto bg-light rounded shadow p-4">
    <?php
        if(isset($_GET['edit'])){
            $id = $_GET['id'];
            $sqledit = "SELECT * FROM tb_penjual WHERE penjual_id=$id";
            $resultedit = $conn->query($sqledit);
            $dedit = $resultedit->fetch_array();
            ?>
            <script>
            document.getElementById("form-tambah").style.display = "block";
            document.getElementById("form-block").style.display = "block";
            </script>
            <div class="d-flex justify-content-between align-items-center">
                <h4>Edit Data</h4>
                <button class="btn btn-sm btn-warning text-white" onclick="popupClose();">Kembali</button>
                <?php
                ?>
            </div>
            <hr>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="form-group">
                    <label for="nama">Nama penjual</label>
                    <input type="text" value="<?= $dedit['penjual_nama'] ?>" name="nama" required="required" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nowa">Nomor WA</label>
                    <input type="number" name="nowa" value="<?= $dedit['penjual_wa'] ?>" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat"  class="form-control required="required" cols="30" rows="3"><?= $dedit['penjual_alamat']?></textarea>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <input type="submit" value="Edit" name="ubah" class="btn btn-primary text-white">
                    
                </div>
            </form>

            <?php
        }else{
            ?>
        <div class="d-flex justify-content-between align-items-center">
            <h4>Tambah Data</h4>
            <button class="btn btn-sm btn-warning text-white" onclick="popupClose()">Kembali</button>
        </div>
        <hr>
        <form action="" method="post">
            <div class="form-group">
                <label for="brand">Nama penjual</label>
                <input type="text" name="nama" required="required" class="form-control">
            </div>
            <div class="form-group">
                <label for="logo">Nomor WA</label>
                <input type="number" name="nowa" class="form-control" required="required">
            </div>
            <div class="form-group">
                <label for="logo">Alamat</label>
                <textarea name="alamat" class="form-control required="required" cols="30" rows="3"></textarea>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <input type="submit" value="Tambah" name="tambah" class="btn btn-primary text-white">
                
            </div>
        </form>

            <?php
        }
    ?>
</div>
<table class="table table-striped table-bordered" id="table-datatable">
    <thead class="bg-dark text-white text-center">
        <tr>
            <td width="1%">No</td>
            <td>Nama</td>
            <td>No WA</td>
            <td>Alamat</td>
            <td width="20%">Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM tb_penjual";
            $result = $conn->query($sql);
            $no = 1;
            while($d = $result->fetch_array()){
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $d['penjual_nama'] ?></td>
                    <td><?= $d['penjual_wa'] ?></td>
                    <td><?= $d['penjual_alamat'] ?></td>
                    <td class="d-flex justify-content-evenly">
                        <a href="penjual.php?edit=true&id=<?= $d['penjual_id'] ?>" onclick="popupOpen()" class="btn btn-sm btn-warning text-white">Ubah</a>
                        <a href="penjual.php?hapus=true&id=<?= $d['penjual_id'] ?>" onclick="return('Yakin akan menghapus data?')" class="btn btn-sm btn-danger text-white">Hapus</a>
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
<div class="d-flex justify-content-end mt-3">
    <button class="btn-primary btn" onclick="popupOpen()">Tambah</button>
</div>
<?php include "footer.php" ?>