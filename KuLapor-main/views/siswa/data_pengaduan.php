<?php
session_start();
include '../../ControllerSiswa/data_anda.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    body {
        background: #f5f5f5;
    }

    .container-main {
        background: white;
        padding: 30px;
        border-radius: 10px;
        margin-top: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .status-badge {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: bold;
    }

    .pending { background: #ffc107; }
    .ditanggapi { background: #28a745; color: white; }
    .selesai { background: #0d6efd; color: white; }
</style>

<body>

<div class="container container-main">

    <h3 class="mb-4">Data Laporan Saya</h3>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Isi Laporan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

        <?php if (!empty($data)) : ?>
            <?php $no = 1; foreach ($data as $row) : ?>
                <?php
                    $status_class = strtolower($row['status']);
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['tanggal'] ?></td>
                    <td><?= $row['ket_kategori'] ?></td>
                    <td><?= $row['isi_laporan'] ?></td>
                    <td>
                        <span class="status-badge <?= $status_class ?>">
                            <?= ucfirst($row['status']) ?>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="5" class="text-center text-muted">
                    Belum ada laporan
                </td>
            </tr>
        <?php endif; ?>

        </tbody>
    </table>

</div>

</body>
</html>
