<?php 
    include '../../koneksi.php';

    $id = $_GET['id_user'];
    $user = query("SELECT * FROM user WHERE id_user='$id'")[0];

    if(isset($_POST['submit'])){
        if(updateUser($_POST) > 0){
            ?>
            <script>
                alert('Data User Berhasil Diubah!!');
                window.location = '../user.php';
            </script>
            <?php
        }else{
            ?>
            <!-- <script>
                alert('Data User Gagal Diubah!!');
                window.location = '../user.php';
            </script> -->
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
    <title>Halaman Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" value="<?= $user['nama_lengkap']; ?>">
        <br> <br>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?= $user['username']; ?>">
        <br> <br>
        <label for="password">Password</label>
        <input type="text" name="password" id="password" value="<?= $user['password']; ?>">
        <br> <br>
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" value="<?= $user['foto']; ?>">
        <br> <br>
        <label for="roles">roles</label>
        <select name="roles" id="roles">
            <option value="Admin">Admin</option>
            <option value="Customer">Customer</option>
        </select>
        <br> <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>