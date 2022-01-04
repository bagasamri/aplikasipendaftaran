<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">

		<div class="col-lg">
			<?= form_error('admin', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<?= $this->session->flashdata('message'); ?>
			<a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Role</a>
			<table id="example1" class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama</th>
						<th scope="col">Nama Lengkap</th>
						<th scope="col">Dokter</th>
						<th scope="col">Action</th>

					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($dokter as $d) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $d['nama']; ?></td>
							<td><?= $d['nama_lengkap']; ?></td>
							<td><?= $d['dokter']; ?></td>


							<td>

								<a href="<?= base_url('admin/editDokter' . $d['id']);  ?>" class="badge badge-success">Edit</a>
								<a href="<?= base_url('admin/hapusDokter' . $d['id']);  ?>" class="badge badge-danger">Delete</a>
							</td>

						</tr>
						<?php $i++; ?>
					<?php endforeach; ?>


				</tbody>
			</table>



		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New Role</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('admin/dataDokter'); ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Input Nama Lengkap">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="dokter" name="dokter" placeholder="Input Dokter">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>
