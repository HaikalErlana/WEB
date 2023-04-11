<?php 
    include '../../koneksi.php';

    $id = $_GET['id_user'];

    if(hapusUser($id) > 0){
            ?>
            <script>
                alert('Data Berhasil Dihapus!!');
                window.location = '../user.php';
            </script>
            <?php
    }else{
            ?>
            <script>
                alert('Data Gagal Dihapus!!');
                window.location = '../user.php';
            </script>
            <?php
    
}

?>