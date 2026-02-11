<?php
session_start();

if (!isset($_SESSION['nis'])) {
    header("Location: /PROJECT-UJIKOM/Kulapor-main/login.php");
    exit;
}

$nis = $_SESSION['nis'];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengaduan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #555;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        select {
            cursor: pointer;
            background-color: white;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .helper-text {
            font-size: 11px;
            color: #888;
            margin-top: 4px;
            font-style: italic;
        }

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        button:active {
            transform: translateY(0);
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Halaman Pengaduan</h1>
        <form action="../../ControllerSiswa/proses_pengaduan.php" method="POST">

            <div class="form-group">
                <label>NIS</label>
                <input type="text" value="<?= $nis ?>" readonly>
                <input type="hidden" name="nis" value="<?= $nis ?>">
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori">
                    <option value="">Pilih Kategori</option>
                    <option value="fasilitas">Fasilitas Kelas</option>
                    <option value="kebersihan">Kebersihan</option>
                    <option value="kantin">Kantin</option>
                </select>
                <small class="helper-text">Fasilitas kelas, kebersihan, kantin</small>
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" placeholder="Contoh: Ruang Kelas 7A, Toilet Lt.2">
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea id="keterangan" name="keterangan" placeholder="Jelaskan pengaduan Anda secara detail..."></textarea>
            </div>

            <button type="submit">Kirim</button>
        </form>
    </div>
</body>

</html>