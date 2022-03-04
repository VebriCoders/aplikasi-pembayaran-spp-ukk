<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Pembayaran SPP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>
    <img src="<?php echo base_url() ?>assets/iconmini.png" style="position: absolute; width:90px; height:auto;" alt="">
    <table style="width:100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold;">
                    APLIKASI MYSPP
                    <br />SIMPLE E-SPP APPS
                    <br />PRADANA INDUSTRIES
                </span>
            </td>
        </tr>
    </table>

    <hr class="line-title">

    <p align="center">
        LAPORAN PEMBAYARAN SPP (<?php if ($status_pembayaran == 1) {
                                    echo "LUNAS";
                                } else {
                                    echo "BELUM DI BAYAR";
                                } ?>) <br>
        DI Cetak :
        <?php
        function hari_ini()
        {
            $hari = date("D");
            switch ($hari) {
                case 'Sun':
                    $hari_ini = "Minggu";
                    break;

                case 'Mon':
                    $hari_ini = "Senin";
                    break;

                case 'Tue':
                    $hari_ini = "Selasa";
                    break;

                case 'Wed':
                    $hari_ini = "Rabu";
                    break;

                case 'Thu':
                    $hari_ini = "Kamis";
                    break;

                case 'Fri':
                    $hari_ini = "Jumat";
                    break;

                case 'Sat':
                    $hari_ini = "Sabtu";
                    break;

                default:
                    $hari_ini = "Tidak di ketahui";
                    break;
            }
            return "<b>" . $hari_ini . "</b>";
        }
        echo hari_ini();
        ?>
        <b><?php date_default_timezone_set("Asia/Bangkok");
            echo  date(', d-m-Y H:i:s'); ?></b>
    </p>
    <table class="table table-bordered">
        <tr>
            <th class="text-center" width="2">No.</th>
            <th class="text-center" width="100">NISN</th>
            <th class="text-center" width="100">Nama Siswa</th>
            <th class="text-center" width="100">Kelas</th>
            <th class="text-center" width="100">Bulan Bayar</th>
            <th class="text-center" width="100">Status</th>
            <th class="text-center" width="100">SPP</th>
            <th class="text-center" width="100">Jumlah Bayar</th>
        </tr>
        <?php
        $total = 0;
        $i = 1;
        foreach ($tampilPembayaran->result() as $data) { ?>
            <tr>
                <td class="text-center"><?php echo $i ?></td>
                <td class="text-center"><?php echo $data->nisn_siswa ?></td>
                <td class="text-center"><?php echo $data->nmsiswa ?></td>
                <td class="text-center"><?php echo $data->nmkelas ?></td>
                <td class="text-center"><?php echo $data->bulan_dibayar ?></td>
                <td class="text-center"><?php if ($data->status_bayar == 1) {
                                            echo "LUNAS";
                                        } else {
                                            echo "BELUM DI BAYAR";
                                        } ?></td>
                <td class="text-center"><?php echo $data->nmspp ?></td>
                <td class="text-center">Rp.<?= number_format($data->jumlah_bayar, 0, ',', '.'); ?></td>
            </tr>
            <?php $total += $data->jumlah_bayar; ?>
        <?php $i++;
        } ?>
        <tr>
            <th colspan="7" class="text-right">TOTAL</th>
            <th colspan="1" class="text-center">Rp.<?= number_format($total, 0, ',', '.'); ?></th>
        </tr>
    </table>


    <div align="right" class="text-center">
        <div style="width:400px;float:right">
            MySPP, <?php echo date('d-m-Y'); ?>
            <br />Ttd.Admin
            <br>
            <br>
            <br>
            <br>
            <p>_______________________________</p>
            <p><?= $admin['nama_admin']; ?></p>
        </div>
        <div style="clear:both"></div>
    </div>

</body>

<script>
    window.print();
</script>

</html>