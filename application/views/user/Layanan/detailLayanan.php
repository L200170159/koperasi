<!DOCTYPE html>
<html lang="en">

<head>
  

  <?php $this->load->view("user/partial/css"); ?>

  <!-- =======================================================
  * Template Name: Mamba - v2.3.0
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <?php $this->load->view("user/partial/header"); ?>
  

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="<?= base_url() ?>">Home</a></li>
            <li><a><?= $layanan['nama_layanan'] ?></a></li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Layanan Details Section ======= -->
    <section class="portfolio-details">
      <div class="container">
        <div class="portfolio-description">
          <h1><?= $layanan['nama_layanan'] ?></h1>
          <?= $layanan['isi'] ?>
        </div>
      </div>
    </section><!-- End Layanan Details Section -->

    <!-- ======= Layanan Lain Section ======= -->
    <section id="layanan" class="about-lists" style="background-color: #f5f9fc;">
      <div class="container">

        <div class="section-title">
          <h2>Layanan Lain</h2>
        </div>

        <div class="row no-gutters">

          <?php $i=1; foreach($layananlain as $lay): if($lay['nama_layanan']!=$layanan['nama_layanan']){?>
          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up">
            <span><?= $i ?></span>
            <h4><a href="<?= site_url('layanan/detail/').$lay['id_layanan'] ?>"><?= $lay['nama_layanan'] ?></a></h4>
            <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
          </div>
          <?php $i++; };  endforeach ?>

        </div>

      </div>
    </section><!-- End Layanan Section -->

  </main><!-- End #main -->

  <?php $this->load->view("user/partial/footer"); ?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <?php $this->load->view("user/partial/js"); ?>
  
</body>

</html>