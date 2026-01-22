<?php
// perintah untuk membuat koneksi
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_haikan");

if(!$koneksi){
    die("Koneksi Gagal");
}
?>