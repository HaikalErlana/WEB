<?php

session_start();

$id = $_POST["id_produk"];
$qty = $_POST["qty"];

$_SESSION["cart"][$id] = $qty;

?>
<script>
    alert('Kuatitas Berhasil di ubah');
    window.location = 'isi_keranjang.php';
</script>
<?php

?>