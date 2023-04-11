<?php
include '../koneksi.php';
$koneksi = mysqli_connect('localhost', 'root', '', 'Toko');

$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$foto = $_FILES['foto'];
$roles = $_POST['roles'];
$created_at = $_POST['created_at'];
$update_at = $_POST['update_at'];

// $input = mysqli_query($koneksi,"INSERT INTO user VALUES('', '$nama_lengkap', '$username', '$password', '$foto' '$roles', '', '')");
    if(isset($_POST['submit'])){
        if(tambahUser($_POST) == 0){
            ?>
            <script>
                alert('Data Berhasil Ditambah!!');
                // window.location = '../index.php';
            </script>
            <?php
        }else{
            ?>
            <script>
                alert('Data Gagal Ditambah!!');
                // window.location = 'register.php';
            </script>
            <?php
        }
    }
?>

// if($input)
//     ?>
//             <script>
//                 alert('Data Berhasil Ditambah!!');
//                 window.location = '../index.php';
//             </script>
//     <?php
// }else{
//     ?>
//             <script>
//                 alert('Data Gagal Ditambah!!');
//                 window.location = 'register.php';
//             </script>
//     <?php
// }

// ?>