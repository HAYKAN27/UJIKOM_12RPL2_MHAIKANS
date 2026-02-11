<?php
// perintah untuk membuat koneksi
$koneksi = mysqli_connect("localhost","root","","db_sekolah_ujikom_2026");

if(!$koneksi){
    die("Koneksi Gagal");
}
?>