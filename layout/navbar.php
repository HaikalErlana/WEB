<nav>
        <h1>Monday<span>Laptop</span></h1>
        <form action="index.php">
            <input type="text" name="cari" placeholder="Search Produk">
            <button type="submit" class="btn">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
        <div style="display: flex; align-items: ;">
            <div class="login"><?= $_SESSION['nama_lengkap']; ?></div>
            <a class="riwayat" href="../riwayat.php">
                Riwayat<!-- <i>Riwayat</i> -->
            </a>
            <a href="../user/isi_keranjang.php">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </a>
            <a href="../akses/logout.php">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
            </a>
        </div>
    </nav>