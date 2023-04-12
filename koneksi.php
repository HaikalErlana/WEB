<?php 
    // echo __DIR__;
    session_start();
    $koneksi = mysqli_connect('localhost', 'root', '', 'toko');//ganti lagi nama databasenya nnti

    function query($query){
        global $koneksi;

        $result = mysqli_query($koneksi, $query);
        $rows = [];

        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;
    }

    // proses checkout
    function checkout($data){
        global $koneksi;

        foreach($_SESSION["cart"] as $product_id => $result){
            $barang = query("SELECT * FROM produk WHERE id_produk = '$product_id'")[0];
            $total_harga = $result * $barang["harga"];
            $tanggal = $data["tgl_transaksi"];
            $username = $data["username"];//tambah username
            $alamat = $data["alamat"];
            $no_wa = $data["no_wa"];
            $jml = $data["qty"];
            $nama_penerima = $_POST["nama_penerima"];
            $nama_lengkap = $data["nama_lengkap"];
            $nama_produk = $barang["nama_produk"];
            $harga = $barang["harga"];
            $price = $total_harga;
            $foto = $data["foto"];
            $st = 'proses';

            // Masukin ke database
            $query_checkout = "INSERT INTO transaksi VALUES(
                NULL,
                '$tanggal',
                '$alamat',
                '$no_wa',
                '$username',
                '$nama_penerima',
                '$nama_lengkap',
                '$nama_produk',
                '$harga', 
                '$jml',
                '$price',
                '$foto',
                '$st'
            )";
            //harga, price dll int, jadi gk usah pake petik, angka 0nya gw gk tau apa, ganti aja, tambah username
            mysqli_query($koneksi, $query_checkout);
        }
        return mysqli_affected_rows($koneksi);
    }

    // pengurangan stok
    function penguranganStok($id, $stok){
        global $koneksi;

        // jadi bikin variable buat nampung value stok/qty yang diinput user
        $stok = $_POST['qty'];
    
        // cara nguranginnya adalah stok - $stok, maksudnya 'stok' ini adalah stok yang ada di database dan ;$stok' ini isi stok yang diinput user
        // next buka checkout.php, liat komenan yang gw buat di atas form
        $query = "UPDATE produk SET stok = stok - '$stok' WHERE id_produk='$id'";
        mysqli_query($koneksi, $query);
    
        return mysqli_affected_rows($koneksi);
    }

    // register dan crud user
    function tambahUser($data){
        global $koneksi;

        $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
        $username = htmlspecialchars($data['username']);
        $password = htmlspecialchars($data['password']);
        $name = basename($_FILES["foto"]["name"]); //Ada yg gw ubah tambah basename
        $tmp_name = $_FILES["foto"]["tmp_name"];
        $roles = htmlspecialchars($data['roles']);
        $created_at = htmlspecialchars($data['created_at']);
        $update_at = htmlspecialchars($data['update_at']);
        
        $query = "INSERT INTO user VALUES('', '$nama_lengkap', '$username', '$password', '$name', '$roles', '$created_at', '$update_at')";
        move_uploaded_file($tmp_name, "../imageUser/$name");//ada salah tulis di sini, destinationnya keluar folder dulu

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }
    
    function hapusUser($id){
        global $koneksi;

        $query = "DELETE FROM user WHERE id_user='$id'";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }
    function updateUser($data){
        global $koneksi;

        $id = htmlspecialchars($data['id_user']);
        $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
        $username = $data['username'];
        $password = $data['password'];
        $foto = $_FILES['foto']['name'];
        $files = $_FILES['foto']['tmp_name'];
        $roles = $data['roles'];

        if(empty($foto)){ // empty = buat ngecek klo isi variable trsbt kosong / gak ada isinya, klo gak ada isinya bakal diisi dengan nilai TRUE klo ada isinya diisi dengan nilai FALSE
            $query = "UPDATE user SET nama_lengkap = '$nama_lengkap', username = '$username', password = '$password', roles = '$roles' WHERE id_user = '$id'";
            mysqli_query($koneksi, $query);
        }else{
            $query = "UPDATE user SET nama_lengkap = '$nama_lengkap', username = '$username', password = '$password', foto = '$foto', roles = '$roles' WHERE id_user = '$id'";
            move_uploaded_file($files, "C:/xampp/htdocs/Toko_Laptop4/imageUser/".$foto);
            mysqli_query($koneksi, $query);
        }

        return mysqli_affected_rows($koneksi);
    }

    // crud produk
    function tambahProduk($data){
        global $koneksi;

        $nama_produk = htmlspecialchars($data['nama_produk']);
        $jenis_produk = htmlspecialchars($data['jenis_produk']);
        $harga = $data['harga'];
        $foto = $_FILES['foto']['name'];
        $files = $_FILES['foto']['tmp_name'];
        $stok = $data['stok'];
        // $deskripsi = htmlspecialchars($data['deskripsi']);
        
        $query = "INSERT INTO produk VALUES('', '$nama_produk', '$jenis_produk', '$harga', '$foto', '$stok')";
        move_uploaded_file($files, "C:/xampp/htdocs/Toko_Laptop4/imageProduk/" . $foto);

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function hapusProduk($id){
        global $koneksi;

        $query = "DELETE FROM produk WHERE id_produk='$id'";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function updateProduk($data){
        global $koneksi;

        $id = htmlspecialchars($data['id_produk']);
        $nama_produk = htmlspecialchars($data['nama_produk']);
        $jenis_produk = htmlspecialchars($data['jenis_produk']);
        $harga = $data['harga'];
        $foto = $_FILES['foto']['name'];
        $files = $_FILES['foto']['tmp_name'];
        $stok = $data['stok'];
        // $deskripsi = htmlspecialchars($data['deskripsi']);

        if(empty($foto)){ // empty = buat ngecek klo isi variable trsbt kosong / gak ada isinya
            $query = "UPDATE produk SET nama_produk = '$nama_produk', jenis_produk = '$jenis_produk', harga = '$harga', stok = '$stok' WHERE id_produk = '$id'";
            mysqli_query($koneksi, $query);
        }else{
            $query = "UPDATE produk SET nama_produk = '$nama_produk', jenis_produk = '$jenis_produk', harga = '$harga', foto = '$foto', stok = '$stok' WHERE id_produk = '$id'";
            move_uploaded_file($files, "C:/xampp/htdocs/Toko_Laptop4/imageProduk/".$foto);
            mysqli_query($koneksi, $query);
        }

        return mysqli_affected_rows($koneksi);
    }
?>