<?php
session_start(); 
// Mulai session supaya kita bisa simpan data orang yang login

include 'config/koneksi.php'; 
// Sambungkan file ini ke database

// Ambil data dari form login
$tipe     = $_POST['tipe_login']; 
// Ini buat tahu dia login sebagai admin atau siswa

$password = $_POST['password'];   
// Ini password yang diketik user

// Kalau yang dipilih adalah login admin
if ($tipe == 'admin') {

    $username = $_POST['username']; 
    // Ambil username yang diketik

    $query = mysqli_query($koneksi, "
        SELECT * FROM user 
        WHERE Username='$username'
    ");
    // Cari di database apakah username itu ada

} 
// Kalau yang dipilih login siswa
elseif ($tipe == 'siswa') {

    $nis = $_POST['nis']; 
    // Ambil NIS yang diketik siswa

    $query = mysqli_query($koneksi, "
        SELECT * FROM user 
        WHERE nis='$nis'
    ");
    // Cari di database apakah NIS itu ada
}

// Ambil hasil pencarian dari database
$data = mysqli_fetch_assoc($query);

// Kalau data tidak ditemukan
if (!$data) {
    echo "<script>
            alert('Username / NIS tidak ditemukan');
            window.history.back();
          </script>";
    // Tampilkan pesan gagal lalu kembali ke halaman sebelumnya
    exit;
}

// Kalau password yang diketik tidak sama dengan yang di database
if ($data['password'] != $password) {
    echo "<script>
            alert('Password salah');
            window.history.back();
          </script>";
    // Kasih tahu password salah lalu balik lagi
    exit;
}

// Kalau semuanya benar (user ada dan password cocok)
if ($data) {

    // Simpan data penting ke session supaya dianggap sudah login
    $_SESSION['id']       = $data['id'];        
    $_SESSION['username'] = $data['Username'];  
    $_SESSION['nis']      = $data['nis'];       
    $_SESSION['role']     = $data['role'];      

    // Arahkan ke halaman sesuai role
    if ($data['role'] == 'admin') {
        header("Location: views/admin/homepage.php"); 
        // Kalau admin masuk ke dashboard admin
    } else {
        header("Location: views/siswa/homepage.php"); 
        // Kalau siswa masuk ke dashboard siswa
    }
    exit;

} else {
    // Kalau ada error aneh yang tidak terduga
    header("Location: homepage_.php?pesan=gagal");
    exit;
}
?>