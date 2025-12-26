 <!--Content right-->
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">


     <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
         <h6 class="mb-3">Tambah Data Siswa</h6>

         <form action="" method="post">

             <div class="form-group ">
                 <label for="nip">Nama Program</label>
                 <input type="text" name="nama" class="form-control" id="nama" value="<?= $jadwal['namprog'] ?>" readonly>
                 <small class="form-text text-danger"><?= form_error('nama'); ?></small>
             </div>

             <div class="form-group">
                 <label for="kategori">Mata Pelajaran</label>
                 <select class="form-control" id="mapel" name="mapel">
                     <option value="">-pilih-</option>
                     <?php foreach ($mapel as $m) : ?>
                         <?php if ($m['id'] == $jadwal['id_mapel']) : ?>
                             <option value="<?= $m['id'] ?>" selected> <?= $m['nama_mapel']; ?></option>
                         <?php else : ?>
                             <option value="<?= $m['id'] ?>"> <?= $m['nama_mapel']; ?></option>
                         <?php endif; ?>
                     <?php endforeach; ?>
                 </select>
                 <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
             </div>

             <div class="form-group">
                 <label for="kategori">Nama Guru</label>
                 <select class="form-control" id="guru" name="guru">
                     <option value="">-pilih-</option>
                     <?php foreach ($guru as $g) : ?>
                         <?php if ($g['id'] == $jadwal['idgur']) : ?>
                             <option value="<?= $g['id'] ?>" selected> <?= $g['nama_guru']; ?></option>
                         <?php else : ?>
                             <option value="<?= $g['id'] ?>"> <?= $g['nama_guru']; ?></option>
                         <?php endif; ?>
                     <?php endforeach; ?>
                 </select>
                 <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
             </div>

             <div class="form-group">
                 <label for="kategori">Hari</label>
                 <select class="form-control" id="hari" name="hari">
                     <option value="">-pilih-</option>
                     <?php foreach ($hari as $h) : ?>
                         <?php if ($h == $jadwal['hari']) : ?>
                             <option value="<?= $h ?>" selected> <?= $h; ?></option>
                         <?php else : ?>
                             <option value="<?= $h ?>"> <?= $h; ?></option>
                         <?php endif; ?>
                     <?php endforeach; ?>
                 </select>
                 <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
             </div>


             <div class="form-group">
                 <label for="nip">Jam</label>
                 <input type="time" name="jam" class="form-control" id="jam" value="<?= $jadwal['jam'] ?>">
                 <small class="form-text text-danger"><?= form_error('jam'); ?></small>
             </div>
             <div class="form-group">
                 <label for="nip">keterangan</label>
                 <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $jadwal['keterangan'] ?>">
                 <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
             </div>

             <div class="form-group">
                 <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
             </div>
         </form>
     </div>