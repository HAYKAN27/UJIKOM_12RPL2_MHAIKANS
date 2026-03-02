<?php
// Pastikan koneksi database terpanggil
include '../config/koneksi.php';
session_start();

    // 1. Tangkap data dari form
    $id_kategori = $_POST['id_kategori'];
    $lokasi      = $_POST['lokasi'];
    $tanggal      = $_POST['tanggal'];
    $ket         = $_POST['keterangan'];

    // Ambil data dari session login
    $id = $_SESSION['id'];
    $nis        = $_SESSION['nis'];

    // Status default
    $status   = "menunggu";

    // 2. Perintah SQL untuk memasukkan data (INSERT)
    $query = "INSERT INTO input_aspirasi 
              (nis, id_kategori, lokasi, ket, status, feedback,tanggal)
              VALUES 
              ('$nis', '$id_kategori', '$lokasi', '$ket', '$status', NULL ,'$tanggal')";

    // 3. Jalankan query
    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        echo "<script>
                alert('Laporan berhasil dikirim!');
                window.location='../views/siswa/data_pengaduan.php';
              </script>";
    } else {
        echo "Gagal mengirim laporan: " . mysqli_error($koneksi);
    }
    
?>
