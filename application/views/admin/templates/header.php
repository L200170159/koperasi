<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title><?= $judul ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css')?>">


    <!-- <link href="<?= base_url('assets/summernote/dist/summernote.min.css')?>"> -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      
      @media screen {

        .modal-lg {

          width: 900px; /* New width for large modal */

        }

      }

    </style>
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/').'dashboard.css'?>" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">KSU Mandiri Sukses</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="<?= base_url() ?>auth/logout">Sign out</a>
    </li>
</nav>

<div class="container-fluid">
  <div class="row" style="min-height:650px">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin')?>">
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/Layanan')?>">
              Layanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/Tentang_kami')?>">
              Tentang Kami
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/anggota')?>">
              Anggota
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/user')?>">
              User
            </a>
          </li>
        </ul>

        <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              Year-end sale
            </a>
          </li>
        </ul> -->
      </div>
    </nav>
