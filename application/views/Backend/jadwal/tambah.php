 <!--Content right-->
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">


     <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
         <h6 class="mb-3">Tambah Data Siswa</h6>

         <form action="" method="post">
             <input type="text" name="jenis_program" class="form-control" id="jenis_program" value="<?= $jeprog['id'] ?>" readonly>
             <div class="form-group ">
                 <label for="nip">Nama Program</label>
                 <input type="text" name="nama" class="form-control" id="nama" value="<?= $jeprog['nama_program'] ?>" readonly>
                 <small class="form-text text-danger"><?= form_error('nama'); ?></small>
             </div>

             <div class="form-group">
                 <label for="kategori">Mata Pelajaran</label>
                 <select class="form-control" id="mapel" name="mapel">
                     <option value="">-pilih-</option>
                     <?php foreach ($mapel as $m) : ?>
                         <option value="<?= $m['id'] ?>"> <?= $m['nama_mapel'] ?></option>
                     <?php endforeach; ?>
                 </select>
                 <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
             </div>

             <div class="form-group">
                 <label for="kategori">Nama Guru</label>
                 <select class="form-control" id="guru" name="guru">
                     <option value="">-pilih-</option>
                     <?php foreach ($guru as $g) : ?>
                         <option value="<?= $g['id'] ?>"> <?= $g['nama_guru'] ?></option>
                     <?php endforeach; ?>
                 </select>
                 <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
             </div>
             <div class="form-group">
                 <label for="kategori">Hari</label>
                 <select class="form-control" id="hari" name="hari">
                     <option value="">-pilih-</option>
                     <?php foreach ($hari as $h) : ?>
                         <option value="<?= $h ?>"> <?= $h ?></option>
                     <?php endforeach; ?>
                 </select>
                 <?= form_error('hari', '<small class="text-danger pl-3">', '</small>'); ?>
             </div>
             <div class="form-group">
                 <label for="nip">Jam</label>
                 <input type="time" name="jam" class="form-control" id="jam">
                 <small class="form-text text-danger"><?= form_error('jam'); ?></small>
             </div>
             <div class="form-group">
                 <label for="nip">keterangan</label>
                 <input type="text" name="keterangan" class="form-control" id="keterangan">
                 <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
             </div>

             <div class="form-group">
                 <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
             </div>
         </form>
     </div>