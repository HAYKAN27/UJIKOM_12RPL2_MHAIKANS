<?php
session_start();
include 'config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// ambil data user berdasarkan username
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
$data  = mysqli_fetch_assoc($query);

// cek user & password bcrypt
if ($data && password_verify($password, $data['password'])) {

    $_SESSION['username'] = $data['username'];
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
?>
