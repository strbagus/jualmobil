<?php 
include "header.php"; 
//CRUDelete
if(isset($_GET['hapus'])){
    $id = $_GET['id'];
    $img =  $_GET['img'];
    $sqldel = "DELETE FROM tb_merk WHERE merk_id=$id";
    $resultdel = $conn->query($sqldel);
    unlink("../assets/images/merk/$img");

    header("location: merk.php");
    
}
//CreateRUD
if(isset($_POST['tambah'])){
    $nama = $_POST['brand'];
    $filename = $_FILES["logo"]["name"];
    $tempname = $_FILES["logo"]["tmp_name"];   
    $folder = "../assets/images/merk/".$filename;
    $sqltambah = "INSERT INTO tb_merk (merk_nama, merk_gambar) VALUES ('$nama', '$filename')";
    $resulttambah = $conn->query($sqltambah);
    
    if(move_uploaded_file($tempname, $folder)){
        if(!$resulttambah){
            echo "Gagal Menambahkan Data";
        }
    }
}
//CRUpdateD
if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $brand = $_POST['brand'];
    $sqlubah = "UPDATE tb_merk SET merk_nama='$brand' WHERE merk_id='$id'";
    $resultubah = $conn->query($sqlubah);
    if($resultubah){
        header("location: merk.php");
    }

}
?>
<h3 class="text-center">Data Merk</h3>
<hr>
<div id="form-block"></div>
<div id="form-tambah" class="col-md-5 mx-auto bg-light rounded shadow p-4">
    <?php
        if(isset($_GET['edit'])){
            $id = $_GET['id'];
            $sqlmerk = "SELECT * FROM tb_merk WHERE merk_id=$id";
            $resultmerk = $conn->query($sqlmerk);
            $dmerk = $resultmerk->fetch_array();
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
            <input type="hidden" name="id" value="<?= $id?>">
            <div class="form-group">
                <label for="brand">Nama Merk</label>
                <input type="text" name="brand" value="<?= $dmerk['merk_nama'] ?>" required="required" class="form-control">
            </div>
            <div class="d-flex justify-content-center mt-3">
                <input type="submit" value="Ubah" name="ubah" class="btn btn-primary text-white">
                
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
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="brand">Nama Merk</label>
                <input type="text" name="brand" required="required" class="form-control">
            </div>
            <div class="form-group">
                <label for="logo">Gambar Logo</label>
                <input type="file" name="logo" class="form-control" required>
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
            <td>Merk</td>
            <td>Logo</td>
            <td width="20%">Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php
            //CReadUD
            $sql = "SELECT * FROM tb_merk";
            $result = $conn->query($sql);
            $no = 1;
            while($d = $result->fetch_array()){
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $d['merk_nama'] ?></td>
                    <td class="text-center">
                        <img 
                            src="../assets/images/merk/<?= $d['merk_gambar']?>" 
                            alt="<?= $d['merk_gambar']?>"
                            style="width:32px">    
                    </td>
                    <td class="d-flex justify-content-evenly">
                        <!-- <a href="merk.php?edit=true&id=<?= $d['merk_id'] ?>" onclick="popupOpen()" class="btn btn-sm btn-warning text-white">Ubah</a> -->
                        <a href="merk.php?hapus=true&id=<?= $d['merk_id'] ?>&img=<?= $d['merk_gambar'] ?>" onclick="return('Yakin akan menghapus data?')" class="btn btn-sm btn-danger text-white">Hapus</a>
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