<?php
session_start();
include '../config/koneksi.php';


    $id = $_SESSION['id'];
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi = $_POST['konfirmasi_password'];

    // Ambil data admin
    $query = mysqli_query($koneksi, 
        "SELECT * FROM user WHERE id ='$id'"
    );
    $data = mysqli_fetch_assoc($query);

    // Cek password lama
    if ($password_lama != $data['password']) {
        echo "<script>
                alert('Password lama salah!');
                window.location='../views/admin/proses_ganti_password.php';
              </script>";
        exit();
    }

    // Cek konfirmasi password
    if ($password_baru != $konfirmasi) {
        echo "<script>
                alert('Konfirmasi password tidak cocok!');
                window.location='../views/admin/proses_ganti_password.php';
              </script>";
        exit();
    }

    // Update password
    $update = mysqli_query($koneksi, 
        "UPDATE user SET password='$password_baru' WHERE id ='$id'"
    );

    if ($update) {
        echo "<script>
                alert('Password berhasil diubah!');
                window.location='../views/admin/homepage.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal mengubah password!');
                window.location='../views/admin/form_ganti_password.php';
              </script>";
    }

?>
