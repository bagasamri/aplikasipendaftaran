<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">

		<div class="col-lg">
			<?= form_error('admin', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<?= $this->session->flashdata('message'); ?>
			<a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Rekam Medis</a>
			<table id="example1" class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Tanggal Periksa</th>
						<th scope="col">Nama Pasien</th>
						<th scope="col">Nama Dokter</th>
						<th scope="col">Nomo Rm</th>
						<th scope="col">Berat badan</th>
						<th scope="col">Tinggi Badan</th>
						<th scope="col">Keluhan</th>
						<th scope="col">Diagnosa</th>
						<th scope="col">Keterangan</th>
						<th scope="col">Action</th>

					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($Rekamedis as $r) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $r['tgl_pemeriksaan']; ?></td>
							<td><?= $r['name']; ?></td>
							<td><?= $r['nama_lengkap']; ?></td>
							<td><?= $r['no_rm']; ?></td>
							<td><?= $r['berat']; ?></td>
							<td><?= $r['tinggi']; ?></td>
							<td><?= $r['keluhan']; ?></td>
							<td><?= $r['diagnosa']; ?></td>
							<td><?= $r['keterangan']; ?></td>


							<td>

								<a href="" class="badge badge-success">Edit</a>
								<a href="" class="badge badge-danger">Delete</a>
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


<!-- End of Main Content -->
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New Rekam Medis</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('dokter/rekamedis'); ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<input type="date" class="form-control" id="tgl_pemeriksaan" name="tgl_pemeriksaan" placeholder="Input Pemeriksaan">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="id_pasien" name="id_pasien" placeholder="Input Nama Pasien">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="id_dokter" name="id_dokter" placeholder="Input Nama Dokter">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="no_rm" name="no_rm" placeholder="Input Rekam Medis">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="berat" name="berat" placeholder="Input Berat Badan">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="tinggi" name="tinggi" placeholder="Input Tinggi Badan">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="keluhan" name="keluhan" placeholder="Input Keluhan">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="diagnosa" name="diagnosa" placeholder="Input Diagnosa">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Input Keterangan">
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
