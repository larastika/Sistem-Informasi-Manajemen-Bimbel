<link rel="stylesheet" href="<?= base_url() ?>assets/css/pricing.css">
<section class="services-section ftco-section" id="about-section">
    <div class="container">
        <div class="row justify-content-center pb-3">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-4">ABOUT</h2>
                <p>Selamat datang di website Bimbel Bengkulu Warrior Reborn
                </p>
            </div>
        </div>
        <div class="row no-gutters d-flex">
            <div class="col-md-6 col-lg-6 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block text-justify">
                    <div class="media-body">
                        <h3 class="heading mb-3"></h3>
                        <p> Bengkulu Warrior Reborn adalah salah satu lembaga bimbingan belajar yang beroperasi di Kota Bengkulu.
                            Bimbingan belajar ini berfokus untuk membimbing orang-orang yang akan mengikuti seleksi kedinasan.
                            Bengkulu warrior reborn merupakan cabang dari bimbel primadini caraka yang beroperasi di Bogor.
                            Primadini Caraka merupakan salah satu bimbel terbaik di Indonesia.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block text-justify">
                    <div class="media-body">
                        <h3 class="heading mb-3"></h3>
                        <p>Pada awal berdirinya Bimbel ini bernama Bengkulu Warriors Training Camp.
                            Namun Sekarang berubah nama menjadi Bengkulu Warrors Reborn.
                            Perubahan nama ini bermaksud melahirkan kembali program-program yang lebih ari sebelumnya.
                            Pemilik yayasan bimbel Bengkulu Warriors Reborn adalah Mom Diah Nurhadini, S.e., M.PD yang berdomisili di Bogor.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="services-section ftco-section" id="vm-section">
    <div class="containerr">
        <div class="row justify-content-center pb-3">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-4"> Visi Dan Misi</h2>
            </div>
        </div>
        <hr>
        VISI:<br>
        Menjadi lembaga pendidikan dan pelatihan profesional yang menghasilkan peserta didik siap seleksi baik secara mental, akademik, psikologi serta sehat secara jasmani yang unggul<br>
        <br><br>
        MISI:<br>
        Menyiapkan peserta didik yang siap seleksi dan siap kerja serta memiliki kompetensi yang unggul<br>

        <br><br>

        Untuk info lebih lanjut, bisa menghubungi kami di:<br>
        Instagram: bengkuluwarriorsreborn<br>
        Whatsapp : 081379345169<br>
    </div>
</section>


<section class="services-section ftco-section" id="Tujuan-section">
    <div class="container">
        <div class="row justify-content-center pb-3">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-4">Paket Pilihan</h2>
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

                                            <span class="month">/Paket</span>
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
                                <?php if ($jp['kuota'] != 0) { ?>
                                    <div class="generic_price_btn clearfix">
                                        <a href="<?= base_url(); ?>paket/registrasi/<?= $jp['id']; ?>" class="" onclick="return confirm('Yakin ingin memilih paket ini?');">Pilih</a>
                                    </div>
                                <?php } else { ?>
                                    <div class=" clearfix">
                                        <a href="#" class="">Kuota Untuk Program Ini Habis</a>
                                    </div>
                                <?php } ?>



                                <!--//BUTTON END-->

                            </div>
                            <!--//PRICE CONTENT END-->

                        </div>
                    <?php endforeach; ?>


                </div>

            </div>
        </div>

    </div>
</section>