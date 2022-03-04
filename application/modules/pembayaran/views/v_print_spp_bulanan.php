<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<?php
$i = 1;
foreach ($printDataSpp->result() as $data) { ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="invoice-title">
                    <h2>Nota Pembayaran SPP Bulan <?php echo $data->bulan_dibayar ?> (Rp.<?php echo number_format($data->nmnominal, 0, ',', '.') ?>)</h2>
                    <h3 class="pull-right"><?php echo $data->kode_pembayaran ?></h3>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong>Atas Nama:</strong><br>
                            <?php echo $data->nmsiswa ?> (<?php echo $data->nmnisn ?>)<br>
                            <?php echo $data->nmkelas ?> (<?php echo $data->nmjurusan ?>)<br>
                            <?php echo $data->nmtelpsiswa ?><br>
                            <?php echo $data->nmalamatsiswa ?> <br>
                            Pembayaran SPP : <?php echo $data->nmnamaspp ?> (Rp.<?php echo number_format($data->nmnominal, 0, ',', '.') ?>)
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Admin Pembayaran:</strong><br>
                            <?= $admin['nama_admin']; ?><br>
                            <?= $admin['telp_admin']; ?><br>
                            <?= $admin['email_username']; ?>
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong>Metode Pembayaran:</strong><br>
                            Standart Pembayaran Tunai SPP
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Tanggal Bayar:</strong><br>
                            <?php echo $data->tgl_bayar ?><br><br>
                        </address>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Pembayaran SPP Bulanan</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td><strong>Bulan</strong></td>
                                        <td class="text-center"><strong>Nama SPP</strong></td>
                                        <td class="text-center"><strong>Nominal Pembayaran</strong></td>
                                        <td class="text-right"><strong>Total</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                    <tr>
                                        <td><?php echo $data->bulan_dibayar ?></td>
                                        <td class="text-center"><?php echo $data->nmnamaspp ?></td>
                                        <td class="text-center">Rp.<?php echo number_format($data->nmnominal, 0, ',', '.') ?></td>
                                        <td class="text-right">Rp.<?php echo number_format($data->nmnominal, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center"><strong>Total</strong></td>
                                        <td class="no-line text-right">Rp.<?php echo number_format($data->nmnominal, 0, ',', '.') ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <address>
                            <strong><?php echo $data->nmsiswa ?></strong><br>
                            <strong>(<?php echo $data->nmnisn ?>)</strong><br>
                            <br><br>
                            (...........TTD...........)
                        </address>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $i++;
} ?>

<script>
    window.print();
</script>