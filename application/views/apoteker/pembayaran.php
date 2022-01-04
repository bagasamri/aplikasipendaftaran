<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">

		<div class="col-lg">
			<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<?= $this->session->flashdata('message'); ?>
			<a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Pembayaran</a>
			<table id="example1" class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Nama Pasien</th>
						<th scope="col">Kode Pembayaran</th>
						<th scope="col">Tarif</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>

					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($Pembayaran as $o) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $o['tgl_byr']; ?></td>
							<td><?= $o['id_pengguna']; ?></td>
							<td><?= $o['kd_pembayaran']; ?></td>
							<td><?= $o['tarif']; ?></td>
							<td><?= $o['status']; ?></td>
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
			<form action="<?= base_url('admin/role'); ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="role" name="role" placeholder="Input Nama Obat">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="role" name="role" placeholder="Input Jenis Obat">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="role" name="role" placeholder="Input Jumlah Obat">
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
