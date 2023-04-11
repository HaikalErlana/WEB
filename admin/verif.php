<?php
include '../koneksi.php';

$id = $_GET['id_transaksi'];

$data = mysqli_query($koneksi, "UPDATE transaksi SET status = 'Verifikasi' WHERE id_transaksi = '$id'");
if ($data) {
?>
    <script>
        alert('Pesanan Berhasil di Verifikasi');
        window.location = 'transaksi.php';
    </script>
<?php
}else{
?>
    <script>
        alert('Pesanan Gagal di Verifikasi');
        window.location = 'transaksi.php';
    </script>
<?php
}
?>