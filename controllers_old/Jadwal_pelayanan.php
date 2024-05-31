<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_pelayanan extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_pelayanan_m');
        $this->load->model('Jenis_pelayanan_m');
    }
    public function index()
	{
		
		$data['judul'] = 'jadwal_pelayanan';
		$data['list'] =$this->Jadwal_pelayanan_m->get_dt();
		$data['konten'] = 'admin-web/jadwal_pelayanan/list_jadwal_pelayanan';
		$this->load->view('admin', $data);
	}
	public function tambah(){
		$data['judul'] = 'jadwal_pelayanan';
		$data['jenis_pelayanan']= $this->Jenis_pelayanan_m->get_dt();
		$data['konten'] = 'admin-web/jadwal_pelayanan/tambah_jadwal_pelayanan';
		$this->load->view('admin', $data);
	}
	public function save(){
			
			$data = array(
			'id_jenis_pelayanan'=>$this->input->post('id_jenis_pelayanan'),
			'hari'=>$this->input->post('hari'),
			'pagi'=>$this->input->post('pagi1').' '.$this->input->post('pagi2'),
			'siang'=>$this->input->post('siang1').' '.$this->input->post('siang2'),
			'sore'=>$this->input->post('sore1').' '.$this->input->post('sore2'),
		);
		
		$this->db->insert('jadwal_pelayanan', $data);
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTambah');
      	redirect('/jadwal_pelayanan');
	}
	function ubah($id){
		$data['judul'] = 'jadwal_pelayanan';
		$data['konten'] = 'admin-web/jadwal_pelayanan/ubah_jadwal_pelayanan';
		$dt = $this->Jadwal_pelayanan_m->get_dt($id);
		$data['dt']=$dt;
		$data['jenis_pelayanan']= $this->Jenis_pelayanan_m->get_dt();
		$data['id'] = $id;
		$pagi = explode(' ', $dt->pagi);
		$siang = explode(' ', $dt->siang);
		$sore = explode(' ', $dt->sore);
		$data['pagi1']= array_key_exists(0, $pagi)?$pagi[0]:'';
		$data['pagi2']= array_key_exists(1, $pagi)?$pagi[1]:'';
		$data['siang1']= array_key_exists(0, $siang)?$siang[0]:'';
		$data['siang2']= array_key_exists(1, $siang)?$siang[1]:'';
		$data['sore1']= array_key_exists(0, $sore)?$sore[0]:'';
		$data['sore2']= array_key_exists(1, $sore)?$sore[1]:'';
		$this->load->view('admin', $data);
	}
	public function update(){
			
			$data = array(
			'id_jenis_pelayanan'=>$this->input->post('id_jenis_pelayanan'),
			'hari'=>$this->input->post('hari'),
			'pagi'=>$this->input->post('pagi1').' '.$this->input->post('pagi2'),
			'siang'=>$this->input->post('siang1').' '.$this->input->post('siang2'),
			'sore'=>$this->input->post('sore1').' '.$this->input->post('sore2'),
		);
		$this->db->where('id',$id);
		$this->db->update('jadwal_pelayanan', $data);
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
      	redirect('/jadwal_pelayanan');
	}
	function hapus($id){
		$dt = $dt = $this->Jadwal_pelayanan_m->get_dt($id);
		
		$this->db->where('id', $id);
		if($this->db->delete('jadwal_pelayanan')){
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
  		redirect('/jadwal_pelayanan');
		}
	}
}