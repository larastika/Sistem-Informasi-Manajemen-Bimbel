<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">

			<div class="card">
				<div class="card-header">
					Form Edit Data Pegawai
				</div>
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="nip">Nama</label>
							<input type="text" name="nama" class="form-control" id="nama" value="<?= $pegawai['nama'] ?>">
							<small class="form-text text-danger"><?= form_error('nama'); ?></small>
						</div>

						<div class=" form-group">
							<label for="kategori">Posisi</label>
							<select class="form-control" id="posisi" name="posisi">
								<?php foreach ($posisi as $ps) : ?>
									<?php if ($ps['id'] == $pegawai['posisi']) : ?>
										<option value="<?= $ps['id']; ?>" selected> <?= $ps['posisi']; ?></option>
									<?php else : ?>
										<option value="<?= $ps['id']; ?>"> <?= $ps['posisi']; ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>


						<button type="submit" name="tambah" class="btn btn-primary float-right">edit Data</button>
					</form>
				</div>
			</div>

		</div>
	</div>

</div>