<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Password</h1>
      </div>
        <form class="user" method="post" action='<?= site_url('admin/user/ubahpass/').$detail['id'] ?>'>
            <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password lama">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Ubah
            </button>
        </form>
      <!-- akhir isi -->
</main>
