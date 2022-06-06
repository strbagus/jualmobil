<?php
include "header.php";
$sqltema = "SELECT * FROM tb_tema";
$rtema = $conn->query($sqltema);
?>
<h3 class="text-center">Pengaturan tema</h3>
<hr>
<div class="flex-column d-flex">
    <?php
        while($dtema = $rtema->fetch_array()){
            ?>
            <div class="row my-2">
                <h4><?= $dtema['tema_nama'] ?>&nbsp;|</h4>
                <div class="d-flex">
                    <div class="col-md-6 p-3">
                        <div class="bg-secondary shadow p-2 rounded d-flex justify-content-center">
                            <img src="../assets/images/tema/<?= $dtema['tema_filename'] ?>" 
                                alt="gambar <?= $dtema['tema_filename'] ?>"
                                >
                        </div>
                    </div>
                    <div class="col-md-6 p-3">
                        <a href="setting-gambar.php?id=<?= $dtema['tema_id'] ?>">
                            <div class="btn btn-sm btn-primary">Ubah Gambar</div>
                        </a>

                    </div>
                </div>
            </div>

            <?php
        }
    ?>
</div>
<?php
include "footer.php"
?>