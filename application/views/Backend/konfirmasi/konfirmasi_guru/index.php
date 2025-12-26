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

         <div class="table-responsive">
             <table id="example" class="table table-striped table-bordered">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>Nama</th>
                         <th>Jenis Kelamin</th>
                         <th>Alamat</th>
                         <th>No.telp</th>
                         <th>Status</th>
                         <th>Verifikasi</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $i = 1 ?>
                     <?php foreach ($konfirmasiguru as $kg) : ?>
                         <tr>
                             <td scope="row"><?= $i++ ?></td>
                             <td><?= $kg['nama_guru']; ?></td>
                             <td><?= $kg['jekel']; ?></td>
                             <td><?= $kg['alamat']; ?></td>
                             <td><?= $kg['telp']; ?></td>

                             <td>
                                 <?php if ($kg['is_active'] == 1) { ?>
                                     <span class="badge badge-primary">Terverifikasi</span>
                                 <?php } else { ?>
                                     <span class="badge badge-danger">Belum Verifikasi</span>
                                 <?php } ?>
                             </td>
                             <td>
                                 <?php if ($kg['is_active'] == 1) { ?>
                                     <a href="<?= base_url() ?>konfirmasi/status?id_user=<?= $kg['id_user']; ?>&&status=<?= $kg['is_active'] ?>" type="button" class="btn btn-success btn-round" onclick='return confirm("Yakin Ingin Membatakan Verfikasi  ?");'>Batal Verifikasi</a>
                                 <?php } else { ?>
                                     <a href="<?= base_url() ?>konfirmasi/status?id_user=<?= $kg['id_user']; ?>" type="button" class="btn btn-success btn-round" onclick='return confirm("Yakin Ingin Verfikasi  ?");'>Verifikasi</a>
                                 <?php } ?>

                             </td>
                             <td>
                                 <a href="<?= base_url(); ?>konfirmasi/hapusguru?id_user=<?= $kg['id_user']; ?>&&id_guru=<?= $kg['idgur']; ?>" class=" float-left mb-2 btn btn-danger btn-circle" onclick="return confirm('Yakin ingin menghapus data?');"> <i class="fas fa-trash"></i></a>
                             </td>
                         </tr>
                     <?php endforeach; ?>
                 </tbody>

             </table>
         </div>