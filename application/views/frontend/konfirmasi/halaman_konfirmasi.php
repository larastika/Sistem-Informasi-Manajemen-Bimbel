<section class="services-section ftco-section" id="regis-section">
    <div class="container">
        <div class="row justify-content-center pb-3">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-4">Konfirmasi Pembayaran Anda</h2>

                <div class="container-fluid">
                    <div class="row justify-content-center my-5">
                        <div class="col-md-12 ">

                            <?php if ($this->session->flashdata('surat') !== null) :  ?>
                                <div class="alert alert-success">
                                    <?= $this->session->flashdata('surat') ?>
                                </div>
                            <?php endif; ?>
                            <div class="card">
                                <div class="card-header text-black font-weight-bold text-center" style="background-color: #8FBC8F">
                                    Konfirmasi Pembayaran
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('cekKonfirmasi') ?>" method="POST">
                                        <div class="form-group">
                                            <label>Kode Pembayaran</label>
                                            <input type="text" name='kode' class="form-control" placeholder="Kode Pembayaran">
                                        </div>
                                        <button class="btn font-weight-bold float-right" style="background-color: #8FBC8F">Cek Status</button>
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <?php if (isset($_GET['kode'])) : ?>
                                <h5>Kode Pembayaran : <?= $_GET['kode'] ?></h5>
                                <div class="card">
                                    <div class="card-header text-black font-weight-bold text-center" style="background-color: #8FBC8F">
                                        Detail Pembayaran Anda
                                    </div>
                                    <div class="card-body">
                                        <h3 class='text-center'>
                                            <?php if ($pembayaran['stapem'] === '0') : ?>
                                                <i class="fa fa-times text-danger"></i> Belum Dibayar <i class="fa fa-times text-danger"></i><br>
                                                <i class="fa fa-times text-danger"></i> Total : <?= $pembayaran['harga'] ?> <i class="fa fa-times text-danger"></i>
                                            <?php elseif ($pembayaran['stapem'] === '1') : ?>
                                                <i class="fa fa-check text-success"></i> Sudah Dibayar <i class="fa fa-check text-success"></i>
                                            <?php endif; ?>
                                        </h3>
                                        <?php if ($this->session->flashdata('alert') !== null) : ?>
                                            <div class="alert alert-danger">
                                                <?= $this->session->flashdata('alert') ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="table-responsive">
                                            <table class="table ">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Notelp</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td><?= $pembayaran['name'] ?></td>
                                                        <td><?= $pembayaran['email'] ?></td>
                                                        <td><?= $pembayaran['no_telp'] ?> </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <?php if ($pembayaran['stapem'] === '1') : ?>
                                                <form action="" method="post">
                                                    <a class="text-danger"> Tunggu Sampai Admin Mengkonfirmasi Pembayaran Anda, Setelah itu Akun Anda dapat diakses</a>
                                                    <!-- <button type="submit" class="btn btn-block text-black" style="background-color: #8FBC8F">PRINT</button> -->
                                                </form>
                                            <?php endif; ?>
                                            <?php if ($pembayaran['stapem'] === '0') : ?>

                                                <?= form_open_multipart("kirimKonfirmasi"); ?>
                                                <input type="text" name='nomor_pembayaran' value='<?= $_GET['kode']  ?>'>
                                                <input type="text" name='jumlah_bayar' class="form-control mb-2" value='<?= $pembayaran['harga'] ?>' readonly>
                                                <p class='text-danger'>Silahkan Kirim Bukti Pembayaran pada Kolom di Bawah.</p>
                                                <!-- <input id="foto" type="file" name='userfile' class='form-control' required> -->
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input mb3" id="userfile" name="userfile" size="20" value="" required>
                                                    <label class=" custom-file-label" for="userfile">Choose file</label>
                                                </div>
                                                <br>
                                                <p class="d-none" id="pesan"></p>
                                                <button id="btn_konfirmasi" type='submit' class='btn btn-success btn-block mt-3'>Kirim Bukti Pembayaran</button>
                                                <?= form_close(); ?>

                                            <?php else : ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</section>