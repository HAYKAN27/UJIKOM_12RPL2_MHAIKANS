<?php
include __DIR__ . '/../config/koneksi.php';

$data = [];

if (isset($_SESSION['id_user'])) {

    $id_user = $_SESSION['id_user'];

    $query = mysqli_query($koneksi, "
        SELECT 
            p.id_pengaduan,
            p.isi_laporan,
            p.tanggal,
            p.status,
            k.ket_kategori
        FROM pengaduan p
        JOIN kategori k ON p.id_kategori = k.id_kategori
        WHERE p.id_user = '$id_user'
        ORDER BY p.id_pengaduan DESC
    ");

    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }
}
