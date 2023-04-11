<?php include '../koneksi.php'; ?>
<?php $proses = query("SELECT * FROM transaksi WHERE username = '{$_SESSION['username']}' and status='Proses'"); ?>
<?php $verif = query("SELECT * FROM transaksi WHERE username = '{$_SESSION['username']}' and status='Verifikasi'"); ?>
<?php $tolak = query("SELECT * FROM transaksi WHERE username = '{$_SESSION['username']}' and status='Ditolak'"); ?>
<?php if (!isset($_SESSION["username"])) :
    echo "<script>
            alert('Anda belum login, silahkan login dulu!');
            window.location = 'login/index.php';
            </script>";
endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Customer</title>
    <link rel="stylesheet" href="style/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="informasi">
            <h2>Selamat Datang <?= $_SESSION["username"]; ?>, ini adalah list riwayat belanjaan kamu</h2><br>
            <a href="cetak.php" class="btn btn-md btn-warning" style="margin-bottom: 10px">Cetak Riwayat Pemesanan</a>
        </div>
        <div class="data-transaksi">
            <table>
                <tr>
                    <th>No</th>
                    <th>Tanggal Transaksi</th>
                    <th>Alamat</th>
                    <th>Nomor Whatsapp</th>
                    <th>Nama Penerima</th>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah Barang</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>
                <?php  // gw tambahin di querynya
                    $username = $_SESSION["username"];
                    $transaksi = query("SELECT * FROM transaksi WHERE username = '$username'"); 
                    ?>
                    <?php $i = 1; ?>
                    <?php foreach($proses as $data) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $data["tgl_transaksi"]; ?></td>
                        <td><?= $data["alamat"]; ?></td>
                        <td><?= $data["no_whatapp"]; ?></td>
                        <td><?= $data["nama_penerima"]; ?></td>
                        <td><?= $data["nama_produk"]; ?></td>
                        <td>Rp.<?= number_format ($data["harga"]); ?></td>
                        <td><?= $data["jmlh_barang"]; ?></td>
                        <td>Rp. <?= number_format($data["subtotal"], 0, '', '.'); ?></td>
                        <td><?= $data["status"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class="data-transaksi">
            <table>
                <tr>
                    <th>No</th>
                    <th>Tanggal Transaksi</th>
                    <th>Alamat</th>
                    <th>Nomor Whatsapp</th>
                    <th>Nama Penerima</th>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah Barang</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>
                <?php  // gw tambahin di querynya
                    $username = $_SESSION["username"];
                    $transaksi = query("SELECT * FROM transaksi WHERE username = '$username'"); 
                    ?>
                    <?php $i = 1; ?>
                    <?php foreach($verif as $data) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $data["tgl_transaksi"]; ?></td>
                        <td><?= $data["alamat"]; ?></td>
                        <td><?= $data["no_whatapp"]; ?></td>
                        <td><?= $data["nama_penerima"]; ?></td>
                        <td><?= $data["nama_produk"]; ?></td>
                        <td>Rp.<?= number_format ($data["harga"]); ?></td>
                        <td><?= $data["jmlh_barang"]; ?></td>
                        <td>Rp. <?= number_format($data["subtotal"], 0, '', '.'); ?></td>
                        <td><?= $data["status"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>

                <?php  // gw tambahin di querynya
                    $username = $_SESSION["username"];
                    $transaksi = query("SELECT * FROM transaksi WHERE username = '$username'"); 
                    ?>
                    <?php $i = 1; ?>
                    <?php foreach($tolak as $data) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $data["tgl_transaksi"]; ?></td>
                        <td><?= $data["alamat"]; ?></td>
                        <td><?= $data["no_whatapp"]; ?></td>
                        <td><?= $data["nama_penerima"]; ?></td>
                        <td><?= $data["nama_produk"]; ?></td>
                        <td>Rp.<?= number_format ($data["harga"]); ?></td>
                        <td><?= $data["jmlh_barang"]; ?></td>
                        <td>Rp. <?= number_format($data["subtotal"], 0, '', '.'); ?></td>
                        <td><?= $data["status"]; ?></td>
                    </tr>
                    <?php $i++; ?>
            <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>