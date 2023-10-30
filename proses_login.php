<?php
session_start();
include "koneksi.php";
$username =$_POST['username'];
$password =md5($_POST['password']);

$sql ="SELECT * FROM user WHERE username='$username' AND password='$password'";
$query =mysqli_query($koneksi, $sql);

if(mysqli_num_rows($query) > 0) {
   echo "<script>
   alert('Berhasil Login')
   window.location='index.php';
   </script>";
    $_SESSION['login']=$username;
}else {
    echo "<script>
   alert('Gagal login')
   window.location='index.php';
   </script>";
}
?>