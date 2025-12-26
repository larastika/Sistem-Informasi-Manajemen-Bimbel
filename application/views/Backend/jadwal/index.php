 <!--Content right-->
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
     <h5 class="mb-3"><strong>Dashboard</strong></h5>

     <!--Dashboard widget-->
     <div class="mt-1 mb-3 button-container">
         <div class="row pl-0">
             <?php foreach ($jeprog as $pg) : ?>
                 <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                     <div class="bg-white border shadow">
                         <div class="media p-4">
                             <div class="align-self-center mr-3 rounded-circle notify-icon bg-theme">
                                 <i class="fa fa-bell"></i>

                             </div>
                             <div class="media-body pl-2">
                                 <h3 class="mt-0 mb-0"><strong><?= $pg['nama_program'] ?></strong></h3>
                                 <p><small class="text-muted bc-description">kuota :<?= $pg['kuota'] ?></small></p>

                                 <a href="<?= base_url('') ?>jadwal/listjadwal/<?= $pg['id'] ?>"><button type="button" class="btn btn-theme">Atur Jadwal</button></a>
                             </div>
                         </div>
                     </div>
                 </div>
             <?php endforeach; ?>
         </div>
     </div>
     <!--/Dashboard widget-->



     <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
         Keterangan : <br>
         Silahkan pilih paket yang ingin diatur jadwal belajarnya <!-- //body -->

     </div>