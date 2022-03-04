<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">History Pembayaran SPP </h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
					<li class="breadcrumb-item active">History Pembayaran</li>
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
						<h3 class="card-title">History Pembayaran</h3>
					</div>

					<!-- /.card-header -->
					<div class="card-body">
						<table id="tabelutama" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>KODE PEMBAYARAN</th>
									<th>NISN</th>
									<th>SPP</th>
									<th>BULAN</th>
									<th>KELAS</th>
									<th>STATUS</th>
								</tr>
							</thead>
							<tbody>

								<?php
								$i = 1;
								foreach ($HistoryPembayaran->result() as $data) { ?>
									<tr>
										<td width="1"><?php echo $i ?></td>
										<td><?php echo $data->kode_pembayaran ?></td>
										<td><?php echo $data->nisn_siswa ?> </td>
										<td><?php echo $data->nmspp ?> (Rp.<?php echo number_format($data->jumlah_bayar, 0, ',', '.') ?>)</td>
										<td><?php echo $data->bulan_dibayar ?> </td>
										<td><?php echo $data->nmkelas ?> </td>
										<td>
											<?php if ($data->status_bayar == 1) { ?>
												<button type="button" class="btn btn-success btn-sm mr-2">Lunas</button>
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
									<th>NISN</th>
									<th>SPP</th>
									<th>BULAN</th>
									<th>KELAS</th>
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