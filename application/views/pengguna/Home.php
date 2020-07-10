<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card shadow" style="width: 15rem;">
                <div class="card-body bg-dark rounded-lg text-white">
                    <h5 class="card-title">Layanan</h5>
                </div>
                <ul class="list-group list-group-flush">
                <?php foreach($layanan as $lynnn):?>
                        <a href="<?= base_url()?>layanan/detail/<?= $lynnn['link']?>" class="list-group-item text-reset"><?= $lynnn['nama_layanan']?></a> 
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <div class="col">
                <div class="card w-auto mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Visi dan Misi</h5>
                        <p class="card-text">Visi</br>
Menjadi Koperasi yang terpercaya, responsif, mandiri dan sukses selalu serta profesional sebagai wujud kebersamaan untuk peningkatan kesejahteraan anggota.......</p>
                        <a href="<?= base_url() ?>tentang_kami/detail/VisidanMisi" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                <div class="card w-auto mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Sejarah</h5>
                        <p class="card-text">Koperasi Serba Usaha Mandiri Sukses dirintis sejak 1998 dalam bentuk simpan pinjam dan kredit pemilikan (leasing). Seiring dengan perkembangan Universitas Muhammadiyah Surakarta, pada periode kepengurusan Dr. Samino, M.M. (almarhum), Drs. Sami'an, M.M., Drs. A. Fathoni, M.Pd. dirinti........</p>
                        <a href="<?= base_url() ?>tentang_kami/detail/Sejarah" class="btn btn-primary">Read More</a>
                    </div>
                </div>
        </div>
    </div>
    
</div>