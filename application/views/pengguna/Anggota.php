<div class="container pt-4">
    <div class="d-flex flex-row justify-content-around">
        <div class="p-2 bd-highlight">
            <!-- Flex item 1 -->
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title">Ingin Jadi Anggota ?</h5>
                    <p class="card-text">Bergabunglah menjadi bagian dari Koperasi Serba Usaha Mandiri Sukses dengan cara mendaftar sebagai anggota.</br>Saat ini jumlah anggota <?= $jumlah_anggota ?></p>
                    <a href="#" class="card-link">Daftar</a>
                </div>
            </div>
        </div>
        <div class="d-flex p-2 bd-highlight">
            <!-- item 2 -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <form action="<?= site_url('Anggota/index') ?>" method="post">
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
                        <table class="table" style="width:500px">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($anggota)):?>
                                    <tr>
                                        <td colspan="2">
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
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <?= $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
            <!-- ? -->
        </div>
    </div>
</div>