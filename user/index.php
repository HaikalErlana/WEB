<?php
include '../koneksi.php';
include '../layout/navbar.php';
if (!isset($_SESSION['status'])) {
?>
    <script>
        alert('Silahkan Login Terlebih dahulu!!!!');
        window.location = '../akses/login.php?pesan=belum_login';
    </script>
<?php
}
if ($_SESSION['roles'] != 'Customer') {
?>
    <script>
        alert('Minimal Logout dlu!!!!');
        window.location = '../admin/index.php?pesan=logout_dlu';
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
    <title>Toko Laptop</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins' ,sans-serif;
        }

        body {
            background-color: #fcfcfc;
        }

        li {
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        nav {
            width: 100%;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #89afb6;
            background-color: #e6f4f7;
        }

        nav h1 {
            font-size: 1.8em;
            margin-left: 30px;
            color: #678388;
        }

        nav h1 span {
            color: #abdbe3;
        }

        nav form {
            width: 800px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        nav form::after {
            content: '';
            position: absolute;
            height: calc(100% - 20px);
            width: 10px;
            left: 0;
            background-color: #f06e12;
            border-radius: 5px 0 0 5px;
            z-index: 1;
        }

        nav form input {
            width: calc(100% - 10px);
            height: calc(100% - 20px);
            outline: none;
            border: none;
            font-size: 18px;
            padding: 0 50px 0 20px;
            color: #455045;
        }

        nav form .btn {
            position: absolute;
            height: calc(100% - 20px);
            width: 50px;
            right: 0;
            border: none;
            background-color: #f06e12;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            color: #fcfcfc;
            font-size: 20px;
        }

        nav .login {
            width: 100px;
            height: 40px;
            border: 2px solid #89afb6;
            font-size: 15px;
            font-weight: bold;
            color: #016124;
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
        }

        nav a i {
            width: 40px;
            height: 40px;
            border: 2px solid #89afb6;
            /* font-size: 15px; */
            font-weight: bold;
            color: #016124;
            font-size: 13px;
            margin-right: 30px;
            padding: 10px 11px;
            border-radius: 5px;
        }

        nav .riwayat {
            /* font-family: 'Poppins', sans-serif; */
            /* text-align: center; */
            width: 100px;
            height: 30px;
            border: 2px solid #89afb6;
            font-weight: 600;
            color: #016124;
            font-size: 14px;
            margin-right: 10px;
            padding: 10px 11px 27px 21px;
            border-radius: 5px;
        }

        .hero {
            width: calc(100% - 60px);
            height: 400px;
            margin: 50px auto 0;
            border-radius: 10px;
            outline: white solid 1px;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='2000' height='450' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1010%26quot%3b)' fill='rgba(41,158,193,255)'%3e%3crect width='1440' height='560' x='0' y='0' fill='rgba(116,207,226,255)'%3e%3c/rect%3e%3cpath d='M0%2c334.798C66.307%2c328.401%2c129.278%2c320.325%2c192.635%2c299.746C276.032%2c272.658%2c382.261%2c270.208%2c428.406%2c195.646C474.182%2c121.679%2c449.412%2c20.243%2c415.075%2c-59.679C384.5%2c-130.845%2c309.458%2c-166.699%2c250.931%2c-217.433C201.475%2c-260.304%2c155.362%2c-302.528%2c98.182%2c-334.376C26.249%2c-374.441%2c-43.139%2c-430.838%2c-125.389%2c-427.036C-214.445%2c-422.919%2c-308.269%2c-384.74%2c-361.374%2c-313.132C-413.766%2c-242.485%2c-409.866%2c-144.778%2c-399.487%2c-57.438C-390.727%2c16.282%2c-338.342%2c72.901%2c-307.478%2c140.42C-276.628%2c207.908%2c-280.824%2c299.721%2c-218.101%2c339.372C-155.365%2c379.031%2c-73.877%2c341.925%2c0%2c334.798' fill='rgba(29,142,184,255)'%3e%3c/path%3e%3cpath d='M1440 1146.895C1558.248 1138.103 1693.188 1171.8229999999999 1784.874 1096.634 1875.974 1021.925 1872.703 884.614 1899.676 769.927 1921.596 676.726 1917.57 585.118 1927.569 489.898 1941.476 357.464 2027.72 220.77800000000002 1969.94 100.805 1911.626-20.277000000000044 1767.93-80.25199999999995 1637.459-112.48199999999997 1509.97-143.97500000000002 1365.347-144.543 1253.179-76.25300000000004 1147.423-11.866999999999962 1147.018 142.301 1065.663 235.635 983.928 329.405 819.312 346.876 781.16 465.273 743.136 583.274 831.71 701.621 878.513 816.423 927.376 936.2760000000001 948.969 1084.8400000000001 1060.5140000000001 1150.491 1171.787 1215.983 1311.239 1156.469 1440 1146.895' fill='rgba(41,158,193,255)'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1010'%3e%3crect width='1440' height='560' fill='rgba(41,158,193,255)'%3e%3c/rect%3e%3c/mask%3e%3c/defs%3e%3c/svg%3e");
            /* background: linear-gradient(to top left, ); */
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            z-index: -2;
        }

        .hero .teks {
            width: 600px;
            height: calc(100% - 100px);
            position: relative;
            z-index: 3;
        }

        .hero .teks::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 100%;
            /* background-color: #70bda275; */
            bottom: -50px;
            border-radius: 0 100% 0 0;
            z-index: -1;
        }

        .hero .teks h1 {
            margin: 30px 0 10px 70px;
            font-size: 2.5em;
            color: #fcfcfc;
        }

        .hero .teks p {
            font-weight: 400;
            font-size: 1.1em;
            margin: 20px 0 10px 75px;
            color: #fcfcfc;
        }

        .hero .gambar {
            width: 500px;
            margin-right: 100px;
            height: calc(100% - 35px);
            background-image: url('../imageProduk/asss.png');
            background-size: 500px;
            background-repeat: no-repeat;
            margin-bottom: 20px;
            background-position: -10px 30px;
        }

        .np {
            color: #455045;
            padding: 30px 40px;
        }

        ul .produk {
            width: 100%;
            display: flex;
            align-items: flex-start;
            flex-wrap: wrap;
            flex-flow: row wrap;
            margin: -60px auto 50px;
            padding: 0 10px;
        }

        ul .produk .list-produk {
            width: 200px;
            height: auto;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            margin-left: 18px;
            margin-top: 60px;
        }

        ul .produk .list-produk li:nth-child(1) {
            width: calc(100% - 30px);
            height: 150px;
            margin: 15px auto 10px;
            border: 2px solid #89afb6;
            display: grid;
            place-items: center;
            background-color: #e6f4f7;
            border-radius: 10px;
        }

        ul .produk .list-produk li:nth-child(1) img {
            width: 70%;
            height: auto;
        }

        ul .produk .list-produk li:nth-child(2) {
            padding: 5px 17px 10px;
            font-weight: bold;
            font-size: 18px;
        }

        ul .produk .list-produk li:nth-child(3) {
            padding: 0 18px 10px;
            font-weight: bold;
            color: rgba(0, 0, 0, .5);
            font-size: 18px;
        }

        ul .produk .list-produk li:nth-child(4) {
            width: 100%;
            height: 50px;
            margin: 10px 0;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }

        ul .produk .list-produk li:nth-child(4) a:nth-child(1) {
            padding: 10px 32px;
            border: 2px solid #89afb6;
            border-radius: 5px;
            background-color: #e6f4f7;
            text-align: center;
            color: #678388;
            /* margin-left: 14px; */
        }

        ul .produk .list-produk li:nth-child(4) a:nth-child(2) {
            border: 2px solid #89afb6;
            border-radius: 5px;
            background-color: #e6f4f7;
            text-align: center;
            color: #678388;
            padding: 10px 15px;
            /* margin-right: 10px; */
        }
    </style>
</head>

<body>
    <div class="hero">
        <div class="teks">
        <h1>Laptop Berkualitas dan Terpercaya</h1>
            <p>Memiliki Berbagai Jenis Laptop yang berkualitas, Aman dan Terjangkau</p>
        </div>
        <div class="gambar"></div>
    </div>
    <h1 class="np">Product</h1>
    <ul>
        <li class="produk">
            <?php
            if (isset($_GET['cari'])) {
                $cari = $_GET['cari'];
                $data = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk LIKE '%" . $cari . "%'");
            } else {
                $data = mysqli_query($koneksi, "SELECT * FROM produk WHERE stok > 0");
            }
            $no = 1;
            while ($row = mysqli_fetch_array($data)) {
            ?>
                <ul class="list-produk">
                    <li><img src="../imageProduk/<?= $row['foto']; ?>" alt="" width="70px"></li>
                    <li><?php echo $row['nama_produk']; ?> <br> stok : <?php echo $row['stok'];?></li>
                    <li><?php echo "Rp. " . number_format($row['harga']) . " ,-" ?></li>
                    <li>
                        <a href="detail.php?id_produk=<?= $row['id_produk']; ?>">Detail</a>
                        <a href="keranjang.php?id_produk=<?= $row['id_produk']; ?>">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <!-- <form action="pesan.php?id_produk=" method="POST">
                        <input type="number" name="qty">
                        <button type="submit" name="beli" onclick="return confirm('Apakah anda ingin memesan?')">Pesan</button>
                        </form> -->
                    </li>
                </ul>
            <?php
            }
            ?>
        </li>
    </ul>
</body>

</html>