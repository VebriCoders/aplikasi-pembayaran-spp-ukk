<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MySpp - Login Siswa</title>

	<!-- Icon Atas -->
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/iconmini.png" />
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="<?php echo base_url() ?>" class="h1"><b>My </b>SPP</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Login Siswa</p>

				<!-- Pesan Error Dari Proses Login -->
				<?php echo $this->session->flashdata('alert'); ?>

				<!-- Form Login -->
				<form class="mb-3" id="quickForm" action="<?php echo base_url('login_siswa/proses_login') ?>" method="POST">

					<div class="form-group">
						<label for="nisnlabel">NISN SISWA</label>
						<input type="number" name="nisn_siswa" class="form-control" id="nisnlabel" placeholder="Masukkan NISN SISWA">
					</div>
					<div class="form-group mb-3">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
							<label class="custom-control-label" for="exampleCheck1">Saya Menyetujui NISN Benar!</label>
						</div>
					</div>

					<div class="row mb-1">
						<div class="col-8"></div>
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Login</button>
						</div>
					</div>

				</form>

			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- jquery-validation -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
	<script src="<?php echo base_url() ?>assets/plugins/jquery-validation/additional-methods.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>

	<script>
		$(function() {
			$('#quickForm').validate({
				rules: {
					nisn_siswa: {
						required: true,
					},
					terms: {
						required: true
					},
				},
				messages: {
					nisn_siswa: {
						required: "Masukkan NISN SISWA!",
						nisn_siswa: "Masukkan NISN SISWA!"
					},
					terms: "Tolong Cek NISN Benar!"
				},
				errorElement: 'span',
				errorPlacement: function(error, element) {
					error.addClass('invalid-feedback');
					element.closest('.form-group').append(error);
				},
				highlight: function(element, errorClass, validClass) {
					$(element).addClass('is-invalid');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).removeClass('is-invalid');
				}
			});
		});
	</script>
</body>

</html>