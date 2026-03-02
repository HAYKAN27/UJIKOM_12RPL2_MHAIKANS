<?php
session_start();
include 'config/koneksi.php';

$tipe     = $_POST['tipe_login'];
$password = $_POST['password'];

if ($tipe == 'admin') {

    $username = $_POST['username'];

    $query = mysqli_query($koneksi, "
        SELECT * FROM user 
        WHERE Username='$username'
    ");

} elseif ($tipe == 'siswa') {

    $nis = $_POST['nis'];

    $query = mysqli_query($koneksi, "
        SELECT * FROM user 
        WHERE nis='$nis'
    ");
}

$data = mysqli_fetch_assoc($query);

// Cek user ada atau tidak
if (!$data) {
    echo "<script>
            alert('Username / NIS tidak ditemukan');
            window.history.back();
          </script>";
    exit;
}

// Cek password
if ($data['password'] != $password) {
    echo "<script>
            alert('Password salah');
            window.history.back();
          </script>";
    exit;
}



if ($data) {

    $_SESSION['id']       = $data['id'];
    $_SESSION['username'] = $data['Username'];
    $_SESSION['nis']      = $data['nis'];
    $_SESSION['role']     = $data['role'];

    if ($data['role'] == 'admin') {
        header("Location: views/admin/homepage.php");
    } else {
        header("Location: views/siswa/homepage.php");
    }
    exit;

} else {
    header("Location: homepage_.php?pesan=gagal");
    exit;
}
?>