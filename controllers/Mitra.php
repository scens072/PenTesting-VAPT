<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Mitra_m');
        $this->load->model('Footer_m');

    }
    public function index()
	{
		$data['judul'] = 'mitra';
		$data['list'] =$this->Mitra_m->get_dt();
		$data['konten'] = 'admin-web/mitra/list_mitra';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	public function tambah(){
		$data['judul'] = 'berita';
		$data['spesialis'] =$this->Mitra_m->get_dt();
		$data['konten'] = 'admin-web/mitra/tambah_mitra';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	public function save(){
		$config['upload_path']          = 'images/upload/mitra/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('image')) # form input field attribute
		{
		    # Upload Failed
		    $this->session->set_flashdata('pesan', $this->upload->display_errors());
		    redirect('/mitra');
		}else{
			$image = 'images/upload/mitra/'.$file_name;
			$data= array(
				'header'=>$this->input->post('header'),
				'keterangan'=>$this->input->post('keterangan'),
				'gambar'=>$image,
			);
			if($this->db->insert('mitra_rsmu', $data)){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTAMBAH Sebagai Mitra RSMU');
	      		redirect('/mitra');
			}

		}
	}
	public function ubah($id){
		$data['judul'] = 'mitra';
		$data['dt'] =$this->Mitra_m->get_dt($id);
		$data['konten'] = 'admin-web/mitra/ubah_mitra';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	function update($id){

			$config['upload_path']          = 'images/upload/mitra/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $file_name = $this->generateRandomString().$_FILES['image']['name'];
			$config['file_name'] = $file_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($_FILES['image']['name']!='' && !$this->upload->do_upload('image')) # form input field attribute
			{
			    # Upload Failed
			    $this->session->set_flashdata('pesan', $this->upload->display_errors());
			    redirect('mitra/ubah/'.$id);
			}else{
				$dt = $this->Mitra_m->get_dt($id);
			    if($_FILES['image']['name']!=''){
					unlink($dt->gambar);
					$image = 'images/upload/mitra/'.$file_name;
				}else{
					$image = $dt->gambar;
				}
				$data= array(
					'header'=>$this->input->post('header'),
					'keterangan'=>$this->input->post('keterangan'),
					'gambar'=>$image
				);
				$this->db->where('id_mitra', $id);
				if($this->db->update('mitra_rsmu', $data)){
					$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
		      		redirect('/mitra');
				}
			}

	}
	function hapus($id){
		$dt = $this->Mitra_m->get_dt($id);
		unlink($dt->gambar);
		$this->db->where('id_mitra', $id);
		if($this->db->delete('mitra_rsmu')){
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
  		redirect('/mitra');
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