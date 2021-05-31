<?php defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function __Construct(){
		parent::__Construct();

		$this->load->database();
		$this->load->model('AdminM');
		$this->load->model('KandidatM');
		if (!$this->session->userdata("logged")) {
			redirect("Auth/loginAdmin");
		}
	}

	public function index(){
		$data['title_1']="Dashboard";
		$data ['totalKandidat']=$this->KandidatM->total_rows();
		$data['profileA']=$this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
		$this->load->view("Admin/layout/sidebar", $data);
		$this->load->view("Admin/layout/header", $data);		
		$this->load->view("Admin/layout/body", $data);
		$this->load->view("Admin/layout/footer", $data);	
	}

	public function k_admin(){
		$data['title_1']="Data Admin";
		$data['admin']= $this->AdminM->find()->result_array();
		$this->load->view("Admin/k_admin", $data);
	}

	//tambah data
	public function createAdmin()
	{	
		if ($this->input->post("kode_admin") !== "") {
			$data = [
				"id_admin"   => "",
				"kode_admin" => $this->input->post("kode_admin"),
				"nama_admin" => $this->input->post("nama_admin"),
				"jk" 		 => $this->input->post("jk"),
				"alamat" 	 => $this->input->post("alamat"),
				"no_hp" 	 => $this->input->post("no_hp"),
				"email" 	 => $this->input->post("email"),
				"status" 	 => "Aktif",
				"password" 	 => password_hash($this->input->post("kode_admin", true).'#123', PASSWORD_DEFAULT),
			];

			if($_FILES['foto']["name"] !== ""){
				$data["foto"] = $this->uploadGambar();
			}

			if ($this->AdminM->new($data)) {
				$this->session->set_flashdata("scc", "Data berhasil ditambahkan");
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata("err", "terjadi kesalahan saat menambahkan data");
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else  {
            // jika data yang dikirim kosong
			$this->session->set_flashdata("err", "Kode admin tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	//ubah admin
	public function editAdmin($id)
	{
		if ($id === null) {
			$this->session->set_flashdata("err", "id admin tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		if ($this->input->post("kode_admin") === "") {
			$this->session->set_flashdata("err", "kode admin tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		else if ($this->input->post("nama_admin") === "") {
			$this->session->set_flashdata("err", "nama admin tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		else if ($this->input->post("jk") === "") {
			$this->session->set_flashdata("err", "Jenis kelamin tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		else if ($this->input->post("alamat") === "") {
			$this->session->set_flashdata("err", "Alamat tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		else if ($this->input->post("no_hp") === "") {
			$this->session->set_flashdata("err", "No handphone tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		else if ($this->input->post("email") === "") {
			$this->session->set_flashdata("err", "Email tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		else if ($this->input->post("status") === "") {
			$this->session->set_flashdata("err", "Status tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		else if ($this->input->post("foto") === "") {
			$this->session->set_flashdata("err", "Foto tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}

		$where = ["id_admin" => $id];
		$data = [
			//"kode_admin" => $this->input->post("kode_admin"),
			"nama_admin" => $this->input->post("nama_admin"),
			"jk" 		 => $this->input->post("jk"),
			"alamat" 	 => $this->input->post("alamat"),
			"no_hp" 	 => $this->input->post("no_hp"),
			"email" 	 => $this->input->post("email"),
			"status" 	 => $this->input->post("status"),
		];

		if($_FILES['foto']["name"] !== ""){
			$data["foto"] = $this->uploadGambar();
		}

		if ($this->AdminM->edit($where, $data)) {
			$this->session->set_flashdata("scc", "perubahan data berhasil disimpan");
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata("err", "terjadi kesalahan");
			redirect($_SERVER["HTTP_REFERER"]);
		}
	}

	//hapus data
	public function deleteAdmin($id)
	{
		if ($id !== null) {
			$where = ["id_admin" => $id];
			if ($this->AdminM->delete($where)) {
				$this->session->set_flashdata("scc", "data berhasil dihapus");
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata("err", "terjadi kesalahan");
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			$this->session->set_flashdata("err", "Kode Kategori tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

//Mengelola Kandidat
	public function k_kandidat(){
		$data['title_1'] = 'Data Kandidat';
		$data['kandidat']= $this->KandidatM->find()->result_array();
		$data['no_urut']=$this->KandidatM->no_urut();
		$this->load->view("Admin/k_kandidat", $data);
		$this->load->view("Admin/kandidatModals", $data);
	}

	public function createKandidat(){
		if ($this->input->post('no_urut') !== "") {
			$data = [
				"id_kandidat" 		  => "",
				"no_urut" 			  => $this->input->post('no_urut'),
				"nama_kandidat"		  => $this->input->post('nama_kandidat'),
				"nama_wakil_kandidat" => $this->input->post('nama_wakil_kandidat'),
				"slogan" 			  => $this->input->post('slogan'),
				"visi" 				  => $this->input->post('visi'),
				"misi" 				  => $this->input->post('misi'),
				"masa_jabatan" 		  => $this->input->post('masa_jabatan'),
				"status" 			  => "Berjalan",
			];

			if ($_FILES['foto']['name'] !== "") {
				$data['foto'] = $this->uploadGambar();
			}

			if ($this->KandidatM->new($data)) {
				$this->session->set_flashdata("scc", "Data berhasil ditambah");
				redirect($_SERVER["HTTP_REFERER"]);
			}else{
				$this->session->set_flashdata("err", "terjadi kesalahan saat menambah data");
				redirect($_SERVER["HTTP_REFERER"]);
			}
		}else{
			$this->session->set_flashdata("err", "no urut tidak boleh kosong");
			redirect($_SERVER["HTTP_REFERER"]);
		}
	}

	//ubah kandidat
	public function editKandidat($id)
	{
		if ($id === null) {
			$this->session->set_flashdata("err", "id kandidat tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		if ($this->input->post("no_urut") === "") {
			$this->session->set_flashdata("err", "No urut tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		else if ($this->input->post("nama_kandidat") === "") {
			$this->session->set_flashdata("err", "Nama kandidat tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		else if ($this->input->post("nama_wakil_kandidat") === "") {
			$this->session->set_flashdata("err", "Nama wakil kandidat tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		else if ($this->input->post("slogan") === "") {
			$this->session->set_flashdata("err", "Slogan tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		else if ($this->input->post("visi") === "") {
			$this->session->set_flashdata("err", "Visi tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		else if ($this->input->post("misi") === "") {
			$this->session->set_flashdata("err", "Misi tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		else if ($this->input->post("masa_jabatan") === "") {
			$this->session->set_flashdata("err", "Masa jabatan tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		else if ($this->input->post("status") === "") {
			$this->session->set_flashdata("err", "Status tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}
		else if ($this->input->post("foto") === "") {
			$this->session->set_flashdata("err", "Foto tidak boleh kosong");
			redirect($_SERVER['HTTP_REFERER']);
		}

		$where = ["id_kandidat" => $id];
		$data = [
			//"no_urut" 			 => $this->input->post("no_urut"),
			"nama_kandidat" 		 => $this->input->post("nama_kandidat"),
			"nama_wakil_kandidat" 	 => $this->input->post("nama_wakil_kandidat"),
			"slogan" 	 			 => $this->input->post("slogan"),
			"visi" 	 				 => $this->input->post("visi"),
			"misi" 	 				 => $this->input->post("misi"),
			"masa_jabatan" 	 		 => $this->input->post("masa_jabatan"),
			"status" 	 			 => $this->input->post("status"),
		];

		if($_FILES['foto']["name"] !== ""){
			$data["foto"] = $this->uploadGambar();
		}

		if ($this->KandidatM->edit($where, $data)) {
			$this->session->set_flashdata("scc", "Perubahan data berhasil disimpan");
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata("err", "Terjadi kesalahan");
			redirect($_SERVER["HTTP_REFERER"]);
		}
	}
	//Hapus Kandidat
	public function deleteKandidat($id){
		if ($id !== null) {
			$where=['id_kandidat' => $id];
			if ($this->KandidatM->delete($where)) {
				$this->session->set_flashdata("scc", "Data berhasil dihapus");
				redirect($_SERVER["HTTP_REFERER"]);
			}
			else{
				$this->set_flashdata("err", "Terjadi kesalahan");
				redirect($_SERVER["HTTP_REFERER"]);
			}
		}else{
			$this->set_flashdata("err", "ID kandidat tidak boleh kosong");
			redirect($_SERVER["HTTP_REFERER"]);
		}

	}

	//tambah foto
	public function uploadGambar()
	{
		$config['upload_path'] = './assets/images/faces';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')) {
			return $this->upload->data("file_name");
		}

		return "default.jpg";
	}
}
