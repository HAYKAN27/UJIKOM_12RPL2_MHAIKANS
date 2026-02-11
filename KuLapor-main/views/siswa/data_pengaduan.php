<?php
session_start();
include '../../config/koneksi.php';

// ambil nis dari session
$nis = $_SESSION['nis'];

// ambil semua laporan milik siswa
$query = mysqli_query($koneksi, "SELECT * FROM input_aspirasi WHERE nis='$nis' ORDER BY id_pelapor DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Laporan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #999;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        a.detail-btn {
            padding: 4px 8px;
            background-color: #2e86de;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a.detail-btn:hover {
            background-color: #1b4f72;
        }
    </style>
</head>
<body>

<h2>Riwayat Laporan Saya</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>NIS</th>
            <th>Kategori</th>
            <th>Lokasi</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . htmlspecialchars($data['lokasi']) . "</td>";
            echo "<td>" . htmlspecialchars($data['nis']) . "</td>";
            echo "<td>" . htmlspecialchars($data['id_kategori']) . "</td>";
            echo "<td>" . htmlspecialchars($data['lokasi']) . "</td>";
            echo "<td>" . htmlspecialchars($data['ket']) . "</td>";
            echo "<td>" . htmlspecialchars($data['status']) . "</td>";
            echo "<td><a class='detail-btn' href='detail_laporan.php?id=" . $data['id_pelapor'] . "'>Detail</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
