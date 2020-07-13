<!-- ======= Header ======= -->
<header id="header">
<div class="container">

    <div class="logo float-left">
    <h1 class="text-light"><a href="index.html"><span><img src="<?= base_url()?>assets/img/logo.png" alt="" class="img-fluid">  KSU Mandiri Sukses</span></a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    </div>

    <nav class="nav-menu float-right d-none d-lg-block">
    <ul>
        <li><a href="<?php if($halaman==="home"){echo '#hero';}elseif($halaman==="inner"){echo base_url();}?>">Home</a></li>
        <?php if($halaman==="home"){?>
        <li><a href="#layanan">Layanan</a></li>
        <li><a href="#tentangkami">Tentang Kami</a></li>
        <li><a href="#contact">Contact Us</a></li>
        <?php }?>
    </ul>
    </nav><!-- .nav-menu -->

</div>
</header><!-- End Header -->