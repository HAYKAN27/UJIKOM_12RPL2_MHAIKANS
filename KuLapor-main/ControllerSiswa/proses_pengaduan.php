<?php
session_start();
include '../config/koneksi.php';

// Cek login dulu
if (!isset($_SESSION['nis'])) {
    header("Location: ../login.php");
    exit;
}

// Ambil data dari session
$nis        = $_SESSION['nis'];

// Ambil data dari form
$id_kategori = $_POST['kategori'];
$lokasi      = $_POST['lokasi'];
$ket         = $_POST['keterangan'];

// Set default
$status   = "menunggu";
$feedback = "";

// Insert ke database
$query = mysqli_query($koneksi, "
    INSERT INTO input_aspirasi 
    (id_pelapor, nis, id_kategori, lokasi, ket, status)
    VALUES 
    ('$id_pelapor', '$nis', '$id_kategori', '$lokasi', '$ket', '$status')
");

if ($query) {
    echo "<script>
        alert('Pengaduan berhasil dikirim!');
        window.location='laporan_saya.php';
    </script>";
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
