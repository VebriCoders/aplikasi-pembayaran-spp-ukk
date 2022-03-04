<!DOCTYPE html>
<html lang="en">

<!-- Header -->
<?php $this->load->view('_dist/head'); ?>
<!-- End Header -->

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__shake" src="<?php echo base_url() ?>assets/iconlong.png" alt="AdminLTELogo" height="70" width="500">
		</div>

		<!-- Navbar -->
		<?php $this->load->view('_dist/navbar'); ?>
		<!-- End Navbar -->

		<!-- Sidebar -->

		<!-- Admin Utama -->
		<?php if ($this->session->userdata('id_level') == "1") { ?>
			<?php $this->load->view('_dist/sidebar'); ?>
		<?php } ?>

		<!-- Admin Petugas -->
		<?php if ($this->session->userdata('id_level') == "2") { ?>
			<?php $this->load->view('_dist/sidebar_petugas'); ?>
		<?php } ?>

		<!-- SISWA -->
		<?php if ($this->session->userdata('siswa_login') == "1") { ?>
			<?php $this->load->view('_dist/sidebar_siswa'); ?>
		<?php } ?>

		<!-- End Sidebar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">

			<!-- Main Content -->
			<?php $this->load->view($namamodule . '/' . $namafileview); ?>
			<!-- End Main Content -->

		</div>
		<!-- /.content-wrapper -->

		<!-- Footer -->
		<?php $this->load->view('_dist/footer'); ?>
		<!-- End Footer -->

	</div>
	<!-- ./wrapper -->

	<!-- Js -->
	<?php $this->load->view('_dist/js'); ?>
	<!-- End Js -->

</body>

</html>