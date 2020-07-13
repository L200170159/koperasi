<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KSU Mandiri Sukses</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

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
  

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url('assets/img/slide/slide-1.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Mamba</span></h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url('assets/img/slide/slide-2.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url('assets/img/slide/slide-3.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Layanan Section ======= -->
    <section id="layanan" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Layanan</h2>
        </div>

        <div class="row justify-content-around">
          <?php $i=1; foreach($layanan as $lay):?>
          <div class="col-lg-4 col-md-6  icon-box" data-aos="fade-up">
            <div class="icon"><i class="icofont-number"><?= $i ?></i></div>
            <h4 class="title"><a href="<?= site_url('layanan/detail/').$lay['id_layanan'] ?>"><?= $lay['nama_layanan'] ?></a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
          <?php $i++; endforeach ?>
        </div>

      </div>
    </section><!-- End Layanan Section -->

    <!-- ======= Tentang Kami Section ======= -->
    <section id="tentangkami" class="services" style="background-color: #f5f9fc;">
      <div class="container" >

        <div class="section-title">
          <h2>Tentang Kami</h2>
        </div>

        <div class="row justify-content-around">
          <?php $i=1; foreach($tentang as $ttg):?>
          <div class="col-lg-4 col-md-6  icon-box" data-aos="fade-up">
            <div class="icon"><i class="icofont-number"><?= $i ?></i></div>
            <h4 class="title"><a href="<?= site_url('tentangkami/detail/').$ttg['id_tentang'] ?>"><?= $ttg['nama_tentang'] ?></a></h4>
          </div>
          <?php $i++; endforeach ?>
        </div>

      </div>
    </section><!-- End Tentang Kami Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact Us</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Alamat</h3>
              <p>Jalan Garuda Mas 17 Pabelan, Kartasura, Sukoharjo</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info-box">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>ksumandirisukses@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box ">
              <i class="bx bx-phone-call"></i>
              <h3>Telepon</h3>
              <p>0271.717417 ext.2329</p>
            </div>
          </div>

          <div class="col-lg-12 align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d988.7888078315739!2d110.7675214!3d-7.5580477!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a15511e7a7b09%3A0x38687caa23c5737!2sKSU%20MANDIRI%20UMS!5e0!3m2!1sen!2sid!4v1594593627170!5m2!1sen!2sid" width="600" height="450" class="col-lg" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <?php $this->load->view("user/partial/footer"); ?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <?php $this->load->view("user/partial/js"); ?>
  
</body>

</html>