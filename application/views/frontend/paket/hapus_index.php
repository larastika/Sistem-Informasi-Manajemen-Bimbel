 <!--Content right-->
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">


     <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
         <h5 class="mb-3"><strong>Silahkan Pilih Paket Anda</strong></h5>

         <!-- //body -->
         <div class="row mt-5">

             <?php foreach ($jeprog as $jp) : ?>

                 <div class="col-md-4">

                     <!--PRICE CONTENT START-->
                     <div class="generic_content border shadow clearfix">

                         <!--HEAD PRICE DETAIL START-->
                         <div class="generic_head_price clearfix">

                             <!--HEAD CONTENT START-->
                             <div class="generic_head_content clearfix">

                                 <!--HEAD START-->
                                 <div class="head_bg"></div>
                                 <div class="head">
                                     <span><?= $jp['nama_program'] ?></span>
                                 </div>
                                 <!--//HEAD END-->

                             </div>
                             <!--//HEAD CONTENT END-->

                             <!--PRICE START-->
                             <div class="generic_price_tag clearfix">
                                 <span class="price">
                                     <span class="sign">Rp</span>
                                     <span class="currency"><?= $jp['harga'] ?></span>

                                     <span class="month">/paket</span>
                                 </span>
                             </div>
                             <!--//PRICE END-->

                         </div>
                         <!--//HEAD PRICE DETAIL END-->

                         <!--FEATURE LIST START-->
                         <div class="generic_feature_list">
                             <ul>

                                 <li><span><?= $jp['kuota'] ?></span> Kuota</li>
                             </ul>
                         </div>

                         <!--//FEATURE LIST END-->

                         <!--BUTTON START-->
                         <div class="generic_price_btn clearfix">

                             <a href="<?= base_url(); ?>paket/registrasi/<?= $jp['id_program']; ?>" class="" onclick="return confirm('Yakin ingin memilih paket ini?');">Pilih</a>

                         </div>
                         <!--//BUTTON END-->

                     </div>
                     <!--//PRICE CONTENT END-->

                 </div>
             <?php endforeach; ?>


         </div>


         <!--  -->

     </div>