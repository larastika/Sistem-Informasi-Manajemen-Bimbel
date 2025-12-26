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
                 <h6 class="mb-4 bc-header"><?= $title ?></h6>
             </div>
         </div>
         <div>
             &nbsp;<a target="_blank" href="<?= base_url(); ?>data/cetak_guru" class="btn btn-danger mb-3"><i class="fa fa-print"></i> Cetak</a>
         </div>
         <div class="table-responsive">
             <table id="example" class="table table-striped table-bordered">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>Nama</th>
                         <th>jenis kelamin</th>
                         <th>Alamat</th>
                         <th>Telp</th>
                         <th>Reset Password</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $i = 1 ?>
                     <?php foreach ($guru as $gr) : ?>
                         <tr>
                             <td scope="row"><?= $i++ ?></td>
                             <td><?= $gr['nama_guru']; ?></td>
                             <td><?= $gr['jekel']; ?></td>
                             <td><?= $gr['alamat']; ?></td>
                             <td><?= $gr['telp']; ?></td>
                             <td>
                                 <a href="<?= base_url() ?>data/reset_gpassword?id_user=<?= $gr['id_user']; ?>" type="button" class="btn btn btn-theme btn-round" onclick='return confirm("Yakin Ingin Reset Password Guru?");'>Reset Password</a>
                             </td>
                         </tr>
                     <?php endforeach; ?>
                 </tbody>

             </table>
         </div>