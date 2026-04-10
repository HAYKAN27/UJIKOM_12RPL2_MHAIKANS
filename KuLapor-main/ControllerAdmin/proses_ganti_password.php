<?php
session_start();
include '../config/koneksi.php';


    $id = $_SESSION['id'];
    $password_baru = $_POST['password_baru'];
    $password_hash = password_hash($password_baru,PASSWORD_DEFAULT);
    $konfirmasi = $_POST['konfirmasi_password'];

    // Ambil data user
    $query = mysqli_query($koneksi, 
        "SELECT * FROM user WHERE id='$id' "
    );
    $data = mysqli_fetch_assoc($query);

    // Cek konfirmasi password
    if ($password_baru != $konfirmasi) {
        echo "<script>
                alert('Konfirmasi password tidak cocok!');
                window.location='../views/admin/form_ganti_password.php';
              </script>";
        exit();
    }

    // Update password
    $update = mysqli_query($koneksi, 
        "UPDATE user SET password='$password_hash' WHERE id='$id'"
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
