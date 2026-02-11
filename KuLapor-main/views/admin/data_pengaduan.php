<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container-main {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .table {
            margin-bottom: 0;
        }

        /* .table thead {
            background-color: #cdd0da;
            color: white;
        } */

        .table tbody tr:hover {
            background-color: #f9f9f9;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-pending {
            background-color: #ffc107;
            color: #000;
        }

        .status-ditanggapi {
            background-color: #28a745;
            color: white;
        }

        .status-selesai {
            background-color: #017bfe;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container-main">
        <h1>Data Pengaduan</h1>

        <div class="table-responsive ">
            <table class="table table-striped table-hover">
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

                            if ($status === 'ditanggapi') {
                                $status_class = 'status-ditanggapi';
                            } elseif ($status === 'selesai') {
                                $status_class = 'status-selesai';
                            }

                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td><strong>" . $row['username'] . "</strong></td>";
                            echo "<td>" . $row['kelas'] . "</td>";
                            echo "<td>" . $row['ket_kategori'] . "</td>";
                            echo "<td><span class='status-badge " . $status_class . "'>" . ucfirst($row['status']) . "</span></td>";
                            echo "<td>";
                            echo "<a href='#' class='btn btn-sm btn-info'>Lihat</a> ";
                            echo "<a href='#' class='btn btn-sm btn-warning'>Edit</a>";
                            echo "</td>";
                            echo "</tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center text-muted'>Belum ada data pengaduan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>