<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Ulasan_m');

    }
    public function index()
	{
		$data['judul'] = 'ulasan';
		$data['list'] =$this->Ulasan_m->get_dt();
		$data['konten'] = 'admin-web/ulasan/list_ulasan';
		$this->load->view('admin', $data);
	}
	function update_baca($id){
		$this->db->where('id', $id);
		$this->db->update('ulasan',array('status_baca'=>1));
		redirect('/ulasan');
	}

	function hapus($id){
		$this->db->where('id', $id);
		if($this->db->delete('ulasan')){
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
  		redirect('/ulasan');
		}
	}

}