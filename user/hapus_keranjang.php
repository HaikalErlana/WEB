<?php
session_start();
include '../koneksi.php';
$id = $_GET['id_produk'];
unset($_SESSION["cart"][$id]);
?>
<script>
    alert('Barang Berhasil di hapus');
    window.location = 'isi_keranjang.php';
</script>
<?php
?>