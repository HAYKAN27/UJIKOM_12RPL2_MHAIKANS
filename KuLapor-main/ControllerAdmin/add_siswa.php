<?php
include  '../config/koneksi.php';

$nis      = $_POST['nis'];
$username = $_POST['nama'];
$password = "password123";
$kelas    = $_POST['kelas'];
$role     = 'siswa';

$insert = "INSERT INTO `user` 
(`username`, `password`, `role`, `nis`, `kelas`)
VALUES 
('$username', '$password', '$role', '$nis', '$kelas')";

$query = mysqli_query($koneksi, $insert);

if ($query) {
        echo "<script>
                alert('Data berhasil ditambahkan');
                window.location='../views/admin/data_siswa.php';
              </script>";
}
else{
    echo"gagal";
}   

?>