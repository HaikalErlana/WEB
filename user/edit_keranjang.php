<?php 
    session_start();
    include '../koneksi.php';
    $id = $_GET['id_produk'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Keranjang</title>
</head>
<body>
    <H1>Edit Kuantitas Produk</H1>
    <form action="proses_editkeranjang.php" method="POST">
        <input type="hidden" name="id_produk" value="<?= $id; ?>">
        <label for="qty">Kuantitas</label>
        <input type="number" name="qty" id="qty" value="<?= $_SESSION['cart'][$_GET['id_produk']]; ?>">
        <button type="submit" name="edit">Edit</button>
    </form>
</body>
</html>