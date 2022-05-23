
<div class="container">
    <h2 class="text-center mt-3">Cara Beli</h2>
    <div class="d-flex justify-content-evenly">
        <?php
        $caraTitle = ["Temukan Mobil Anda", "Tes Drive", "Pengiriman Langsung Ke Rumah", "Pembelian Tanpa Khawatir"];
        $caraDesc = [
            "Temukan mobil yang telah kami pilih dan telah melalui proses inpeksi profesional secara online",
            "Semua mobil kami telah disanitasi sebelum dan setelah test drive, untuk membuat pengalaman Anda aman dan nyaman",
            "Pilih untuk mengambil mobil Anda atau kami kirimkan langsung ke rumah Anda",
            "Nikmati jaminan uang kembali dalam 5 hari ketika Anda membeli mobil dari Alwin Motor",
        ];
        for ($i=0; $i < count($caraTitle) ; $i++) { 
            ?>
            <div class="col-md-3 p-2">
                <div class="border p-4 rounded "
                    style="background: #f9f9f9">
                    <h6><span class="badge bg-warning"><?= $i+1 ?></span >&nbsp;  <?= $caraTitle[$i] ?></h6>
                    <span>
                        <?= $caraDesc[$i] ?>
                    </span>
                </div>
            </div>

            <?php
        }
        ?>
    </div>
</div>