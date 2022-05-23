<?php 
include "header.php";
?>

<h3 class="text-center">Data Mobil</h3>
<hr>
<div class="d-flex justify-content-end">
    <a href="mobil-tambah.php" class="btn btn-primary mb-1">Tambah</a>
</div>
<div id="table-responsive">
    <table class="table table-bordered" id="table-datatable">
        <thead class="bg-dark text-white">
            <tr>
                <th width="1%">No</th>
                <th>Nama</th>
                <th>Status</th>
                <th width="20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM tb_mobil";
            $result = $conn->query($sql);
            $no = 1;
            while($d = $result->fetch_array()){
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $d['mobil_nama'] ?></td>
                    <td><?= $d['mobil_status'] ?></td>
                    <td class="d-flex justify-content-evenly">
                        <a href="detail.php?id=<?= $d['mobil_id'] ?>" class="btn btn-sm btn-primary">Detail</a>
                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php include "footer.php" ?>