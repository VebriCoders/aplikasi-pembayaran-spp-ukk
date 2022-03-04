<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Pembayaran SPP</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('pembayaran') ?>">Pembayaran SPP</a></li>
                    <li class="breadcrumb-item active">Detail</li>
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

                    <?php foreach ($tampilDataSiswa->result() as $data) { ?>
                        <div class="card-header">
                            <h3 class="card-title">Tabel Data Buku Pembayaran SPP</h3>
                            <a target="_blank" href="<?php echo base_url('pembayaran/cetak_pembayaran/' . $data->nisn_siswa) ?>" style="float: right;" class="btn btn-info btn-sm mr-2"><i class="fa fa-print"></i> Print Buku Pembayaran Siswa</a>
                        </div>
                    <?php }; ?>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabelutama" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Bulan</th>
                                    <th>Jatuh Tempo</th>
                                    <th>No.Bayar</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Jumlah</th>
                                    <th>Status Pembayaran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($tampilDataSppSiswa->result() as $data) { ?>
                                    <tr>
                                        <td width="1"><?php echo $i ?></td>
                                        <td><?php echo $data->bulan_dibayar ?></td>
                                        <td><?php echo $data->jatuh_tempo ?></td>
                                        <td><?php echo $data->kode_pembayaran ?></td>
                                        <td><?php echo $data->tgl_bayar ?></td>
                                        <td>Rp.<?php echo number_format($data->jumlah_bayar, 0, ',', '.') ?></td>
                                        <td width="117">
                                            <?php if ($data->status_bayar == 0) { ?>
                                                <button type="button" class="btn btn-info btn-sm mr-2">Belum Di Bayar</button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-success btn-sm mr-2">Lunas</button>
                                            <?php } ?>
                                        </td>
                                        <td width="150">
                                            <?php if ($data->status_bayar == 0) { ?>
                                                <div class="d-flex align-items-center list-action">
                                                    <button type="button" class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#modal-bayar<?php echo $data->id_pembayaran ?>"><i class="fa fa-money-bill-wave-alt"></i> Bayar</button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="d-flex align-items-center list-action">
                                                    <button type="button" class="btn btn-danger btn-sm mr-2" data-toggle="modal" data-target="#modal-batal<?php echo $data->id_pembayaran ?>"><i class="fa fa-backspace"></i> Batal</button>
                                                    <a target="_blank" href="<?php echo base_url('pembayaran/cetak_pembayaran_bulanan/' . $data->kode_pembayaran) ?>" class="btn btn-secondary btn-sm mr-2"><i class="fa fa-print"></i> Print</a>
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
                                    <th>Bulan</th>
                                    <th>Jatuh Tempo</th>
                                    <th>No.Bayar</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Jumlah</th>
                                    <th>Status Pembayaran</th>
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

<?php foreach ($tampilDataSppSiswa->result() as $data) { ?>
    <?php echo form_open_multipart('pembayaran/bayar'); ?>
    <div class="modal fade" id="modal-bayar<?php echo $data->id_pembayaran ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pembayaran Bulan (<?php echo $data->bulan_dibayar ?>)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="query_id_pembayaran" value="<?php echo $data->id_pembayaran ?>" required>
                    <input type="hidden" name="jatuh_tempo" value="<?php echo $data->jatuh_tempo ?>" required>
                    <p>Apakah Anda Yakin Untuk Membayar SPP Pada Bulan <?php echo $data->bulan_dibayar ?> Dengan Jumlah Bayar Rp.<?php echo number_format($data->jumlah_bayar, 0, ',', '.') ?> ? </p>
                    <?php foreach ($tampilDataSiswa->result() as $data) { ?>
                        <p>
                            Detail Siswa <br>
                            Nama Siswa : <?php echo $data->nama_siswa ?><br>
                            NISN Siswa : <?php echo $data->nisn_siswa ?><br>
                            Kelas : <?php echo $data->nmkelas ?><br>
                            Jurusan : <?php echo $data->nmjurusan ?><br>
                        </p>
                        <input type="hidden" name="nisn_siswa" value="<?php echo $data->nisn_siswa ?>" required>
                    <?php }; ?>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Proses Bayar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <?php echo form_close(); ?>
<?php } ?>


<?php foreach ($tampilDataSppSiswa->result() as $data) { ?>
    <?php echo form_open_multipart('pembayaran/batal'); ?>
    <div class="modal fade" id="modal-batal<?php echo $data->id_pembayaran ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Batalkan Pembayaran Bulan (<?php echo $data->bulan_dibayar ?>)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="query_id_pembayaran" value="<?php echo $data->id_pembayaran ?>" required>
                    <input type="hidden" name="jatuh_tempo" value="<?php echo $data->jatuh_tempo ?>" required>
                    <p>Apakah Anda Yakin Untuk Membatalkan Pembayaran SPP Pada Bulan <?php echo $data->bulan_dibayar ?> Dengan Jumlah Bayar Rp.<?php echo number_format($data->jumlah_bayar, 0, ',', '.') ?> ? </p>
                    <?php foreach ($tampilDataSiswa->result() as $data) { ?>
                        <p>
                            Detail Siswa <br>
                            Nama Siswa : <?php echo $data->nama_siswa ?><br>
                            NISN Siswa : <?php echo $data->nisn_siswa ?><br>
                            Kelas : <?php echo $data->nmkelas ?><br>
                            Jurusan : <?php echo $data->nmjurusan ?><br>
                        </p>
                        <input type="hidden" name="nisn_siswa" value="<?php echo $data->nisn_siswa ?>" required>
                    <?php }; ?>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-danger">Proses Batal</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <?php echo form_close(); ?>
<?php } ?>