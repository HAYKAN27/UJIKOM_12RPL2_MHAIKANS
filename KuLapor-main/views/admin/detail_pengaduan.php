<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Pengaduan</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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



        h2 {
            font-family: 'Roboto', sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 32px;
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background: var(--white);
            padding: 40px;
            border-radius: 8px;
            border: 1px solid var(--gray-200);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 8px;
        }

        select,
        textarea {
            width: 100%;
            padding: 12px 16px;
            font-size: 14px;
            border: 1px solid var(--gray-300);
            border-radius: 6px;
            background: var(--white);
            color: var(--gray-900);
            font-family: 'Open Sans', sans-serif;
            margin-bottom: 24px;
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%234B5563' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 40px;
            cursor: pointer;
        }

        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--secondary-blue);
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 150px;
            line-height: 1.6;
        }

        button {
            width: 100%;
            padding: 14px 24px;
            font-size: 15px;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            background: var(--primary-blue);
            color: var(--white);
            cursor: pointer;
            font-family: 'Open Sans', sans-serif;
            margin-top: 8px;
        }

        button:hover {
            background: var(--secondary-blue);
        }

        button:active {
            transform: scale(0.98);
        }

        br {
            display: none;
        }

        @media (max-width: 768px) {
            body {
                padding: 20px 16px;
            }

            form {
                padding: 24px 20px;
            }

            h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

<?php
include '../../config/koneksi.php';

// 1. Ambil ID dari link "Tanggapi"
$id = $_GET['id'];

// 2. Jika tombol update ditekan
if (isset($_POST['update'])) {

    $status   = $_POST['status'];
    $feedback = $_POST['feedback'];

    // Query UPDATE
    $update = mysqli_query($koneksi, "
        UPDATE `input_aspirasi`
        SET status='$status', feedback='$feedback'
        WHERE id_pelapor='$id'
    ");

    if ($update) {
        echo "<script>
                alert('Feedback berhasil disimpan!');
                window.location='data_aspirasi.php';
              </script>";
    } else {
        echo "Gagal update data : " . mysqli_error($koneksi);
    }
}
?>
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

<h2>Berikan Feedback Pengaduan</h2>

<form method="POST">

    <label>Status</label><br>
    <select name="status">
        <option value="menunggu">Menunggu</option>
        <option value="proses">Proses</option>
        <option value="selesai">Selesai</option>
    </select>

    <br><br>

    <label>Feedback Admin</label><br>
    <textarea name="feedback" rows="5" cols="40"></textarea>

    <br><br>

    <button type="submit" name="update">Simpan Perubahan</button>

</form>

</body>
</html>