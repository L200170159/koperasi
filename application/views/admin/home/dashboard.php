<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view("admin/partials/head.php") ?>
</head>
<body class="hold-transition sidebar-mini pace-primary">
<!-- Site wrapper -->
<div class="wrapper">
  <?php $this->load->view("admin/partials/navbar.php") ?>

  <?php $this->load->view("admin/partials/sidebar.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <div class="container-fluid">
              <div class="col-lg-12 col-9">
                <div class="container">
                  <img src="<?php echo base_url('assets/adminlte/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; display: block; margin: auto;">
                  <h1 class="display-4 text-center"><b>Selamat Datang!</b></h1>
                  <p class="lead text-center">My Control Panel</p>
                </div>
              </div>
              <!-- Small boxes (Stat box) -->
              <div class="row justify-content-center">
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3><?= $totalanggota?></h3>
      
                      <p>Anggota</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-user"></i>
                    </div>
                    <a href="<?=base_url()?>admin/anggota/table" class="small-box-footer">Lihat Anggota <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>65</h3>
      
                      <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-chart-pie"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view("admin/partials/footer.php") ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php $this->load->view("admin/partials/javascript.php") ?>
</body>
</html>
