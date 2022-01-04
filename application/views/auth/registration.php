<div class="container">

	<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">

				<div class="col-lg">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
						</div>
						<form class="user" method="POST" action="<?= base_url('auth/registration'); ?>">
							<div class="form-group">
								<label for="exampleFormControlSelect1">Nama Lengkap</label>
								<input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?= set_value('name') ?>">
								<small class="text-danger"><?= form_error('name') ?></small>
							</div>

							<div class="form-group">
								<label for="exampleFormControlSelect1">Nomor Identitas</label>
								<input type="text" class="form-control form-control-user" onkeypress="return hanyaAngka(event)" id="no_identitas" name="no_identitas" placeholder="Masukan Nomor Identitas" value="<?= set_value('no_identitas') ?>">
								<small class="text-danger"><?= form_error('no_identitas') ?></small>
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Tanggal Lahir</label>
								<input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" placeholder="Masukan Nomor Identitas" value="<?= set_value('tgl_lahir') ?>">
								<small class="text-danger"><?= form_error('tgl_lahir') ?></small>
							</div>

							<div class="form-group">
								<label for="exampleFormControlSelect1">Jenis Kelamin</label>
								<select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
									<option>--Select--</option>
									<option value="laki-laki">Laki-Laki</option>
									<option value="perempuan">Perempuan</option>
								</select>
								<small class="text-danger"><?= form_error('jenis_kelamin') ?></small>
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Nomor Telephone</label>
								<input type="text" class="form-control form-control-user" onkeypress="return hanyaAngka(event)" id="no_tlp" name="no_tlp" placeholder="Masukan Nomor Telephone" value="<?= set_value('no_tlp') ?>">
								<small class="text-danger"><?= form_error('no_tlp') ?></small>
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Alamat</label>
								<input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukan Alamat" value="<?= set_value('alamat') ?>">
								<small class="text-danger"><?= form_error('alamat') ?></small>
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Email</label>
								<input type="email" class="form-control form-control-user" id="emai" name="email" placeholder="Email Address" value="<?= set_value('email') ?>">
								<small class="text-danger"><?= form_error('email') ?></small>
							</div>
							<label for="exampleFormControlSelect1">Password</label>
							<div class="form-group row">

								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
									<small class="text-danger"><?= form_error('password1') ?></small>
								</div>

								<div class="col-sm-6">
									<input type="password" class="form-control form-control-user" id="password2" name="password" placeholder="Repeat Password">
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-user btn-block">
								Register Account
							</button>

						</form>
						<hr>
						<div class="text-center">
							<a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
						</div>
						<div class="text-center">
							<a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
