<?php
include '../koneksi.php';
$id = $_GET["id_produk"];
$produk = query("SELECT * FROM produk WHERE id_produk = '$id'")[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
</head>

<body>
    <h1>Detail Produk</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <form action="" method="POST">
            <tr class="judul">
                <th colspan="3">DETAIL PRODUK</th>
            </tr>
            <tr>
                <td rowspan="7"><img src="../imageProduk/<?= $produk["foto"]; ?>" width="200"></td>
            </tr>
            <tr>
                <td>Nama Produk</td>
                <td><?= $produk["nama_produk"]; ?></td>
            </tr>
            <tr>
                <td>Harga Produk</td>
                <td><?= $produk["harga"]; ?></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><?= $produk["stok"]; ?></td>
            </tr>
            <!-- <tr>
                <td>Deskripsi</td>
                <td><?= $produk["deskripsi"]; ?></td>
            </tr> -->
            <tr>
                <td colspan="2">
                    Masukkan Jumlah Produk Yang Ingin Dibeli <br />
                    <input type="number" name="qty" id="qty" value="1" min="1">
                </td>
            </tr>
            <tr>
                <td colspan="7"><button type="submit" name="beli">Add To Cart</button></td>
            </tr>
        </form>
    </table>
</body>

</html>


<?php
if (isset($_POST["beli"])) {
    $qty = $_POST["qty"];
        if($qty > $produk["stok"]){
            echo '
            <script type="text/javascript">
            alert("Produk yang dipesan melebihi stok yang ada")</script>';
            
            echo '
            <script type="text/javascript">
            location = "index.php";
            </script>';
        }else{
            $_SESSION["cart"][$id] = $qty;
            echo '
            <script type="text/javascript">
            alert("Produk telah ditambahkan ke dalam keranjang")</script>';
    
            echo '
            <script type="text/javascript">
                location = "isi_keranjang.php";
            </script>';
        }
    }
?>
