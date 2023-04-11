<?php 
    // Sambungkan ke fpdf library
    require '../library/fpdf.php';
    include '../koneksi.php';

    // instansiasi objek dan memberikan pengaturan halaman PDF
    $pdf = new FPDF('p', 'mm', 'A4');
    $pdf -> AddPage();

    // Buat judulnya di sini 
    $pdf -> SetFont('Times', 'B', 13);
    $pdf -> Cell(200, 10, 'DATA TRANSAKSI', 0, 0, 'C');
    
    // Buat Pengaturan tabel HEAD
    $pdf -> Cell(10, 15, '', 0, 1);
    $pdf -> SetFont('Times', 'B', 9);
    $pdf -> Cell(10, 7, 'NO', 1, 0, 'C');
    $pdf -> Cell(30, 7, 'Tgl Transaksi', 1, 0, 'C');
    $pdf -> Cell(30, 7, 'Nama Pemesan', 1, 0, 'C');
    $pdf -> Cell(30, 7, 'Alamat', 1, 0, 'C');
    $pdf -> Cell(30, 7, 'No Whatsapp', 1, 0, 'C');
    $pdf -> Cell(30, 7, 'Nama Barang', 1, 0, 'C');
    $pdf -> Cell(25, 7, 'Jumlah Barang', 1, 0, 'C');
    $pdf -> Cell(30, 7, 'Total Harga', 1, 0, 'C');
    $pdf -> Cell(30, 7, 'Status', 1, 0, 'C');
    
    // Buat Pengaturan tabel ISI
    $pdf -> Cell(10, 7, '', 0, 1);
    $pdf -> SetFont('Times', '', 10);
    $no = 1;
    $data  = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE status LIKE '%Verifikasi%'");
    foreach($data as $row){
        $nama = $row['id_user'];
        $pemesan = query("SELECT * FROM user WHERE id_user = '$nama'")[0];
        $barang = query("SELECT * FROM barang")[0];

        $pdf -> Cell(10, 7, $no++, 1, 0, 'C');
        $pdf -> Cell(30, 7, $pemesan['nama_lengkap'], 1, 0, 'C');
        $pdf -> Cell(30, 7, $row['tgl_transaksi'], 1, 0, 'C');
        $pdf -> Cell(30, 7, "Laptop " . $barang['jenis_produk'], 1, 0, 'C');
        $pdf -> Cell(25, 7, $row['jmlh_barang'], 1, 0, 'C');
        $pdf -> Cell(30, 7, number_format($row['subtotal']), 1, 0, 'C');
        $pdf -> Cell(30, 7, $row['status'], 1, 1, 'C');
        
    }

    $pdf -> Output();



?>