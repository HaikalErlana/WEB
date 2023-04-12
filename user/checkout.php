<?php
include '../koneksi.php';
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
    <h2>Checkout</h2>
    <?php foreach ($_SESSION["cart"] as $id_produk => $kuantitas) : ?>
    <?php
        $data = query("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0];
        $subtotal = $data["harga"] * $kuantitas;    
    ?>
    <!-- form action ini ngarah ke proses checkout dengan mengGET id_produknya sebagai kunci untuk di masukkan ke dalam table transaksi -->
    <!-- next buka proses_checkout.php, -->
    <form action="proses_checkout.php?id_produk=<?= $data['id_produk']; ?>" method="post">
        <label for="">Tanggal Transaksi<label><br>
        <input type="datetime-local" name="tgl_transaksi" value="<?= date('Y-m-d'); ?>"><br><br>

        <label for="">Alamat<label><br>
        <input type="text" name="alamat"><br><br>

        <label for="">Nomor WhatsApp<label><br>
        <input type="text" name="no_wa"><br><br>

        <label for="">Nama Pemesan</label><br>
        <input type="text" name="nama_lengkap" value="<?= $_SESSION['nama_lengkap']; ?>" disabled><br><br>
                
        <label for="">Nama Penerima</label><br>
        <input type="text" name="nama_penerima"><br><br>
        <input type="hidden" name="username" value="<?= $_SESSION['username']; ?>"> 
         <!-- gw tambahin input hidden bwt value username -->
        <input type="hidden" name="foto" value="<?= $data['foto']; ?>">
        <input type="hidden" name="qty" value="<?= $kuantitas; ?>">

        <label for="">Nama Produk</label><br>
        <input type="text" name="nama_produk" value="<?= $data['nama_produk']; ?>" disabled><br><br>

        <label for="">Harga Produk</label><br>
        <input type="number" name="harga" value="<?= $data['harga']; ?>" disabled><br><br>

        <label for="">Sub Total Harga</label><br>
        <input type="number" name="subtotal" value="<?= $subtotal; ?>" disabled><br><br>

        <?php endforeach; ?>
        <button type="submit" name="checkout">Checkout</button>
    </form>
</body>

</html>