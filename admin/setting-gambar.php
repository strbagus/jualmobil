<?php
    include "header.php";
    $id = $_GET['id'];
    
    $selTema = "SELECT * FROM tb_tema WHERE tema_id='$id'";
    $rtema = $conn->query($selTema);
    $dtema = $rtema->fetch_assoc();

    if(isset($_POST['upGambar'])){
        //delete
        if(unlink("../assets/images/tema/".$dtema['tema_filename'])){
            $filename = $_FILES["gambar"]["name"];
            $tempname = $_FILES["gambar"]["tmp_name"];   
            $folder = "../assets/images/tema/".$filename;
            //update
            $sqlgambar = "UPDATE tb_tema SET tema_filename='$filename' WHERE tema_id='$id'";
            $rgambar = $conn->query($sqlgambar);
            if($rgambar){
                //move
                if(move_uploaded_file($tempname, $folder)){
                    header("location: setting.php");
                }else{
                    echo "gagal mengupload gambar";
                }
            }

        }else{
            echo "gagal menghapus gambar yang ada";
        }
    }
?>
    <h3 class="text-center">Update Gambar - <?= $dtema['tema_nama'] ?></h3>
    <hr>
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="gambar">Upload <?= $dtema['tema_nama'] ?></label>
                    <input type="file" name="gambar" class="form-control" required="required">
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <input type="submit" value="Upload" class="btn btn-primary" name="upGambar">
                </div>
            </form>
        </div>
    </div>
<?php
    include "footer.php";
?>