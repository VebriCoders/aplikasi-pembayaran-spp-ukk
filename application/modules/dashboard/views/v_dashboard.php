<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Selamat Datang Di MySPP
					<h5><?php echo $this->session->userdata('nama_admin') ?> (<?php if ($this->session->userdata('id_level') == 1) {
																					echo "Administrator";
																				} else {
																					echo "Petugas";
																				} ?>)</h5>
				</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">

		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3><?php echo $jmlSpp ?></h3>

						<p>Data SPP</p>
					</div>
					<div class="icon">
						<i class="fas fa-receipt"></i>
					</div>
					<a href="<?php echo base_url('spp') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-success">
					<div class="inner">
						<h3><?php echo $jmlKelas ?><sup style="font-size: 20px"></sup></h3>

						<p>Data Kelas</p>
					</div>
					<div class="icon">
						<i class="fas fa-school"></i>
					</div>
					<a href="<?php echo base_url('kelas') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-warning">
					<div class="inner">
						<h3><?php echo $jmlSiswa ?></h3>

						<p>Data Siswa</p>
					</div>
					<div class="icon">
						<i class="fa fa-users"></i>
					</div>
					<a href="<?php echo base_url('siswa') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-danger">
					<div class="inner">
						<h3><?php echo $jmlPembayaran; ?></h3>

						<p>Jumlah Pembayaran Berhasil</p>
					</div>
					<div class="icon">
						<i class="fas fa-file-invoice-dollar"></i>
					</div>
					<a href="<?php echo base_url('history_pembayaran') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->