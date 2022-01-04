<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">

		<div class="col-lg">
			<?= form_error('apoteker', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<?= $this->session->flashdata('message'); ?>
			<a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Obat</a>
			<table id="example1" class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama Obat</th>
						<th scope="col">Jenis Obat</th>
						<th scope="col">Jumlah Obat</th>
						<th scope="col">Action</th>

					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($Obat as $o) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $o['nama_obat']; ?></td>
							<td><?= $o['jenis_obat']; ?></td>
							<td><?= $o['jumlah_obat']; ?></td>
							<td>

								<a href="" class="badge badge-success">Edit</a>
								<a href="" class="badge badge-danger">Delete</a>
								</>

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
				<h5 class="modal-title" id="exampleModalLabel">Add New Obat</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('apoteker/dataObat'); ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="Input Nama Obat">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="jenis_obat" name="jenis_obat" placeholder="Input Jenis Obat">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="jumlah_obat" name="jumlah_obat" placeholder="Input Jumlah Obat">
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
