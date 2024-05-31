<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pameran_virtual extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pameran_virtual_m');

	}
	public function index()
	{
		$data['judul'] = 'pameran_virtual';
		$data['list'] =$this->Pameran_virtual_m->get_dt();
		$data['konten'] = 'admin-web/pameran_virtual/list_pameran_virtual';
		$this->load->view('admin', $data);
	}
	public function tambah(){
		$data['judul'] = 'pameran_virtual';
		$data['spesialis'] =$this->Pameran_virtual_m->get_dt();
		$data['konten'] = 'admin-web/pameran_virtual/tambah_pameran_virtual';
		$this->load->view('admin', $data);
	}
	public function save(){

		$data= array(
			'judul_pameran'=>$this->input->post('header'),
			'embed_code'=>$this->input->post('embed_code'),
			'keterangan'=>$this->input->post('keterangan'),
			'status'=>$this->input->post('status_pameran'),
			'tanggal_input'=>date('Y-m-d'),
			'waktu_input'=>date('H:i:s'),
		);
		if($this->db->insert('pameran_virtual', $data)){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Pameran Berhasil Ditambahkan');
			redirect('/pameran_virtual');
		}

		
	}
	public function ubah($id){
		$data['judul'] = 'pameran_virtual';
		$data['dt'] =$this->Pameran_virtual_m->get_dt($id);
		$data['konten'] = 'admin-web/pameran_virtual/ubah_pameran_virtual';
		$this->load->view('admin', $data);
	}
	function update($kd_pameran){

		$data= array(
			'judul_pameran'=>$this->input->post('header'),
			'embed_code'=>$this->input->post('embed_code'),
			'keterangan'=>$this->input->post('keterangan'),
			'status'=>$this->input->post('status_pameran')
		);
		$this->db->where('kd_pameran', $kd_pameran);
		if($this->db->update('pameran_virtual', $data)){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
			redirect('/pameran_virtual');
		}

	}
	function hapus($id){
		$dt = $this->Pameran_virtual_m->get_dt($id);
		$this->db->where('kd_pameran', $id);
		if($this->db->delete('pameran_virtual')){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
			redirect('/pameran_virtual');
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