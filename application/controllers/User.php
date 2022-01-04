<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}
	public function edit()
	{

		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Edit Profile';
		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('no_identitas', 'Nomor Identitas', 'required|trim');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('no_tlp', 'Nomor Telephone', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$name	= $this->input->post('name');
			$email	= $this->input->post('email');
			$no_identitas	= $this->input->post('no_identitas');
			$tgl_lahir	= $this->input->post('tgl_lahir');
			$jenis_kelamin	= $this->input->post('jenis_kelamin');
			$no_tlp	= $this->input->post('no_tlp');
			$alamat	= $this->input->post('alamat');

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
			$this->db->set('no_identitas', $no_identitas);
			$this->db->set('tgl_lahir', $tgl_lahir);
			$this->db->set('jenis_kelamin', $jenis_kelamin);
			$this->db->set('no_tlp', $no_tlp);
			$this->db->set('alamat', $alamat);
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
		$data['title'] = 'Change Password';
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/changepassword', $data);
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

	public function pembayaran()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['Pembayaran'] = $this->db->get('pembayaran')->result_array();
		$data['title'] = 'Pembayaran';
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/pembayaran', $data);
			$this->load->view('templates/footer');
		} else {
		}
	}
}
