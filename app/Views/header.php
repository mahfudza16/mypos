<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <!--<link rel="stylesheet" href="<?php echo site_url('public/css/bootstrap.css'); ?>" type="text/css" >-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Praktikum CI</title>
</head>
<body>
<div class="container pt-3">
<?php if(isset($_SESSION['username'])){ ?>
<nav class="navbar navbar-expand-sm bg-light justify-content-center">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo site_url('order'); ?>">Pesan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo site_url('produk'); ?>">Produk</a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" href="#">Pengeluaran</a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" href="<?php echo site_url('report'); ?>">Laporan</a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" href="#">Pengaturan</a>
    </li> -->
  </ul>
</nav>
<br>
<?php } ?>