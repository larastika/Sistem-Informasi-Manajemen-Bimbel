 <!--Content right-->
 <?php
    function nmbulan($angka)
    {

        switch ($angka) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
    ?>


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
         <form action="" method="post" class="form-inline text-gray-800">

             &nbsp;Tahun : &nbsp;

             <select name="th" id="th" class="form-control mb-3">
                 <option value="">- PILIH -</option>
                 <?php
                    foreach ($list_th as $t) {
                        if ($thn == $t['th']) {
                    ?>
                         <option selected value="<?php echo $t['th'];  ?>"><?php echo $t['th']; ?></option>
                     <?php
                        } else {
                        ?>
                         <option value="<?php echo $t['th']; ?>"><?php echo $t['th']; ?></option>
                 <?php
                        }
                    }
                    ?>
             </select>

             &nbsp;Bulan : &nbsp;

             <select name="bln" id="bln" class="form-control mb-3">
                 <option value="">- PILIH -</option>
                 <?php
                    foreach ($list_bln as $t) {
                        if ($blnnya == $t['bln']) {
                    ?>
                         <option selected value="<?php $t['bln'];  ?>"><?php echo nmbulan($t['bln']); ?></option>
                     <?php
                        } else {
                        ?>
                         <option value="<?php echo $t['bln']; ?>"><?php echo nmbulan($t['bln']); ?></option>
                 <?php
                        }
                    }
                    ?>
             </select>
             &nbsp;Program : &nbsp;
             <select name="kelas" id="kelas" class="form-control mb-3">
                 <option value="">- PILIH -</option>
                 <?php
                    foreach ($program as $k) {
                        if ($kelasnya == $k['id']) {
                    ?>
                         <option selected value="<?php echo $k['id'];  ?>"><?php echo $k['nama_program']; ?></option>
                     <?php
                        } else {
                        ?>
                         <option value="<?php echo $k['id'];  ?>"><?php echo $k['nama_program']; ?></option>
                 <?php
                        }
                    }
                    ?>
             </select>

             &nbsp;<button type="submit" class="btn btn-primary mb-3"><i class="fa fa-search"></i> Cari</button>
             <?php if ($blnnya == '' || $thn == '' || $kelasnya == '') { ?>
                 &nbsp;<a target="_blank" href="" class="btn btn-danger mb-3" hidden><i class="fa fa-print"></i> Cetak</a>
             <?php } else { ?>
                 &nbsp;<a target="_blank" href="<?= base_url(); ?>data/cetak_siswa/<?php echo $thn  ?>/<?php echo $blnnya  ?>/<?php echo $kelasnya  ?>" class="btn btn-danger mb-3"><i class="fa fa-print"></i> Cetak</a>
             <?php } ?>
         </form>

         <!-- <div>
             &nbsp;<a target="_blank" href="<?= base_url(); ?>data/cetak_siswa" class="btn btn-danger mb-3"><i class="fa fa-print"></i> Cetak</a>
         </div> -->

         <div class="table-responsive">
             <table id="example" class="table table-striped table-bordered">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>Nama</th>
                         <th>kelas</th>
                         <th>jenis kelamin</th>
                         <th>Tempat/Tanggal Lahir</th>
                         <th>sekolah</th>
                         <th>Nama Ortu</th>
                         <th>Alamat</th>
                         <th>Program</th>
                         <th>Reset Password</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        if ($blnnya == '' || $thn == '' || $kelasnya == '') {
                            echo "<tr><td colspan='9' align='center'>SILAHKAN PILIH TAHUN DAN BULAN  SECARA LENGKAP</td></tr>";
                        } else {
                        ?>
                         <?php $i = 1 ?>
                         <?php foreach ($siswa as $k) : ?>
                             <tr>
                                 <td scope="row"><?= $i++ ?></td>
                                 <td><?= $k['nama']; ?></td>
                                 <td><?= $k['kelas']; ?></td>
                                 <td><?= $k['jenis_kelamin']; ?></td>
                                 <td><?= $k['tempat_lahir']; ?>/<?= $k['tgl_lahir']; ?></td>
                                 <td><?= $k['sekolah']; ?></td>
                                 <td><?= $k['nama_ortu']; ?></td>
                                 <td><?= $k['alamat']; ?></td>
                                 <td><?= $k['namprog']; ?></td>
                                 <td>
                                     <a href="<?= base_url() ?>data/reset_password?id_user=<?= $k['id_user']; ?>" type="button" class="btn btn btn-theme btn-round" onclick='return confirm("Yakin Ingin Reset Password Guru?");'>Reset Password</a>
                                 </td>


                             </tr>
                         <?php endforeach; ?>
                     <?php } ?>
                 </tbody>

             </table>
         </div>