<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Password</h1>
      </div>
      <form class="user" method="post" action="<?= base_url('admin/user/registration'); ?>">
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Username" value="<?= set_value('name'); ?>">
            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            Register Account
        </button>
    </form>
      <!-- akhir isi -->
</main>

    
  
