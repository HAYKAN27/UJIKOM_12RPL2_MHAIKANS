<?php
include '../../config/koneksi.php';
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'siswa') {
    header("Location: ../../login_siswa.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pengaduan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;

            min-height: 100vh;
        }
        .container {
            background-color:white ;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        .main{
            display: flex;
            justify-content: center;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .navbar a {
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            border: 1px solid #000000;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .detail-item {
            margin-bottom: 15px;
        }
        .detail-label {
            font-weight: bold;
            color: #555;
            display: inline-block;
            width: 150px;
        }
        .detail-value {
            color: #333;
        }
        .keterangan, .feedback {
            margin-top: 10px;
        }
        .keterangan textarea, .feedback textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
            height: 100px;
            background-color: #f9f9f9;
        }
        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }
            .detail-label {
                width: 100%;
                display: block;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
                <?php

            $id = $_GET['id'];

            // Ambil data berdasarkan id yang dipilih
            $query = mysqli_query($koneksi, "
                SELECT input_aspirasi.*, kategori.ket_kategori
                FROM input_aspirasi
                JOIN kategori 
                ON input_aspirasi.id_kategori = kategori.id_kategori
                WHERE input_aspirasi.id_pelapor = '$id'
            ");

            $row = mysqli_fetch_assoc($query);

            // Jika data tidak ditemukan
            if (!$row) {
                echo "Data tidak ditemukan.";
                exit;
            }
            ?>

    
    <div class="navbar">    
        <a href="data_pengaduan.php">Kembali ke Data Pengaduan</a>
    </div>
    <div class="main">

        <div class="container">
            <h2>Detail Pengaduan</h2>
            

        <div class="detail-item">
            <span class="detail-label">NIS:</span>
            <span class="detail-value"><?= $row['nis']; ?></span>
        </div>
        <div class="detail-item">
            <span class="detail-label">Kategori:</span>
            <span class="detail-value"><?= $row['ket_kategori']; ?></span>
        </div>
        <div class="detail-item">
            <span class="detail-label">Lokasi:</span>
            <span class="detail-value"><?= $row['lokasi']; ?></span>
        </div>
        <div class="detail-item">
            <span class="detail-label">Tanggal Pengaduan :</span>
            <span class="detail-value"><?= $row['tanggal']; ?></span>
        </div>
        <div class="detail-item">
            <span class="detail-label">ID Pengaduan:</span>
            <span class="detail-value"><?= $row['id_pelapor']; ?></span>
        </div>
        <div class="detail-item keterangan">
            <span class="detail-label">Keterangan:</span>
            <textarea readonly><?= $row['ket']; ?></textarea>
        </div>
        <div class="detail-item feedback">
            <span class="detail-label">Feedback:</span>
            <textarea readonly><?= $row['feedback']?></textarea>
        </div>
        </div>
</div>
</body>
</html>