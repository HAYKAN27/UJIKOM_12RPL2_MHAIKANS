<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: white;
            padding: 30px;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #4e73df;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #2e59d9;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Ubah Password</h2>

    <form action="../../ControllerSiswa/proses_ganti_password.php" method="POST">
        <input type="password" name="password_lama" placeholder="Password Lama" required>
        <input type="password" name="password_baru" placeholder="Password Baru" required>
        <input type="password" name="konfirmasi_password" placeholder="Konfirmasi Password Baru" required>
        <button type="submit" name="ubah">Simpan Perubahan</button>
    </form>
</div>

</body>
</html>
