<?php
session_start();
if(!isset($_SESSION['login'])) {
    header ("location:login.php?pesan=loginbanggg");
}

function upload(){
    $status = 1;

    $nama_file = $_FILES['gambar']['name'];
    $tmp_name= $_FILES['gambar']['tmp_name'];

    
    $error = $_FILES['gambar']['error'];
    if ($error === 4) {
        $pesan = 'tidak ada yang upload';
        $status = 0;
    }
    
    
    $ukuran_file = $_FILES['gambar']['size'];
    if ($ukuran_file > 500000) { // 500.000 Bytes = 0.5 MB
        $pesan = 'ukuran terlalu besar';
        $status = 0;
    }

    
    $ekstensi_valid = ["jpg","jpeg","png","gif"];

    
    $ekstensi_gambar = explode ('.', $nama_file);

    
    $ekstensi_gambar = strtolower(end($ekstensi_gambar));

    if (!in_array($ekstensi_gambar, $ekstensi_valid)) {
        $pesan = 'ekstensi tidak sesuai';
        $status = 0;
    }

    if ($status == 0) {
        echo "<script>alert('terjadi kesalahan : " . $pesan . " ');
        document.location.href='index.php';</script>";
        exit();
    } else {
        $nama_file_baru = uniqid();
        $nama_file_baru .= '.';
        $nama_file_baru .= $ekstensi_gambar;
        move_uploaded_file($tmp_name, 'images/' . $nama_file_baru);
        return $nama_file_baru;
    }
}
?>