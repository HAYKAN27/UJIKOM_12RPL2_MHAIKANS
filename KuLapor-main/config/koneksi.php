<?php
// perintah untuk membuat koneksi
$koneksi = mysqli_connect("localhost","root","","db_pengaduan_mutu_haikan");

if(!$koneksi){
    die("Koneksi Gagal");
}
?>