 <!--Content right-->
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">


     <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
         <h6 class="mb-3">Tambah Data Siswa</h6>

         <form action="" method="post">

             <div class="form-group floating-label">
                 <input type="text" name="id_user" class="form-control" id="id_user" value="<?= $user['id'] ?>" readonly required>
                 <small class="form-text text-danger"><?= form_error('id_user'); ?></small>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="nama" class="form-control" id="nama" value="<?= $user['name'] ?>" readonly>

                 <small class="form-text text-danger"><?= form_error('nama'); ?></small>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="kelas" class="form-control" id="kelas" required>
                 <label for="">Kelas</label>
                 <small class="form-text text-danger"><?= form_error('kelas'); ?></small>
             </div>
             <div class="form-group">
                 <label for="kategori">Jenis Kelamin</label>
                 <select class="form-control" id="jekel" name="jekel">
                     <option value="">-pilih-</option>
                     <?php foreach ($jeniskel as $jk) : ?>
                         <option value="<?= $jk; ?>"> <?= $jk; ?></option>
                     <?php endforeach; ?>
                 </select>
                 <?= form_error('jekel', '<small class="text-danger pl-3">', '</small>'); ?>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="tempatlahir" class="form-control" id="tempatlahir" required>
                 <label for="">Tempat Lahir</label>
                 <small class="form-text text-danger"><?= form_error('tempatlahir'); ?></small>
             </div>
             <div class="form-group">
                 <label for="kategori">Tanggal Lahir</label>

                 <input type="date" name="tanggallahir" class="form-control" id="tanggallahir" required>
                 <small class="form-text text-danger"><?= form_error('tanggallahir'); ?></small>

             </div>
             <div class="form-group floating-label">
                 <input type="text" name="sekolah" class="form-control" id="sekolah" required>
                 <label for="">Sekolah</label>
                 <small class="form-text text-danger"><?= form_error('sekolah'); ?></small>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="namaortu" class="form-control" id="namaortu" required>
                 <label for="">Nama Orang Tua</label>
                 <small class="form-text text-danger"><?= form_error('namaortu'); ?></small>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="pekerjaanortu" class="form-control" id="pekerjaanortu" required>
                 <label for="">Pekerjaan Orang Tua</label>
                 <small class="form-text text-danger"><?= form_error('pekerjaanortu'); ?></small>
             </div>
             <div class="form-group floating-label">
                 <input type="text" name="alamat" class="form-control" id="alamat" required>
                 <label for="">Alamat</label>
                 <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
             </div>
             <div class="form-group">
                 <button type="submit" class="btn btn-primary">Simpan Data</button>
             </div>
         </form>
     </div>