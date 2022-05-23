<?php
include "./component/header.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $sql = "SELECT * FROM tb_user WHERE user_username='$username' AND user_password='$password'";
    $result = $conn->query($sql);
    if($result->num_rows>0){

        $d = $result->fetch_array();
        
        session_start();
        $_SESSION['name'] = $d['user_nama'];
        $_SESSION['user_id'] = $d['user_id'];
        $_SESSION['status'] = "login";
        header("location: admin/");
    }else{
        echo "password salah";
    }
    
}

?>
<br><br><br>
<div class="col-md-4 mx-auto p-4 bg-light ">
    <h3>Login</h3>
    <hr>
    <form action="" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" required="required" class="form-control">
        </div>
        <div class="form-group">
            <label for="username">Password</label>
            <input type="password" name="password" required="required" class="form-control">
        </div>
        <div class="form-group mt-4 justify-content-between d-flex">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
            <a href="index.php" class="btn btn-warning text-white">Kembali</a>
        </div>
    </form>
</div>

<?php include "./component/footlogin.php" ?>