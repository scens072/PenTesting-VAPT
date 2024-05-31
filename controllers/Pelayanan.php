<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayanan extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Pelayanan_m');
        $this->load->model('Footer_m');

    }
    public function index()
	{
		$data['judul'] = 'pelayanan';
		$data['list'] =$this->Pelayanan_m->get_dt();
		$data['konten'] = 'admin-web/pelayanan/list_pelayanan';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	public function tambah(){
		$data['judul'] = 'pelayanan';
		$data['spesialis'] =$this->Pelayanan_m->get_dt();
		$data['konten'] = 'admin-web/pelayanan/tambah_pelayanan';
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
			if($this->db->insert('pelayanan', $data)){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTAMBAH ke pelayanan');
	      		redirect('/pelayanan');
			}

	}
	public function ubah($id){
		$data['judul'] = 'pelayanan';
		$data['dt'] =$this->Pelayanan_m->get_dt($id);
		$data['konten'] = 'admin-web/pelayanan/ubah_pelayanan';
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
				if($this->db->update('pelayanan', $data)){
					$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
		      		redirect('/pelayanan');
				}

	}
	function hapus($id){
		
		//hapus image
		$img = $this->Pelayanan_m->get_listimage($id);
		foreach ($img as $key => $value) {
			$this->db->where('id', $value->id);
			$this->db->delete('image');
		}
		//hapus pelayanan
		$this->db->where('id', $id);
		if($this->db->delete('pelayanan')){
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
  		redirect('/pelayanan');
		}
	}

	function tambah_image($id){
		$data['judul'] = 'pelayanan';
		$data['dt'] =$this->Pelayanan_m->get_dt($id);
		$data['konten'] = 'admin-web/pelayanan/list_tambah_image';
		$data['list_data']=$this->Pelayanan_m->get_listimage($id);
		$dt = $data['list_data'];
		$page =  ceil(sizeof($dt)/4) <=5?ceil(sizeof($dt)/4) : 5;
		$data['page']=$page;
		$this->load->view('admin', $data);
	}
	public function add_image($id){
		$data['judul'] = 'pelayanan';
		$data['dt'] =$this->Pelayanan_m->get_dt($id);
		$data['konten'] = 'admin-web/pelayanan/add_image';
		$this->load->view('admin', $data);
	}
	public function save_image($id){
		$config['upload_path']          = 'images/upload/pelayanan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('image')) # form input field attribute
		{
		    # Upload Failed
		    $this->session->set_flashdata('pesan', $this->upload->display_errors());
		    redirect('/pelayanan/add_image/'.$id);
		}else{
			$image = 'images/upload/pelayanan/'.$file_name;
			$data= array(
				'keterangan'=>$this->input->post('keterangan'),
				'image'=>$image,
				'kelompok'=>'pelayanan',
				'id_ref'=>$id
			);
			if($this->db->insert('image', $data)){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil ditambah');
	      		redirect('/pelayanan/tambah_image/'.$id);
			}

		}
	}
	public function ubah_image($id){
		$data['judul'] = 'pelayanan';
		$data['data'] =$this->Pelayanan_m->get_dtimage($id);
		$data['dt'] =$this->Pelayanan_m->get_dt($data['data']->id_ref);
		$data['konten'] = 'admin-web/pelayanan/ubah_image';
		$this->load->view('admin', $data);
	}
	public function update_image($id){
			$config['upload_path']          = 'images/upload/pelayanan/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $file_name = $this->generateRandomString().$_FILES['image']['name'];
			$config['file_name'] = $file_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($_FILES['image']['name']!='' && !$this->upload->do_upload('image')) # form input field attribute
			{
			    # Upload Failed
			    $this->session->set_flashdata('pesan', $this->upload->display_errors());
			    redirect('pelayanan/ubah_image/'.$id);
			}else{
				$dt = $this->Pelayanan_m->get_dtimage($id);
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
		      		redirect('/pelayanan/tambah_image/'.$dt->id_ref);
				}
			}
	}
	public function hapus_image($id){
		$dt = $this->Pelayanan_m->get_dtimage($id);
		unlink($dt->image);
		$this->db->where('id', $id);
		if($this->db->delete('image')){
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
  		redirect('/pelayanan/tambah_image/'.$dt->id_ref);
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