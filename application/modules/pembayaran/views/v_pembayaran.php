<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Pembayaran SPP</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
					<li class="breadcrumb-item active">Pembayaran SPP</li>
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

			<div class="col-md-4">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Pembayaran SPP Siswa</h3>
					</div>
					<?php echo form_open_multipart('pembayaran/cari'); ?>
					<?php $nisn_siswa = $this->input->post('nisn_siswa'); ?>
					<div class="card-body">
						<div class="form-group">
							<label>NISN SISWA TERDAFTAR</label>
							<input type="number" class="form-control" value="<?= $nisn_siswa ?>" name="nisn_siswa" placeholder="Masukkan NISN SISWA" required oninvalid="this.setCustomValidity('NISN Siswa Tidak Boleh Kosong')" oninput="setCustomValidity('')">
						</div>
					</div>
					<div class="card-footer">
						<a href="<?php echo base_url('pembayaran') ?>" class="btn btn-info"><i class="fa fa-sync"></i></a>
						<button class="btn btn-success" style="width: 100px;float: right;"><i class="fa fa-book-open"></i> Submit</button>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>

			<?php if ($this->input->post('nisn_siswa')) : ?>
				<div class="col-md-8">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Cari Siswa Berdasarkan NISN</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body p-0">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>NISN SISWA</th>
										<th>NAMA SISWA</th>
										<th style="width: 250px">Kelas (Jurusan)</th>
										<th style="width: 10px">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($tampilDataSiswa->result() as $data) { ?>
										<tr>
											<td><?php echo $data->nisn_siswa ?></td>
											<td><?php echo $data->nama_siswa ?></td>
											<td style="width: 250px"><?php echo $data->nmkelas ?> (<?php echo $data->nmjurusan ?>)</td>
											<td style="width: 10px">
												<a href="<?php echo base_url('pembayaran/siswa/' . $data->nisn_siswa) ?>" class="btn btn-info"><i class="fa fa-folder-open"></i> Buka Pembayaran</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
				</div>
			<?php endif; ?>

		</div>

	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->