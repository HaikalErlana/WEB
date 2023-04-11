<?php require 'koneksi.php';
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="assets/css/navbar.css"> -->

    <title>Riwayat</title>
  </head>
  <body>


<!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
      <div class="container">
        <a class="navbar-brand" href="index.php">RIWAYAT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="user/index.php">Beranda</a>
            </li>
            <?php if (isset($_SESSION["username"])) : ?>
            <!-- <li class="nav-item">
              <a class="nav-link" href="keranjang.php">Keranjang <span class="sr-only">(current)</span></a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="checkout.php">Checkout</a>
              </li>

              <li>
                <a class="nav-link active" href="riwayat.php">Riwayat</a>
              </li>

               <li >
                <a class="nav-link" href="akses/logout.php">Log Out</a>
              </li> -->

           <?php else:  ?>
             </li>
               <li >
                <a class="nav-link" href="login">Login</a>
              </li>
           <?php endif ?>
            
          </ul>
        </div>
      </div>
  </nav>

  <br>

<div class="container">
    <h2>Riwayat Transaksi</h2><hr>
            
        <table class="table" border="1" collpadding="10" collspacing="0">
            <thead class="thead-light">
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
            </thead>
            
            <?php  // gw tambahin di querynya
            $username = $_SESSION["username"];
            $transaksi = query("SELECT * FROM transaksi WHERE username = '$username'"); 
            ?>
            <?php $i = 1; ?>
            <?php foreach($transaksi as $data) : ?>
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
</body>
</html>