<div class="container pt-4">
    <div class="d-flex flex-row justify-content-between">
        <div class="p-2 bd-highlight">
            <!-- Flex item 1 -->
            <div class="card shadow" style="width: 15rem;">
                <div class="card-body bg-dark rounded-lg text-white">
                    <h5 class="card-title">Tentang Kami</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach($tentang as $ttgg):?>
                        <a href="<?= base_url()?>tentang_kami/detail/<?= $ttgg['link']?>" class="list-group-item text-reset"><?= $ttgg['nama_tentang']?></a> 
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <div class="d-flex p-2 bd-highlight">
            <div class="card shadow" style="width: 838px"> 
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $detail['nama_tentang'] ?>
                    </h5>
                    <p class="card-text"><?= $detail['isi'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>