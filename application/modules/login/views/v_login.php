<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MySpp - Login</title>

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
				<p class="login-box-msg">Login Untuk Masuk Sistem</p>

				<!-- Pesan Error Dari Proses Login -->
				<?php echo $this->session->flashdata('alert'); ?>

				<!-- Form Login -->
				<form class="mb-3" id="quickForm" action="<?php echo base_url('login/proses_login') ?>" method="POST">

					<div class="form-group">
						<label for="exampleInputEmail1">Email</label>
						<input type="email" name="email_username" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Email">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password">
					</div>
					<div class="form-group mb-3">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
							<label class="custom-control-label" for="exampleCheck1">Saya Menyetujui Akun Valid!</label>
						</div>
					</div>

					<div class="row mb-1">
						<div class="col-8"></div>
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Login</button>
						</div>
					</div>

				</form>

				<!-- Menu Tambahan Lupa Password dan Register -->
				<!-- <div class="row mb-1">
					<div class="col-12">
						<a href="#" class="btn btn-block btn-info">
							<i class="fa fa-lock-open mr-2"></i> Lupa Password
						</a>
					</div>
				</div>
				<div class="row mb-1">
					<div class="col-12">
						<a href="#" class="btn btn-block btn-success">
							<i class="fa fa-id-card mr-2"></i> Register
						</a>
					</div>
				</div> -->

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
			// $.validator.setDefaults({
			// 	submitHandler: function() {
			// 		alert("Form successful submitted!");
			// 	}
			// });
			$('#quickForm').validate({
				rules: {
					email: {
						required: true,
						email: true,
					},
					password: {
						required: true,
						minlength: 5
					},
					terms: {
						required: true
					},
				},
				messages: {
					email: {
						required: "Masukkan Email Aktif Anda!",
						email: "Masukkan Email Aktif Anda!"
					},
					password: {
						required: "Masukkan Password Email Aktif Anda!",
						minlength: "Password Lebih Dari 5 Karakter!"
					},
					terms: "Tolong cek valid akun"
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