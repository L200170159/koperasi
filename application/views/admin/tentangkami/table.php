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
            <h1>Tentang Kami</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('admin/tentangkami/table') ?>">Tentang Kami</a></li>
              <li class="breadcrumb-item active">Table</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Tentang Kami</h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a href="<?php echo site_url('admin/tentangkami/add')?>">
                      <button type="button" class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i> Tambah Tentang Kami</button>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="_tentangkami_" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
  var tentangkami;

  function deltentangkami(id){
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type: "POST",
          data: {id: id},
          url: "<?php echo site_url('admin/API/tentangkami/delete')?>",
          dataType: "JSON",
          success: function (data) {
            if (data.status == "success") {
              tentangkami.ajax.reload();
              Swal.fire({
                icon: 'success',
                title: 'Success...',
                text: data.message
              });
            } else {
              tentangkami.ajax.reload();
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message
              })
            }
          }
        });
      }
    })
  }
  


  $(document).ready(function(){
    tentangkami = $("#_tentangkami_").DataTable({
      ajax: {
        url: "<?php echo site_url('admin/API/tentangkami/data')?>",
        type: "POST",
        dataSrc: ""
      },
      columns: [
        {
          data: "id_tentang",
          render: function (data, type, row, meta) {
            // console.log(meta);
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {data: "nama_tentang"},
        {
          data: "id_tentang",
          render: function(data, type, row){
            const setDeltentangkami = '"'+data+'"';
            return "\
              <a href='<?php echo site_url('admin/tentangkami/edit/')?>"+data+"' data-toggle='tooltip' title='Edit'>\
                  <button type='button' class='btn btn-warning'><i class='fa fa-edit'></i></button>\
              </a>\
              <a onclick='deltentangkami("+setDeltentangkami+")' data-toggle='tooltip' title='Delete'>\
                  <button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button>\
              </a>";
          }
        }
      ]
    });

    // ===== How to make a sequence number on a datatable =====
    // commodity.on( 'order.dt search.dt', function () {
    //   commodity.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    //       cell.innerHTML = i+1;
    //   } );
    // } ).draw();

  });
</script>
</body>
</html>
