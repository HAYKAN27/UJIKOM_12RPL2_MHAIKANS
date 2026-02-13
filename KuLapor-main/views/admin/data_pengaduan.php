<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengaduan - KULAPOR</title>
    
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
            border: 1px solid var(--gray-300);
            border-radius: 6px;
            background: var(--white);
            color: var(--gray-700);
            text-decoration: none;
        }

        .btn-back:hover {
            background: var(--gray-100);
            color: var(--gray-900);
        }

        /* Main Content */
        .main-wrapper {
            max-width: 1400px;
            margin: 0 auto;
            padding: 32px;
        }

        /* Breadcrumb */
        .breadcrumb-custom {
            display: flex;
            gap: 8px;
            font-size: 13px;
            color: var(--gray-600);
            margin-bottom: 24px;
            list-style: none;
            padding: 0;
        }

        .breadcrumb-custom a {
            color: var(--secondary-blue);
            text-decoration: none;
        }

        .breadcrumb-custom a:hover {
            text-decoration: underline;
        }

        /* Page Header */
        .page-header {
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title-section h1 {
            font-family: 'Roboto', sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 8px;
        }

        .page-subtitle {
            font-size: 14px;
            color: var(--gray-600);
        }

        .page-actions {
            display: flex;
            gap: 12px;
        }

        .btn-primary-custom {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 500;
            border: none;
            border-radius: 6px;
            background: var(--primary-blue);
            color: var(--white);
            cursor: pointer;
        }

        .btn-primary-custom:hover {
            background: var(--secondary-blue);
        }

        .btn-secondary-custom {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 500;
            border: 1px solid var(--gray-300);
            border-radius: 6px;
            background: var(--white);
            color: var(--gray-700);
            cursor: pointer;
        }

        .btn-secondary-custom:hover {
            background: var(--gray-100);
        }

        /* Stats Cards */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            padding: 20px;
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .stat-label {
            font-size: 13px;
            color: var(--gray-600);
            font-weight: 500;
        }

        .stat-icon {
            width: 36px;
            height: 36px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .stat-icon.pending {
            background: #FEF3C7;
            color: #D97706;
        }

        .stat-icon.process {
            background: #DBEAFE;
            color: #0284C7;
        }

        .stat-icon.done {
            background: #D1FAE5;
            color: #059669;
        }

        .stat-value {
            font-family: 'Roboto', sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--gray-900);
        }

        /* Table Container */
        .table-container {
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            overflow: hidden;
        }

        .table-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-title {
            font-family: 'Roboto', sans-serif;
            font-size: 18px;
            font-weight: 600;
            color: var(--gray-900);
        }

        .table-wrapper {
            padding: 24px;
        }

        /* DataTables Customization */
        .dataTables_wrapper {
            padding: 0;
        }

        .dataTables_filter {
            margin-bottom: 20px;
        }

        .dataTables_filter label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: var(--gray-700);
            font-weight: 500;
        }

        .dataTables_filter input {
            padding: 8px 12px;
            border: 1px solid var(--gray-300);
            border-radius: 6px;
            font-size: 14px;
            margin-left: 8px;
            width: 250px;
        }

        .dataTables_filter input:focus {
            outline: none;
            border-color: var(--secondary-blue);
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.1);
        }

        .dataTables_length label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: var(--gray-700);
            font-weight: 500;
        }

        .dataTables_length select {
            padding: 8px 12px;
            border: 1px solid var(--gray-300);
            border-radius: 6px;
            font-size: 14px;
            margin: 0 8px;
        }

        .dataTables_info {
            font-size: 13px;
            color: var(--gray-600);
            padding-top: 16px;
        }

        .dataTables_paginate {
            padding-top: 16px;
        }

        .paginate_button {
            padding: 6px 12px !important;
            margin: 0 2px !important;
            border: 1px solid var(--gray-300) !important;
            border-radius: 6px !important;
            background: var(--white) !important;
            color: var(--gray-700) !important;
            font-size: 13px !important;
        }

        .paginate_button:hover {
            background: var(--gray-100) !important;
            border-color: var(--gray-400) !important;
        }

        .paginate_button.current {
            background: var(--primary-blue) !important;
            color: var(--white) !important;
            border-color: var(--primary-blue) !important;
        }

        /* Table Styles */
        #datatable {
            width: 100% !important;
            border-collapse: separate;
            border-spacing: 0;
        }

        #datatable thead th {
            background: var(--gray-50);
            color: var(--gray-700);
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 16px;
            border-bottom: 2px solid var(--gray-200);
            white-space: nowrap;
        }

        #datatable tbody td {
            padding: 16px;
            font-size: 14px;
            color: var(--gray-900);
            border-bottom: 1px solid var(--gray-200);
            vertical-align: middle;
        }

        #datatable tbody tr:hover {
            background: var(--gray-50);
        }

        #datatable tbody tr:last-child td {
            border-bottom: none;
        }

        /* Status Badge */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .status-badge i {
            font-size: 10px;
        }

        .status-pending {
            background: #FEF3C7;
            color: #92400E;
        }

        .status-ditanggapi {
            background: #DBEAFE;
            color: #1E40AF;
        }

        .status-selesai {
            background: #D1FAE5;
            color: #065F46;
        }

        /* Action Buttons */
        .btn-action {
            padding: 6px 14px;
            font-size: 13px;
            font-weight: 500;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-right: 6px;
        }

        .btn-detail {
            background: var(--light-blue);
            color: var(--primary-blue);
        }

        .btn-detail:hover {
            background: #BAE6FD;
        }

        .btn-respond {
            background: #FEF3C7;
            color: #92400E;
        }

        .btn-respond:hover {
            background: #FDE68A;
        }

        /* Modal Customization */
        .modal-content {
            border: none;
            border-radius: 8px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            background: var(--gray-50);
            border-bottom: 1px solid var(--gray-200);
            padding: 20px 24px;
        }

        .modal-title {
            font-family: 'Roboto', sans-serif;
            font-size: 20px;
            font-weight: 600;
            color: var(--gray-900);
        }

        .modal-body {
            padding: 24px;
        }

        .detail-row {
            display: grid;
            grid-template-columns: 140px 1fr;
            gap: 12px;
            margin-bottom: 16px;
            font-size: 14px;
        }

        .detail-label {
            color: var(--gray-600);
            font-weight: 500;
        }

        .detail-value {
            color: var(--gray-900);
            font-weight: 400;
        }

        .detail-box {
            background: var(--gray-50);
            border: 1px solid var(--gray-200);
            border-radius: 6px;
            padding: 16px;
            margin-top: 8px;
            font-size: 14px;
            line-height: 1.6;
            color: var(--gray-900);
        }

        .section-divider {
            height: 1px;
            background: var(--gray-200);
            margin: 20px 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-wrapper {
                padding: 20px 16px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .page-title-section h1 {
                font-size: 24px;
            }

            .stats-row {
                grid-template-columns: 1fr;
            }

            .table-wrapper {
                padding: 16px;
                overflow-x: auto;
            }

            .btn-action {
                padding: 5px 10px;
                font-size: 12px;
            }

            .detail-row {
                grid-template-columns: 1fr;
                gap: 4px;
            }
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--gray-600);
        }

        .empty-state i {
            font-size: 64px;
            color: var(--gray-300);
            margin-bottom: 16px;
        }

        .empty-state h3 {
            font-size: 18px;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 14px;
            color: var(--gray-600);
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ entri",
                    "info": "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    "paginate": {
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    },
                    "zeroRecords": "Data tidak ditemukan",
                    "infoEmpty": "Tidak ada data tersedia",
                    "infoFiltered": "(difilter dari _MAX_ total data)"
                },
                "pageLength": 10,
                "order": [[0, 'asc']],
                "columnDefs": [
                    { "orderable": false, "targets": 5 }
                ]
            });
        });
    </script>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="#" class="brand">
                <div class="brand-logo">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <span class="brand-text">KULAPOR</span>
            </a>
            <a href="homepage.php" class="btn-back">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Dashboard
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-wrapper">
        <!-- Breadcrumb -->
        <ul class="breadcrumb-custom">
            <li><a href="index.php">Dashboard</a></li>
            <li>/</li>
            <li>Data Pengaduan</li>
        </ul>

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-title-section">
                <h1>Data Pengaduan</h1>
                <p class="page-subtitle">Kelola dan tanggapi pengaduan siswa</p>
            </div>
            <div class="page-actions">
                <button class="btn-secondary-custom">
                    <i class="fas fa-download"></i>
                    Export Data
                </button>
                <button class="btn-primary-custom">
                    <i class="fas fa-filter"></i>
                    Filter
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Total Pengaduan</span>
                    <div class="stat-icon" style="background: #EDE9FE; color: #7C3AED;">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                </div>
                <div class="stat-value">0</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Menunggu</span>
                    <div class="stat-icon pending">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="stat-value">0</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Diproses</span>
                    <div class="stat-icon process">
                        <i class="fas fa-spinner"></i>
                    </div>
                </div>
                <div class="stat-value">0</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Selesai</span>
                    <div class="stat-icon done">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
                <div class="stat-value">0</div>
            </div>
        </div>

        <!-- Table Container -->
        <div class="table-container">
            <div class="table-header">
                <h2 class="table-title">Daftar Pengaduan</h2>
            </div>

            <div class="table-wrapper">
                <table id="datatable" class="display">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../../config/koneksi.php';
                        include '../../ControllerAdmin/data_pengaduan.php';

                        if (!empty($data) && is_array($data)) {
                            $no = 1;
                            foreach ($data as $row) {
                                // Tentukan badge status
                                $status = strtolower($row['status']);
                                $status_class = 'status-pending';
                                $status_icon = 'fa-clock';

                                if ($status === 'ditanggapi') {
                                    $status_class = 'status-ditanggapi';
                                    $status_icon = 'fa-spinner';
                                } elseif ($status === 'selesai') {
                                    $status_class = 'status-selesai';
                                    $status_icon = 'fa-check-circle';
                                }

                                echo "<tr>";
                                echo "<td><strong>" . $no . "</strong></td>";
                                echo "<td><strong>" . $row['username'] . "</strong></td>";
                                echo "<td>" . $row['kelas'] . "</td>";
                                echo "<td>" . $row['ket_kategori'] . "</td>";
                                echo "<td>
                                        <span class='status-badge " . $status_class . "'>
                                            <i class='fas " . $status_icon . "'></i>" . ucfirst($row['status']) . "
                                        </span>
                                    </td>";
                                echo "<td>";

                                echo "<button 
                                        class='btn-action btn-detail'
                                        data-bs-toggle='modal'
                                        data-bs-target='#detailModal'
                                        data-id='" . $row['id_pelapor'] . "'
                                        data-nis='" . $row['nis'] . "'
                                        data-nama='" . $row['username'] . "'
                                        data-kelas='" . $row['kelas'] . "'
                                        data-kategori='" . $row['ket_kategori'] . "'
                                        data-lokasi='" . $row['lokasi'] . "'
                                        data-ket='" . $row['ket'] . "'
                                        data-status='" . $row['status'] . "'
                                        data-feedback='" . $row['feedback'] . "'
                                    >
                                        <i class='fas fa-eye'></i> Detail
                                    </button> ";

                                echo "<a href='detail_pengaduan.php?id=" . $row['id_pelapor'] . "' class='btn-action btn-respond'>
                                        <i class='fas fa-reply'></i> Tanggapi
                                    </a>";

                                echo "</td>";
                                echo "</tr>";

                                $no++;

                            }
                        } else {
                            echo "<tr><td colspan='6'>
                                <div class='empty-state'>
                                    <i class='fas fa-inbox'></i>
                                    <h3>Belum Ada Pengaduan</h3>
                                    <p>Belum ada data pengaduan yang tersedia saat ini</p>
                                </div>
                            </td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">
                        <i class="fas fa-file-alt"></i> Detail Pengaduan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Informasi Pelapor -->
                    <h6 style="font-weight: 600; color: var(--gray-700); margin-bottom: 16px; font-size: 15px;">
                        <i class="fas fa-user"></i> Informasi Pelapor
                    </h6>
                    
                    <div class="detail-row">
                        <span class="detail-label">NIS</span>
                        <span class="detail-value" id="detailNis">-</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Nama Siswa</span>
                        <span class="detail-value" id="detailNama">-</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Kelas</span>
                        <span class="detail-value" id="detailKelas">-</span>
                    </div>

                    <div class="section-divider"></div>

                    <!-- Detail Pengaduan -->
                    <h6 style="font-weight: 600; color: var(--gray-700); margin-bottom: 16px; font-size: 15px;">
                        <i class="fas fa-clipboard-list"></i> Detail Pengaduan
                    </h6>
                    
                    <div class="detail-row">
                        <span class="detail-label">Kategori</span>
                        <span class="detail-value" id="detailKategori">-</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Lokasi Kejadian</span>
                        <span class="detail-value" id="detailLokasi">-</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Status</span>
                        <span class="detail-value" id="detailStatus">-</span>
                    </div>

                    <div style="margin-top: 20px;">
                        <span class="detail-label">Keterangan Pengaduan</span>
                        <div class="detail-box" id="detailKeterangan">-</div>
                    </div>

                    <div class="section-divider"></div>

                    <!-- Tanggapan Admin -->
                    <h6 style="font-weight: 600; color: var(--gray-700); margin-bottom: 16px; font-size: 15px;">
                        <i class="fas fa-comment-dots"></i> Tanggapan Admin
                    </h6>
                    
                    <div class="detail-box" id="detailPesan">Belum ada tanggapan</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Handle Detail Button Click
            document.querySelectorAll(".btn-detail").forEach(button => {
                button.addEventListener("click", function() {
                    document.getElementById("detailNis").innerText = this.dataset.nis || "-";
                    document.getElementById("detailNama").innerText = this.dataset.nama || "-";
                    document.getElementById("detailKelas").innerText = this.dataset.kelas || "-";
                    document.getElementById("detailKategori").innerText = this.dataset.kategori || "-";
                    document.getElementById("detailLokasi").innerText = this.dataset.lokasi || "-";
                    document.getElementById("detailStatus").innerText = this.dataset.status || "-";
                    document.getElementById("detailKeterangan").innerText = this.dataset.ket || "-";
                    document.getElementById("detailPesan").innerText = this.dataset.feedback || "Belum ada tanggapan";
                });
            });
        });
    </script>
</body>

</html>