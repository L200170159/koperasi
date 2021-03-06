<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
        <div class="row justify-content-around">

            <div class="col-lg-3 col-md-6 footer-info">
            <h3>KSU Mandiri Sukses</h3>
            <p>
                Jalan Garuda Mas 17 Pabelan<br>
                Kartasura, Sukoharjo<br><br>
                <strong>Telepon:</strong> 0271.717417 ext.2329<br>
                <strong>Email:</strong> ksumandirisukses@gmail.com<br>
            </p>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
            <h4>Dinas Terkait</h4>
            <ul>
                <?php foreach($linkDinasTerkait as $linkDinas): ?>
                <li><i class="bx bx-chevron-right"></i> <a href="<?= $linkDinas['link'] ?> " target="_blank"><?= $linkDinas['nama'] ?></a></li>
                <?php endforeach ?>
            </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
            <h4>Layanan Kampus</h4>
            <ul>
                <?php foreach($linkLayananKampus as $linkLayanan): ?>
                <li><i class="bx bx-chevron-right"></i> <a href="<?= $linkLayanan['link'] ?> "target="_blank"><?= $linkLayanan['nama'] ?></a></li>
                <?php endforeach ?>
            </ul>
            </div>

        </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
        &copy; Copyright <strong><span>Mamba</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->