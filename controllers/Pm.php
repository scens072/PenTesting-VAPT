<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pm extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pm_m');
        $this->load->model('Footer_m');

	}
	public function index()
	{
		$data['judul'] = 'pm';
		$data['list'] =$this->Pm_m->get_dt();
		$data['konten'] = 'admin-web/penunjang_medis/list_pm';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	public function tambah(){
		$data['judul'] = 'pm';
		$data['spesialis'] =$this->Pm_m->get_dt();
		$data['konten'] = 'admin-web/penunjang_medis/tambah_pm';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	public function save(){
		$config['upload_path']          = 'images/upload/penunjang_medis/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('image')) # form input field attribute
		{
		    # Upload Failed
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
			redirect('/pm');
		}else{
			$image = 'images/upload/penunjang_medis/'.$file_name;
			$data= array(
				'header'=>$this->input->post('header'),
				'keterangan'=>$this->input->post('keterangan'),
				'isi'=>$this->input->post('isi'),
				'gambar'=>$image,
			);
			if($this->db->insert('penunjang_medis', $data)){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTAMBAH Info Penunjang Medis RSMU');
				redirect('/pm');
			}

		}
	}
	public function ubah($id){
		$data['judul'] = 'pm';
		$data['dt'] =$this->Pm_m->get_dt($id);
		$data['konten'] = 'admin-web/penunjang_medis/ubah_pm';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}

	function tambah_image($id){
		$data['judul'] = 'pm';
		$data['dt'] =$this->Pm_m->get_dt($id);
		$data['konten'] = 'admin-web/penunjang_medis/list_tambah_image';
		$data['list_data']=$this->Pm_m->get_listimage($id);
		$dt = $data['list_data'];
		$page =  ceil(sizeof($dt)/4) <=5?ceil(sizeof($dt)/4) : 5;
		$data['page']=$page;
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}

	public function add_image($id){
		$data['judul'] = 'pm';
		$data['dt'] =$this->Pm_m->get_dt($id);
		$data['konten'] = 'admin-web/penunjang_medis/add_image';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	public function save_image($id){
		$config['upload_path']          = 'images/upload/penunjang_medis/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('image')) # form input field attribute
		{
		    # Upload Failed
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
			redirect('/pm/add_image/'.$id);
		}else{
			$image = 'images/upload/penunjang_medis/'.$file_name;
			$data= array(
				'keterangan'=>$this->input->post('keterangan'),
				'image'=>$image,
				'kelompok'=>'penunjang_medis',
				'id_ref'=>$id
			);
			if($this->db->insert('image', $data)){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil ditambah');
				redirect('/pm/tambah_image/'.$id);
			}

		}
	}
	public function ubah_image($id){
		$data['judul'] = 'pm';
		$data['data'] =$this->Pm_m->get_dtimage($id);
		$data['dt'] =$this->Pm_m->get_dt($data['data']->id_ref);
		$data['konten'] = 'admin-web/penunjang_medis/ubah_image';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	public function update_image($id){
		$config['upload_path']          = 'images/upload/penunjang_medis/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

			if ($_FILES['image']['name']!='' && !$this->upload->do_upload('image')) # form input field attribute
			{
			    # Upload Failed
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('pm/ubah_image/'.$id);
			}else{
				$dt = $this->Pm_m->get_dtimage($id);
				if($_FILES['image']['name']!=''){
					unlink($dt->image);
					$image = 'images/upload/penunjang_medis/'.$file_name;
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
					redirect('/pm/tambah_image/'.$dt->id_ref);
				}
			}
		}
		public function hapus_image($id){
			$dt = $this->Pm_m->get_dtimage($id);
			unlink($dt->image);
			$this->db->where('id', $id);
			if($this->db->delete('image')){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
				redirect('/pm/tambah_image/'.$dt->id_ref);
			}
		}

	function update($id){

		$config['upload_path']          = 'images/upload/penunjang_medis/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

			if ($_FILES['image']['name']!='' && !$this->upload->do_upload('image')) # form input field attribute
			{
			    # Upload Failed
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('penunjang_medis/ubah_pm/'.$id);
			}else{
				$dt = $this->Pm_m->get_dt($id);
				if($_FILES['image']['name']!=''){
					unlink($dt->gambar);
					$image = 'images/upload/penunjang_medis/'.$file_name;
				}else{
					$image = $dt->gambar;
				}
				$data= array(
					'header'=>$this->input->post('header'),
					'keterangan'=>$this->input->post('keterangan'),
					'isi'=>$this->input->post('isi'),
					'gambar'=>$image
				);
				$this->db->where('id_penunjang', $id);
				if($this->db->update('penunjang_medis', $data)){
					$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
					redirect('/pm');
				}
			}

		}
		function hapus($id){
			$dt = $this->Pm_m->get_dt($id);
			unlink($dt->gambar);
			$this->db->where('id_penunjang', $id);
			if($this->db->delete('penunjang_medis')){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
				redirect('/pm');
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