<?php 
    include '../koneksi.php';
    ini_set('display_errors', 1);
    if(isset($_POST['submit'])){
       
        if(tambahUser($_POST) > 0){
            ?>
            <script>
                alert('Data Berhasil Ditambah!!');
                window.location = '../index.php';
            </script>
            <?php
        }else{
            ?>
            <script>
                alert('Data Gagal Ditambah!!');
            </script>
            <?php
        }
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Register Page</title>
</head>
<body>
    <div class="container"> 
        <form  method="POST" class="login-register" enctype="multipart/form-data">
            <p class="register-text" style="font-size: 2rem; font-weight: 600;">Register Page</p>
            <div class="input-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" placeholder="Nama Lengkap..." name="nama_lengkap">
            </div>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" placeholder="Username..." name="username">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" placeholder="Password..." name="password">
            </div>
            <div class="input-group1">
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto">
            </div>

              <?php date_default_timezone_set('Asia/Jakarta');?>
              <input type="hidden" name="created_at" value="<?= date('Y-m-d h:i:s') ?>"><br />

              <?php date_default_timezone_set('Asia/Jakarta');?>
              <input type="hidden" name="update_at" value="<?= date('Y-m-d h:i:s') ?>"><br />

            <div class="input-group">
                <button class="btn" type="submit" name="submit">Submit</button>
                <input type="hidden" name="roles" value="Customer">
            </div>
        </form>
    </div>
</body>
</html>