  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('admin/dashboard') ?>" class="brand-link">
      <img src="<?php echo base_url('assets/adminlte/dist/img/AdminLTELogo.png')?>"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><small>Admin </small><strong>Control Panel</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('uploads/account/'.$session['image'])?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $session["name"] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="<?php echo site_url('admin/dashboard') ?>" class="nav-link <?php if($sidebar=='dashboard') { echo 'active'; } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <?php if($session["level"]=="root"){ ?>
          <li class="nav-item has-treeview <?php if($sidebar=='account-table' || $sidebar=='account-add') { echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($sidebar=='account-table' || $sidebar=='account-add') { echo 'active'; } ?>">
              <i class="nav-icon fa fa-user-circle"></i>
              <p>
                Account
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('admin/account/table') ?>" class="nav-link <?php if($sidebar=='account-table') { echo 'active'; } ?>">
                  <i class="fa fa-caret-right nav-icon" style="margin-left: 25px;"></i>
                  <p>Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/account/add') ?>" class="nav-link <?php if($sidebar=='account-add') { echo 'active'; } ?>">
                  <i class="fa fa-caret-right nav-icon" style="margin-left: 25px;"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

          <!-- layanan -->
          <li class="nav-item has-treeview <?php if($sidebar=='Tabel Layanan' || $sidebar=='Tambah Layanan') { echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($sidebar=='Tabel Layanan' || $sidebar=='Tambah Layanan') { echo 'active'; } ?>">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Layanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('admin/layanan/table') ?>" class="nav-link <?php if($sidebar=='Tabel Layanan') { echo 'active'; } ?>">
                  <i class="fa fa-caret-right nav-icon" style="margin-left: 25px;"></i>
                  <p>Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/layanan/add') ?>" class="nav-link <?php if($sidebar=='Tambah Layanan') { echo 'active'; } ?>">
                  <i class="fa fa-caret-right nav-icon" style="margin-left: 25px;"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
          </li>
          
          <!-- tentang kami -->
          <li class="nav-item has-treeview <?php if($sidebar=='Tabel Tentang Kami' || $sidebar=='Tambah Tentang Kami') { echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($sidebar=='Tabel Tentang Kami' || $sidebar=='Tambah Tentang Kami') { echo 'active'; } ?>">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Tentang Kami
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('admin/tentangkami/table') ?>" class="nav-link <?php if($sidebar=='Tabel Tentang Kami') { echo 'active'; } ?>">
                  <i class="fa fa-caret-right nav-icon" style="margin-left: 25px;"></i>
                  <p>Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/tentangkami/add') ?>" class="nav-link <?php if($sidebar=='Tambah Tentang Kami') { echo 'active'; } ?>">
                  <i class="fa fa-caret-right nav-icon" style="margin-left: 25px;"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
          </li>
          
          <!-- Anggota -->
          <li class="nav-item has-treeview <?php if($sidebar=='Tabel Anggota' || $sidebar=='Tambah Anggota') { echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($sidebar=='Tabel Anggota' || $sidebar=='Tambah Anggota') { echo 'active'; } ?>">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Anggota
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('admin/anggota/table') ?>" class="nav-link <?php if($sidebar=='Tabel Anggota') { echo 'active'; } ?>">
                  <i class="fa fa-caret-right nav-icon" style="margin-left: 25px;"></i>
                  <p>Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/anggota/add') ?>" class="nav-link <?php if($sidebar=='Tambah Anggota') { echo 'active'; } ?>">
                  <i class="fa fa-caret-right nav-icon" style="margin-left: 25px;"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Link Dinas Terkait -->
          <li class="nav-item has-treeview <?php if($sidebar=='Tabel Link Dinas Terkait' || $sidebar=='Tambah Link Dinas Terkait') { echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($sidebar=='Tabel Link Dinas Terkait' || $sidebar=='Tambah Link Dinas Terkait') { echo 'active'; } ?>">
              <i class="nav-icon fa fa-link"></i>
              <p>
                Link Dinas Terkait
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('admin/linkDinasTerkait/table') ?>" class="nav-link <?php if($sidebar=='Tabel Link Dinas Terkait') { echo 'active'; } ?>">
                  <i class="fa fa-caret-right nav-icon" style="margin-left: 25px;"></i>
                  <p>Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/linkDinasTerkait/add') ?>" class="nav-link <?php if($sidebar=='Tambah Link Dinas Terkait') { echo 'active'; } ?>">
                  <i class="fa fa-caret-right nav-icon" style="margin-left: 25px;"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>