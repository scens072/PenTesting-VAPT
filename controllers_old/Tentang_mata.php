<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_mata extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Tentang_mata_m');
    }
     public function index()
	{
		$data['judul'] = 'tentang_mata';
		$data['dt'] =$this->Tentang_mata_m->get_dt(1);
		$data['konten'] = 'admin-web/tentang_mata';
		$this->load->view('admin', $data);
	}
	function update($id){

			$config['upload_path']          = 'images/upload/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $file_name = $this->generateRandomString().$_FILES['image']['name'];
			$config['file_name'] = $file_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($_FILES['image']['name']!='' && !$this->upload->do_upload('image')) # form input field attribute
			{
			    # Upload Failed
			    $this->session->set_flashdata('pesan', $this->upload->display_errors());
			    redirect('tentang_mata');
			}else{
				$dt = $this->Tentang_mata_m->get_dt($id);
			    if($_FILES['image']['name']!=''){
					unlink($dt->image);
					$image = 'images/upload/'.$file_name;
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
				if($this->db->update('tentang_mata', $data)){
					$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
		      		redirect('/tentang_mata');
				}
			}

	}
	function publikasi($id){

			//insert ke publikasi
			$dt = $this->Tentang_mata_m->get_dt($id);
			$image = $dt->image;
			$img = explode('images/upload/', $image);
			$newimage = 'images/upload/publikasi/'.$this->generateRandomString().$img[1];
			if($dt->image!=''){
				copy($image, $newimage);
			}

			$data= array(
					'header'=>$dt->header,
					'keterangan'=>$dt->keterangan,
					'isi'=>$dt->isi,
					'image'=>$newimage,
					'tanggal'=>date('Y-m-d H:i:s')
				);
				if($this->db->insert('publikasi', $data)){
					$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTAMBAH ke PUBLIKASI');
		      		redirect('/tentang_mata');
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