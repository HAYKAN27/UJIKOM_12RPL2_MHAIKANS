<?php
session_start();
include '../config/koneksi.php';

if (isset($_POST['ubah'])) {

    $nis = $_SESSION['nis'];
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi = $_POST['konfirmasi_password'];

    // Ambil data user
    $query = mysqli_query($koneksi, 
        "SELECT * FROM user WHERE nis='$nis'"
    );
    $data = mysqli_fetch_assoc($query);

    // Cek password lama
    if ($password_lama != $data['password']) {
        echo "<script>
                alert('Password lama salah!');
                window.location='ubah_password.php';
              </script>";
        exit();
    }

    // Cek konfirmasi password
    if ($password_baru != $konfirmasi) {
        echo "<script>
                alert('Konfirmasi password tidak cocok!');
                window.location='ubah_password.php';
              </script>";
        exit();
    }

    // Update password
    $update = mysqli_query($koneksi, 
        "UPDATE user SET password='$password_baru' WHERE nis='$nis'"
    );

    if ($update) {
        echo "<script>
                alert('Password berhasil diubah!');
                window.location='../views/siswa/homepage.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal mengubah password!');
                window.location='../views/siswa/form_ganti_password.php';
              </script>";
    }
}
?>
