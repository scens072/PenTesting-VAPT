<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_pelayanan extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_pelayanan_m');
    }
    public function index()
	{
		
		$data['judul'] = 'jenis_pelayanan';
		$data['list'] =$this->Jenis_pelayanan_m->get_dt();
		$data['konten'] = 'admin-web/jenis_pelayanan/list_jenis_pelayanan';
		$this->load->view('admin', $data);
	}

	public function tambah(){
		$data['judul'] = 'jenis_pelayanan';
		$data['konten'] = 'admin-web/jenis_pelayanan/tambah_jenis_pelayanan';
		$this->load->view('admin', $data);
	}

	public function save(){
		$data = array('jenis_pelayanan'=>$this->input->post('jenis_pelayanan'));
		$this->db->insert('jenis_pelayanan', $data);
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTambah');
      	redirect('/jenis_pelayanan');
		
	}
	function ubah($id){
		$data['judul'] = 'jenis_pelayanan';
		$data['konten'] = 'admin-web/jenis_pelayanan/ubah_jenis_pelayanan';
		$data['dt']=$this->Jenis_pelayanan_m->get_dt($id);
		$data['id'] = $id;
		$this->load->view('admin', $data);
	}
	function update($id){
		$data= array(
			'jenis_pelayanan'=>$this->input->post('jenis_pelayanan'),
		);
		$this->db->where('id', $id);
		if($this->db->update('jenis_pelayanan', $data)){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
      		redirect('/jenis_pelayanan');
		}
	}


	function hapus($id){
		$dt =$this->Jenis_pelayanan_m->get_dt($id);

			$this->db->where('id', $id);
			if($this->db->delete('jenis_pelayanan')){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
      		redirect('/jenis_pelayanan');
		}
	}
}