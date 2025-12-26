 <!-- cari id user -->
 <?php
    $koneksi = mysqli_connect('localhost', 'root', '', 'db_simbel');

    $query = mysqli_query($koneksi, "SELECT max(temp) as kodeTerbesar FROM user");
    $data = mysqli_fetch_array($query);
    $id_user = $data['kodeTerbesar'];
    $urutan = (int) ($id_user);
    $urutan++;
    $huruf = "U-00";
    $id_user = $huruf . $urutan;
    ?>
 <!-- cari id guru -->
 <?php
    $koneksi = mysqli_connect('localhost', 'root', '', 'db_simbel');

    $query = mysqli_query($koneksi, "SELECT max(temp) as kodeTerbesar1 FROM guru");
    $data = mysqli_fetch_array($query);
    $id_guru = $data['kodeTerbesar1'];
    // $sub_kd1 = substr($id_guru, -3);
    $urutan1 = $id_guru;
    $urutan1++;
    $huruf1 = "G-00";
    $id_guru = $huruf1 . $urutan1;
    ?>

 <body class="login-body">

     <!--Login Wrapper-->

     <div class="container-fluid login-wrapper">
         <div class="login-box">
             <h1 class="text-center mb-5"><i class="fa fa-rocket text-primary"></i> Sleekadmin</h1>
             <div class="row">
                 <div class="col-md-6 col-sm-6 col-12 login-box-info">
                     <h3 class="mb-4">Sign in</h3>
                     <p class="mb-4">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.</p>
                     <p class="text-center"><a href="" class="btn btn-light">Login here</a></p>
                 </div>
                 <div class="col-md-6 col-sm-6 col-12 login-box-form p-4">
                     <h3 class="mb-2">Sign up</h3>
                     <small class="text-muted bc-description">Create new account</small>
                     <form method="POST" action="<?= base_url('auth/registration'); ?>" class="mt-2">
                         <input type="text" id="id_guru" name="id_guru" class="form-control mt-0" aria-label="Username" aria-describedby="basic-addon1" value="<?= $id_guru ?>" hidden required>
                         <input type="text" id="id_user" name="id_user" class="form-control mt-0" aria-label="Username" aria-describedby="basic-addon1" value="<?= $id_user ?>" hidden required>
                         <div class="input-group mb-3">
                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                             </div>
                             <input type="text" id="name" name="name" class="form-control mt-0" placeholder="Nama Lengkap" aria-label="Username" aria-describedby="basic-addon1" required>
                             <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                         </div>

                         <div class="input-group mb-3">
                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                             </div>
                             <input type="email" class="form-control mt-0" placeholder="email" aria-label="email" id="email" name="email" aria-describedby="basic-addon1" required>
                             <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                         </div>

                         <div class="input-group mb-3">
                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                             </div>
                             <input type="text" id="telp" name="telp" class="form-control mt-0" placeholder="555-098-444" aria-label="phone" aria-describedby="basic-addon1" required>
                         </div>
                         <div class="input-group mb-3">

                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><i class="fab fa-meetup"></i></span>
                             </div>
                             <select class="form-control" id="jekel" name="jekel">
                                 <option value="">-pilih-</option>
                                 <?php foreach ($jekel as $jk) : ?>
                                     <option value="<?= $jk; ?>"> <?= $jk; ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>

                         <div class="input-group mb-3">
                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                             </div>
                             <input type="text" id="alamat" name="alamat" class="form-control mt-0" placeholder="Jl.samudra xxx" aria-label="phone" aria-describedby="basic-addon1" required>
                         </div>

                         <div class="input-group mb-3">
                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                             </div>
                             <input type="text" id="password" name="password" class="form-control mt-0" placeholder="password" aria-label="password" aria-describedby="basic-addon1" required>
                             <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                         </div>

                         <div class="form-group">
                             <button class="btn btn-theme btn-block p-2 mb-1">Register</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>