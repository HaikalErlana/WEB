<?php 
    include '../../../koneksi.php';

    $id = $_GET['id_produk'];

    if(hapusProduk($id) > 0){
            ?>
            <script>
                alert('Data Berhasil Dihapus!!');
                window.location = '../../index.php';
            </script>
            <?php
    }else{
            ?>
            <script>
                alert('Data Gagal Dihapus!!');
                window.location = '../../index.php';
            </script>
            <?php
    
}

?>