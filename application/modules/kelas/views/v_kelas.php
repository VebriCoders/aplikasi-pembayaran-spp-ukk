<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Data Kelas</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
					<li class="breadcrumb-item active">Data Kelas</li>
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
						<h3 class="card-title">Tabel Data Kelas</h3>
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
									<th width="1">No.</th>
									<th>Nama Kelas</th>
									<th>Wali Kelas</th>
									<th>Telpone Wali Kelas</th>
									<th>Kompetensi Keahlian</th>
									<th width="10">Action</th>
								</tr>
							</thead>
							<tbody>

								<?php
								$i = 1;
								foreach ($tampilDataKelas->result() as $data) { ?>
									<tr>
										<td width="1"><?php echo $i ?></td>
										<td><?php echo $data->nama_kelas ?></td>
										<td><?php echo $data->wali_kelas ?></td>
										<td><?php echo $data->telp_walikelas ?></td>
										<td><?php echo $data->kompetensi_keahlian ?></td>
										<td width="10">
											<div class="d-flex align-items-center list-action">
												<button type="button" class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#modal-edit<?php echo $data->id_kelas ?>"><i class="fa fa-edit"></i></button>
												<button type="button" class="btn btn-danger btn-sm mr-2" data-toggle="modal" data-target="#modal-hapus<?php echo $data->id_kelas ?>"><i class="fa fa-trash"></i></button>
											</div>
										</td>
									</tr>
								<?php $i++;
								} ?>

							</tbody>
							<tfoot>
								<tr>
									<th>No.</th>
									<th>Nama Kelas</th>
									<th>Wali Kelas</th>
									<th>Telpone Wali Kelas</th>
									<th>Kompetensi Keahlian</th>
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

<?php foreach ($tampilDataKelas->result() as $data) { ?>
	<!-- Modal Edit -->
	<?php echo form_open_multipart('kelas/Edit'); ?>
	<div class="modal fade" id="modal-edit<?php echo $data->id_kelas ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Data Kelas (<?php echo $data->nama_kelas ?>)</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<input type="hidden" name="query_id" value="<?php echo $data->id_kelas ?>">
				<div class="modal-body">

					<label>Nama Kelas</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-school"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Masukkan Nama Kelas" name="nama_kelas" value="<?php echo $data->nama_kelas ?>" required oninvalid="this.setCustomValidity('Nama Kelas Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>

					<label>Nama Wali Kelas</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-chalkboard-teacher"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Masukkan Nama Wali Kelas" name="wali_kelas" value="<?php echo $data->wali_kelas ?>" required oninvalid="this.setCustomValidity('Nama Wali Kelas Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>

					<label>Telpon Wali Kelas</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
						</div>
						<input type="number" class="form-control" placeholder="Masukkan Telpon Wali Kelas" name="telp_walikelas" value="<?php echo $data->telp_walikelas ?>" required oninvalid="this.setCustomValidity('Telpon Wali Kelas Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>

					<label>Kompetensi Keahlian</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-chalkboard"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Masukkan Kompetensi Keahlian" name="kompetensi_keahlian" value="<?php echo $data->kompetensi_keahlian ?>" required oninvalid="this.setCustomValidity('Kompetensi Keahlian Tidak Boleh Kosong')" oninput="setCustomValidity('')">
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
	<?php echo form_open_multipart('kelas/Hapus'); ?>
	<div class="modal fade" id="modal-hapus<?php echo $data->id_kelas ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Hapus Data (<?php echo $data->nama_kelas ?>)</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Apakah Anya Yakin Ingin Menghapus Data Kelas Berikut ?</p>
					<p>
						Nama Kelas : <?php echo $data->nama_kelas ?> <br>
						Wali Kelas : <?php echo $data->wali_kelas ?> <br>
						Telpon Wakel : <?php echo $data->telp_walikelas ?> <br>
						Kompetensi Keahlian : <?php echo $data->kompetensi_keahlian ?> <br>
					</p>
					<h3 style="color: red;">Menghapus Kelas Akan Menghapus Data Siswa Pada Kelas!</h3>
					<input type="hidden" name="query_id" value="<?php echo $data->id_kelas ?>">
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
<?php echo form_open_multipart('kelas/Tambah'); ?>
<div class="modal fade" id="modal-tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data Kelas</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<label>Nama Kelas</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-school"></i></span>
					</div>
					<input type="text" class="form-control" placeholder="Masukkan Nama Kelas" name="nama_kelas" required oninvalid="this.setCustomValidity('Nama Kelas Tidak Boleh Kosong')" oninput="setCustomValidity('')">
				</div>

				<label>Nama Wali Kelas</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-chalkboard-teacher"></i></span>
					</div>
					<input type="text" class="form-control" placeholder="Masukkan Nama Wali Kelas" name="wali_kelas" required oninvalid="this.setCustomValidity('Nama Wali Kelas Tidak Boleh Kosong')" oninput="setCustomValidity('')">
				</div>

				<label>Telpon Wali Kelas</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
					</div>
					<input type="number" class="form-control" placeholder="Masukkan Telpon Wali Kelas" name="telp_walikelas" required oninvalid="this.setCustomValidity('Telpon Wali Kelas Tidak Boleh Kosong')" oninput="setCustomValidity('')">
				</div>

				<label>Kompetensi Keahlian</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-chalkboard"></i></span>
					</div>
					<input type="text" class="form-control" placeholder="Masukkan Kompetensi Keahlian" name="kompetensi_keahlian" required oninvalid="this.setCustomValidity('Kompetensi Keahlian Tidak Boleh Kosong')" oninput="setCustomValidity('')">
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