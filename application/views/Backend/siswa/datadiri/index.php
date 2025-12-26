 <!--Content right-->
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">


     <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
         <div class="row border-bottom mb-4">
             <div class="col-sm-8 pt-2">
                 <h6 class="mb-3">Detail Siswa</h6>
             </div>

             <div class="col-sm-4 text-right pb-3">
                 <!-- <button class="btn btn-round btn-theme" href="<?= base_url(); ?>pegawai/tambah/"><i class="fa fa-plus"></i> Tambah Program</button> -->
                 <?php if ($siswa['id'] != null) : ?>
                     <a class="btn btn-round btn-theme" href="<?= base_url(); ?>datadiri/perbarui/<?= $siswa['id'] ?>"><i class="fa fa-plus"></i> Perbarui Data</a>
                 <?php else : ?>
                     <a class="btn btn-round btn-theme" href="<?= base_url(); ?>datadiri/lengkapidata/<?= $siswa['id'] ?>"><i class="fa fa-plus"></i> Lengkapi Data</a>
                 <?php endif ?>

             </div>
         </div>
         <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
             <?php if ($this->session->flashdata('flash')) : ?>
                 <div class="alert alert-info alert-dismissible fade show" role="alert">
                     <p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
             <?php endif ?>
             <!--  -->
             <div class="table-responsive text-gray-800">
                 <table width="100%">
                     <tr>
                         <td>Nama Lengkap</td>
                         <td>:</td>
                         <td><?= $siswa['nama'] ?></td>
                     </tr>
                     <tr>
                         <td>Kelas</td>
                         <td>:</td>
                         <td><?= $siswa['kelas'] ?></td>
                     </tr>
                     <tr>
                         <td>Jenis Kelamin</td>
                         <td>:</td>
                         <td>
                             <?php if ($siswa['jenis_kelamin'] == null) : ?>
                                 -
                             <?php else : ?>
                                 <?= $siswa['jenis_kelamin'] ?>
                             <?php endif ?>
                         </td>
                     </tr>
                     <tr>
                         <td>Tempat Lahir</td>
                         <td>:</td>
                         <td>
                             <?php if ($siswa['tempat_lahir'] == null) : ?>
                                 -
                             <?php else : ?>
                                 <?= $siswa['tempat_lahir'] ?>
                             <?php endif ?>
                         </td>
                     </tr>
                     <tr>
                         <td>Tanggal Lahir</td>
                         <td>:</td>
                         <td>
                             <?php if ($siswa['tgl_lahir'] == null) : ?>
                                 -
                             <?php else : ?>
                                 <?= $siswa['tgl_lahir']; ?>
                             <?php endif ?>
                         </td>
                     </tr>
                     <tr>
                         <td>Sekolah</td>
                         <td>:</td>
                         <td>
                             <?php if ($siswa['sekolah'] == null) : ?>
                                 -
                             <?php else : ?>
                                 <?= $siswa['sekolah']; ?>
                             <?php endif ?>
                         </td>
                     </tr>
                     <tr>
                         <td>Nama Ortu</td>
                         <td>:</td>
                         <td>
                             <?php if ($siswa['nama_ortu'] == null) : ?>
                                 -
                             <?php else : ?>
                                 <?= $siswa['nama_ortu']; ?>
                             <?php endif ?>
                         </td>
                     </tr>
                     <tr>
                         <td>Pekerjaan Ortu</td>
                         <td>:</td>
                         <td>
                             <?php if ($siswa['pekerjaan_ortu'] == null) : ?>
                                 -
                             <?php else : ?>
                                 <?= $siswa['pekerjaan_ortu']; ?>
                             <?php endif ?>
                         </td>
                     </tr>
                     <tr>
                         <td>Alamat</td>
                         <td>:</td>
                         <td>
                             <?php if ($siswa['alamat'] == null) : ?>
                                 -
                             <?php else : ?>
                                 <?= $siswa['alamat']; ?>
                             <?php endif ?>
                         </td>
                     </tr>
                 </table>

             </div>
             <!--  -->

         </div>