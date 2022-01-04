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
						<th scope="col">Nama</th>
						<th scope="col">Email</th>
						<th scope="col">Daftar</th>
						<th scope="col">Action</th>

					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($Pengguna as $u) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $u['name']; ?></td>
							<td><?= $u['email']; ?></td>
							<td><?= date('d F Y',  $u['date_created']); ?></td>

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

</div>
<!-- End of Main Content -->
