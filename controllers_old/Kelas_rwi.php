<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_rwi extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Kelas_rwi_m');

	}
	public function index()
	{
		$data['judul'] = 'kelas_rwi';
		$data['list'] =$this->Kelas_rwi_m->get_dt();
		$data['konten'] = 'admin-web/kelas_rwi/list_kelas_rwi';
		$this->load->view('admin', $data);
	}
	public function tambah(){
		$data['judul'] = 'kelas_rwi';
		$data['spesialis'] =$this->Kelas_rwi_m->get_dt();
		$data['konten'] = 'admin-web/kelas_rwi/tambah_kelas_rwi';
		$this->load->view('admin', $data);
	}
	public function save(){
		$config['upload_path']          = 'images/upload/kelas_rwi/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('image')) # form input field attribute
		{
		    # Upload Failed
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
			redirect('/kelas_rwi');
		}else{
			$image = 'images/upload/kelas_rwi/'.$file_name;
			$data= array(
				'header'=>$this->input->post('header'),
				'keterangan'=>$this->input->post('keterangan'),
				'isi'=>$this->input->post('isi'),
				'gambar'=>$image,
			);
			if($this->db->insert('kelas_rawat_inap', $data)){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTAMBAH Info Rawat Inap RSMU');
				redirect('/kelas_rwi');
			}

		}
	}
	public function ubah($id){
		$data['judul'] = 'kelas_rwi';
		$data['dt'] =$this->Kelas_rwi_m->get_dt($id);
		$data['konten'] = 'admin-web/kelas_rwi/ubah_kelas_rwi';
		$this->load->view('admin', $data);
	}
	function update($id){

		$config['upload_path']          = 'images/upload/kelas_rwi/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

			if ($_FILES['image']['name']!='' && !$this->upload->do_upload('image')) # form input field attribute
			{
			    # Upload Failed
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('kelas_rwi/ubah_kelas_rwi/'.$id);
			}else{
				$dt = $this->Kelas_rwi_m->get_dt($id);
				if($_FILES['image']['name']!=''){
					unlink($dt->gambar);
					$image = 'images/upload/kelas_rwi/'.$file_name;
				}else{
					$image = $dt->gambar;
				}
				$data= array(
					'header'=>$this->input->post('header'),
					'keterangan'=>$this->input->post('keterangan'),
					'isi'=>$this->input->post('isi'),
					'gambar'=>$image
				);
				$this->db->where('id', $id);
				if($this->db->update('kelas_rawat_inap', $data)){
					$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
					redirect('/kelas_rwi');
				}
			}

		}
		function hapus($id){
			$dt = $this->Kelas_rwi_m->get_dt($id);
			unlink($dt->gambar);
			$this->db->where('id', $id);
			if($this->db->delete('kelas_rawat_inap')){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
				redirect('/kelas_rwi');
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