 <!--Content right-->
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">


     <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
         <h6 class="mb-3">Tambah Data Siswa</h6>

         <form action="" method="post">

             <div class="form-group floating-label">
                 <input type="text" name="id_user" class="form-control" id="id_user" value="<?= $siswa['id_user'] ?>" readonly required>
                 <small class="form-text text-danger"><?= form_error('id_user'); ?></small>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="nama" class="form-control" id="nama" value="<?= $siswa['nama'] ?>">

                 <small class="form-text text-danger"><?= form_error('nama'); ?></small>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="kelas" class="form-control" id="kelas" value="<?= $siswa['kelas'] ?>" required>
                 <label for="">Kelas</label>
                 <small class=" form-text text-danger"><?= form_error('kelas'); ?></small>
             </div>
             <div class=" form-group">
                 <label for="jenis_kelamin">jenis kelamin</label>
                 <select class="form-control" id="jekel" name="jekel">
                     <?php foreach ($jekel as $jk) : ?>

                         <?php if ($jk ==  $siswa['jenis_kelamin']) : ?>

                             <option value="<?= $jk; ?>" selected> <?= $jk; ?></option>
                         <?php else : ?>

                             <option value="<?= $jk; ?>"> <?= $jk; ?></option>
                         <?php endif; ?>
                     <?php endforeach; ?>
                 </select>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="tempatlahir" class="form-control" id="tempatlahir" value="<?= $siswa['tempat_lahir'] ?>" required>
                 <label for="">Tempat Lahir</label>
                 <small class=" form-text text-danger"><?= form_error('tempatlahir'); ?></small>
             </div>
             <div class="form-group">
                 <label for="kategori">Tanggal Lahir</label>

                 <input type="date" name="tanggallahir" class="form-control" id="tanggallahir" value="<?= $siswa['tgl_lahir'] ?>" required>
                 <small class="form-text text-danger"><?= form_error('tanggallahir'); ?></small>

             </div>
             <div class="form-group floating-label">
                 <input type="text" name="sekolah" class="form-control" id="sekolah" value="<?= $siswa['sekolah'] ?>" required>
                 <label for="">Sekolah</label>
                 <small class="form-text text-danger"><?= form_error('sekolah'); ?></small>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="namaortu" class="form-control" id="namaortu" value="<?= $siswa['nama_ortu'] ?>" required>
                 <label for="">Nama Orang Tua</label>
                 <small class="form-text text-danger"><?= form_error('namaortu'); ?></small>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="pekerjaanortu" class="form-control" id="pekerjaanortu" value="<?= $siswa['pekerjaan_ortu'] ?>" required>
                 <label for="">Pekerjaan Orang Tua</label>
                 <small class="form-text text-danger"><?= form_error('pekerjaanortu'); ?></small>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $siswa['alamat'] ?>" required>
                 <label for="">Alamat</label>
                 <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
             </div>
             <div class="form-group">
                 <button type="submit" class="btn btn-primary">Perbarui Data</button>
             </div>
         </form>
     </div>