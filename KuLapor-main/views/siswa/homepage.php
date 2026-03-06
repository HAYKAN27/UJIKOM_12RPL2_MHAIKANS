<?php
include '../../config/koneksi.php';
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'siswa') {
    header("Location: ../../login_siswa.php");
    exit;
}

$nama = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KULAPOR - Dashboard Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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
            --gray-400: #9CA3AF;
            --gray-600: #4B5563;
            --gray-700: #374151;
            --gray-900: #111827;
        }

        body {
            font-family: 'Open Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--gray-50);
            color: var(--gray-900);
            line-height: 1.6;
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

        .header-left {
            display: flex;
            align-items: center;
            gap: 32px;
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

        .header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 12px;
            border-radius: 6px;
            border: 1px solid var(--gray-200);
            background: var(--white);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 2px solid var(--gray-200);
        }

        .user-details {
            text-align: right;
        }

        .user-role {
            font-size: 11px;
            color: var(--gray-600);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--gray-900);
        }

        .btn-logout {
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            border: 1px solid var(--gray-300);
            border-radius: 6px;
            background: var(--white);
            color: var(--gray-700);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-logout a {
            color: var(--gray-700);
            text-decoration: none;
        }

        .btn-logout:hover {
            background: var(--gray-100);
            border-color: var(--gray-400);
        }

        /* Main Content */
        .main-wrapper {
            max-width: 1400px;
            margin: 0 auto;
            padding: 32px;
        }

        .page-header {
            margin-bottom: 32px;
        }

        .page-title {
            font-family: 'Roboto', sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 8px;
        }

        .page-subtitle {
            font-size: 14px;
            color: var(--gray-600);
            font-weight: 400;
        }

        .breadcrumb {
            display: flex;
            gap: 8px;
            font-size: 13px;
            color: var(--gray-600);
            margin-bottom: 24px;
        }

        .breadcrumb a {
            color: var(--secondary-blue);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        /* Dashboard Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .menu-card {
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .menu-card:hover {
            border-color: var(--secondary-blue);
            box-shadow: 0 4px 12px rgba(12, 74, 110, 0.08);
        }

        .menu-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }

        .menu-icon-wrapper {
            width: 48px;
            height: 48px;
            background: var(--light-blue);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .menu-icon {
            font-size: 22px;
            color: var(--primary-blue);
        }

        .menu-badge {
            font-size: 11px;
            color: var(--gray-600);
            background: var(--gray-100);
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: 600;
        }

        .menu-content {
            flex: 1;
        }

        .menu-title {
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 6px;
        }

        .menu-description {
            font-size: 13px;
            color: var(--gray-600);
            line-height: 1.5;
            margin-bottom: 16px;
        }

        .menu-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--secondary-blue);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .menu-link:hover {
            color: var(--primary-blue);
        }

        .menu-link i {
            font-size: 12px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-container {
                padding: 12px 16px;
                flex-wrap: wrap;
            }

            .header-left {
                gap: 16px;
            }

            .brand-text {
                font-size: 18px;
            }

            .header-right {
                width: 100%;
                justify-content: space-between;
                margin-top: 12px;
                padding-top: 12px;
                border-top: 1px solid var(--gray-200);
            }

            .main-wrapper {
                padding: 20px 16px;
            }

            .page-title {
                font-size: 24px;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="header-left">
                <a href="#" class="brand">
                    <span class="brand-text">KULAPOR</span>
                </a>
            </div>
            <div class="header-right">
                <div class="user-info">
                    <img src="https://secure.gravatar.com/avatar/d194c6c98a5041637d4006baddfa05cb?s=128&d=mm&r=g" alt="Admin Avatar" class="user-avatar">
                    <div class="user-details">
                        <div class="user-role">SISWA</div>
                        <div class="user-name"><?= $nama?></div>
                    </div>
                </div>
                <button class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <a href="../../logout.php">Logout</a>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-wrapper">
        <!-- Breadcrumb -->
        <div class="breadcrumb">    
            <a href="homepage.php">Beranda</a>
            <span>/</span>
            <span>Halaman utama</span>
        </div>

        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">HALO SELAMAT DATANG KEMBALI <?= $nama ?>!</h1>
            <p class="page-subtitle">Membuat pengaduan saranan SMK TI MUHAMMADIYAH CIKAMPEK Melalui Website KULAPOR</p>
        </div>
        <!-- Carousel -->
        <div id="carouselKuLapor" class="carousel slide mt-3" data-bs-ride="carousel">
            
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselKuLapor" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carouselKuLapor" data-bs-slide-to="1"></button>
            </div>

            <div class="carousel-inner rounded shadow">

                <div class="carousel-item active">
                    <img src="../../public/img/SMKMUTU (1).jpeg" class="d-block w-100" style="height:350px; object-fit:cover;">
                </div>

                <div class="carousel-item">
                    <img src="../../public/img/SMKMUTU2 (1).jpg" class="d-block w-100" style="height:350px; object-fit:cover;">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselKuLapor" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselKuLapor" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>

        <!-- Menu Cards -->
        <div class="dashboard-grid mt-4">
            <!-- Card 2 -->
            <div class="menu-card">
                <div class="menu-header">
                    <div class="menu-icon-wrapper">
                        <i class="fas fa-clipboard-list menu-icon"></i>
                    </div>
                    <span class="menu-badge">DATA PENGADUAN</span>
                </div>
                <div class="menu-content">
                    <h3 class="menu-title">Riwayat Pengaduan Anda</h3>
                    <p class="menu-description">Lihat, verifikasi, dan tanggapan dari admin secara real-time.</p>
                    <a href="data_pengaduan.php" class="menu-link">
                        Akses Menu <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="menu-card">
                <div class="menu-header">
                    <div class="menu-icon-wrapper">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <span class="menu-badge">PENGADUAN</span>
                </div>
                <div class="menu-content">
                    <h3 class="menu-title">Membuat Pengaduan</h3>
                    <p class="menu-description">Membuat sebuah Aspirasi tentang Sekolah.</p>
                    <a href="form_pengaduan.php" class="menu-link">
                        Akses Menu <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="menu-card">
                <div class="menu-header">
                    <div class="menu-icon-wrapper">
                        <i class="fas fa-key"></i>
                    </div>
                    <span class="menu-badge">GANTI PASSWORD</span>
                </div>
                <div class="menu-content">
                    <h3 class="menu-title">Ubah Password</h3>
                    <p class="menu-description">Daftarkan akun siswa baru ke dalam sistem dengan data lengkap dan terverifikasi.</p>
                    <a href="form_ganti_password.php" class="menu-link">
                        Akses Menu <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>