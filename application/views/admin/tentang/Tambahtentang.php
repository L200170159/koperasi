<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah</h1>
      </div>

      <?php echo $this->session->flashdata('notif'); ?>
      <!-- isii -->
      <form method='post' action='<?= site_url('admin/tentang_kami/tambah') ?>'>
        <div class="form-group">
            <label for="exampleFormControlInput1">Judul</label>
            <input type="text" name="namatentang" class="form-control" id="exampleFormControlInput1" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Deskripsi</label>
            <textarea class="form-control" id="summernote" name="deskripsi" required></textarea>
        </div>
        <div class="form-group float-right">
            <input type="submit" name='simpan' class="btn btn-primary" value="Simpan">
            <a class="btn btn-primary" href="<?= site_url('admin/tentang_kami')?>" role="button">Batal</a>
        </div>
        
    </form>
      <!-- akhir isi -->
    </main>

    
  
