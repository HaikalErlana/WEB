<?php
include '../koneksi.php';
$id = $_GET['id_produk'];
$qty = $_POST['qty'];

if (isset($_POST['checkout'])) {
    if (checkout($_POST) > 0) {
        // id_produk yang di action tadi di tampung di variable $id, di masukin ke dalam parameter function untuk di kasih tau klo stoknya bakal berkurang di id produk yg ini
        // sementara isi stok yg diinput user di taro di $qty, liat komenan gw di bawah
        if (penguranganStok($id, $qty) > 0) {
            // jadi sebenranya $_SESSION itu sebenarnya variabel, variabel yang super karena bisa di akses di berbagai file
            // $_SESSION['cart'] => ['cart'] ini sebagai namanya kek nama variabel pada umunya masbro
            // $_SESSION['cart'][$id] => [$id] itu sebagai penanda / index id_produknya 
            // $_SESSION["cart"][$id] = $qty => $qty itu isi dari variabel $_SESSION["cart"], isinya apa?? yaa stok yg diinput user
            // dah segitu aja semoga paham mass
            $_SESSION["cart"][$id] = $qty;
        ?>
            <script>
                alert("Yeayyy!! Barang berhasil dipesan, silahkan ditunggu proses verifikasinya ya");
                window.location = 'index.php';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Barang Gagal Dipesan!!');
                window.location = 'index.php';
            </script>
        <?php
        }
    } else {
        echo mysqli_error($koneksi);
    }
}


?>