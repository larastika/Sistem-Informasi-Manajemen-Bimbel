<!DOCTYPE html>
<html>


<head>
    <title>Cetak Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php base_url(); ?>asset/css/style.css">
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>
    <div>

        <table style="width: 100% ;">
            <tr>
                <td align="center">
                    <span style="line-height: 1.1; font-weight:bold;">
                        DISKOMINFO KOTA BUKIT TINGGI<br>
                    </span>
                    <small style=" font-weight:bold;">(Ujian Praktek Calon Pegawai Non PNS Diskominfo)<br> KOTA BUKIT TINGGI</small>

                </td>
            </tr>
        </table>
    </div>
    <hr class="line-title">
    <small>
        Waktu Cetak Laporan : <?php echo date('d-m-Y'); ?>
    </small>
    <br>
    <br>
    <div>
        <table class="table table-hover" id="dataTable" width="100%">
            <thead>
                <tr class="text-gray-900">
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">nama Pegawai</th>
                    <th scope="col">Posisi</th>
                    <th scope="col">Gaji</th>
                </tr>
            </thead>
            <tbody class="text-gray-900">
                <?php $i = 1 ?>
                <?php foreach ($pegawai as $pg) : ?>
                    <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><?= $pg['id']; ?></td>
                        <td><?= $pg['nama']; ?></td>
                        <td><?= $pg['namapos']; ?></td>
                        <td><?= $pg['gajih']; ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <br><br><br><br>
    <table border="0" width="100%">
        <tr>
            <td width="35%"></td>
            <td width="35%"></td>
            <td width="30%" align="center">
                <p>Bengkulu, <?= date('d F Y') ?></p>
                <br><br><br><br>
                <p> (ADMIN)</p>

            </td>
        </tr>

    </table>
</body>

</html>