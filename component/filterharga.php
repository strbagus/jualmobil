
<div class="filter-harga d-flex flex-wrap mt-2 justify-content-center">
    <?php 
    $rentangHarga = ["Dibawah Rp 100jt","Rp 100jt - Rp 200jt","Rp 200jt - Rp 300jt","Diatas Rp 300jt",];
    for ($i=0; $i < count($rentangHarga)  ; $i++) { 
    ?>
        <div class="col-md-3 py-1">
            <a href="etalase.php?harga=<?= $i ?>" 
                class="py-1 px-3 mx-4 bg-white text-decoration-none" 
                style="border-radius: 50px">
                <?= $rentangHarga[$i] ?>
            </a>
        </div>
        <?php
    }
    ?>
    
</div>