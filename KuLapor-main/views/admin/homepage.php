<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KULAPOR - Dashboard Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        .nav-menu {
            display: flex;
            gap: 24px;
            list-style: none;
        }

        .nav-link {
            color: var(--gray-700);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 4px;
        }

        .nav-link:hover {
            background: var(--gray-100);
            color: var(--primary-blue);
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

        /* Stats Section */
        .stats-section {
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 32px;
        }

        .stats-header {
            font-family: 'Roboto', sans-serif;
            font-size: 18px;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--gray-200);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .stat-item {
            padding: 16px;
            background: var(--gray-50);
            border-radius: 6px;
            border-left: 3px solid var(--secondary-blue);
        }

        .stat-label {
            font-size: 12px;
            color: var(--gray-600);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .stat-value {
            font-family: 'Roboto', sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-blue);
        }

        /* Info Panel */
        .info-panel {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            border-radius: 8px;
            padding: 32px;
            color: var(--white);
            margin-top: 32px;
        }

        .info-panel-title {
            font-family: 'Roboto', sans-serif;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .info-panel-text {
            font-size: 14px;
            line-height: 1.6;
            opacity: 0.95;
        }

        .info-features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-top: 24px;
        }

        .info-feature {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
        }

        .info-feature i {
            font-size: 16px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .nav-menu {
                display: none;
            }
        }

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

            .info-features {
                grid-template-columns: 1fr;
            }
        }

        /* Utility Classes */
        .text-muted {
            color: var(--gray-600);
        }

        .divider {
            height: 1px;
            background: var(--gray-200);
            margin: 24px 0;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="header-left">
                <a href="#" class="brand">
                    <div class="brand-logo">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <span class="brand-text">KULAPOR</span>
                </a>
            </div>
            <div class="header-right">
                <div class="user-info">
                    <img src="https://secure.gravatar.com/avatar/d194c6c98a5041637d4006baddfa05cb?s=128&d=mm&r=g" alt="Admin Avatar" class="user-avatar">
                    <div class="user-details">
                        <div class="user-role">Administrator</div>
                        <div class="user-name">Admin</div>
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
            <a href="#">Beranda</a>
            <span>/</span>
            <span>Dashboard</span>
        </div>

        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">Dashboard Administrator</h1>
            <p class="page-subtitle">Kelola sistem pengaduan dan data siswa secara terpusat</p>
        </div>

        <!-- Stats Section -->
        <div class="stats-section">
            <h2 class="stats-header">Ringkasan Statistik</h2>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-label">Total Pengaduan</div>
                    <div class="stat-value">0</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Pengaduan Aktif</div>
                    <div class="stat-value">0</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Total Siswa</div>
                    <div class="stat-value">0</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Kategori</div>
                    <div class="stat-value">0</div>
                </div>
            </div>
        </div>

        <!-- Menu Cards -->
        <div class="dashboard-grid">
            <!-- Card 1 -->
            <div class="menu-card">
                <div class="menu-header">
                    <div class="menu-icon-wrapper">
                        <i class="fas fa-folder-open menu-icon"></i>
                    </div>
                    <span class="menu-badge">MANAJEMEN</span>
                </div>
                <div class="menu-content">
                    <h3 class="menu-title">Manajemen Kategori</h3>
                    <p class="menu-description">Kelola kategori pengaduan, tambah, edit, atau hapus kategori sesuai kebutuhan sistem.</p>
                    <a href="#" class="menu-link">
                        Akses Menu <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="menu-card">
                <div class="menu-header">
                    <div class="menu-icon-wrapper">
                        <i class="fas fa-clipboard-list menu-icon"></i>
                    </div>
                    <span class="menu-badge">PENGADUAN</span>
                </div>
                <div class="menu-content">
                    <h3 class="menu-title">Daftar Pengaduan</h3>
                    <p class="menu-description">Lihat, verifikasi, dan tanggapi semua pengaduan yang masuk dari siswa secara real-time.</p>
                    <a href="data_pengaduan.php" class="menu-link">
                        Akses Menu <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="menu-card">
                <div class="menu-header">
                    <div class="menu-icon-wrapper">
                        <i class="fas fa-users menu-icon"></i>
                    </div>
                    <span class="menu-badge">DATA</span>
                </div>
                <div class="menu-content">
                    <h3 class="menu-title">Manajemen Data Siswa</h3>
                    <p class="menu-description">Kelola database siswa terdaftar, update informasi, dan monitor aktivitas pengguna.</p>
                    <a href="data_siswa.php" class="menu-link">
                        Akses Menu <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="menu-card">
                <div class="menu-header">
                    <div class="menu-icon-wrapper">
                        <i class="fas fa-user-plus menu-icon"></i>
                    </div>
                    <span class="menu-badge">AKUN BARU</span>
                </div>
                <div class="menu-content">
                    <h3 class="menu-title">Membuat Akun</h3>
                    <p class="menu-description">Daftarkan akun siswa baru ke dalam sistem dengan data lengkap dan terverifikasi.</p>
                    <a href="form_add_siswa.php" class="menu-link">
                        Akses Menu <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>