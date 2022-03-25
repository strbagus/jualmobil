<?php 
include "header.php"; 
if(isset($_GET['hapus'])){
    $id = $_GET['id'];
    $sqldel = "DELETE FROM tb_model WHERE model_id=$id";
    $resultdel = $conn->query($sqldel);
    header("location: model.php");
    
}
if(isset($_POST['tambah'])){
    $nama = $_POST['brand'];
    $sqltambah = "INSERT INTO tb_model (model_nama) VALUES ('$nama')";
    $resulttambah = $conn->query($sqltambah);
    if(!$resulttambah){
        echo "Gagal Menambahkan Data";
    }
}
// if(isset($_POST['ubah'])){
//     $id = $_POST['id'];
//     $brand = $_POST['brand'];
//     $sqlubah = "UPDATE tb_model SET model_nama='$brand' WHERE model_id='$id'";
//     $resultubah = $conn->query($sqlubah);
//     if($resultubah){
//         header("location: model.php");
//     }

// }
// SQL

    ?>
<h3 class="text-center">Data Model</h3>
<hr>
<div id="form-block"></div>
<div id="form-tambah" class="col-md-5 mx-auto bg-light rounded shadow p-4">
    <?php
        if(isset($_GET['edit'])){
            // $id = $_GET['id'];
            // $sqlmodel = "SELECT * FROM tb_model WHERE model_id=$id";
            // $resultmodel = $conn->query($sqlmodel);
            // $dmodel = $resultmodel->fetch_array();
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
                <label for="brand">Nama model</label>
                <input type="text" name="brand" value="<?= $dmodel['model_nama'] ?>" required="required" class="form-control">
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
        <form action="" method="post">
            <div class="form-group">
                <label for="merk">Merk</label>
                <select name="merk" required="required" class="form-control">
                    <option selected disabled>-- Pilih Merk --</option>
                    <?php
                       ?>
                        <option value="<?= $dmerk['merk_id'] ?>"><?= $merk['merk_nama'] ?></option>
                         <?php
                    // }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="model">Nama Model</label>
                <input type="text" name="model" required="required" class="form-control">
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
            <td>Model</td>
            <td width="20%">Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM tb_model JOIN tb_merk ON model_merk=merk_id";
            $result = $conn->query($sql);
            $no = 1;
            while($d = $result->fetch_array()){
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $d['model_nama'] ?></td>
                    <td><?= $d['merk_nama'] ?></td>
                    <td class="d-flex justify-content-evenly">
                        <a href="model.php?edit=true&id=<?= $d['model_id'] ?>" onclick="popupOpen()" class="btn btn-sm btn-warning text-white">Ubah</a>
                        <a href="model.php?hapus=true&id=<?= $d['model_id'] ?>" onclick="return('Yakin akan menghapus data?')" class="btn btn-sm btn-danger text-white">Hapus</a>
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