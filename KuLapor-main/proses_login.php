<?php
session_start();
include 'config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// ambil data user berdasarkan username dan password
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$data  = mysqli_fetch_assoc($query);

if ($data) {
    $_SESSION['id']       = $data['id'];     
    $_SESSION['nis']      = $data['nis'];
    $_SESSION['username'] = $data['Username'];
    $_SESSION['role']     = $data['role'];

    // redirect berdasarkan role
    if ($data['role'] == 'admin') {
        header("Location: views/admin/homepage.php");
    } elseif ($data['role'] == 'siswa') {
        header("Location: views/siswa/homepage.php");
    }
    exit;
} else {
    echo "Username atau password salah!";
}
