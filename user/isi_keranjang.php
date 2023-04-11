<?php
include '../koneksi.php';
if (empty($_SESSION["cart"] || isset($_SESSION["cart"]))) {
    echo "
    <script type='text/javascript'>
        alert('Keranjang anda masih kosong, Silahkan Belanja Terlebih Dahulu');
        window.location = 'index.php';
    </script>
    ";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Keranjang</title>
</head>

<body>
    <h2>Kerangjang Belanja Kamu</h2>
    <a href="index.php">Kembali Belanja</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Foto</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
        <?php $grandTotal = 0; ?>
        <?php foreach ($_SESSION["cart"] as $id_produk => $kuantitas) : ?>
            <!-- $_SESSION["cart"]. Setiap elemen tersebut merupakan pasangan key-value, di mana key adalah id_produk dan value adalah $kuantitas atau jumlah produk yang dimasukkan ke dalam keranjang. -->
            <?php 
            $data = query("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0];
            $totalHarga = $data["harga"] * $kuantitas;
            $grandTotal += $totalHarga;
            ?>
            <tr>
                <td><img src="../imageProduk/<?= $data["foto"]; ?>" width="200"></td>
                <td><?= $data["nama_produk"]; ?></td>
                <td>Rp. <?= number_format($data["harga"]); ?> -,</td>
                <td><?= $kuantitas; ?></td>
                <td>Rp. <?= number_format("$totalHarga"); ?></td>
                <td>
                    <a href="edit_keranjang.php?id_produk=<?= $data["id_produk"]; ?>">Edit</a>
                    <a href="hapus_keranjang.php?id_produk=<?= $data["id_produk"]; ?>" onclick="return confirm('Apakah Anda yakin ingin dihapus??')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="5">
                <h4>Grand Total</h4>
                <p>Rp. <?= number_format("$grandTotal"); ?> -,</p>
            </td>
            <td>
                <a href="checkout.php">Checkout</a>
            </td>
        </tr>
    </table>

</body>

</html>