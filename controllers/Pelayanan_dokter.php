<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayanan_dokter extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Pelayanan_dokter_m');
        $this->load->model('Footer_m');

    }
    public function index()
	{
		$data['judul'] = 'pelayanan_dokter';
		$data['list'] =$this->Pelayanan_dokter_m->get_dt();
		$data['konten'] = 'admin-web/pelayanan_dokter/list_pelayanan_dokter';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	public function tambah(){
		$data['judul'] = 'pelayanan_dokter';
		$data['spesialis'] =$this->Pelayanan_dokter_m->get_dt();
		$data['konten'] = 'admin-web/pelayanan_dokter/tambah_pelayanan_dokter';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	public function save(){

			$data= array(
				'header'=>$this->input->post('header'),
				'keterangan'=>$this->input->post('keterangan'),
				'isi'=>$this->input->post('isi'),
				
			);
			if($this->db->insert('pelayanan_dokter', $data)){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTAMBAH ke pelayanan_dokter');
	      		redirect('/pelayanan_dokter');
			}

	}
	public function ubah($id){
		$data['judul'] = 'pelayanan_dokter';
		$data['dt'] =$this->Pelayanan_dokter_m->get_dt($id);
		$data['konten'] = 'admin-web/pelayanan_dokter/ubah_pelayanan_dokter';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	function update($id){

				$data= array(
					'header'=>$this->input->post('header'),
					'keterangan'=>$this->input->post('keterangan'),
					'isi'=>$this->input->post('isi'),
				);
				$this->db->where('id', $id);
				if($this->db->update('pelayanan_dokter', $data)){
					$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
		      		redirect('/pelayanan_dokter');
				}

	}
	function hapus($id){
		
		//hapus image
		$img = $this->Pelayanan_dokter_m->get_listimage($id);
		foreach ($img as $key => $value) {
			$this->db->where('id', $value->id);
			$this->db->delete('image');
		}
		//hapus pelayanan_dokter
		$this->db->where('id', $id);
		if($this->db->delete('pelayanan_dokter')){
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
  		redirect('/pelayanan_dokter');
		}
	}

	function tambah_image($id){
		$data['judul'] = 'pelayanan_dokter';
		$data['dt'] =$this->Pelayanan_dokter_m->get_dt($id);
		$data['konten'] = 'admin-web/pelayanan_dokter/list_tambah_image';
		$data['list_data']=$this->Pelayanan_dokter_m->get_listimage($id);
		$dt = $data['list_data'];
		$page =  ceil(sizeof($dt)/4) <=5?ceil(sizeof($dt)/4) : 5;
		$data['page']=$page;
		$this->load->view('admin', $data);
	}
	public function add_image($id){
		$data['judul'] = 'pelayanan_dokter';
		$data['dt'] =$this->Pelayanan_dokter_m->get_dt($id);
		$data['konten'] = 'admin-web/pelayanan_dokter/add_image';
		$this->load->view('admin', $data);
	}
	public function save_image($id){
		$config['upload_path']          = 'images/upload/pelayanan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4';
        $file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('image')) # form input field attribute
		{
		    # Upload Failed
		    $this->session->set_flashdata('pesan', $this->upload->display_errors());
		    redirect('/pelayanan_dokter/add_image/'.$id);
		}else{
			$image = 'images/upload/pelayanan/'.$file_name;
			$data= array(
				'keterangan'=>$this->input->post('keterangan'),
				'image'=>$image,
				'kelompok'=>'pelayanan_dokter',
				'id_ref'=>$id
			);
			if($this->db->insert('image', $data)){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil ditambah');
	      		redirect('/pelayanan_dokter/tambah_image/'.$id);
			}

		}
	}
	public function ubah_image($id){
		$data['judul'] = 'pelayanan_dokter';
		$data['data'] =$this->Pelayanan_dokter_m->get_dtimage($id);
		$data['dt'] =$this->Pelayanan_dokter_m->get_dt($data['data']->id_ref);
		$data['konten'] = 'admin-web/pelayanan_dokter/ubah_image';
		$this->load->view('admin', $data);
	}
	public function update_image($id){
			$config['upload_path']          = 'images/upload/pelayanan/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4';
	        $file_name = $this->generateRandomString().$_FILES['image']['name'];
			$config['file_name'] = $file_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($_FILES['image']['name']!='' && !$this->upload->do_upload('image')) # form input field attribute
			{
			    # Upload Failed
			    $this->session->set_flashdata('pesan', $this->upload->display_errors());
			    redirect('pelayanan_dokter/ubah_image/'.$id);
			}else{
				$dt = $this->Pelayanan_dokter_m->get_dtimage($id);
			    if($_FILES['image']['name']!=''){
					unlink($dt->image);
					$image = 'images/upload/pelayanan/'.$file_name;
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
		      		redirect('/pelayanan_dokter/tambah_image/'.$dt->id_ref);
				}
			}
	}
	public function hapus_image($id){
		$dt = $this->Pelayanan_dokter_m->get_dtimage($id);
		unlink($dt->image);
		$this->db->where('id', $id);
		if($this->db->delete('image')){
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
  		redirect('/pelayanan_dokter/tambah_image/'.$dt->id_ref);
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