
<?php
include '../../config/koneksi.php';

$data = mysqli_query($koneksi, "
    SELECT 
        input_aspirasi.*,
        user.username,
        user.kelas,
        kategori.ket_kategori
    FROM input_aspirasi
    JOIN user ON input_aspirasi.nis = user.nis
    JOIN kategori ON input_aspirasi.id_kategori = kategori.id_kategori

");
?>