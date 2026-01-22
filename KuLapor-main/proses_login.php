<?php

session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Ambil data user berdasarkan username
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
$data  = mysqli_fetch_assoc($query);

// Cek username & password
if ($data && password_verify($password, $data['password'])) {

    $_SESSION['username'] = $data['username'];
    $_SESSION['role']     = $data['role'];

    // Redirect berdasarkan role
    if ($data['role'] == 'admin') {
        header("Location: views/admin/homepage.php");
        exit;
    } elseif ($data['role'] == 'siswa') {
        header("Location: views/siswa/homepage.php");
        exit;
    }

} else {
    echo "Login Gagal";
}

?>