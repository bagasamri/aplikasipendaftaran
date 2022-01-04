<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	public function getSubMenu()
	{
		$query = "SELECT user_sub_menu.*, user_menu.menu 
				 FROM user_sub_menu JOIN user_menu
				 ON user_sub_menu.menu_id = user_menu.id
				 ORDER BY user_sub_menu.menu_id asc
				 ";
		return $this->db->query($query)->result_array();
	}
	public function getrole()
	{
		$query = "select user.* ,user_role.role from user
		join user_role on user_role.id = user.role_id
		ORDER BY user.id ASC";
		return $this->db->query($query)->result_array();
	}
	public function getRekam()
	{
		$query = "SELECT rekam_medis.*, user.name, dokter.nama_lengkap from rekam_medis
		join user on user.id = rekam_medis.id_pasien
		join dokter on dokter.id = rekam_medis.id_dokter ORDER BY rekam_medis.id_rekam";
		return $this->db->query($query)->result_array();
	}
	public function getPengguna()
	{
		$query = "SELECT * FROM user WHERE role_id= '2'";
		return $this->db->query($query)->result_array();
	}
}
