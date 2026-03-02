
 <?php
session_start();
include '../../config/koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../../login_admin.php");
    exit;
}

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {

    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $password = $_POST['password'];

    // 🔴 validasi tidak boleh kosong
    if ($nis == "" || $nama == "" || $kelas == "") {

        echo "<script>
                alert('NIS, Nama, dan Kelas tidak boleh kosong!');
                window.history.back();
              </script>";

    } else {

        // kalau password diisi
        if ($password != "") {

            mysqli_query($koneksi, "
                UPDATE user 
                SET nis='$nis',
                    Username='$nama',
                    kelas='$kelas',
                    password='$password'
                WHERE id='$id'
            ");

        } else {

            // kalau password kosong
            mysqli_query($koneksi, "
                UPDATE user 
                SET nis='$nis',
                    Username='$nama',
                    kelas='$kelas'
                WHERE id='$id'
            ");
        }

        echo "<script>
                alert('Data berhasil diupdate');
                window.location='data_siswa.php';
              </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-blue: #0C4A6E;
            --secondary-blue: #0284C7;
            --white: #FFFFFF;
            --gray-50: #F9FAFB;
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-600: #4B5563;
            --gray-700: #374151;
            --gray-900: #111827;
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
            padding: 40px 20px;
        }

        .card {
            max-width: 600px;
            margin: 0 auto;
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            overflow: hidden;
        }

        .card-header {
            background: var(--gray-50);
            padding: 20px 24px;
            border-bottom: 1px solid var(--gray-200);
        }

        .card-title {
            font-family: 'Roboto', sans-serif;
            font-size: 20px;
            font-weight: 600;
            color: var(--gray-900);
        }

        .card-body {
            padding: 32px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 8px;
        }

        .form-label .required {
            color: var(--danger);
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            font-size: 14px;
            border: 1px solid var(--gray-300);
            border-radius: 6px;
            background: var(--white);
            color: var(--gray-900);
            font-family: 'Open Sans', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--secondary-blue);
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.1);
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%234B5563' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 40px;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            padding-top: 24px;
            border-top: 1px solid var(--gray-200);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 500;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-family: 'Open Sans', sans-serif;
        }

        .btn-primary {
            background: var(--primary-blue);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--secondary-blue);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--gray-700);
            border: 1px solid var(--gray-300);
        }

        .btn-secondary:hover {
            background: var(--gray-100);
        }

        @media (max-width: 768px) {
            body {
                padding: 20px 16px;
            }

            .card-body {
                padding: 24px 20px;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Edit Data Siswa</h2>
        </div>
        <div class="card-body">
        <form method="POST">

                
                <!-- NIS -->
                <div class="form-group">
                    <label class="form-label">
                        NIS <span class="required">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="nis" 
                        value="<?= $data['nis']; ?>"
                        class="form-control" 
                        placeholder="Masukkan NIS" 
                        required
                    >
                </div>

                <!-- Nama -->
                <div class="form-group">
                    <label class="form-label">
                        Nama Lengkap <span class="required">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="nama" 
                        value="<?= $data['Username']; ?>"
                        class="form-control" 
                        placeholder="Masukkan nama lengkap" 
                        required
                    >
                </div>

                <!-- Kelas -->
                <div class="form-group">
                    <label class="form-label">
                        Kelas <span class="required">*</span>
                    </label>
                        <select name="kelas" class="form-control form-select" required>
                            <option value="">-- Pilih Kelas --</option>
                            <option value="12 RPL 1" <?= ($data['kelas']=="12 RPL 1")?"selected":""; ?>>12 RPL 1</option>
                            <option value="12 RPL 2" <?= ($data['kelas']=="12 RPL 2")?"selected":""; ?>>12 RPL 2</option>
                            <option value="12 TKJ 1" <?= ($data['kelas']=="12 TKJ 1")?"selected":""; ?>>12 TKJ 1</option>
                            <option value="12 TKJ 2" <?= ($data['kelas']=="12 TKJ 2")?"selected":""; ?>>12 TKJ 2</option>
                            <option value="12 TKJ 3" <?= ($data['kelas']=="12 TKJ 3")?"selected":""; ?>>12 TKJ 3</option>
                            <option value="12 TKJ SAMSUNG" <?= ($data['kelas']=="12 TKJ SAMSUNG")?"selected":""; ?>>12 TKJ SAMSUNG</option>
                        </select>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label class="form-label">
                        Password Baru
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        value="<?= $data['password']; ?>"
                        class="form-control" 
                        placeholder="Kosongkan jika tidak ingin mengubah"
                    >
                </div>

                <!-- Action Buttons -->
                <div class="form-actions">
                    <a href="data_siswa.php" class="btn btn-secondary">
                        Batal
                    </a>
                    <button type="submit" name="update" class="btn btn-primary">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>