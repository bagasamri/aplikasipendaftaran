<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>
	<div class="card mb-3 col-lg-6">
		<div class="row g-0">

			<div class="col-md-8">
				<div class="card-body">


					<table width="745" cellspacing="0" cellpadding="5">

						<tr>
							<td>Nama</td>
							<td>
								<h5 class="card-title"><?= $user['name']; ?></h5>
							</td>
							<td rowspan="10" align="center"><img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="210" height="313"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?= $user['email']; ?></td>
						</tr>
						<tr>
							<td>Nomor Identitas</td>
							<td><?= $user['no_identitas']; ?></td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td><?= $user['tgl_lahir']; ?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td><?= $user['jenis_kelamin']; ?></td>
						</tr>
						<tr>
							<td>Nomor Telepon</td>
							<td><?= $user['no_tlp']; ?></td>
						</tr>

						<tr>
							<td>Alamat</td>
							<td><?= $user['alamat']; ?></td>
						</tr>
						<tr>
							<td>Member since</td>
							<td><?= date('d F Y',  $user['date_created']); ?></td>
						</tr>

					</table>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
