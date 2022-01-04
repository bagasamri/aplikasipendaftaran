<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-8">

			<?= form_open_multipart('user/edit'); ?>
			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label"> Email</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Full Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
					<small class="text-danger"><?= form_error('name') ?></small>
				</div>
			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Nomor Identitas</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" onkeypress="return hanyaAngka(event)" id="no_identitas" name="no_identitas" value="<?= $user['no_identitas']; ?>">
					<small class="text-danger"><?= form_error('no_identitas') ?></small>
				</div>
			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-10">
					<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $user['tgl_lahir']; ?>">
					<small class="text-danger"><?= form_error('tgl_lahir') ?></small>
				</div>
			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-10">
					<select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $user['jenis_kelamin']; ?>">
						<option><?= $user['jenis_kelamin']; ?></option>
						<option value="laki-laki">Laki-Laki</option>
						<option value="perempuan">Perempuan</option>
					</select>
					<small class="text-danger"><?= form_error('jenis_kelamin') ?></small>
				</div>
			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Nomor Telephone</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="no_tlp" onkeypress="return hanyaAngka(event)" name="no_tlp" value="<?= $user['no_tlp']; ?>">
					<small class="text-danger"><?= form_error('no_tlp') ?></small>
				</div>
			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
					<small class="text-danger"><?= form_error('alamat') ?></small>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-sm-2">Picture</div>
				<div class="col-sm-10">
					<div class="row">
						<div class="col-sm-3">
							<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="80px" height="50px" class="img-thumbnail">
						</div>
						<div class="col-sm-9">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="image" name="image">
								<label class="custom-file-label" for="image">Choose file</label>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group row justify-content-end">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Edit</button>
				</div>

			</div>


			</form>


		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
