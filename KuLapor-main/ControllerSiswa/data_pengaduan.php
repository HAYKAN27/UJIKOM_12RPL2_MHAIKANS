<?php
include '../config/koneksi.php';

// Mengambil NIS dari session atau POST
$nis = isset($_SESSION['nis']) ? $_SESSION['nis'] : (isset($_POST['nis']) ? $_POST['nis'] : null);

if (!$nis) {
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'error',
        'message' => 'NIS tidak ditemukan'
    ]);
    exit;
}

// Mengambil data pengaduan berdasarkan NIS siswa
$query = "SELECT * FROM pengaduan WHERE nis = '$nis' ORDER BY tanggal DESC";
$result = mysqli_query($koneksi, $query);

$data_pengaduan = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data_pengaduan[] = $row;
    }
}

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode([
    'status' => 'success',
    'data' => $data_pengaduan,
    'total' => count($data_pengaduan)
]);

?>
