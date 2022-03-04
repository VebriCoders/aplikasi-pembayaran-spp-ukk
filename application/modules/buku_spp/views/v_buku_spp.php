<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Buku SPP
					<h5><?php echo $this->session->userdata('nama_siswa') ?> (<?php echo $this->session->userdata('nisn_siswa') ?>)</h5>
				</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
					<li class="breadcrumb-item active">Buku SPP</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">

		<div class="row">
			<?php foreach ($tampilDataSiswa->result() as $data) { ?>
				<div class="col-md-4">
					<div class="card card-primary card-outline">
						<h3 class="text-center">SISWA</h3>
						<div class="card-body box-profile">
							<div class="text-center">
								<img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('') ?>assets/upload/foto_siswa/<?php echo $data->foto_siswa  ?>" alt="User profile picture">
							</div>

							<h3 class="profile-username text-center"><?php echo $data->nama_siswa ?></h3>

							<p class="text-muted text-center"><b><?php echo $data->nisn_siswa ?></b></p>

							<ul class="list-group list-group-unbordered mb-3">
								<li class="list-group-item">
									<b>NISN SISWA</b> <a class="float-right"><?php echo $data->nisn_siswa ?></a>
								</li>
								<li class="list-group-item">
									<b>NIS SISWA</b> <a class="float-right"><?php echo $data->nis_siswa ?></a>
								</li>
							</ul>
						</div>
						<!-- /.card-body -->
					</div>
				</div>
				<div class="col-md-4">
					<div class="card card-success card-outline">
						<h3 class="text-center">DATA POKOK SISWA</h3>
						<div class="card-body box-profile">
							<div class="col-sm-12">
								<ul class="list-group list-group-unbordered mb-3">
									<li class="list-group-item">
										<b>NAMA SISWA</b> <a class="float-right"><?php echo $data->nama_siswa ?></a>
									</li>
									<li class="list-group-item">
										<b>KELAS SISWA</b> <a class="float-right"><?php echo $data->nmkelas ?></a>
									</li>
									<li class="list-group-item">
										<b>JURUSAN SISWA</b> <a class="float-right"><?php echo $data->nmjurusan ?></a>
									</li>
									<li class="list-group-item">
										<b>WALI KELAS KELAS</b> <a class="float-right"><?php echo $data->nmwakel ?></a>
									</li>
									<li class="list-group-item">
										<b>TELEPON WALI KELAS</b> <a class="float-right"><?php echo $data->nmtelpwakel ?></a>
									</li>
									<li class="list-group-item">
										<b>LOGIN STATUS</b> <a class="float-right"><?php if ($data->active == 1) {
																						echo "Login Aktif";
																					} else {
																						echo "Login Non-Aktif";
																					} ?></a>
									</li>
								</ul>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
				</div>
				<div class="col-md-4">
					<div class="card card-success card-outline">
						<h3 class="text-center">DATA POKOK SISWA</h3>
						<div class="card-body box-profile">
							<div class="col-sm-12">
								<ul class="list-group list-group-unbordered mb-3">
									<li class="list-group-item">
										<b>SPP PEMBAYARAN SISWA</b> <a class="float-right"><?php echo $data->nmspp ?></a>
									</li>
									<li class="list-group-item">
										<b>NOMINAL PEMBAYARAN SPP</b> <a class="float-right">Rp.<?php echo number_format($data->nmnominal, 0, ',', '.') ?></a>
									</li>
									<li class="list-group-item">
										<b>TELEPON SISWA</b> <a class="float-right"><?php echo $data->telp_siswa ?></a>
									</li>
									<li class="list-group-item">
										<b>ALAMAT SISWA</b> <a class="float-right"><?php echo $data->alamat_siswa ?></a>
									</li>
									<li class="list-group-item">
										<b>DATA DI INPUT</b> <a class="float-right"><?php echo $data->created_on ?></a>
									</li>
								</ul>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
				</div>
			<?php }; ?>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Buku SPP (NISN : <?php echo $this->session->userdata('nisn_siswa') ?>)</h3>
					</div>

					<!-- /.card-header -->
					<div class="card-body">
						<table id="tabelutama" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>KODE PEMBAYARAN</th>
									<th>SPP</th>
									<th>JUMLAH BAYAR</th>
									<th>BULAN</th>
									<th>STATUS</th>
								</tr>
							</thead>
							<tbody>

								<?php
								$i = 1;
								foreach ($TampilSPP->result() as $data) { ?>
									<tr>
										<td width="1"><?php echo $i ?></td>
										<td>
											<?php if (!empty($data->kode_pembayaran)) { ?>
												<?php echo $data->kode_pembayaran ?>
											<?php } else { ?>
												<button type="button" class="btn btn-danger btn-sm mr-2">Belum Bayar</button>
											<?php } ?>
										</td>
										<td><?php echo $data->nmspp ?></td>
										<td>Rp.<?php echo number_format($data->jumlah_bayar, 0, ',', '.') ?></td>
										<td><?php echo $data->bulan_dibayar ?> </td>
										<td>
											<?php if ($data->status_bayar == 1) { ?>
												<button type="button" class="btn btn-success btn-sm mr-2">Lunas</button>
											<?php } else { ?>
												<button type="button" class="btn btn-danger btn-sm mr-2">Belum Bayar</button>
											<?php } ?>
										</td>
									</tr>
								<?php $i++;
								} ?>

							</tbody>
							<tfoot>
								<tr>
									<th>No.</th>
									<th>KODE PEMBAYARAN</th>
									<th>SPP</th>
									<th>JUMLAH BAYAR</th>
									<th>BULAN</th>
									<th>STATUS</th>
								</tr>
							</tfoot>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
			</div>
		</div>

	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->