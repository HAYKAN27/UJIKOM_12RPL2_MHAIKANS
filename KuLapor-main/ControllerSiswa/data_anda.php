<?php
session_start();
include '../config/koneksi.php';

// ambil nis dari session
$nis = $_SESSION['nis'];

$query = mysqli_query($koneksi, "
    SELECT * FROM input_aspirasi 
    WHERE nis = '$nis'
    ORDER BY id_pelapor DESC
");

while ($data = mysqli_fetch_assoc($query)) {
    echo "<b>Lokasi:</b> " . $data['lokasi'] . "<br>";
    echo "<b>Kategori:</b> " . $data['id_kategori'] . "<br>";
    echo "<b>Keterangan:</b> " . $data['ket'] . "<br>";
    echo "<b>Status:</b> " . $data['status'] . "<br>";
    echo "<b>Feedback:</b> " . $data['feedback'] . "<hr>";
}
?>
