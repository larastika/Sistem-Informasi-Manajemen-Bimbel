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

        <form action="" method="POST">
            <div class="form-group">
                <input type="text" name="id_user" class="form-control" id="id_user" value="<?= $user['id'] ?> ">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="judul">password baru</label>
                    <input type="password" class="form-control form-control-user" id="password1" name="password1">

                </div>
                <div class="col-sm-6">
                    <label for="judul">ulangi password baru</label>
                    <input type="password" class="form-control form-control-user" id="password2" name="password2">

                </div>
            </div>

            <button type="submit" class="btn btn-primary float-right" name="edit">Ganti Password</button>
        </form>