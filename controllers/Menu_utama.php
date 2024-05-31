<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_utama extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_utama_m');
        $this->load->model('Footer_m');
        // 
    }

	public function edit_menu(){
		$data['judul'] = 'edit_menu';
		$data['list']=$this->Menu_utama_m->get_dtmenu();
		$data['konten'] = 'admin-web/menu_utama/list_menu';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}

	public function tambah(){
		$data['judul'] = 'menu';
		$data['konten'] = 'admin-web/menu_utama/tambah_menu';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}

	public function save(){
		$data = array(
			'nama_menu_utama'=>$this->input->post('nama_menu'),
			'url'=>$this->input->post('url')==''?'#':$this->input->post('url'),
			'type'=>$this->input->post('type')
		);
		$this->db->insert('tbl_menu_utama', $data);
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTambah');
      	redirect('/menu_utama/edit_menu');
		
	}
	function ubah($id){
		$data['judul'] = 'menu';
		$data['konten'] = 'admin-web/menu_utama/ubah_menu';
		$data['dt']=$this->Menu_utama_m->get_dt($id);
		$data['id'] = $id;
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}

	function update($id){
		$data= array(
			'nama_menu_utama'=>$this->input->post('nama_menu'),
			'url'=>$this->input->post('url')==''?'#':$this->input->post('url'),
			'type'=>$this->input->post('type')
		);
		$this->db->where('id_menu_utama', $id);
		if($this->db->update('tbl_menu_utama', $data)){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
      		redirect('/menu_utama/edit_menu');
		}
	}


	function hapus($id){
		$dt =$this->Menu_utama_m->get_dt($id);

			$this->db->where('id_menu_utama', $id);
			if($this->db->delete('tbl_menu_utama')){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
      		redirect('/menu_utama/edit_menu');
		}
	}
}