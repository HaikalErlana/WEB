<?php
include '../koneksi.php';

$id = $_GET['id_transaksi'];

$data = mysqli_query($koneksi, "UPDATE transaksi SET status = 'Ditolak' WHERE id_transaksi = '$id'");
if ($data) {
?>
    <script>
        alert('Pesanan Berhasil Ditolak');
        window.location = 'transaksi.php';
    </script>
<?php
}else{
?>
    <script>
        alert('Pesanan Gagal Ditolak');
        window.location = 'transaksi.php';
    </script>
<?php
}
?>