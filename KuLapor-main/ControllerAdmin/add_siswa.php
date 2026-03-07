<?php
include  '../config/koneksi.php';

$nis      = $_POST['nis'];
$username = $_POST['nama'];
$kelas    = $_POST['kelas'];
$role     = 'siswa';
$password = "password123";
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$insert = "INSERT INTO `user` 
(`username`, `password`, `role`, `nis`, `kelas`)
VALUES 
('$username', '$password_hash', '$role', '$nis', '$kelas')";

$query = mysqli_query($koneksi, $insert);

if ($query) {
        echo "<script>
                alert('Data berhasil ditambahkan');
                window.location='../views/admin/data_siswa.php';
              </script>";
}
else{
    echo "<script>
                alert('Data Gagal ditambahkan');
                window.location='../views/admin/form_add_siswa.php';
              </script>";
}   

?>