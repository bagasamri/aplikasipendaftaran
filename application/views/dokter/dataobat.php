<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">

		<div class="col-lg">

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
