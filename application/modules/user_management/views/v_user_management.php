<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">User Management</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
					<li class="breadcrumb-item active">User Management</li>
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
						<h3 class="card-title">Tabel Data Admin</h3>
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
									<th>Foto</th>
									<th>Email (Status)</th>
									<th>Nama</th>
									<th>Telepohe</th>
									<th>Level</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php
								$i = 1;
								foreach ($tampilDataAdmin->result() as $data) { ?>
									<tr>
										<td width="1"><?php echo $i ?></td>
										<td>
											<img class="img-circle img-bordered-sm" src="<?php echo base_url('') ?>assets/upload/foto_admin/<?php echo $data->foto_admin  ?>" alt="user image" width="75" height="75">
										</td>
										<td><?php echo $data->email_username ?></td>
										<td><?php echo $data->nama_admin ?></td>
										<td><?php echo $data->telp_admin ?></td>
										<td>
											<?php if ($data->id_level == 1) { ?>
												Adminisrator
											<?php } else { ?>
												Petugas
											<?php } ?>
										</td>
										<td width="220">
											<div class="d-flex align-items-center list-action">
												<?php if ($data->admin_online == 1) { ?>
													<button type="button" class="btn btn-success btn-sm mr-2"><i class="fa fa-signal"></i> ONLINE</button>
												<?php } else { ?>
													<button type="button" class="btn btn-info btn-sm mr-2"><i class="fa fa-user-slash"></i> OFFLINE</button>
												<?php } ?>
												<?php if ($data->active == 1) { ?>
													<button type="button" class="btn btn-success btn-sm mr-2"><i class="fa fa-check"></i> AKTIF</button>
												<?php } else { ?>
													<button type="button" class="btn btn-danger btn-sm mr-2"><i class="fa fa-times-circle"></i> TIDAK AKTIF</button>
												<?php } ?>
											</div>
										</td>
										<td width="10">
											<?php if ($data->id_admin == 1) { ?>
												<div class="d-flex align-items-center list-action">
													<button type="button" disabled class="btn btn-info btn-sm mr-2" data-toggle="modal" data-target="#modal-password<?php echo $data->id_admin ?>"><i class="fa fa-key"></i></button>
													<button type="button" disabled class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#modal-edit<?php echo $data->id_admin ?>"><i class="fa fa-edit"></i></button>
													<button type="button" disabled class="btn btn-danger btn-sm mr-2" data-toggle="modal" data-target="#modal-hapus<?php echo $data->id_admin ?>"><i class="fa fa-trash"></i></button>
												</div>
											<?php } else { ?>
												<div class="d-flex align-items-center list-action">
													<button type="button" class="btn btn-info btn-sm mr-2" data-toggle="modal" data-target="#modal-password<?php echo $data->id_admin ?>"><i class="fa fa-key"></i></button>
													<button type="button" class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#modal-edit<?php echo $data->id_admin ?>"><i class="fa fa-edit"></i></button>
													<button type="button" class="btn btn-danger btn-sm mr-2" data-toggle="modal" data-target="#modal-hapus<?php echo $data->id_admin ?>"><i class="fa fa-trash"></i></button>
												</div>
											<?php } ?>
										</td>
									</tr>
								<?php $i++;
								} ?>

							</tbody>
							<tfoot>
								<tr>
									<th>No.</th>
									<th>Foto</th>
									<th>Email (Status)</th>
									<th>Nama</th>
									<th>Telepohe</th>
									<th>Level</th>
									<th>Status</th>
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

<?php
$i = 1;
foreach ($tampilDataAdmin->result() as $data) { ?>

	<!-- Modal Edit -->
	<?php echo form_open_multipart('user_management/Edit'); ?>
	<div class="modal fade" id="modal-edit<?php echo $data->id_admin ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Data Admin (<?php echo $data->nama_admin ?>)</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<input type="text" name="query_id" value="<?php echo $data->id_admin ?>">
				<div class="modal-body">

					<label>Nama Admin</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Masukkan Nama Admin" value="<?php echo $data->nama_admin ?>" name="nama_admin" required oninvalid="this.setCustomValidity('Nama Admin Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>

					<label>Email Admin</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-envelope"></i></span>
						</div>
						<input type="email" class="form-control" placeholder="Masukkan Email Admin" value="<?php echo $data->email_username ?>" name="email_username" required oninvalid="this.setCustomValidity('Email Admin Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>

					<label>Telepohe Admin</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
						</div>
						<input type="number" class="form-control" placeholder="Masukkan Telepohe Admin" value="<?php echo $data->telp_admin ?>" name="telp_admin" required oninvalid="this.setCustomValidity('Telepohe Admin Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>

					<label>Level Admin</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-sign-in-alt"></i></span>
						</div>
						<select class="form-control select2" name="id_level" required style="width: 91%;">
							<option value="">Pilih Status Admin</option>
							<?php if ($data->id_level == '1') { ?>
								<option selected="selected" value="1">Adminisrator</option>
								<option value="2">Petugas</option>
							<?php } else { ?>
								<option selected="selected" value="2">Petugas</option>
								<option value="1">Adminisrator</option>
							<?php } ?>
						</select>
					</div>

					<label>Status Admin</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-sign-in-alt"></i></span>
						</div>
						<select class="form-control select2" name="active" required style="width: 91%;">
							<option value="">Pilih Level Admin</option>
							<?php if ($data->active == '1') { ?>
								<option selected="selected" value="1">Aktif</option>
								<option value="0">Tidak Aktif</option>
							<?php } else { ?>
								<option selected="selected" value="0">Tidak Aktif</option>
								<option value="1">Aktif</option>
							<?php } ?>
						</select>
					</div>

					<label>Foto Siswa</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="far fa-image"></i></span>
						</div>
						<div id="image-preview<?php echo $i ?>" class="image-preview">
							<label for="image-upload" id="image-label<?php echo $i ?>">Pilih Foto</label>
							<input type="file" name="foto_admin" id="image-upload<?php echo $i ?>" <?php echo $data->foto_admin ?> />
						</div>
						<br>
						<p>Foto Tersimpan Saat Ini : <?php echo $data->foto_admin ?></p>
					</div>

				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button class="btn btn-success">Simpan Perubahan</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<?php echo form_close(); ?>
	<!-- End Modal Tambah -->


	<!-- jQuery -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- jQuery Foto Preview -->
	<script src="<?php echo base_url() ?>assets/jquery.uploadPreview.min.js"></script>
	<script type="text/javascript">
		$.uploadPreview({
			input_field: "#image-upload<?php echo $i ?>", // Default: .image-upload
			preview_box: "#image-preview<?php echo $i ?>", // Default: .image-preview
			label_field: "#image-label<?php echo $i ?>", // Default: .image-label
			label_default: "Choose File", // Default: Choose File
			label_selected: "Change File", // Default: Change File
			no_label: false, // Default: false
			success_callback: null // Default: null
		});
	</script>


	<!-- Modal Hapus -->
	<?php echo form_open_multipart('user_management/Hapus'); ?>
	<div class="modal fade" id="modal-hapus<?php echo $data->id_admin ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Hapus Data Admin (<?php echo $data->nama_admin ?>)</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Apakah Anya Yakin Ingin Menghapus Data Admin Berikut ?</p>
					<p>
						Nama Admin : <?php echo $data->nama_admin  ?> <br>
						Email Admin : <?php echo $data->email_username ?> <br>
						Level Admin : <?php if ($data->id_level == 1) {
											echo "Administrator";
										} else {
											echo "Petugas";
										} ?><br>
						Status Admin : <?php if ($data->active == 1) {
											echo "Aktif";
										} else {
											echo "Tidak Aktif";
										} ?><br>
						Online Admin : <?php if ($data->admin_online == 1) {
											echo "Online";
										} else {
											echo "Offline";
										} ?><br>
					</p>
					<input type="hidden" name="query_id" value="<?php echo $data->id_admin ?>">
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


	<!-- Modal Passwordd -->
	<?php echo form_open_multipart('user_management/Password'); ?>
	<div class="modal fade" id="modal-password<?php echo $data->id_admin ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Ubah Password Admin (<?php echo $data->nama_admin ?>)</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<input type="text" name="query_id" value="<?php echo $data->id_admin ?>">
				<div class="modal-body">

					<label>Password Baru</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-key"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Masukkan Password Baru Admin" name="password" required oninvalid="this.setCustomValidity('Password Baru Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>

				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button class="btn btn-success">Simpan Password</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<?php echo form_close(); ?>
	<!-- End Modal Passwordd -->

<?php $i++;
} ?>

<!-- Modal Tambah -->
<?php echo form_open_multipart('user_management/Tambah'); ?>
<div class="modal fade" id="modal-tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data Admin</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<label>Nama Admin</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-user"></i></span>
					</div>
					<input type="text" class="form-control" placeholder="Masukkan Nama Admin" name="nama_admin" required oninvalid="this.setCustomValidity('Nama Admin Tidak Boleh Kosong')" oninput="setCustomValidity('')">
				</div>

				<label>Email Admin</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-envelope"></i></span>
					</div>
					<input type="email" class="form-control" placeholder="Masukkan Email Admin" name="email_username" required oninvalid="this.setCustomValidity('Email Admin Tidak Boleh Kosong')" oninput="setCustomValidity('')">
				</div>

				<label>Password Admin</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-key"></i></span>
					</div>
					<input type="password" class="form-control" placeholder="Masukkan Password Admin" name="password" required oninvalid="this.setCustomValidity('Password Admin Tidak Boleh Kosong')" oninput="setCustomValidity('')">
				</div>

				<label>Telepohe Admin</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
					</div>
					<input type="number" class="form-control" placeholder="Masukkan Telepohe Admin" name="telp_admin" required oninvalid="this.setCustomValidity('Telepohe Admin Tidak Boleh Kosong')" oninput="setCustomValidity('')">
				</div>

				<label>Level Admin</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-sign-in-alt"></i></span>
					</div>
					<select class="form-control select2" name="id_level" required style="width: 91%;">
						<option value="">Pilih Status Admin</option>
						<option value="1">Adminisrator</option>
						<option value="2">Petugas</option>
					</select>
				</div>

				<label>Status Admin</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-sign-in-alt"></i></span>
					</div>
					<select class="form-control select2" name="active" required style="width: 91%;">
						<option value="">Pilih Level Admin</option>
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
					</select>
				</div>

				<label>Foto Siswa</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="far fa-image"></i></span>
					</div>
					<div id="image-preview" class="image-preview">
						<label for="image-upload" id="image-label">Pilih Foto</label>
						<input type="file" name="foto_admin" id="image-upload" />
					</div>
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


<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery Foto Preview -->
<script src="<?php echo base_url() ?>assets/jquery.uploadPreview.min.js"></script>
<script type="text/javascript">
	$.uploadPreview({
		input_field: "#image-upload", // Default: .image-upload
		preview_box: "#image-preview", // Default: .image-preview
		label_field: "#image-label", // Default: .image-label
		label_default: "Choose File", // Default: Choose File
		label_selected: "Change File", // Default: Change File
		no_label: false, // Default: false
		success_callback: null // Default: null
	});
</script>