<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		// echo 'Selamat Datatang '  . $data['user']['name'];
		$data['title'] = 'Dasboard';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}
	public function role()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();
		$this->form_validation->set_rules('role', 'Role', 'required');
		$data['title'] = 'Role';
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('user_role', ['role' => $this->input->post('role')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Berhasil diinput!</div>');
			redirect('admin/role');
		}
	}
	// public function roleAcces($role_id)
	// {
	// 	$data['user'] = $this->db->get_where('user', ['email' =>
	// 	$this->session->userdata('email')])->row_array();

	// 	$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
	// 	$data['menu'] = $this->db->get('user_menu')->result_array();

	// 	$data['title'] = 'Role Access';
	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('templates/sidebar', $data);
	// 	$this->load->view('templates/topbar', $data);
	// 	$this->load->view('admin/role-acces', $data);
	// 	$this->load->view('templates/footer');
	// }

	public function dataUser()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		// $data['usera'] = $this->db->get('user')->result_array();
		$this->load->model('Menu_model', 'admin');
		$data['subMenu'] = $this->admin->getrole();
		$data['usera'] = $this->db->get('user')->result_array();
		$data['title'] = 'Data User';
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/datauser', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('user_role', ['role' => $this->input->post('role')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Berhasil diinput!</div>');
			redirect('admin/role');
		}
	}
	public function dataDokter()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		// $data['usera'] = $this->db->get('user')->result_array();
		// $this->load->model('Menu_model', 'admin');
		// $data['subMenu'] = $this->admin->getrole();


		$data['dokter'] = $this->db->get('dokter')->result_array();
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nama_lengkap', 'Nama lengkap', 'required');
		$this->form_validation->set_rules('dokter', 'Dokter', 'required');
		$data['title'] = 'Data Dokter';
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/datadokter', $data);
			$this->load->view('templates/footer');
		} else {
			//$this->db->insert('dokter', ['nama' => $this->input->post('nama')]);
			$data = [
				'nama' 	=> $this->input->post('nama'),
				'nama_lengkap' 	=> $this->input->post('nama_lengkap'),
				'dokter' 		=> $this->input->post('dokter')

			];
			$this->db->insert('dokter', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diinput!</div>');
			redirect('admin/datadokter');
		}



		// $this->db->insert('dokter', ['nama_lengkap' => $this->input->post('nama_lengkap')]);
		// $this->db->insert('dokter', ['dokter' => $this->input->post('dokter')]);


	}
	public function editDokter()
	{
	}
	public function hapusDokter()
	{

		//$this->db->delete('dokter', array('id' => $id));
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Berhasil dihapus!</div>');
		redirect('admin/datadokter');
	}
}
