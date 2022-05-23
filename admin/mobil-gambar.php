<?php
include "header.php";
$sqlmobil = "SELECT * FROM tb_mobil ORDER BY mobil_id DESC LIMIT 1";
$rmobil = $conn->query($sqlmobil);
$dmobil = $rmobil->fetch_assoc();

if(isset($_POST['uploadGambar'])){
    $filename = $_FILES["gambar"]["name"];
    $tempname = $_FILES["gambar"]["tmp_name"];   
    $folder = "../assets/images/mobil/".$filename;
    $id = $dmobil['mobil_id'];

    $sqlgambar = "INSERT INTO 
                    tb_mobil_gambar 
                    (mg_filename, mg_mobil) 
                    VALUES 
                    ('$filename','$id')";
    $rgambar = $conn->query($sqlgambar);
    if(move_uploaded_file($tempname, $folder)){
        header("location: mobil.php");
    }

}
?>
<h3 class="text-center">Gambar - <?= $dmobil['mobil_nama'] ?></h3>
<hr>
<div class="col-md-5 mx-auto">
    <!-- <h5>Input gambar di sini</h5> -->
    <form action="" method="post" enctype="multipart/form-data" >
        <div class="form-group">
            <label for="gambar">Gambar Mobil</label>
            <input type="file" name="gambar" required="required" class="form-control">
        </div>
        <div class="d-flex justify-content-center mt-3">
            <input type="submit" value="Simpan" name="uploadGambar" class="btn btn-primary">    
        </div>
    </form>
</div>
<?php
include "footer.php";
?>