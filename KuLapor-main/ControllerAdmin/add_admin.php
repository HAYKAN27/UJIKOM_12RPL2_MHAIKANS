<?php
include  '../config/koneksi.php';

$username = $_POST['nama'];
$password = $_POST['password'];
$role     = 'admin';

$insert = "INSERT INTO `user` 
(`username`, `password`, `role`)
VALUES 
('$username', '$password', '$role')";

$query = mysqli_query($koneksi, $insert);

if ($query) {
        echo "<script>
                alert('Data Admin berhasil ditambahkan');
                window.location='../views/admin/homepage.php';
              </script>";
}
else{
    echo "<script>
                alert('Data Gagal di Tambahkan ');
                window.location='../views/admin/homepage.php';
              </script>";
}   

?>