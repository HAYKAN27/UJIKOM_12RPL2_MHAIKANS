<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login_admin.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Password</title>
   <style>
    :root {
        --primary: #4e73df;
        --primary-dark: #2e59d9;
        --bg: #f4f6fb;
    }

    body {
        font-family: 'DM Sans', sans-serif;
        background: linear-gradient(135deg, #eef2ff, #f8f9fc);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
    }

    .card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(10px);
        padding: 40px 35px;
        width: 420px;
        height: 460px;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }


    h2 {
        text-align: center;
        margin-bottom: 50px;
        font-weight: 600;
        color: #333;
    }

    input {
        width: 90%;
        padding: 12px 15px;
        margin-bottom: 18px;
        border-radius: 10px;
        border: 1px solid #ddd;
        font-size: 14px;
        transition: all 0.2s ease;
        outline: none;
    }

    input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.15);
    }

    button {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        letter-spacing: 0.5px;
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(78, 115, 223, 0.3);
    }

    button:active {
        transform: scale(0.98);
    }
</style>
</head>
<body>

<div class="card">
    <h2>Ubah Password</h2>

    <form action="../../ControllerAdmin/proses_ganti_password.php" method="POST">
        <input type="password" name="password_lama" placeholder="Password Lama" required>
        <input type="password" name="password_baru" placeholder="Password Baru" required>
        <input type="password" name="konfirmasi_password" placeholder="Konfirmasi Password Baru" required>
        
        <button type="submit">Simpan Perubahan</button>
    </form>
</div>

</body>
</html>
