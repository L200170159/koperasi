<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css')?>">
    <script
      src="<?= base_url('assets/fontawesome/js/all.js')?>"
      data-auto-a11y="true"
    ></script>
    <title><?= $judul; ?></title>
  </head>
  <body>

    <div class="container pt-4">
    <nav class="navbar navbar-expand-lg navbar-white bg-white border rounded-lg shadow">
      <a class="navbar-brand" href="<?= base_url()?>">
        <img src="<?= base_url()?>assets/img/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
            <a class="nav-item nav-link btn btn-white" href="<?= base_url()?>">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle btn btn-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Layanan
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php foreach($layanan as $lyn): ?>
                <a class="dropdown-item" href="<?= base_url()?>layanan/detail/<?= $lyn['link']?>"><?=$lyn['nama_layanan']?></a>
              <?php endforeach; ?>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle btn btn-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Tentang Kami
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php foreach($tentang as $ttg): ?>
                <a class="dropdown-item" href="<?= base_url()?>tentang_kami/detail/<?= $ttg['link']?>"><?=$ttg['nama_tentang']?></a>
              <?php endforeach; ?>
                <a class="dropdown-item" href="<?= base_url()?>anggota/">Anggota</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-white" href="<?= base_url('kontak')?>">Kontak</a>
          </li>
        </ul>
      </div>
    </nav>
    </div>