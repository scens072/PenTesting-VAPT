<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_rs extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Faq_rs_m');

	}
	public function index()
	{
		$data['judul'] = 'faq_rs';
		$data['list'] =$this->Faq_rs_m->get_dt();
		$data['konten'] = 'admin-web/faq_rs/list_faq_rs';
		$this->load->view('admin', $data);
	}
	public function tambah(){
		$data['judul'] = 'faq_rs';
		$data['spesialis'] =$this->Faq_rs_m->get_dt();
		$data['konten'] = 'admin-web/faq_rs/tambah_faq_rs';
		$this->load->view('admin', $data);
	}
	public function save(){

		$data= array(
			'tanya_faq'=>$this->input->post('header'),
			'isi_faq'=>$this->input->post('isi'),
			
		);
		if($this->db->insert('faq_rs', $data)){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTAMBAH ke tentang_kami');
			redirect('/faq_rs');
		}

	}
	public function ubah($id){
		$data['judul'] = 'faq_rs';
		$data['dt'] =$this->Faq_rs_m->get_dt($id);
		$data['konten'] = 'admin-web/faq_rs/ubah_faq_rs';
		$this->load->view('admin', $data);
	}
	function update($id){

		$data= array(
			'tanya_faq'=>$this->input->post('header'),
			'isi_faq'=>$this->input->post('isi'),
			
		);
		$this->db->where('kd_faq', $id);
		if($this->db->update('faq_rs', $data)){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
			redirect('/faq_rs');
		}

	}
	function hapus($id){
		
		//hapus image
		//hapus tentang_kami
		$this->db->where('kd_faq', $id);
		if($this->db->delete('faq_rs')){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
			redirect('/faq_rs');
		}
	}

	function tambah_image($id){
		$data['judul'] = 'tentang_kami';
		$data['dt'] =$this->Faq_rs_m->get_dt($id);
		$data['konten'] = 'admin-web/tentang_kami/list_tambah_image';
		$data['list_data']=$this->Faq_rs_m->get_listimage($id);
		$dt = $data['list_data'];
		$page =  ceil(sizeof($dt)/4) <=5?ceil(sizeof($dt)/4) : 5;
		$data['page']=$page;
		$this->load->view('admin', $data);
	}
	public function add_image($id){
		$data['judul'] = 'tentang_kami';
		$data['dt'] =$this->Faq_rs_m->get_dt($id);
		$data['konten'] = 'admin-web/tentang_kami/add_image';
		$this->load->view('admin', $data);
	}
	public function save_image($id){
		$config['upload_path']          = 'images/upload/tentangkami/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('image')) # form input field attribute
		{
		    # Upload Failed
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
			redirect('/tentang_kami/add_image/'.$id);
		}else{
			$image = 'images/upload/tentangkami/'.$file_name;
			$data= array(
				'keterangan'=>$this->input->post('keterangan'),
				'image'=>$image,
				'kelompok'=>'tentang_kami',
				'id_ref'=>$id
			);
			if($this->db->insert('image', $data)){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil ditambah');
				redirect('/tentang_kami/tambah_image/'.$id);
			}

		}
	}
	public function ubah_image($id){
		$data['judul'] = 'tentang_kami';
		$data['data'] =$this->Faq_rs_m->get_dtimage($id);
		$data['dt'] =$this->Faq_rs_m->get_dt($data['data']->id_ref);
		$data['konten'] = 'admin-web/tentang_kami/ubah_image';
		$this->load->view('admin', $data);
	}
	public function update_image($id){
		$config['upload_path']          = 'images/upload/tentangkami/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

			if ($_FILES['image']['name']!='' && !$this->upload->do_upload('image')) # form input field attribute
			{
			    # Upload Failed
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('tentang_kami/ubah_image/'.$id);
			}else{
				$dt = $this->Faq_rs_m->get_dtimage($id);
				if($_FILES['image']['name']!=''){
					unlink($dt->image);
					$image = 'images/upload/tentangkami/'.$file_name;
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
					redirect('/tentang_kami/tambah_image/'.$dt->id_ref);
				}
			}
		}
		public function hapus_image($id){
			$dt = $this->Faq_rs_m->get_dtimage($id);
			unlink($dt->image);
			$this->db->where('id', $id);
			if($this->db->delete('image')){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
				redirect('/tentang_kami/tambah_image/'.$dt->id_ref);
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