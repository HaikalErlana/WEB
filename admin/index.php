<?php
 include '../koneksi.php';
if(!isset($_SESSION['status'])) {
?>
    <script>
        alert('Silahkan Login Terlebih dahulu!!!!');
        window.location = '../akses/login.php?pesan=belum_login';
    </script>
<?php
}
if ($_SESSION['roles'] != 'Admin') {
?>
    <script>
        alert('Anda Tidak bisa akses halaman Admin!!!!');
        window.location = '../user/index.php?pesan=hanya_elit_global_yg_bisa_masukk';
    </script>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Halaman Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        li {
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        .container {
            width: 100%;
            height: 100%;
            display: grid;
            grid-template-areas: 'sidebar main';
            grid-template-columns: 300px 1fr;
            grid-template-rows: 876px;
        }

        .sidebar {
            grid-area: 'sidebar';
            background-color: #e6f4f7;
        }

        .sidebar h1 {
            margin: 30px 0 0 20px;
            text-align: center;
            color: #678388;
            font-size: 2.5em;
        }

        .sidebar h1 span {
            color:  #abdbe3;
            font-weight: normal;
        }

        .sidebar a:nth-child(2) li {
            margin-top: 40px;
            color: #455045;
            background-color:  #abdbe3;
        }

        .sidebar a:hover li {
            background-color: #abdbe3;
            color: #678388;
        }

        .sidebar li {
            width: 100%;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px auto;
            font-weight: bold;
            color: rgba(0, 0, 0, .2);
            transition: .3s;
        }

        .main {
            grid-area: 'main';
            overflow-x: scroll;
            position: relative;
        }

        .main .nav {
            width: 100%;
            height: 100px;
            border-bottom: 3px solid rgba(0, 0, 0, .1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
            .main .nav i {
            position: fixed;
            font-size: 22px;
            cursor: pointer;
            top: 73px;
            margin-left: 10px;
            width: 50px;
            height: 50px;
            border: 2px solid #27915c75;
            border-radius: 50%;
            background-color: #01612415;
            backdrop-filter: blur(6px);
            display: grid;
            place-items: center;
        }
        .main h1 {
            padding-left: 20px;
            color: #678388;
        }

        .main h1 span {
            color: #abdbe3;
        }

        .main .nameAdmin {
            width: 180px;
            height: 50px;
            background-color: #abdbe3;
            border: 2px solid #89afb6;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            margin-right: 30px;
        }

        .main .nameAdmin .foto {
            width: 40px;
            height: 40px;
        }

        .main h2 {
            margin: 30px 0 30px 25px;
            color: #016124;
        }

        .main .tp {
            padding: 6px 20px;
            margin-left: 25px;
            border-radius: 5px;
            color: black;
            background-color: #e6f4f7;
            border: 2px solid #89afb6;
            font-weight: bold;
            font-size: 15px;
        } 
        .main table {
            width: calc(100% - 50px);
            margin: 25px auto;
        }

    
    </style>
</head>

<body>
    <div id="induk" class="container">
        <ul class="sidebar">
            <h1>To<span>Laptop</span></h1>
            <a href="">
                <li>Data Produk</li>
            </a>
            <a href="user.php">
                <li>Data User</li>
            </a>
            <a href="transaksi.php">
                <li>Data Transaksi</li>
            </a>
            <a href="../akses/logout.php">
                <li>Logout</li>
            </a>
        </ul>
        <div class="main">
            <div class="nav">
                <i class="fa fa-close" aria-hidden="true" id="btn"></i>
                <h1>Welcome <span>Admin</span></h1>
                <div class="nameAdmin">
                    <!-- <img src="../imageUser/<?= $_SESSION['foto'] ?>" class="foto"> -->
                    <p><?= $_SESSION['nama_lengkap']; ?></p>
                </div>
            </div>
            <h2>Data Produk</h2>
            <a href="produk/crud/tambah_produk.php" class="tp">Tambah Produk</a>
            
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jenis Produk</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php

                $query = mysqli_query($koneksi, "SELECT * FROM produk");
                $no = 1;
                foreach ($query as $data) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_produk']; ?></td>
                        <td><?php echo $data['jenis_produk']; ?></td>
                        <td><?php echo "Rp. " . number_format($data['harga']) . " ,-" ?></td>
                        <td><img src="../imageProduk/<?= $data["foto"] ?>" alt="" width="150px" height="150px"></td>
                        <td><?php echo $data['stok']; ?></td>
                        <td>
                            <a href="produk/crud/edit_produk.php?id_produk=<?= $data['id_produk']; ?>">Edit</a>
                            <a href="produk/crud/hapus_produk.php?id_produk=<?= $data['id_produk']; ?>" onclick="return confirm('Yakin Mau dihapuss??')">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>


    <script>
        const sidebar = document.querySelector('.container .sidebar');
        const clsButton = document.getElementById('btn');
        const induk = document.getElementById('#induk');
        clsButton.addEventListener('click', function(){
            induk.style.gridTemplateAreas = 'main';
            sidebar.style.gridArea = '';
            
        });
    </script>
</body>

</html>