<!DOCTYPE html>
<html>

<head>
    <title>Cetak Rekap</title>
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
                        Bimbel Bengkulu Warrior Reborn<br>
                    </span>
                    <small style=" font-weight:bold;">(Menolong orang yang sedang membutuhkan
                        ,Membantu orang dengan tidak mengharapkan balas jasa,
                        <br>Membantu orang dengan segenap hati dan tulus)</small>
                </td>
            </tr>
        </table>
    </div>
    <div>
        <hr class="line-title">
        <bold><a>LAPORAN DATA SISWA</a></bold>
    </div><br>

    </div>
    <div class="card-body">
        <table class="table table-hover text-gray-800 mt-9" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>kelas</th>
                    <th>jenis kelamin</th>
                    <th>Tempat/Tanggal Lahir</th>
                    <th>sekolah</th>
                    <th>Nama Ortu</th>
                    <th>Alamat</th>
                    <th>Program</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($siswa as $k) : ?>
                    <tr>
                        <td scope="row"><?= $i++ ?></td>
                        <td><?= $k['nama']; ?></td>
                        <td><?= $k['kelas']; ?></td>
                        <td><?= $k['jenis_kelamin']; ?></td>
                        <td><?= $k['tempat_lahir']; ?>/<?= $k['tgl_lahir']; ?></td>
                        <td><?= $k['sekolah']; ?></td>
                        <td><?= $k['nama_ortu']; ?></td>
                        <td><?= $k['alamat']; ?></td>
                        <td><?= $k['namprog']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br><br><br><br>
        <table border="0" width="100%">
            <tr>
                <td width="35%"></td>
                <td width="35%"></td>
                <td width="30%" align="center">
                    <p>Bengkulu, <?= date('d F Y') ?></p>
                    <br><br><br><br>
                    <p> (ADMIN BWR)</p>

                </td>
            </tr>

        </table>
</body>

</html>