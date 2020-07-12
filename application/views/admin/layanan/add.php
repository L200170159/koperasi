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
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Layanan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('admin/layanan/table') ?>">Layanan</a></li>
              <li class="breadcrumb-item active">Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Input</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo site_url('admin/layanan/add') ?>" class="form-horizontal" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="_namalayanan_">Nama Layanan</label>
                    <div class="col-lg">
                      <input type="text" name="_namalayanan_" class="form-control" id="_namalayanan_" placeholder="Nama Layanan" value="<?php echo set_value('_name_'); ?>" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="_deskripsi_" class="">Isi</label>
                    <div class="col-lg">
                        <textarea class="form-control col" id="_deskripsi_" name="_deskripsi_" required></textarea>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div class="form-group row">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                      <button type="button" class="btn btn-warning" onclick="goBack()">Cancel</button>
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
<script>

    function goBack() {
        window.history.back();
    }

    $(document).ready(function(){
        $('#_deskripsi_').summernote()
        // ===== Notification alert =====

        var notif = {
        status:"<?php if(isset($notif["status"])) { echo $notif["status"]; } ?>", 
        message:"<?php if(isset($notif["message"])) { echo $notif["message"]; } ?>"
        };

        
        if (notif.status == "error" && notif.message != "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: notif.message
            });
        } else if(notif.status == "success" && notif.message != ""){
            Swal.fire({
                icon: 'success',
                title: 'Success...',
                html: notif.message,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Check Data',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                    window.location.replace("<?php echo site_url('admin/layanan/table') ?>");
            }
        });
        }
        
    });
</script>
</body>
</html>
