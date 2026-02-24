<?php
session_start();
include '../../config/koneksi.php';

// ambil nis dari session
$nis = $_SESSION['nis'];

$query = mysqli_query($koneksi, "
    SELECT 
        input_aspirasi.*,
        user.nis,
        user.Username,
        user.kelas,
        kategori.ket_kategori
    FROM input_aspirasi
    INNER JOIN user ON input_aspirasi.nis = user.nis
    INNER JOIN kategori ON input_aspirasi.id_kategori = kategori.id_kategori
    WHERE input_aspirasi.nis = '$nis'
");


?>
