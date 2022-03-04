<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Data Siswa</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
					<li class="breadcrumb-item active">Data Siswa</li>
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
						<h3 class="card-title">Tabel Data Siswa</h3>
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
									<th>Foto</th>
									<th>NISN</th>
									<th>NIS</th>
									<th>Nama Lengkap</th>
									<th>Kelas</th>
									<th>Spp</th>
									<th>Telpone</th>
									<th>Alamat</th>
									<th width="10">Action</th>
								</tr>
							</thead>
							<tbody>

								<?php
								$i = 1;
								foreach ($tampilDataSiswa->result() as $data) { ?>
									<tr>
										<td width="1"><?php echo $i ?></td>
										<td>
											<img class="img-circle img-bordered-sm" src="<?php echo base_url('') ?>assets/upload/foto_siswa/<?php echo $data->foto_siswa  ?>" alt="user image" width="75" height="75">
										</td>
										<td><?php echo $data->nisn_siswa  ?> (<?php if ($data->active == 1) {
																					echo "Login Aktif";
																				} else {
																					echo "Login Tidak Aktif";
																				} ?> - <?php if ($data->siswa_online == 1) {
																							echo "ONLINE";
																						} else {
																							echo "OFFLINE";
																						} ?>)</td>
										<td><?php echo $data->nis_siswa ?></td>
										<td><?php echo $data->nama_siswa ?></td>
										<td><?php echo $data->nmkelas ?></td>
										<td><?php echo $data->nmspp  ?></td>
										<td><?php echo $data->telp_siswa  ?></td>
										<td><?php echo $data->alamat_siswa  ?></td>
										<td width="10">
											<div class="d-flex align-items-center list-action">
												<button type="button" class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#modal-edit<?php echo $data->nisn_siswa ?>"><i class="fa fa-edit"></i></button>
												<button type="button" class="btn btn-danger btn-sm mr-2" data-toggle="modal" data-target="#modal-hapus<?php echo $data->nisn_siswa ?>"><i class="fa fa-trash"></i></button>
											</div>
										</td>
									</tr>
								<?php $i++;
								} ?>

							</tbody>
							<tfoot>
								<tr>
									<th width="1">No.</th>
									<th>Foto</th>
									<th>NISN</th>
									<th>NIS</th>
									<th>Nama Lengkap</th>
									<th>Kelas</th>
									<th>SPP</th>
									<th>Telpone</th>
									<th>Alamat</th>
									<th width="10">Action</th>
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

<?php foreach ($tampilDataSiswa->result() as $data) { ?>
	<!-- Modal Edit -->
	<?php echo form_open_multipart('siswa/Edit'); ?>
	<div class="modal fade" id="modal-edit<?php echo $data->nisn_siswa ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Data Siswa (<?php echo $data->nama_siswa ?>)</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<input type="hidden" name="query_id" value="<?php echo $data->nisn_siswa ?>">
				<div class="modal-body">

					<label>NISN Siswa</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-address-card"></i></span>
						</div>
						<input type="number" class="form-control" placeholder="Masukkan NISN Siswa" name="nisn_siswa" readonly value="<?php echo $data->nisn_siswa ?>" required oninvalid="this.setCustomValidity('NISN Siswa Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>

					<label>NIS Siswa</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-id-card-alt"></i></span>
						</div>
						<input type="number" class="form-control" placeholder="Masukkan NIS Siswa" name="nis_siswa" value="<?php echo $data->nis_siswa ?>" required oninvalid="this.setCustomValidity('NIS Siswa Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>

					<label>Nama Siswa</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Masukkan Nama Siswa" name="nama_siswa" value="<?php echo $data->nama_siswa ?>" required oninvalid="this.setCustomValidity('Nama Siswa Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>

					<label>Telepon Siswa</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
						</div>
						<input type="number" class="form-control" placeholder="Masukkan Telepon Siswa" name="telp_siswa" value="<?php echo $data->telp_siswa ?>" required oninvalid="this.setCustomValidity('Telepon Siswa Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>

					<label>Alamat Siswa</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-map-marked"></i></span>
						</div>
						<textarea class="form-control" rows="3" placeholder="Masukkan Alamat Siswa ..." name="alamat_siswa" required oninvalid="this.setCustomValidity('Alamat Siswa Tidak Boleh Kosong')" oninput="setCustomValidity('')"><?php echo $data->alamat_siswa ?></textarea>
					</div>

					<label>Kelas Siswa</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
						<select class="form-control select2" name="id_kelas" value="<?php echo $data->id_kelas ?>" required style="width: 91%;">
							<option value="">Pilih Kelas Siswa</option>
							<?php foreach ($joinKelas->result() as $tbl_kelas) {
								if ($tbl_kelas->id_kelas == $data->id_kelas) {
									echo "<option selected = 'selected' value='" . $tbl_kelas->id_kelas . "'>" . $tbl_kelas->nama_kelas . " (" . $tbl_kelas->kompetensi_keahlian . ")" . "</option>";
								} else {
									echo "<option value='" . $tbl_kelas->id_kelas . "'>" . $tbl_kelas->nama_kelas . " (" . $tbl_kelas->kompetensi_keahlian . ")" . "</option>";
								}
							} ?>
						</select>
					</div>

					<label>SPP Siswa</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
						<select class="form-control select2" name="id_spp" value="<?php echo $data->id_spp  ?>" required style="width: 91%;">
							<option value="">Pilih SPP Siswa</option>
							<?php foreach ($joinSpp->result() as $tbl_spp) {
								if ($tbl_spp->id_spp == $data->id_spp) {
									echo "<option selected = 'selected' value='" . $tbl_spp->id_spp . "'>" . $tbl_spp->nama_spp .  " (" . $tbl_spp->tahun . ") " . " - " .  " (" . "Rp." . number_format($tbl_spp->nominal, 0, ',', '.') . ") " . "</option>";
								} else {
									echo "<option value='" . $tbl_spp->id_spp . "'>" . $tbl_spp->nama_spp . " (" . $tbl_spp->tahun . ") " . " - " .  " (" . "Rp." . number_format($tbl_spp->nominal, 0, ',', '.') . ") " . "</option>";
								}
							} ?>
						</select>
					</div>

					<label>Status Login Siswa</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-sign-in-alt"></i></span>
						</div>
						<select class="form-control select2" name="active" required style="width: 91%;">
							<option value="">Pilih Status Login Siswa</option>
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
						<div id="image-preview<?php echo $data->nisn_siswa ?>" class="image-preview">
							<label for="image-upload" id="image-label<?php echo $data->nisn_siswa ?>">Pilih Foto</label>
							<input type="file" name="foto_siswa" value="<?php echo $data->foto_siswa ?>" id="image-upload<?php echo $data->nisn_siswa ?>" />
						</div>
						<p>Foto Tersimpan : <?php echo $data->foto_siswa ?></p>
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

	<!-- jQuery -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- jQuery Foto Preview -->
	<script src="<?php echo base_url() ?>assets/jquery.uploadPreview.min.js"></script>
	<script type="text/javascript">
		$.uploadPreview({
			input_field: "#image-upload<?php echo $data->nisn_siswa ?>", // Default: .image-upload
			preview_box: "#image-preview<?php echo $data->nisn_siswa ?>", // Default: .image-preview
			label_field: "#image-label<?php echo $data->nisn_siswa ?>", // Default: .image-label
			label_default: "Choose File", // Default: Choose File
			label_selected: "Change File", // Default: Change File
			no_label: false, // Default: false
			success_callback: null // Default: null
		});
	</script>

	<!-- Modal Hapus -->
	<?php echo form_open_multipart('siswa/Hapus'); ?>
	<div class="modal fade" id="modal-hapus<?php echo $data->nisn_siswa ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Hapus Data Siswa (<?php echo $data->nama_siswa ?>)</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Apakah Anya Yakin Ingin Menghapus Data Siswa Berikut ?</p>
					<p>
						NISN Siswa : <?php echo $data->nisn_siswa  ?> <br>
						NIS Siswa : <?php echo $data->nis_siswa ?> <br>
						Nama Siswa : <?php echo $data->nama_siswa ?> <br>
						Telepone Siswa : <?php echo $data->telp_siswa ?> <br>
						Alamat Siswa : <?php echo $data->alamat_siswa ?> <br>
						Kelas Siswa : <?php echo $data->nmkelas ?> <br>
						SPP Siswa : <?php echo $data->nmspp ?> <br>
					</p>
					<input type="hidden" name="query_id" value="<?php echo $data->nisn_siswa ?>">
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
<?php echo form_open_multipart('siswa/Tambah'); ?>
<div class="modal fade" id="modal-tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data Siswa</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<label>NISN Siswa</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-address-card"></i></span>
					</div>
					<input type="number" class="form-control" placeholder="Masukkan NISN Siswa" name="nisn_siswa" required oninvalid="this.setCustomValidity('NISN Siswa Tidak Boleh Kosong')" oninput="setCustomValidity('')">
				</div>

				<label>NIS Siswa</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-id-card-alt"></i></span>
					</div>
					<input type="number" class="form-control" placeholder="Masukkan NIS Siswa" name="nis_siswa" required oninvalid="this.setCustomValidity('NIS Siswa Tidak Boleh Kosong')" oninput="setCustomValidity('')">
				</div>

				<label>Nama Siswa</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-user"></i></span>
					</div>
					<input type="text" class="form-control" placeholder="Masukkan Nama Siswa" name="nama_siswa" required oninvalid="this.setCustomValidity('Nama Siswa Tidak Boleh Kosong')" oninput="setCustomValidity('')">
				</div>

				<label>Telepon Siswa</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
					</div>
					<input type="number" class="form-control" placeholder="Masukkan Telepon Siswa" name="telp_siswa" required oninvalid="this.setCustomValidity('Telepon Siswa Tidak Boleh Kosong')" oninput="setCustomValidity('')">
				</div>

				<label>Alamat Siswa</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-map-marked"></i></span>
					</div>
					<textarea class="form-control" rows="3" placeholder="Masukkan Alamat Siswa ..." name="alamat_siswa" required oninvalid="this.setCustomValidity('Alamat Siswa Tidak Boleh Kosong')" oninput="setCustomValidity('')"></textarea>
				</div>

				<label>Kelas Siswa</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-user"></i></span>
					</div>
					<select class="form-control select2" name="id_kelas" required style="width: 91%;">
						<option value="">Pilih Kelas Siswa</option>
						<?php foreach ($joinKelas->result() as $tbl_kelas) { ?>
							<option value="<?php echo $tbl_kelas->id_kelas; ?>"><?php echo $tbl_kelas->nama_kelas; ?> (<?php echo $tbl_kelas->kompetensi_keahlian; ?>) </option>
						<?php
						}
						?>
					</select>
				</div>

				<label>SPP Siswa</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-user"></i></span>
					</div>
					<select class="form-control select2" name="id_spp" required style="width: 91%;">
						<option value="">Pilih SPP Siswa</option>
						<?php foreach ($joinSpp->result() as $tbl_spp) { ?>
							<option value="<?php echo $tbl_spp->id_spp; ?>"><?php echo $tbl_spp->nama_spp; ?> (<?php echo $tbl_spp->tahun; ?>) - (Rp.<?php echo number_format($tbl_spp->nominal, 0, ',', '.'); ?>)</option>
						<?php
						}
						?>
					</select>
				</div>

				<label>Jatuh Tempo Pertama</label>
				<div class="input-group date mb-3" id="tgljatuhtempo" data-target-input="nearest">
					<div class="input-group-append" data-target="#tgljatuhtempo" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
					<input type="text" class="form-control datetimepicker-input" name="jatuh_tempo_pertama" data-target="#tgljatuhtempo" required oninvalid="this.setCustomValidity('Tanggal Jatuh Tempo Tidak Boleh Kosong')" oninput="setCustomValidity('')" />
				</div>

				<label>Status Login Siswa</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-sign-in-alt"></i></span>
					</div>
					<select class="form-control select2" name="active" required style="width: 91%;">
						<option value="">Pilih Status Login Siswa</option>
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
						<input type="file" name="foto_siswa" id="image-upload" />
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