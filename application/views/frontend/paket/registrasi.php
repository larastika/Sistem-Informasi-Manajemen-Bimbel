<section class="services-section ftco-section" id="regis-section">
    <div class="container">
        <div class="row justify-content-center pb-3">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-4">Registrasi</h2>
                <!--  -->
                <?php if ($this->session->flashdata('kesalahan_data') !== null) :  ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('kesalahan_data') ?>
                    </div>
                <?php endif; ?>
                <div class="container my-4">
                    <div class='card'>
                        <div class='card-header' style='background-color: #8FBC8F'>INFO PAKET</div>
                        <div class='card-body'>
                            <div class='form-group form-inline'>
                                <div class='col-md-2'>
                                    <label>Nama Paket</label>
                                </div>
                                <div class='col-md-9'>
                                    <input class='form-control' readonly disabled type="text" value='<?= $paket['namprog'] ?>'>
                                </div>
                            </div>

                            <div class='form-group form-inline'>
                                <div class='col-md-2'>
                                    <label>Kuota</label>
                                </div>
                                <div class='col-md-9'>
                                    <input class='form-control' readonly disabled type="text" value='<?= $paket['kuota'] ?>'>
                                </div>
                            </div>

                            <div class='form-group form-inline'>
                                <div class='col-md-2'>
                                    <label>Harga</label>
                                </div>
                                <div class='col-md-9'>
                                    <input class='form-control' readonly disabled type="text" value='<?= $paket['harga'] ?>'>
                                </div>
                            </div>
                            <!--  -->
                        </div>
                    </div>

                    <br>
                    <!-- cari id user -->
                    <?php
                    $koneksi = mysqli_connect('localhost', 'root', '', 'db_simbel');

                    $query = mysqli_query($koneksi, "SELECT max(temp) as kodeTerbesar FROM user");
                    $data = mysqli_fetch_array($query);
                    $id_user = $data['kodeTerbesar'];
                    $urutan = (int) ($id_user);
                    $urutan++;
                    $huruf = "U-00";
                    $id_user = $huruf . $urutan;
                    ?>

                    <!-- cari pendaftaran -->
                    <?php
                    $koneksi = mysqli_connect('localhost', 'root', '', 'db_simbel');

                    $query = mysqli_query($koneksi, "SELECT max(id) as kodeTerbesar FROM pendaftaran");
                    $data = mysqli_fetch_array($query);
                    $id_pendaf = $data['kodeTerbesar'];
                    $id_pendaf++;
                    $id_pen = $id_pendaf;
                    ?>

                    <!-- cari pembayaran -->
                    <?php
                    $koneksi = mysqli_connect('localhost', 'root', '', 'db_simbel');

                    $query = mysqli_query($koneksi, "SELECT max(temp) as kodeTerbesar FROM pembayaran");
                    $data = mysqli_fetch_array($query);
                    $id_pem = $data['kodeTerbesar'];
                    // $sub_kd = substr($id_pem, -1);
                    $urutan1 = $id_pem;
                    $urutan1++;
                    $huruf = "PBY298";
                    $id_pem = $huruf . $urutan1;
                    ?>

                    <form action="<?= base_url('PesanPaket') ?>" method='POST'>
                        <div class='col-md-4'>
                            <div class='form-group'>
                                <input class='form-control' type="text" name='id_user' placeholder='' value="<?= $id_user ?>" readonly required>
                                <input class='form-control' type="text" name='harga' placeholder='' value="<?= $paket['harga'] ?>" readonly required>
                                <input class='form-control' type="text" name='id_prog' placeholder='' value="<?= $paket['id_program'] ?>" readonly required>
                                <input class='form-control' type="text" name='id_pen' placeholder='' value="<?= $id_pen ?>" readonly required>
                                <input class='form-control' type="text" name='id_pem' placeholder='' value="<?= $id_pem ?>" readonly required>

                            </div>
                        </div>
                        <hr>
                        <div class='card'>
                            <div class='card-header' style='background-color: #8FBC8F'>DETAIL SISWA</div>
                            <div class='card-body'>

                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label> Nama</label>
                                            <input class='form-control' type="text" name='nama' placeholder='Nama'>
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label> Email</label>
                                            <input class='form-control' type="email" name='email' placeholder='Email Pemesan'>
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label> No Telp</label>
                                            <input class='form-control' type="text" name='telp' placeholder='telp'>
                                            <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>

                                        </div>
                                    </div>

                                    <div class='clearfix'></div>
                                    <div class='col-md-12 row'>
                                        <div class='form-group col-md-6'>
                                            <label> password</label>
                                            <input class='form-control' type="password" name='password1' placeholder='Password'>
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class='form-group col-md-6'>
                                            <label> password</label>
                                            <input class='form-control' type="password" name='password2' placeholder='ulangi password'>
                                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div>
                                        <button class='btn btn-success float-right ml-3'>Simpan & Lanjutkan</button>
                                    </div>
                                </div>
                    </form>
                </div>
                <!--  -->


            </div>
        </div>

    </div>
</section>