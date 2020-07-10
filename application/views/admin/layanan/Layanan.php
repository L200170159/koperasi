  
    
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Layanan</h1>
      </div>
      <!-- isii -->
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('notif'); ?>"></div>
      <a class="ml-5 btn btn-primary" href="<?= base_url("admin/layanan/tambah") ?>" role="button">Tambahkan Layanan</a>
      <div class="mt-2 d-flex flex-wrap p-2 bd-highlight justify-content-around">
      <?php foreach($layanan as $lay) : ?>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop<?= $lay['id_layanan'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-xl ">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= $lay['nama_layanan'] ?></h5>
              </div>
              <div class="modal-body">
              <div class="card mx-auto" style="width: 838px">
                <div class="card-body">
                    <?= $lay['isi'] ?>
                </div>
              </div>

                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-warning" href="<?= site_url('admin/layanan/edit/').$lay['link'] ?>" role="button">Edit</a>
              </div>
            </div>
          </div>
        </div>
        <!-- endmodal -->

      <div class="card mb-3" style="width: 500px;">
        <div class="row no-gutters">
          <div class="col-md-8">
            <div class="card-body">
              <!-- <h5 class="card-title"><?= $lay['nama_layanan']; ?></h5> -->
              <div class="card-text"><?=  $lay['nama_layanan'];  ?></div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-body">

            

              <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#staticBackdrop<?= $lay['id_layanan'] ?>">Lihat Detail</button>
              <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                Launch static backdrop modal
              </button> -->

              <!-- <a class="btn btn-primary btn-sm btn-block" href="#staticBackdrop" role="button">Lihat Detail</a> -->
              <!-- <button type="button" class="btn btn-primary btn-sm btn-block">Edit</button> -->
              <a class="btn btn-warning btn-sm btn-block" href="<?= site_url('admin/layanan/edit/').$lay['link'] ?>" role="button">Edit</a>
              <!-- <button type="button" class="btn btn-primary btn-sm btn-block">Hapus</button> -->
              <a class="btn btn-danger btn-sm btn-block tombol-hapus" href="<?= site_url('admin/layanan/hapus/').$lay['id_layanan'] ?>" role="button">Hapus</a>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach ?>
      </div>
      <!--  -->
    </main>
  
