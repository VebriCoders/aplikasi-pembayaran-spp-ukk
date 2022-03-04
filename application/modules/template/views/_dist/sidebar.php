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
                <img src="<?php echo base_url() ?>assets/upload/foto_admin/<?php echo $this->session->userdata('foto_admin') ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $this->session->userdata('nama_admin') ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Menu Dashboard -->
                <?php if ($this->uri->segment('1') == 'dashboard') { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('dashboard') ?>" class="nav-link active">
                            <i class="nav-icon fa fa-tachometer-alt"></i>
                            <p> Dashboard</p>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('dashboard') ?>" class="nav-link">
                            <i class="nav-icon fa fa-tachometer-alt"></i>
                            <p> Dashboard</p>
                        </a>
                    </li>
                <?php } ?>

                <li class="nav-header">MASTER DATA</li>

                <!-- Menu SPP -->
                <?php if ($this->uri->segment('1') == 'spp') { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('spp') ?>" class="nav-link active">
                            <i class="nav-icon fa fa-receipt"></i>
                            <p> Data SPP</p>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('spp') ?>" class="nav-link">
                            <i class="nav-icon fa fa-receipt"></i>
                            <p> Data SPP</p>
                        </a>
                    </li>
                <?php } ?>

                <!-- Menu Kelas -->
                <?php if ($this->uri->segment('1') == 'kelas') { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('kelas') ?>" class="nav-link active">
                            <i class="nav-icon fa fa-school"></i>
                            <p> Data Kelas</p>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('kelas') ?>" class="nav-link">
                            <i class="nav-icon fa fa-school"></i>
                            <p> Data Kelas</p>
                        </a>
                    </li>
                <?php } ?>

                <!-- Menu SIswa -->
                <?php if ($this->uri->segment('1') == 'siswa') { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('siswa') ?>" class="nav-link active">
                            <i class="nav-icon fa fa-users"></i>
                            <p> Data Siswa</p>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('siswa') ?>" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p> Data Siswa</p>
                        </a>
                    </li>
                <?php } ?>

                <li class="nav-header">PEMBAYARAN</li>

                <!-- Menu Pembayaran -->
                <?php if ($this->uri->segment('1') == 'pembayaran') { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('pembayaran') ?>" class="nav-link active">
                            <i class="nav-icon fa fa-file-invoice-dollar"></i>
                            <p> Pembayaran SPP</p>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('pembayaran') ?>" class="nav-link">
                            <i class="nav-icon fa fa-file-invoice-dollar"></i>
                            <p> Pembayaran SPP</p>
                        </a>
                    </li>
                <?php } ?>

                <!-- Menu Laporan Pembayaran -->
                <?php if ($this->uri->segment('1') == 'laporan_pembayaran') { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('laporan_pembayaran') ?>" class="nav-link active">
                            <i class="nav-icon fa fa-file-alt"></i>
                            <p> Laporan Pembayaran</p>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('laporan_pembayaran') ?>" class="nav-link">
                            <i class="nav-icon fa fa-file-alt"></i>
                            <p> Laporan Pembayaran</p>
                        </a>
                    </li>
                <?php } ?>

                <!-- Menu History Pembayaran -->
                <?php if ($this->uri->segment('1') == 'history_pembayaran') { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('history_pembayaran') ?>" class="nav-link active">
                            <i class="nav-icon fa fa-history"></i>
                            <p> History Pembayaran</p>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('history_pembayaran') ?>" class="nav-link">
                            <i class="nav-icon fa fa-history"></i>
                            <p> History Pembayaran</p>
                        </a>
                    </li>
                <?php } ?>

                <li class="nav-header">SETTING</li>
                <!-- Menu Setting -->
                <?php if ($this->uri->segment('1') == 'user_management') { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('user_management') ?>" class="nav-link active">
                            <i class="nav-icon fa fa-users-cog"></i>
                            <p> User Management</p>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('user_management') ?>" class="nav-link">
                            <i class="nav-icon fa fa-users-cog"></i>
                            <p> User Management</p>
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