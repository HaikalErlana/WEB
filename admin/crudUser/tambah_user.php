<?php 
    include '../../koneksi.php';

    if(isset($_POST['submit'])){
        if(tambahUser($_POST) != 0){
            ?>
            <script>
                alert('Data Berhasil Ditambah!!');
                // window.location = '../user.php';
            </script>
            <?php
        }else{
            ?>
            <script>
                alert('Data Gagal Ditambah!!');
                // window.location = '../user.php';
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
    <title>Tambah User</title>
</head>
<body>
    <h1>Tambah User</h1>
    <form action="" method="POST">
    <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap">
        <br>
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto">
        <br>
        <input type="hidden" name="roles" value="Customer">
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>