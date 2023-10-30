<?php
session_start();
if(!isset($_SESSION['login'])) {
    header ("location:login.php?pesan=loginbanggg");
}
include "koneksi.php";

$no = $_GET['no'];

$sql = "SELECT * FROM post WHERE no = '$no'";
$query = mysqli_query($koneksi, $sql);

while($post = mysqli_fetch_assoc($query)) {
    $gambar = $post['gambar'];
    unlink('images/'. $gambar);
}

$sql2 = "DELETE FROM post WHERE no = '$no'";
$query2 = mysqli_query($koneksi, $sql2);

if ($query2) {
    header("location:index.php?hapus=sukses");
} else {
    header("location:index.php?hapus=gagal");
}
?>