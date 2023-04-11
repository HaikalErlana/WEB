<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
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

        .sidebar a:nth-child(3) li {
            margin-top: 10px;
            color: #455045;
            background-color: #abdbe3;
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
        }

        .main .nav {
            width: 100%;
            height: 100px;
            border-bottom: 3px solid rgba(0, 0, 0, .1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .main h1 {
            padding-left: 20px;
            color: #016124;
        }

        .main h1 span {
            color: #27915c;
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
            margin: 20px 0 30px 25px;
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

        table {
        font-family: 'Poppins', sans-serif;
        color: black;
        text-shadow: 1px 1px 0px #fff;
        background: #eaebec;
        border: #ccc 1px solid;
        }   
 
        table th {
        padding: 15px 35px;
        border-left: 1px solid #e0e0e0;
        border-bottom: 1px solid #e0e0e0;
        background: #ededed;
        }
        
        table th:first-child{  
        border-left:none;  
        }
        
        table tr {
        text-align: center;
        padding-left: 20px;
        }
        
        table td:first-child {
        text-align: left;
        padding-left: 20px;
        border-left: 0;
        }
        
        table td {
        padding: 15px 35px;
        border-top: 1px solid #ffffff;
        border-bottom: 1px solid #e0e0e0;
        border-left: 1px solid #e0e0e0;
        background: #fafafa;
        background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
        background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
        }
        
        table tr:last-child td {
        border-bottom: 0;
        }
        
        table tr:last-child td:first-child {
        -moz-border-radius-bottomleft: 3px;
        -webkit-border-bottom-left-radius: 3px;
        border-bottom-left-radius: 3px;
        }
        
        table tr:last-child td:last-child {
        -moz-border-radius-bottomright: 3px;
        -webkit-border-bottom-right-radius: 3px;
        border-bottom-right-radius: 3px;
        }
        
        table tr:hover td {
        background: #f2f2f2;
        background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
        background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
        }
    </style>
</head>

<body>
    <div class="container">
        <ul class="sidebar">
            <h1>Mon<span>Laptop</span></h1>
            <a href="index.php">
                <li>Data Produk</li>
            </a>
            <a href="">
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
                <h1>Welcome <span>Admin</span></h1>
                <div class="nameAdmin">
                    <!-- <img src="../imageUser/<?= $_SESSION['foto'] ?>" class="foto"> -->
                    <p><?= $_SESSION['nama_lengkap']; ?></p>
                </div>
            </div>
            <h2>Data User</h2>
            <table border="1" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <!-- <th>Foto</th> -->
                    <th>Roles</th>
                    <th>Aksi</th>
                </tr>
                <?php
                // include '../koneksi.php';

                $query = mysqli_query($koneksi, "SELECT * FROM user");
                $no = 1;
                foreach ($query as $data) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_lengkap']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <!-- <td><img src="../imageUser/<?= $data["foto"] ?>" alt="" width="70px"></td> -->
                        <td><?php echo $data['roles']; ?></td>
                        <td>
                            <a class="text-primary me-2" href="crudUser/edit_user.php?id_user=<?= $data['id_user']; ?>"><i class="uil uil-pen"></i></a>
                            <a class="text-danger me-2" href="crudUser/hapus_user.php?id_user=<?= $data['id_user']; ?>" onclick="return confirm('Yakin Mau dihapuss??')"><i class="uil uil-trash" style="color: #E40000;"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>