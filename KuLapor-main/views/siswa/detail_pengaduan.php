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
        <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
                        :root {
                    --primary-blue: #0C4A6E;
                    --secondary-blue: #0284C7;
                    --accent-blue: #0EA5E9;
                    --light-blue: #E0F2FE;
                    --white: #FFFFFF;
                    --gray-50: #F9FAFB;
                    --gray-100: #F3F4F6;
                    --gray-200: #E5E7EB;
                    --gray-300: #D1D5DB;
                    --gray-600: #4B5563;
                    --gray-700: #374151;
                    --gray-900: #111827;
                    --success: #059669;
                    --warning: #D97706;
                    --danger: #DC2626;
                }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
            margin-top: 30px;
            display: flex;
            justify-content: center;
        }
        /* Header */
        .header {
            background: var(--white);
            border-bottom: 1px solid var(--gray-200);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .brand-logo {
            width: 42px;
            height: 42px;
            background: var(--primary-blue);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 18px;
        }

        .brand-text {
            font-family: 'Roboto', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: var(--primary-blue);
            letter-spacing: 0.5px;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            border: 2px solid var(--gray-300);
            border-radius: 6px;
            background: var(--white);
            color: var(--gray-700);
            text-decoration: none;
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
    
    
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="#" class="brand">
                <span class="brand-text">KULAPOR</span>
            </a>
            <a href="data_pengaduan.php" class="btn-back">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Dashboard
            </a>
        </div>
    </header>

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
        <div class="detail-item">
            <span class="detail-label">Status :</span>
            <span class="detail-value"><?= $row['status']; ?></span>
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