<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_mata_kita extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Tentang_mata_kita_m');

	}
	public function index()
	{
		$data['judul'] = 'tentang_mata_kita';
		$data['list'] =$this->Tentang_mata_kita_m->get_dt();
		$data['konten'] = 'admin-web/tentang_mata_kita/list_tentang_mata_kita';
		$this->load->view('admin', $data);
	}
	public function tambah(){
		$data['judul'] = 'tentang_mata_kita';
		$data['spesialis'] =$this->Tentang_mata_kita_m->get_dt();
		$data['konten'] = 'admin-web/tentang_mata_kita/tambah_tentang_mata_kita';
		$this->load->view('admin', $data);
	}
	public function save(){
		$header = $this->input->post('header');
		$data= array(
			'header'=>$this->input->post('header'),
			'keterangan'=>$this->input->post('keterangan'),
			'isi'=>$this->input->post('isi'),
			'key_layanan'=>	strtolower(str_replace(" ", "_", $header)),		
		);
		if($this->db->insert('tentang_mata_kita', $data)){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTAMBAH ke tentang_mata_kita');
			redirect('/tentang_mata_kita');
		}

	}
	public function ubah($id){
		$data['judul'] = 'tentang_mata_kita';
		$data['dt'] =$this->Tentang_mata_kita_m->get_dt($id);
		$data['konten'] = 'admin-web/tentang_mata_kita/ubah_tentang_mata_kita';
		$this->load->view('admin', $data);
	}
	function update($id){

		$data= array(
			'header'=>$this->input->post('header'),
			'keterangan'=>$this->input->post('keterangan'),
			'isi'=>$this->input->post('isi'),
		);
		$this->db->where('id_layanan', $id);
		if($this->db->update('tentang_mata_kita', $data)){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
			redirect('/tentang_mata_kita');
		}

	}
	function hapus($id){
		
		//hapus image
		$img = $this->Tentang_mata_kita_m->get_listimage($id);
		foreach ($img as $key => $value) {
			$this->db->where('id', $value->id);
			$this->db->delete('image');
		}
		//hapus tentang_kami
		$this->db->where('id_layanan', $id);
		if($this->db->delete('tentang_mata_kita')){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
			redirect('/tentang_mata_kita');
		}
	}

	function tambah_image($id){
		$data['judul'] = 'tentang_mata_kita';
		$data['dt'] =$this->Tentang_mata_kita_m->get_dt($id);
		$data['konten'] = 'admin-web/tentang_mata_kita/list_tambah_image';
		$data['list_data']=$this->Tentang_mata_kita_m->get_listimage($id);
		$dt = $data['list_data'];
		$page =  ceil(sizeof($dt)/4) <=5?ceil(sizeof($dt)/4) : 5;
		$data['page']=$page;
		$this->load->view('admin', $data);
	}
	public function add_image($id){
		$data['judul'] = 'tentang_mata_kita';
		$data['dt'] =$this->Tentang_mata_kita_m->get_dt($id);
		$data['konten'] = 'admin-web/tentang_mata_kita/add_image';
		$this->load->view('admin', $data);
	}
	public function save_image($id){
		$config['upload_path']          = 'images/upload/tentang_mata_kita/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('image')) # form input field attribute
		{
		    # Upload Failed
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
			redirect('/tentang_mata_kita/add_image/'.$id);
		}else{
			$image = 'images/upload/tentang_mata_kita/'.$file_name;
			$data= array(
				'keterangan'=>$this->input->post('keterangan'),
				'image'=>$image,
				'kelompok'=>'tentang_mata_kita',
				'id_ref'=>$id
			);
			if($this->db->insert('image', $data)){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil ditambah');
				redirect('/tentang_mata_kita/tambah_image/'.$id);
			}

		}
	}
	public function ubah_image($id){
		$data['judul'] = 'tentang_mata_kita';
		$data['data'] =$this->Tentang_mata_kita_m->get_dtimage($id);
		$data['dt'] =$this->Tentang_mata_kita_m->get_dt($data['data']->id_ref);
		$data['konten'] = 'admin-web/tentang_mata_kita/ubah_image';
		$this->load->view('admin', $data);
	}
	public function update_image($id){
		$config['upload_path']          = 'images/upload/tentang_mata_kita/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

			if ($_FILES['image']['name']!='' && !$this->upload->do_upload('image')) # form input field attribute
			{
			    # Upload Failed
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('tentang_mata_kita/ubah_image/'.$id);
			}else{
				$dt = $this->Tentang_mata_kita_m->get_dtimage($id);
				if($_FILES['image']['name']!=''){
					unlink($dt->image);
					$image = 'images/upload/tentang_mata_kita/'.$file_name;
				}else{
					$image = $dt->image;
				}
				$data= array(
					'keterangan'=>$this->input->post('keterangan'),
					'image'=>$image
				);
				$this->db->where('id', $id);
				if($this->db->update('image', $data)){
					$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
					redirect('/tentang_mata_kita/tambah_image/'.$dt->id_ref);
				}
			}
		}
		public function hapus_image($id){
			$dt = $this->Tentang_mata_kita_m->get_dtimage($id);
			unlink($dt->image);
			$this->db->where('id', $id);
			if($this->db->delete('image')){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
				redirect('/tentang_mata_kita/tambah_image/'.$dt->id_ref);
			}
		}
		public function generateRandomString($length = 5) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
	}