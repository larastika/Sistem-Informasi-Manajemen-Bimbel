 <!--Content right-->
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">


     <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">


         <!-- <h6 class="mb-2">Datatable</h6> -->
         <div class="row border-bottom mb-4">
             <div class="col-sm-8 pt-2">
                 <h6 class="mb-4 bc-header"><?= $title ?></h6>
             </div>
         </div>
         <div>
             &nbsp;<a target="_blank" href="<?= base_url(); ?>siswa/cetak_jadwal" class="btn btn-danger mb-3"><i class="fa fa-print"></i> Cetak</a>
         </div>

         <div class="table-responsive">
             <table id="example" class="table table-striped table-bordered">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>Nama MataPelajaran</th>
                         <th>Nama Guru</th>
                         <th>Hari</th>
                         <th>Jam</th>

                     </tr>
                 </thead>
                 <tbody>
                     <?php $i = 1 ?>
                     <?php foreach ($jadmapel as $m) : ?>
                         <tr>
                             <td scope="row"><?= $i++ ?></td>
                             <td><?= $m['nama_mapel']; ?></td>
                             <td><?= $m['nama_guru']; ?></td>
                             <td><?= $m['hari']; ?></td>
                             <td><?= $m['jam']; ?></td>
                         </tr>
                     <?php endforeach; ?>
                 </tbody>

             </table>
         </div>