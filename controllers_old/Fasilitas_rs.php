<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas_rs extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Fasilitas_rs_m');

	}
	public function index()
	{
		$data['judul'] = 'fasilitas_rs';
		$data['list'] =$this->Fasilitas_rs_m->get_dt();
		$data['konten'] = 'admin-web/fasilitas_rs/list_fasilitas_rs';
		$this->load->view('admin', $data);
	}
	public function tambah(){
		$data['judul'] = 'fasilitas_rs';
		$data['spesialis'] =$this->Fasilitas_rs_m->get_dt();
		$data['konten'] = 'admin-web/fasilitas_rs/tambah_fasilitas_rs';
		$this->load->view('admin', $data);
	}
	public function save(){
		$config['upload_path']          = 'images/upload/fasilitas_rs/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('image')) # form input field attribute
		{
		    # Upload Failed
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
			redirect('/fasilitas_rs');
		}else{
			$image = 'images/upload/fasilitas_rs/'.$file_name;
			$data= array(
				'header'=>$this->input->post('header'),
				'keterangan'=>$this->input->post('keterangan'),
				'isi'=>$this->input->post('isi'),
				'gambar'=>$image,
			);
			if($this->db->insert('fasilitas_rs', $data)){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTAMBAH Info Fasilitas RSMU');
				redirect('/fasilitas_rs');
			}

		}
	}
	public function ubah($id){
		$data['judul'] = 'fasilitas_rs';
		$data['dt'] =$this->Fasilitas_rs_m->get_dt($id);
		$data['konten'] = 'admin-web/fasilitas_rs/ubah_fasilitas_rs';
		$this->load->view('admin', $data);
	}
	function update($id){

		$config['upload_path']          = 'images/upload/fasilitas_rs/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

			if ($_FILES['image']['name']!='' && !$this->upload->do_upload('image')) # form input field attribute
			{
			    # Upload Failed
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('fasilitas_rs/ubah_fasilitas_rs/'.$id);
			}else{
				$dt = $this->Fasilitas_rs_m->get_dt($id);
				if($_FILES['image']['name']!=''){
					unlink($dt->gambar);
					$image = 'images/upload/fasilitas_rs/'.$file_name;
				}else{
					$image = $dt->gambar;
				}
				$data= array(
					'header'=>$this->input->post('header'),
					'keterangan'=>$this->input->post('keterangan'),
					'isi'=>$this->input->post('isi'),
					'gambar'=>$image
				);
				$this->db->where('id_fasrs', $id);
				if($this->db->update('fasilitas_rs', $data)){
					$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
					redirect('/fasilitas_rs');
				}
			}

		}
		function hapus($id){
			$dt = $this->Fasilitas_rs_m->get_dt($id);
			unlink($dt->gambar);
			$this->db->where('id_fasrs', $id);
			if($this->db->delete('fasilitas_rs')){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
				redirect('/fasilitas_rs');
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