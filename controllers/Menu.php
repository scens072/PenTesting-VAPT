<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_m');
        $this->load->model('Footer_m');
        // 
    }

	public function edit_menu(){
		$data['judul'] = 'edit_menu';
		$data['list']=$this->Menu_m->get_dtmenu();
		$data['konten'] = 'admin-web/menu/list_menu';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}

	public function tambah(){
		$data['judul'] = 'menu';
		$data['konten'] = 'admin-web/menu/tambah_menu';
		$data['menu_utama']=$this->Menu_m->get_dtmenu_utama();
		$data['submenu']=$this->Menu_m->get_dtsubmenu();
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}

	public function save(){
		$data = array(
			'nama_menu'=>$this->input->post('nama_menu'),
			'url'=>$this->input->post('url')==''?'#':$this->input->post('url'),
			'type'=>$this->input->post('type'),
			'id_menu_utama'=>$this->input->post('id_menu_utama')
		);
		$this->db->insert('tbl_menu_tambah', $data);
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTambah');
      	redirect('/menu/edit_menu');
		
	}
	function ubah($id){
		$data['judul'] = 'menu';
		$data['konten'] = 'admin-web/menu/ubah_menu';
		$data['dt']=$this->Menu_m->get_dt($id);
		$data['menu_utama']=$this->Menu_m->get_dtmenu_utama();
		$data['submenu']=$this->Menu_m->get_dtsubmenu();
		$data['id'] = $id;
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}

	function update($id){
		$link = $this->input->post('link');
		$data= array(
			'nama_menu'=>$this->input->post('nama_menu'),
			'url'=>$link=='0'?$this->input->post('url'):$link,//$this->input->post('url')==''?'#':$this->input->post('url'),
			'type'=>$this->input->post('type'),
			'id_menu_utama'=>$this->input->post('id_menu_utama')
		);
		$this->db->where('id_menu', $id);
		if($this->db->update('tbl_menu_tambah', $data)){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
      		redirect('/menu/edit_menu');
		}
	}


	function hapus($id){
		$dt =$this->Menu_m->get_dt($id);

			$this->db->where('id_menu', $id);
			if($this->db->delete('tbl_menu_tambah')){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
      		redirect('/menu/edit_menu');
		}
	}
}