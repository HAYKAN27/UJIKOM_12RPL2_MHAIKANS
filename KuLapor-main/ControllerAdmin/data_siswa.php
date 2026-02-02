<?php
include  '../config/koneksi.php';

$nis      = $_POST['nis'];
$username = $_POST['nama'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$kelas    = $_POST['kelas'];
$role     = 'siswa';

$insert = "INSERT INTO `user` 
(`username`, `password`, `role`, `nis`, `kelas`)
VALUES 
('$username', '$password', '$role', '$nis', '$kelas')";

$query = mysqli_query($koneksi, $insert);

if ($query) {
    echo "berhasil";
}
else{
    echo"gagal";
}   

?>