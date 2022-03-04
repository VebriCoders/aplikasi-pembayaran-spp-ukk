<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">

            <?php if ($this->session->userdata('siswa_login') != "1") { ?>
                <a href="#" class="nav-link"><?php if ($this->session->userdata('id_level') == 1) {
                                                    echo "Halaman Administrator";
                                                } else {
                                                    echo "Halaman Petugas";
                                                } ?></a>
            <?php } else { ?>
                <a href="#" class="nav-link">Halaman Siswa</a>
            <?php } ?>

        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <?php if ($this->session->userdata('siswa_login') != "1") { ?>
                <a class="nav-link" href="<?php echo base_url('login/logout') ?>" role="button" title="Logout">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            <?php } else { ?>
                <a class="nav-link" href="<?php echo base_url('login_siswa/logout') ?>" role="button" title="Logout">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            <?php } ?>
        </li>
    </ul>
</nav>
<!-- /.navbar -->