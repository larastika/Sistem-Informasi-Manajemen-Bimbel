<!-- Nav Item - Pages Collapse Menu -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
	</div>
	<div class="card-body">


		<?= $this->session->flashdata('messege'); ?>
		<a href="<?= base_url(); ?>pegawai/tambah/" class="btn btn-primary mb-3">Tambah pegawai </a>
		<a target="_blank" href="<?= base_url(); ?>c_laporan/cetak_laptran/?>" class="btn btn-danger mb-3"><i class="fa fa-print"></i> Cetak</a>
		<div class="table-responsive text-gray-900">
			<table class="table table-hover" id="dataTable" width="100%">
				<thead>
					<tr class="text-gray-900">
						<th scope="col">#</th>
						<th scope="col">id</th>
						<th scope="col">nama Pegawai</th>
						<th scope="col">Posisi</th>
						<th scope="col">Gaji</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody class="text-gray-900">
					<?php $i = 1 ?>
					<?php foreach ($pegawai as $pg) : ?>
						<tr>
							<th scope="row"><?= $i++ ?></th>
							<td><?= $pg['id']; ?></td>
							<td><?= $pg['nama']; ?></td>
							<td><?= $pg['namapos']; ?></td>
							<td><?= $pg['gajih']; ?></td>
							<td>
								<a href="<?= base_url(); ?>pegawai/edit/<?= $pg['id']; ?>" class=" float-left mb-2 btn btn-success btn-circle mr-1"> <i class="far fa-edit"></i></a>
								<a href="<?= base_url(); ?>pegawai/hapus/<?= $pg['id']; ?>" class=" float-left mb-2 btn btn-danger btn-circle" onclick="return confirm('Yakin ingin menghapus data?');"> <i class="fas fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<!-- /.container-fluid -->

	</div>
</div>
<!-- End of Main Content -->