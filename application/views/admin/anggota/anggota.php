    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Anggota</h1>
      </div>
      <!-- isii -->
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('notif'); ?>"></div>
      <a class="ml-5 btn btn-primary" href="<?= base_url("admin/anggota/tambah") ?>" role="button">Tambahkan Anggota</a>
      <div class="mt-2 d-flex flex-wrap p-2 bd-highlight justify-content-around">
      <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <form action="<?= site_url('admin/Anggota/index') ?>" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="keyword" placeholder="Cari Anggota" autocomplete="off" autofocus>
                                    <div class="input-group-append">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Cari">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                      <div>
                        <table class="table w-auto">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($anggota)):?>
                                    <tr>
                                        <td colspan="4">
                                            <div class="alert alert-danger" role="alert">
                                                Nama Tidak Ditemukan !!
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif ?>
                                <?php $i=0; foreach($anggota as $anggo) : ?>
                                <tr>
                                    <td scope="row"><?= ++$start ?></td>
                                    <td><?= $anggo['Nama']?></td>
                                    <td>
                                    <a href="<?= site_url('admin/anggota/edit/').$anggo['id_anggota'] ?>" class="badge badge-primary mr-2 ">Edit</a>
                                    <a href="<?= site_url('admin/anggota/hapus/').$anggo['id_anggota'] ?>" class="badge badge-danger mr-2 tombol-hapus">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <!--  -->
    </main>
  
