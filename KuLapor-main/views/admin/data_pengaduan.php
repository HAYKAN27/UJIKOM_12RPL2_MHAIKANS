<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "paginate": {
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    },
                    "zeroRecords": "Data tidak ditemukan",
                    "infoEmpty": "Tidak ada data tersedia"
                }
            });
        });
    </script>

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
            <table id="datatable" class="table table-striped table-hover">

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
                            echo "<button 
                            class='btn btn-sm btn-info btn-detail'
                            data-bs-toggle='modal'
                            data-bs-target='#detailModal'
                            data-id='" . $row['id_pelapor'] . "'
                            data-nis='" . $row['nis'] . "'
                            data-nama='" . $row['username'] . "'
                            data-kategori='" . $row['ket_kategori'] . "'
                            data-lokasi='" . $row['lokasi'] . "'
                            data-ket='" . $row['ket'] . "'
                            data-status='" . $row['status'] . "'
                            data-feedback='" . $row['feedback'] . "'
                        >Lihat</button> ";

                            echo "<button 
                            class='btn btn-sm btn-warning btn-edit'
                            data-bs-toggle='modal'
                            data-bs-target='#editModal'
                            data-id='" . $row['id_pelapor'] . "'
                            data-status='" . $row['status'] . "'
                            data-feedback='" . $row['feedback'] . "'
                        >Edit</button>";

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

        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        // DETAIL
        document.querySelectorAll(".btn-detail").forEach(button => {
            button.addEventListener("click", function() {

                document.getElementById("detailNis").innerText = this.dataset.nis;
                document.getElementById("detailKategori").innerText = this.dataset.kategori;
                document.getElementById("detailLokasi").innerText = this.dataset.lokasi;
                document.getElementById("detailStatus").innerText = this.dataset.status;
                document.getElementById("detailKeterangan").innerText = this.dataset.ket;
                document.getElementById("detailPesan").innerText = this.dataset.feedback ?? "-";
            });
        });

        // EDIT
        document.querySelectorAll(".btn-edit").forEach(button => {
            button.addEventListener("click", function() {

                document.getElementById("editId").value = this.dataset.id;
                document.getElementById("editStatus").value = this.dataset.status;
                document.getElementById("editFeedback").value = this.dataset.feedback ?? "";
            });
        });

    });
</script>

</html>