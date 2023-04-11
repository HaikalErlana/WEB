<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>
<body>
    <h1>Detail Produk</h1>
    <a href="index.php">Kembali Belanja</a>
    <hr>

    <?php 
        include '../koneksi.php';

        $id = $_GET['id_produk'];

        $data = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id'");

        while($olah = mysqli_fetch_array($data)){
            ?>
                <h1><?= $olah['nama_produk']; ?></h1>
                <img src="../imageProduk/<?= $olah['foto']; ?>" alt="" width="200px">
                <h3>Harga : <?= "Rp. " . number_format($olah['harga']) . " ,-"; ?></h3>
                <h3>Stok : <?= $olah['stok']; ?></h3>
                <h4>Deskripsi</h4>
                <!-- <p><?= $olah['deskripsi']; ?></p> -->
            <?php
        }
    ?>
    
</body>
</html>