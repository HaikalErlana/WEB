<?php 
    include '../../../koneksi.php';

    $id = $_GET['id_produk'];
    $user = query("SELECT * FROM produk WHERE id_produk='$id'")[0];

    if(isset($_POST['submit'])){
        if(updateProduk($_POST) > 0){
            ?>
            <script>
                alert('Produk Berhasil Diubah!!');
                window.location = '../../index.php';
            </script>
            <?php
        }else{
            ?>
            <script>
                alert('Produk Gagal Diubah!!');
                window.location = '../../index.php';
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
    <title>Halaman Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_produk" value="<?= $user['id_produk']; ?>">
        <label for="nama_produk">Nama Produk</label>
        <input type="text" name="nama_produk" id="nama_produk" value="<?= $user['nama_produk']; ?>">
        <br> <br>
        <label for="jenis_produk">Jenis Produk</label>
        <input type="text" name="jenis_produk" id="jenis_produk" value="<?= $user['jenis_produk']; ?>">
        <br> <br>
        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga" value="<?= $user['harga']; ?>">
        <br> <br>
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" value="<?= $user['foto']; ?>">
        <br> <br>
        <label for="stok">Stok</label>
        <input type="number" name="stok" id="stok" value="<?= $user['stok']; ?>">
        <br> <br>
        <!-- <label for="deskripsi">Deskripsi</label> <br>
        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10">
            <?= $user['deskripsi']; ?>
        </textarea> -->
        <br> <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>