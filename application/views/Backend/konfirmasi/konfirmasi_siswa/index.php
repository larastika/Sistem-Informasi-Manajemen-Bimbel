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
                         <th>Kode Pembayaran</th>
                         <th>Nama</th>
                         <th>No.telp</th>
                         <th>Program</th>
                         <th>Bukti</th>
                         <th>Status</th>
                         <th>Konfirmasi</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $i = 1 ?>
                     <?php foreach ($konfirmasi as $k) : ?>
                         <tr>
                             <td scope="row"><?= $i++ ?></td>
                             <td><?= $k['idpem']; ?></td>
                             <td><?= $k['name']; ?></td>
                             <td><?= $k['no_telp']; ?></td>
                             <td><?= $k['nama_program']; ?></td>
                             <td>
                                 <a href="<?= base_url('assets/bukti/' . $k['bukti']) ?>" target="_blank">
                                     <img width="50%" src="<?php echo base_url() . '/assets/bukti/' . $k['bukti']; ?>" class="">
                                 </a>
                             </td>
                             <td>
                                 <?php if ($k['stapem'] == 1) { ?>
                                     <span class="badge badge-primary">Lunas/Belum Verifikasi</span>
                                 <?php } else if ($k['stapem'] == 2) { ?>
                                     <span class="badge badge-primary">Lunas/Verifikasi</span>
                                 <?php } else { ?>
                                     <span class="badge badge-danger">Belum Bayar</span>
                                 <?php } ?>
                             </td>
                             <td>
                                 <?php if ($k['stapem'] == 2) { ?>
                                     <a href="<?= base_url() ?>konfirmasi/lunas?kopem=<?= $k['idpem']; ?>&&idpen=<?= $k['id_pendaftaran']; ?>&&status=<?= $k['stapem'] ?>" type="button" class="btn btn-success btn-round" onclick='return confirm("Yakin Ingin Membatakan Verfikasi  ?");'>Batal Verifikasi</a>
                                 <?php } else if ($k['stapem'] == 1) { ?>
                                     <a href="<?= base_url() ?>konfirmasi/lunas?kopem=<?= $k['idpem']; ?>&&idpen=<?= $k['id_pendaftaran']; ?>" type="button" class="btn btn-success btn-round" onclick='return confirm("Yakin Ingin Verifikasi No Pembayaran  ?");'>Verifikasi</a>
                                 <?php } else { ?>
                                     <span class="badge badge-danger">Belum Bayar</span>
                                 <?php } ?>
                             </td>
                             <td>
                                 <a href="<?= base_url(); ?>konfirmasi/hapus?kopem=<?= $k['idpem']; ?>&&idpen=<?= $k['id_pendaftaran']; ?>&&iduser=<?= $k['id_user'] ?>" class=" float-left mb-2 btn btn-danger btn-circle" onclick="return confirm('Yakin ingin menghapus data?');"> <i class="fas fa-trash"></i></a>
                             </td>
                         </tr>
                     <?php endforeach; ?>
                 </tbody>

             </table>
         </div>