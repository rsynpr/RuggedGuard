<?php
session_start();
if(!isset($_SESSION['login'])) {
    header ("location:login.php?pesan=loginbanggg");
}
include "koneksi.php";
require "functions.php";

if(isset($_POST['simpan'])) {

    $gambar = upload();
    $caption = $_POST['caption'];
    $lokasi = $_POST['lokasi'];
    

    $sql = "INSERT INTO post (gambar, caption, lokasi) VALUES ('$gambar', '$caption', '$lokasi')";
    $query = mysqli_query($koneksi, $sql);

    if ($query){
        echo "<script>
        alert('Berhasil Menambah')
        window.location='index.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal Menambah')
        window.location='index.php';
        </script>";
    }
}
?>