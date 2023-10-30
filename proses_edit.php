<?php
session_start();
if(!isset($_SESSION['login'])) {
    header ("location:login.php?pesan=loginbanggg");
}
include "koneksi.php";
require "functions.php";

if (isset($_POST['update'])) {
    $no = $_POST['no'];
    $caption = $_POST['caption'];
    $lokasi = $_POST['lokasi'];
    $foto = $_POST['foto_lama'];
    $foto_baru = $_FILES['gambar']['name'];

   
    if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $foto;
	} else {
        $sql = "SELECT * FROM post WHERE no = '$no' ";
        $query = mysqli_query($koneksi, $sql);
    

        while($post = mysqli_fetch_assoc($query)) {
            $gambar = $post['gambar'];
            unlink('images/' . $gambar);
        }

      
		$gambar = upload();
	}
    
    $sql2 = "UPDATE post SET caption = '$caption', gambar = '$gambar', lokasi = '$lokasi' WHERE no = '$no' ";
    $query2 = mysqli_query($koneksi, $sql2);

    if ($query2) {
        echo "<script>
        alert('Berhasil Mengedit')
        window.location='index.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal Mengedit')
        window.location='index.php';
        </script>";
    }
    
}