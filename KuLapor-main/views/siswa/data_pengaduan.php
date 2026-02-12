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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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

<div class="container-lg m-4">

    <h2>Riwayat Laporan Saya</h2>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
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
            // echo "<td>" . $data['Username'] . "</td>"; // pastikan ada field tanggal
            echo "<td>" . $data['nis'] . "</td>";
            echo "<td>" . $data['id_kategori'] . "</td>";
            echo "<td>" . $data['lokasi'] . "</td>";
            echo "<td>" . $data['ket'] . "</td>";
            echo "<td>" . $data['status'] . "</td>";
            echo "<td>
            <button 
            type='button' 
            class='btn btn-info btn-sm btn-detail'
            data-id='" . $data['id_pelapor'] . "'
            data-bs-toggle='modal'
            data-bs-target='#detailModal'
            >
            Detail
            </button>
            </td>";

            echo "</tr>";
            }
            ?>
    </tbody>

    
    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pengaduan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-6"><strong>NIS :</strong> <span id="detailNis"></span></div>
                        <div class="col-md-6"><strong>Kategori :</strong> <span id="detailKategori"></span></div>
                    </div>
                    
                    <div class="row mb-2">
                        <div class="col-md-6"><strong>Lokasi :</strong> <span id="detailLokasi"></span></div>
                        <div class="col-md-6"><strong>Tanggal :</strong> <span id="detailTanggal"></span></div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6"><strong>Kode Pengaduan :</strong> <span id="detailKode"></span></div>
                        <div class="col-md-6"><strong>Status :</strong> <span id="detailStatus"></span></div>
                    </div>
                    
                    <div class="mb-3">
                        <strong>Keterangan :</strong>
                        <div class="border rounded p-3 mt-1 bg-light">
                            <span id="detailKeterangan"></span>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <strong>Pesan Admin :</strong>
                        <div class="border rounded p-3 mt-1 bg-light">
                            <span id="detailPesan"></span>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</table>
</div>

</body>
</html>
