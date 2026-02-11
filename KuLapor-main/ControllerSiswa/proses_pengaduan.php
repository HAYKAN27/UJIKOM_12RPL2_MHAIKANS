<?php
session_start();

// 1. Panggil koneksi database
include '../config/koneksi.php';

// 2. Cek apakah tombol kirim ditekan
if (isset($_POST['kirim'])) {

    // 3. Ambil data dari form
    $id_kategori = $_POST['id_kategori'];
    $lokasi      = $_POST['lokasi'];
    $keterangan  = $_POST['keterangan'];

    // 4. Ambil NIS dari session (bukan angka manual)
    $nis = $_SESSION['nis'];

    // Default status & feedback
    $status   = "menunggu";
    $feedback = "";

    // 5. Query INSERT
    $query = "INSERT INTO input_aspirasi 
              (nis, id_kategori, lokasi, ket, status, feedback)
              VALUES 
              ('$nis', '$id_kategori', '$lokasi', '$keterangan', '$status', '$feedback')";

    // 6. Jalankan query
    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        echo "<script>
                alert('Laporan berhasil dikirim!');
                window.location='../views/siswa/laporan_saya.php';
              </script>";
    } else {
        echo "Gagal mengirim laporan: " . mysqli_error($koneksi);
    }
}
?>
