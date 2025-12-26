 <!--Content right-->
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">


     <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
         <?php if ($this->session->flashdata('flash')) : ?>
             <div class="alert alert-info alert-dismissible fade show" role="alert">
                 <p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
         <?php endif ?>

         <!-- <h6 class="mb-2">Datatable</h6> -->
         <div class="row border-bottom mb-4">
             <div class="col-sm-8 pt-2">
                 <h6 class="mb-4 bc-header"><?= $title ?> </h6>
             </div>

             <div class="col-sm-4 text-right pb-3">

                 <a class="btn btn-round btn-theme" href="<?= base_url(); ?>jadwal/tambah/<?= $id_prog ?>"><i class="fa fa-plus"></i> Tambah Program</a>
             </div>
         </div>

         <div class="table-responsive">
             <table id="example" class="table table-striped table-bordered">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>Mata Pelajaran</th>
                         <th>Nama Guru</th>
                         <th>Nama Program</th>
                         <th>hari</th>
                         <th>jam</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $i = 1 ?>
                     <?php foreach ($jadwal as $j) : ?>
                         <tr>
                             <td scope="row"><?= $i++ ?></td>
                             <td><?= $j['mapel']; ?></td>
                             <td><?= $j['namgu']; ?></td>
                             <td>
                                 <span class="badge badge-primary"><?= $j['namprog']; ?></span>
                             </td>
                             <td><?= $j['hari']; ?></td>
                             <td><?= $j['jam']; ?></td>
                             <td style="width: 120px;" class="align-middle">
                                 <a href="<?= base_url(); ?>jadwal/edit/<?= $j['idjad']; ?>/<?= $id_prog ?>" class="btn btn-theme mr-1"><i class="fa fa-pencil-square-o"></i></a>
                                 <a href="<?= base_url(); ?>jadwal/hapus/<?= $j['idjad']; ?>/<?= $id_prog ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fa fa-trash-o"></i></a>

                             </td>
                         </tr>
                     <?php endforeach; ?>
                 </tbody>

             </table>
         </div>