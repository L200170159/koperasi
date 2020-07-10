<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Layanan</h1>
      </div>

      <?php echo $this->session->flashdata('notif'); ?>
      <!-- isii -->
      <form method='post' action='<?= site_url('admin/Layanan/edit/').$detail['link'] ?>'>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama Layanan</label>
            <input type="hidden" name="linkhidden" class="form-control" id="exampleFormControlInput1hidden" value="<?= $detail['link'] ?>">
            <input type="text" name="namalayanan" class="form-control" id="exampleFormControlInput1" value="<?= $detail['nama_layanan'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Deskripsi Layanan</label>
            <textarea class="form-control" id="summernote" name="deskripsi" required><?= $detail['isi'] ?></textarea>
        </div>
        <div class="form-group float-right">
            <input type="submit" name='simpan' class="btn btn-primary" value="Simpan">
        </div>
        
    </form>
      <!-- akhir isi -->
    </main>

    
  
