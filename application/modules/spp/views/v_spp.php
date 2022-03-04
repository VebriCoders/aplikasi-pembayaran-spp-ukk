<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Data SPP</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
					<li class="breadcrumb-item active">Data SPP</li>
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
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Tabel Data SPP</h3>
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah" style="float: right;">
							<i class="fa fa-plus-square"></i>
							Tambah
						</button>
					</div>

					<!-- /.card-header -->
					<div class="card-body">
						<table id="tabelutama" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama SPP</th>
									<th>Tahun</th>
									<th>Nominal</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php
								$i = 1;
								foreach ($tampilDataSpp->result() as $data) { ?>
									<tr>
										<td width="1"><?php echo $i ?></td>
										<td><?php echo $data->nama_spp ?></td>
										<td><?php echo $data->tahun ?></td>
										<td>Rp.<?php echo number_format($data->nominal, 0, ',', '.') ?></td>
										<td width="10">
											<div class="d-flex align-items-center list-action">
												<button type="button" class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#modal-edit<?php echo $data->id_spp ?>"><i class="fa fa-edit"></i></button>
												<button type="button" class="btn btn-danger btn-sm mr-2" data-toggle="modal" data-target="#modal-hapus<?php echo $data->id_spp ?>"><i class="fa fa-trash"></i></button>
											</div>
										</td>
									</tr>
								<?php $i++;
								} ?>

							</tbody>
							<tfoot>
								<tr>
									<th>No.</th>
									<th>Nama SPP</th>
									<th>Tahun</th>
									<th>Nominal</th>
									<th>Action</th>
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

<?php foreach ($tampilDataSpp->result() as $data) { ?>
	<!-- Modal Edit -->
	<?php echo form_open_multipart('spp/Edit'); ?>
	<div class="modal fade" id="modal-edit<?php echo $data->id_spp ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Data SPP (<?php echo $data->nama_spp ?>)</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<input type="hidden" name="query_id" value="<?php echo $data->id_spp ?>">
				<div class="modal-body">

					<label>Nama SPP</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-receipt"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Masukkan Nama SPP" name="nama_spp" value="<?php echo $data->nama_spp ?>" required oninvalid="this.setCustomValidity('Nama SPP Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>

					<label>Tahun SPP</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-calendar-minus"></i></span>
						</div>
						<input type="number" class="form-control" placeholder="Masukkan Tahun SPP" name="tahun" value="<?php echo $data->tahun ?>" required oninvalid="this.setCustomValidity('Tahun SPP Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>

					<label>Nominal SPP</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Rp.</span>
						</div>
						<input type="text" class="form-control uangspp" placeholder="Masukkan Nominal SPP" name="nominal" value="<?php echo $data->nominal ?>" required oninvalid="this.setCustomValidity('Nominal SPP Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>

				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button class="btn btn-warning">Simpan Perubahan</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<?php echo form_close(); ?>
	<!-- End Modal Edit -->

	<!-- Modal Hapus -->
	<?php echo form_open_multipart('spp/Hapus'); ?>
	<div class="modal fade" id="modal-hapus<?php echo $data->id_spp ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Hapus Data (<?php echo $data->nama_spp ?>)</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Apakah Anya Yakin Ingin Menghapus Data SPP Berikut ?</p>
					<p>
						Nama SPP : <?php echo $data->nama_spp ?> <br>
						Tahun SPP : <?php echo $data->tahun ?> <br>
						Nominal SPP : <?php echo $data->nominal ?> <br>
					</p>
					<h3 style="color: red;">Menghapus Data SPP Akan Menghapus Data Siswa Pada SPP Yang Di Hapus!</h3>
					<input type="hidden" name="query_id" value="<?php echo $data->id_spp ?>">
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button class="btn btn-danger">Hapus</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<?php echo form_close(); ?>
	<!-- End Modal Hapus -->

<?php } ?>

<!-- Modal Tambah -->
<?php echo form_open_multipart('spp/Tambah'); ?>
<div class="modal fade" id="modal-tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data SPP</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<label>Nama SPP</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-receipt"></i></span>
					</div>
					<input type="text" class="form-control" placeholder="Masukkan Nama SPP" name="nama_spp" required oninvalid="this.setCustomValidity('Nama SPP Tidak Boleh Kosong')" oninput="setCustomValidity('')">
				</div>

				<label>Tahun SPP</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-calendar-minus"></i></span>
					</div>
					<input type="number" class="form-control" placeholder="Masukkan Tahun SPP" name="tahun" required oninvalid="this.setCustomValidity('Tahun SPP Tidak Boleh Kosong')" oninput="setCustomValidity('')">
				</div>

				<label>Nominal SPP</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Rp.</span>
					</div>
					<input type="text" class="form-control uangspp" placeholder="Masukkan Nominal SPP" name="nominal" required oninvalid="this.setCustomValidity('Nominal SPP Tidak Boleh Kosong')" oninput="setCustomValidity('')">
				</div>

			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<button class="btn btn-success">Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php echo form_close(); ?>
<!-- End Modal Tambah -->