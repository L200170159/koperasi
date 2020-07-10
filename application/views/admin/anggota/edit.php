<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">edit anggota</h1>
      </div>
      <form method='post' action='<?= site_url('admin/anggota/edit/').$detail['id_anggota'] ?>'>
        <div class="form-group">
            <label for="exampleFormControlInput1">NIK</label>
            <input type="hidden" name="idhidden" class="form-control" id="exampleFormControlInput1hidden" value="<?= $detail['id_anggota'] ?>">
            <input type="text" name="nik" class="form-control" id="exampleFormControlInput1" value="<?= $detail['NIK'] ?>" required>
        </div>
        <div class="form-group">
        <label for="exampleFormControlInput1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" value="<?= $detail['Nama'] ?>" required>
        </div>
        <div class="form-group float-right">
            <input type="submit" name='simpan' class="btn btn-primary" value="Simpan">
        </div>
        
    </form>
      <!-- akhir isi -->
    </main>

    
  
