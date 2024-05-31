<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karya_ilmiah extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Karya_ilmiah_m');

    }
    public function index()
	{
		$data['judul'] = 'karya_ilmiah';
		$data['list'] =$this->Karya_ilmiah_m->get_dt();
		$data['konten'] = 'admin-web/karya_ilmiah/list_karya_ilmiah';
		$this->load->view('admin', $data);
	}
	public function tambah(){
		$data['judul'] = 'karya_ilmiah';
		$data['spesialis'] =$this->Karya_ilmiah_m->get_dt();
		$data['konten'] = 'admin-web/karya_ilmiah/tambah_karya_ilmiah';
		$this->load->view('admin', $data);
	}
	public function save(){

			$data= array(
				'header'=>$this->input->post('header'),
				'keterangan'=>$this->input->post('keterangan'),
				'isi'=>$this->input->post('isi'),
				
			);
			if($this->db->insert('karya_ilmiah', $data)){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTAMBAH ke karya_ilmiah');
	      		redirect('/karya_ilmiah');
			}

	}
	public function ubah($id){
		$data['judul'] = 'karya_ilmiah';
		$data['dt'] =$this->Karya_ilmiah_m->get_dt($id);
		$data['konten'] = 'admin-web/karya_ilmiah/ubah_karya_ilmiah';
		$this->load->view('admin', $data);
	}
	function update($id){

				$data= array(
					'header'=>$this->input->post('header'),
					'keterangan'=>$this->input->post('keterangan'),
					'isi'=>$this->input->post('isi'),
				);
				$this->db->where('id', $id);
				if($this->db->update('karya_ilmiah', $data)){
					$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
		      		redirect('/karya_ilmiah');
				}

	}
	function hapus($id){
		
		//hapus image
		$img = $this->Karya_ilmiah_m->get_listimage($id);
		foreach ($img as $key => $value) {
			$this->db->where('id', $value->id);
			$this->db->delete('image');
		}
		//hapus karya_ilmiah
		$this->db->where('id', $id);
		if($this->db->delete('karya_ilmiah')){
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
  		redirect('/karya_ilmiah');
		}
	}

	function tambah_image($id){
		$data['judul'] = 'karya_ilmiah';
		$data['dt'] =$this->Karya_ilmiah_m->get_dt($id);
		$data['konten'] = 'admin-web/karya_ilmiah/list_tambah_image';
		$data['list_data']=$this->Karya_ilmiah_m->get_listimage($id);
		$dt = $data['list_data'];
		$page =  ceil(sizeof($dt)/4) <=5?ceil(sizeof($dt)/4) : 5;
		$data['page']=$page;
		$this->load->view('admin', $data);
	}
	public function add_image($id){
		$data['judul'] = 'karya_ilmiah';
		$data['dt'] =$this->Karya_ilmiah_m->get_dt($id);
		$data['konten'] = 'admin-web/karya_ilmiah/add_image';
		$this->load->view('admin', $data);
	}
	public function save_image($id){
		$config['upload_path']          = 'images/upload/publikasi/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4';
        $file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('image')) # form input field attribute
		{
		    # Upload Failed
		    $this->session->set_flashdata('pesan', $this->upload->display_errors());
		    redirect('/karya_ilmiah/add_image/'.$id);
		}else{
			$image = 'images/upload/publikasi/'.$file_name;
			$data= array(
				'keterangan'=>$this->input->post('keterangan'),
				'image'=>$image,
				'kelompok'=>'karya_ilmiah',
				'id_ref'=>$id
			);
			if($this->db->insert('image', $data)){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil ditambah');
	      		redirect('/karya_ilmiah/tambah_image/'.$id);
			}

		}
	}
	public function ubah_image($id){
		$data['judul'] = 'karya_ilmiah';
		$data['data'] =$this->Karya_ilmiah_m->get_dtimage($id);
		$data['dt'] =$this->Karya_ilmiah_m->get_dt($data['data']->id_ref);
		$data['konten'] = 'admin-web/karya_ilmiah/ubah_image';
		$this->load->view('admin', $data);
	}
	public function update_image($id){
			$config['upload_path']          = 'images/upload/publikasi/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4';
	        $file_name = $this->generateRandomString().$_FILES['image']['name'];
			$config['file_name'] = $file_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($_FILES['image']['name']!='' && !$this->upload->do_upload('image')) # form input field attribute
			{
			    # Upload Failed
			    $this->session->set_flashdata('pesan', $this->upload->display_errors());
			    redirect('karya_ilmiah/ubah_image/'.$id);
			}else{
				$dt = $this->Karya_ilmiah_m->get_dtimage($id);
			    if($_FILES['image']['name']!=''){
					unlink($dt->image);
					$image = 'images/upload/publikasi/'.$file_name;
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
		      		redirect('/karya_ilmiah/tambah_image/'.$dt->id_ref);
				}
			}
	}
	public function hapus_image($id){
		$dt = $this->Karya_ilmiah_m->get_dtimage($id);
		unlink($dt->image);
		$this->db->where('id', $id);
		if($this->db->delete('image')){
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
  		redirect('/karya_ilmiah/tambah_image/'.$dt->id_ref);
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