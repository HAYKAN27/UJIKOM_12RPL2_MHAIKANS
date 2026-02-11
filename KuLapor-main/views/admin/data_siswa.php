<?php
session_start();
include '../../config/koneksi.php';


// ambil semua data siswa
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE role='siswa' ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>