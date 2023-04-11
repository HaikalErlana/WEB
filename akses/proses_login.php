<?php 
    include '../koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    $cek = mysqli_num_rows($login);
    
    $cek_pengguna = mysqli_fetch_array($login);

    if($cek > 0){
        
        if($cek_pengguna['roles'] == 'Admin'){
            $_SESSION['username'] = $cek_pengguna['username'];
            $_SESSION['nama_lengkap'] = $cek_pengguna['nama_lengkap'];
            $_SESSION['foto'] = $cek_pengguna['foto'];
            $_SESSION['roles'] = 'Admin';
            $_SESSION['status'] = 'login';
            header("location:../admin/index.php");
        }else if($cek_pengguna['roles'] == 'Customer'){
            $_SESSION['username'] = $cek_pengguna['username'];
            $_SESSION['nama_lengkap'] = $cek_pengguna['nama_lengkap'];
            $_SESSION['foto'] = $cek_pengguna['foto'];
            $_SESSION['roles'] = 'Customer';
            $_SESSION['status'] = 'login';
            header("location:../user/index.php");
        }
    }else{
        ?>
        <script>
            alert('Username dan Password tidak ditemukan!!');
            window.location = '../index.php';
        </script>
        <?php
        // header("location:proses_login.php?pesan=gagal");
    }
    
?>