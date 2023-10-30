<?php
session_start();
if(!isset($_SESSION['login'])) {
    header ("location:login.php?pesan=loginbanggg");
}
include "koneksi.php";
$sql = "SELECT * FROM post";
$query = mysqli_query($koneksi, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RuggedGuard</title>
    <link rel="icon" href="RsyaWhite.png">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
.zoom {
  
  transition: transform .2s; /* Animation */
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.3); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}

body{
background-color: #1a1a1a;
}
</style>
  </head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg shadow-lg" style="background-color: #1A1A1A;">
  <div class="container-fluid">
  <img src="RsyaWhite.png" width="45" height="45" class="mr-3" style="margin-left: 25px;"> 
  <img src="RuggedGuard.png" width="150" height="60" class="mr-3" style="margin-left: 25px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
    </div>

    <div align="right">
    <a href="tambah.php" href="#staticBackdrop" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-square-plus" style="color: #000000;"></i></a>
    <a href="logout.php"  onclick="return confirm('Anda Yakin Untuk Logout?')" class="btn btn-dark "><i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i> LOGOUT</a>
    </div>
  </div>
</nav>

    <div align="center" class="container">
    <?php while($post = mysqli_fetch_assoc($query)) { ?>
    <br>
    <center>
    <div class="card" style="width: 18rem;">
    <div class="zoom">
    <img class="card-img-top" src="images/<?= $post['gambar'] ?>" height="230" width="50" alt="Card image cap">
    </div>
    <div align="left" class="container">
    <div class="card-body">
    <h5 class="card-text"><?= $post['caption'] ?></h5>
    <p class="card-text"><?= $post['lokasi'] ?></p>

    <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$post['no']?>"><i class="fa-solid fa-pen-to-square"></i></button>
    <a href="hapus.php?no=<?=$post['no']?>" onclick="return confirm('Anda Yakin Untuk Menghapus?')" class = "btn btn-dark btn-sm"><i class="fa-solid fa-trash-can" style="color: #ffffff;"></i></a>
    <a href="https://wa.me/6289618203695?text=Permisi%20Saya%20Tertarik%20Untuk%20Memesan%20Produk%20Anda%20" class= "btn btn-dark btn-sm"><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></a>
    </div>
    </div>
</div>
    </center>

    <div class="modal fade" id="staticBackdrop<?=$post['no']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #1A1A1A;">
        <h2 class="modal-title fs-5 text-white" id="staticBackdropLabel" >RuggedGuard</h2>
        <button type="button" class = "btn btn-dark btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-x" style="color: #ffffff;"></i></button>
      </div>
      <div class="modal-body">
        
      <form action="proses_edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="no" value="<?= $post['no'] ?>">
        <input type="hidden" name="foto_lama" value="<?= $post['gambar'] ?>">

        <div class="container" align="left">
        <label for="">Images</label>

        <div align="right">
        <img src="images/<?= $post['gambar'] ?>" width="100" alt=""><br><br>
        <input type="file" name="gambar" class="form-control" value="<?= $post['gambar'] ?>" ><br>
        </div>

        <label for="">Caption</label>
        <input type="text" name="caption" class="form-control" value="<?= $post['caption'] ?>" autocomplete="off"><br>


        <label for="">Location</label>
        <input type="text" name="lokasi" class="form-control" value="<?= $post['lokasi'] ?>" autocomplete="off"><br>

        
        <input type="submit" value="Simpan" name="update" class="btn btn-primary btn-sm">


    </form>
</div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
    </div>
    </div>
    </div>
    </div>
  <?php } ?>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #1A1A1A;">
        <h2 class="modal-title fs-5 text-white" id="staticBackdropLabel" >RuggedGuard</h2>
        <button type="button"  class = "btn btn-dark btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-x" style="color: #ffffff;"></i></button>
      </div>
      <div class="modal-body">
        
      <form action="proses_tambah.php" method="post" enctype="multipart/form-data">

<div class="container" align="left">
<label for="" class="">Images</label>
<input type="file" name="gambar" required class="form-control"><br>

<label for="">Caption</label>
<input type="text" name="caption" autocomplete="off" required class="form-control"><br>

<label for="">Location</label>
<input type="text" name="lokasi" autocomplete="off" required class="form-control"><br>

<input type="submit" value="Simpan" name="simpan" class="btn btn-primary btn-sm">

</form>
</div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
    </div>
    </div>
    </div>
    </div>

</body>
</html>