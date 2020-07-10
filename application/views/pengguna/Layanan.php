<div class="container pt-4">
    <div class="d-flex flex-row justify-content-between">
        <div class="p-2 bd-highlight">
            <!-- Flex item 1 -->
            <div class="card shadow" style="width: 15rem;">
                <div class="card-body bg-dark rounded-lg text-white">
                    <h5 class="card-title">LAYANAN</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach($layanan as $lynnn):?>
                        <a href="<?= base_url()?>layanan/detail/<?= $lynnn['link']?>" class="list-group-item text-reset"><?= $lynnn['nama_layanan']?></a> 
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <div class="d-flex p-2 bd-highlight">
            <div class="card shadow " style="width: 838px"> 
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $detail['nama_layanan'] ?>
                    </h5>
                    <p class="card-text"><?= $detail['isi'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>