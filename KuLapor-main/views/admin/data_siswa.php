<?php
session_start();
include '../../config/koneksi.php';

// ambil semua data siswa
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE role='siswa'");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Akun Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Daftar Akun Siswa</h2>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>NIS</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while($data = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $data['Username']; ?></td>
                        <td><?= $data['nis']; ?></td>
                        <td class="text-center">
                            <span class="badge bg-success"><?= $data['role']; ?></span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-warning">Edit</span>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php if(mysqli_num_rows($query) == 0) { ?>
                <div class="alert alert-warning text-center">
                    Data siswa belum tersedia.
                </div>
            <?php } ?>

        </div>
    </div>
</div>

</body>
</html>
