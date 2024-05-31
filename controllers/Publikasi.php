<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publikasi extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Publikasi_m');
        $this->load->model('Footer_m');

    }
    public function index()
	{
		$data['judul'] = 'publikasi';
		$data['list'] =$this->Publikasi_m->get_dt();
		$data['konten'] = 'admin-web/publikasi/list_publikasi';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	public function tambah(){
		$data['judul'] = 'publikasi';
		$data['spesialis'] =$this->Publikasi_m->get_dt();
		$data['konten'] = 'admin-web/publikasi/tambah_publikasi';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	public function save(){
		$config['upload_path']          = 'images/upload/publikasi/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('image')) # form input field attribute
		{
		    # Upload Failed
		    $this->session->set_flashdata('pesan', $this->upload->display_errors());
		    redirect('/publikasi');
		}else{
			$image = 'images/upload/publikasi/'.$file_name;
			$data= array(
				'header'=>$this->input->post('header'),
				'keterangan'=>$this->input->post('keterangan'),
				'isi'=>$this->input->post('isi'),
				'image'=>$image,
				'tanggal'=>date('Y-m-d H:i:s')
			);
			if($this->db->insert('publikasi', $data)){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTAMBAH ke PUBLIKASI');
	      		redirect('/publikasi');
			}

		}
	}
	public function ubah($id){
		$data['judul'] = 'publikasi';
		$data['dt'] =$this->Publikasi_m->get_dt($id);
		$data['konten'] = 'admin-web/publikasi/ubah_publikasi';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	function update($id){

			$config['upload_path']          = 'images/upload/publikasi/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $file_name = $this->generateRandomString().$_FILES['image']['name'];
			$config['file_name'] = $file_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($_FILES['image']['name']!='' && !$this->upload->do_upload('image')) # form input field attribute
			{
			    # Upload Failed
			    $this->session->set_flashdata('pesan', $this->upload->display_errors());
			    redirect('publikasi/ubah/'.$id);
			}else{
				$dt = $this->Publikasi_m->get_dt($id);
			    if($_FILES['image']['name']!=''){
					unlink($dt->image);
					$image = 'images/upload/publikasi/'.$file_name;
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
				if($this->db->update('publikasi', $data)){
					$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
		      		redirect('/publikasi');
				}
			}

	}
	function hapus($id){
		$dt = $this->Publikasi_m->get_dt($id);
		unlink($dt->image);
		$this->db->where('id', $id);
		if($this->db->delete('publikasi')){
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
  		redirect('/publikasi');
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