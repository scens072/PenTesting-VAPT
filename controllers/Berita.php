<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_m');
        $this->load->model('Footer_m');

    }
    public function index()
	{
		$data['judul'] = 'berita';
		$data['list'] =$this->Berita_m->get_dt();
		$data['konten'] = 'admin-web/berita/list_berita';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	public function tambah(){
		$data['judul'] = 'berita';
		$data['spesialis'] =$this->Berita_m->get_dt();
		$data['konten'] = 'admin-web/berita/tambah_berita';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	public function save(){
		$config['upload_path']          = 'images/upload/berita/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('image')) # form input field attribute
		{
		    # Upload Failed
		    $this->session->set_flashdata('pesan', $this->upload->display_errors());
		    redirect('/berita');
		}else{
			$image = 'images/upload/berita/'.$file_name;
			$data= array(
				'header'=>$this->input->post('header'),
				'keterangan'=>$this->input->post('keterangan'),
				'isi'=>$this->input->post('isi'),
				'image'=>$image,
				'tanggal'=>date('Y-m-d H:i:s')
			);
			if($this->db->insert('berita', $data)){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTAMBAH ke berita');
	      		redirect('/berita');
			}

		}
	}
	public function ubah($id){
		$data['judul'] = 'berita';
		$data['dt'] =$this->Berita_m->get_dt($id);
		$data['konten'] = 'admin-web/berita/ubah_berita';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	function update($id){

			$config['upload_path']          = 'images/upload/berita/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $file_name = $this->generateRandomString().$_FILES['image']['name'];
			$config['file_name'] = $file_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($_FILES['image']['name']!='' && !$this->upload->do_upload('image')) # form input field attribute
			{
			    # Upload Failed
			    $this->session->set_flashdata('pesan', $this->upload->display_errors());
			    redirect('berita/ubah/'.$id);
			}else{
				$dt = $this->Berita_m->get_dt($id);
			    if($_FILES['image']['name']!=''){
					unlink($dt->image);
					$image = 'images/upload/berita/'.$file_name;
				}else{
					$image = $dt->image;
				}
				$data= array(
					'header'=>$this->input->post('header'),
					'keterangan'=>$this->input->post('keterangan'),
					'isi'=>$this->input->post('isi'),
					'image'=>$image
				);
				$this->db->where('id', $id);
				if($this->db->update('berita', $data)){
					$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
		      		redirect('/berita');
				}
			}

	}
	function hapus($id){
		$dt = $this->Berita_m->get_dt($id);
		unlink($dt->image);
		$this->db->where('id', $id);
		if($this->db->delete('berita')){
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
  		redirect('/berita');
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