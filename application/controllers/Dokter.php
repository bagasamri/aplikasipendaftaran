<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		// echo 'Selamat Datatang '  . $data['user']['name'];
		$data['title'] = 'Halaman Dasboard';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dokter/index', $data);
		$this->load->view('templates/footer');
	}
	public function edit()
	{

		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Edit Profile Dokter';
		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('dokter/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$name	= $this->input->post('name');
			$email	= $this->input->post('email');

			//cek jika gambar upload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']		 = '2048';
				$config['upload_path']	 = './assets/img/profile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile Berhasil Update</div>');
			redirect('user');
		}
	}
	public function changePassword()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confrim New Password', 'required|trim|min_length[3]|matches[new_password1]');
		$data['title'] = 'Change Password Dokter';
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('dokter/changepassword', $data);
			$this->load->view('templates/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password 	  = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Tidak sama sama sebelumnya</div>');
				redirect('user/changepassword');
			} else {
				if ($current_password = $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Tidak Boleh sebelumnya</div>');
					redirect('user/changepassword');
				} else {
					// password
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil di ganti</div>');
					redirect('user/changepassword');
				}
			}
		}
	}
	public function rekamedis()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model', 'dokter');
		$data['Rekamedis'] = $this->dokter->getRekam();

		$data['rekam'] = $this->db->get('rekam_medis')->result_array();
		$this->form_validation->set_rules('tgl_pemeriksaan', 'Nama', 'required');
		$this->form_validation->set_rules('id_pasien', 'Nama Pasien', 'required');
		$this->form_validation->set_rules('id_dokter', 'Nama Dokter', 'required');
		$this->form_validation->set_rules('no_rm', 'Nomor Rekam Medis', 'required');
		$this->form_validation->set_rules('berat', 'Berat Badan', 'required');
		$this->form_validation->set_rules('tinggi', 'Tinggi Badan', 'required');
		$this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
		$this->form_validation->set_rules('diagnosa', 'diagnosa', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$data['title'] = 'Rekam Medis';
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('dokter/rekamedis', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'tgl_pemeriksaan' 	=> $this->input->post('tgl_pemeriksaan'),
				'id_pasien' 	=> $this->input->post('id_pasien'),
				'id_dokter' 		=> $this->input->post('id_dokter'),
				'no_rm' 		=> $this->input->post('no_rm'),
				'berat' 		=> $this->input->post('berat'),
				'tinggi' 		=> $this->input->post('tinggi'),
				'keluhan' 		=> $this->input->post('keluhan'),
				'diagnosa' 		=> $this->input->post('diagnosa'),
				'keterangan' 		=> $this->input->post('keterangan')


			];
			$this->db->insert('rekam_medis', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Rekam Medis Berhasil diinput!</div>');
			redirect('dokter/rekamedis');
		}
	}
	public function dataObat()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['Obat'] = $this->db->get('obat')->result_array();

		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
		$this->form_validation->set_rules('jenis_obat', 'Nama Jenis Obat', 'required');
		$this->form_validation->set_rules('jumlah_obat', 'Jumlah', 'required');
		$data['title'] = 'Data Obat';
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('dokter/dataobat', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'nama_obat' 	=> $this->input->post('nama_obat'),
				'jenis_obat' 	=> $this->input->post('jenis_obat'),
				'jumlah_obat' 	=> $this->input->post('jumlah_obat')
			];
			$this->db->insert('obat', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah data obat Berhasil diinput!</div>');
			redirect('apoteker/dataobat');
		}
	}
	public function dataPenguna()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model', 'dokter');
		$data['Pengguna'] = $this->dokter->getPengguna();
		$data['usera'] = $this->db->get('user')->result_array();
		$data['title'] = 'Data Pengguna';
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('dokter/datapenguna', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('user_role', ['role' => $this->input->post('role')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Berhasil diinput!</div>');
			redirect('admin/role');
		}
	}
	public function lapBayar()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		// echo 'Selamat Datatang '  . $data['user']['name'];
		$data['title'] = 'Laporan Pembayaran';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dokter/lapbayar', $data);
		$this->load->view('templates/footer');
	}
}
