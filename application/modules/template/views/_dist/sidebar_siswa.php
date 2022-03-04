<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url() ?>assets/iconmini.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">MySpp</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url() ?>assets/upload/foto_siswa/<?php echo $this->session->userdata('foto_siswa') ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $this->session->userdata('nama_siswa') ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Menu dashboard_siswa -->
                <?php if ($this->uri->segment('1') == 'dashboard_siswa') { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('dashboard_siswa') ?>" class="nav-link active">
                            <i class="nav-icon fa fa-tachometer-alt"></i>
                            <p> Dashboard Siswa</p>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('dashboard_siswa') ?>" class="nav-link">
                            <i class="nav-icon fa fa-tachometer-alt"></i>
                            <p> Dashboard Siswa</p>
                        </a>
                    </li>
                <?php } ?>

                <!-- Menu buku_spp -->
                <?php if ($this->uri->segment('1') == 'buku_spp') { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('buku_spp') ?>" class="nav-link active">
                            <i class="nav-icon fa fa-book"></i>
                            <p> Buku SPP & Data Siswa</p>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('buku_spp') ?>" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p> Buku SPP & Data Siswa</p>
                        </a>
                    </li>
                <?php } ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
<!-- End Main Sidebar Container -->