<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Laporan Pembayaran SPP </h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
					<li class="breadcrumb-item active">Laporan Pembayaran</li>
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
				<div class="card card-warning">
					<div class="card-header">
						<h3 class="card-title">Cari Berdasarkan Tanggal</h3>
					</div>
					<?php echo form_open_multipart('laporan_pembayaran/cari_tgl'); ?>
					<?php $nisn_siswa = $this->input->post('nisn_siswa'); ?>
					<div class="card-body">
						<div class="form-group">
							<label>Tanggal Awal</label>
							<div class="input-group date mb-3" id="tglsatu" data-target-input="nearest">
								<div class="input-group-append" data-target="#tglsatu" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
								<input type="text" class="form-control datetimepicker-input" name="awal" data-target="#tglsatu" required oninvalid="this.setCustomValidity('Tanggal Awal Tidak Boleh Kosong')" oninput="setCustomValidity('')" />
							</div>
							<label>Tanggal Akhir</label>
							<div class="input-group date mb-3" id="tgldua" data-target-input="nearest">
								<div class="input-group-append" data-target="#tgldua" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
								<input type="text" class="form-control datetimepicker-input" name="akhir" data-target="#tgldua" required oninvalid="this.setCustomValidity('Tanggal Akhir Tidak Boleh Kosong')" oninput="setCustomValidity('')" />
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button class="btn btn-info" style="float: right;"><i class="fa fa-search"></i> Tampilkan</button>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card card-success">
					<div class="card-header">
						<h3 class="card-title">Cari Berdasarkan Status Bayar</h3>
					</div>
					<?php echo form_open_multipart('laporan_pembayaran/cari_status'); ?>
					<div class="card-body">
						<div class="form-group">
							<label>Status Pembayaran</label>
							<div class="input-group date mb-3" id="tglsatu" data-target-input="nearest">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-voicemail"></i></span>
								</div>
								<select class="form-control select2" name="status_pembayaran" required style="width: 85%;">
									<option value="">Pilih Status Pembayaran</option>
									<option value="1">Pembayaran Lunas</option>
									<option value="0">Pembayaran Belum Lunas</option>
								</select>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button class="btn btn-info" style="float: right;"><i class="fa fa-search"></i> Tampilkan</button>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>

		</div>

	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->