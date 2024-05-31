<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spesialis extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Spesialis_m');
        $this->load->model('Footer_m');
    }
    public function index()
	{
		
		$data['judul'] = 'spesialis';
		$data['list'] =$this->Spesialis_m->get_dt();
		$data['konten'] = 'admin-web/spesialis/list_spesialis';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}

	public function tambah(){
		$data['judul'] = 'spesialis';
		$data['konten'] = 'admin-web/spesialis/tambah_spesialis';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}

	public function save(){
		$data = array('nama_spesialis'=>$this->input->post('nama_spesialis'));
		$this->db->insert('spesialis', $data);
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTambah');
      	redirect('/spesialis');
		
	}
	function ubah($id){
		$data['judul'] = 'spesialis';
		$data['konten'] = 'admin-web/spesialis/ubah_spesialis';
		$data['dt']=$this->Spesialis_m->get_dt($id);
		$data['id'] = $id;
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	function update($id){
		$data= array(
			'nama_spesialis'=>$this->input->post('nama_spesialis'),
		);
		$this->db->where('id', $id);
		if($this->db->update('spesialis', $data)){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
      		redirect('/spesialis');
		}
	}


	function hapus($id){
		$dt =$this->Spesialis_m->get_dt($id);

			$this->db->where('id', $id);
			if($this->db->delete('spesialis')){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
      		redirect('/spesialis');
		}
	}
}