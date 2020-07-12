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
            <h1>Anggota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('admin/anggota/table') ?>">Anggota</a></li>
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
              <h3 class="card-title">Data Anggota</h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a href="<?php echo site_url('admin/anggota/add')?>">
                      <button type="button" class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i>Tambah Anggota</button>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="_anggota_" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Name</th>
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
  var anggota;

  function delAnggota(id){
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
          url: "<?php echo site_url('admin/API/anggota/delete')?>",
          dataType: "JSON",
          success: function (data) {
            if (data.status == "success") {
              anggota.ajax.reload();
              Swal.fire({
                icon: 'success',
                title: 'Success...',
                text: data.message
              });
            } else {
              anggota.ajax.reload();
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
    anggota = $("#_anggota_").DataTable({
      ajax: {
        url: "<?php echo site_url('admin/API/anggota/data')?>",
        type: "POST",
        dataSrc: ""
      },
      dom: 'Blfrtip',
      buttons: [
        {
          extend      : 'copy',
          // title       : 'Data Anggota',
          text        : '<i class="far fa-copy"></i> Copy',
          titleAttr   : 'Copy',
          className   : 'btn btn-default btn-sm',
          exportOptions: {
            columns: [ 0, 1, 2]
          },
          title: function(){
            let current_datetime = new Date()
            let formatted_date = current_datetime.getDate() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getFullYear()
            console.log(formatted_date)
            return 'Data Anggota (' + formatted_date + ')';
          },
        },
        {
          extend      : 'csv',
          title       : 'Data Anggota',
          text        : '<i class="far fa-file"></i> CSV',
          titleAttr   : 'CSV',
          className   : 'btn btn-default btn-sm',
          exportOptions: {
            columns: [ 0, 1, 2]
          },
          filename: function(){
            let current_datetime = new Date()
            let formatted_date = current_datetime.getDate() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getFullYear()
            console.log(formatted_date)
            return 'Data Anggota (' + formatted_date + ')';
          },
        },
        {
          extend      : 'excel',
          title       : 'Data Anggota',
          text        : '<i class="far fa-file-excel"></i> Excel',
          titleAttr   : 'Excel',
          className   : 'btn btn-default btn-sm',
          exportOptions: {
            columns: [ 0, 1, 2]
          },
          filename: function(){
            let current_datetime = new Date()
            let formatted_date = current_datetime.getDate() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getFullYear()
            console.log(formatted_date)
            return 'Data Anggota (' + formatted_date + ')';
          },
        },
        {
          extend      : 'pdf',
          title       : 'Data Anggota',
          oriented    : 'potrait',
          pageSize    : 'LEGAL',
          // download    : 'open',
          text        : '<i class="far fa-file-pdf"></i> PDF',
          titleAttr   : 'PDF',
          className   : 'btn btn-default btn-sm',
          exportOptions: {
            columns: [ 0, 1, 2]
          },
          filename: function(){
            let current_datetime = new Date()
            let formatted_date = current_datetime.getDate() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getFullYear()
            console.log(formatted_date)
            return 'Data Anggota (' + formatted_date + ')';
          },
        },               
        {
          extend      : 'print',
          title       : 'Data Anggota',
          text        : '<i class="fas fa-print"></i> Print',
          titleAttr   : 'Print',
          className   : 'btn btn-default btn-sm',
          exportOptions: {
            columns: [ 0, 1, 2]
          }
        }
      ],
      columns: [
        {
          data: "id_anggota",
          render: function (data, type, row, meta) {
            // console.log(meta);
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {data: "NIK"},
        {data: "Nama"},
        {
          data: "id_anggota",
          render: function(data, type, row){
            const setdelAnggota = '"'+data+'"';
            return "\
              <a href='<?php echo site_url('admin/anggota/edit/')?>"+data+"' data-toggle='tooltip' title='Edit'>\
                  <button type='button' class='btn btn-warning'><i class='fa fa-edit'></i></button>\
              </a>\
              <a onclick='delAnggota("+setdelAnggota+")' data-toggle='tooltip' title='Delete'>\
                  <button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button>\
              </a>";
          }
        }
      ]
    });


  });
</script>
</body>
</html>
