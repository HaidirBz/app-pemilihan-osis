<?php

class Auth extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("AdminM");
	}

	function loginAdmin(){
		if ($this->session->userdata('kode_admin')) {
			redirect('Admin');
		}

		$this->load->view("Admin/login");
	}

	function cekLogin(){

		$where = $this->input->post('kode_admin',true);

		$admin = $this->AdminM->find(['kode_admin' => $where, 'status' => 'aktif']);

		if($admin->num_rows() > 0){
			$admin = $admin->result_array()[0];
			if(password_verify($this->input->post("password"), $admin['password'])){
				$data = [	
					"id_admin"    => $admin['id_admin'],
					"kode_admin"  => $admin['kode_admin'],
					"nama_admin"  => $admin['nama_admin'],
					"email" 	  => $admin['email'],
					"foto" 	 	  => $admin['foto'],
					"password"    => $admin['password'],
					"logged" 	  => true
				];
				$this->session->set_userdata($data);
				$this->session->set_flashdata("scc","selamat datang admin");
				redirect("Admin");
			}else{
				$this->session->set_flashdata("err","Login Gagal password salah");
				redirect("Auth/loginAdmin");
			}
		}else{
			$this->session->set_flashdata("err","Login Gagal kode tidak ditemukan");
			redirect("Auth/loginAdmin");
		}

	}

	function logoutAdmin(){
		$this->session->unset_userdata("logged");
		$this->session->sess_destroy();
		redirect("Auth/loginAdmin");
	}
}
