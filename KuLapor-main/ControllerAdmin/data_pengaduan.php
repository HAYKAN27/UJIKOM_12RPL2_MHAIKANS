<?php
include __DIR__ . '/../config/koneksi.php';


$query = mysqli_query($koneksi, "
SELECT 
    input_aspirasi.*,
    user.username,
    user.kelas,
    kategori.ket_kategori
FROM input_aspirasi
JOIN user ON input_aspirasi.nis = user.nis
JOIN kategori ON input_aspirasi.id_kategori = kategori.id_kategori
ORDER BY input_aspirasi.id_pelapor DESC
");

$data = [];
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}
?>
