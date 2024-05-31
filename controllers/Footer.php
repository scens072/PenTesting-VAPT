<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Footer extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Footer_m');

    }
    public function index()
	{
		$data['judul'] = 'footer';
		$data['list'] = $this->Footer_m->get_jadwal_footer();
		$data['konten'] = 'admin-web/footer/list';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}

	function update_info($id)
	{
		$data= array(
			'informasi'=>$this->input->post('informasi'),
			'alamat'=>$this->input->post('alamat'),
			'facebook'=>$this->input->post('fb'),
			'instagram'=>$this->input->post('ig'),
			'whatsapp'=>$this->input->post('wa')
		);
		$this->db->where('id', $id);
		if($this->db->update('info_footer', $data)){
			$this->session->set_flashdata('pesan_info', '<strong>Berhasil!</strong> Data Berhasil diUbah');
      		redirect('/footer');
		}
	}

	public function tambah(){
		$data['judul'] = 'footer';
		$data['konten'] = 'admin-web/footer/tambah_footer';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}

	public function save(){
		$data = array(
			'nama'=>$this->input->post('nama'),
			'jadwal'=>$this->input->post('jadwal'),
			'urut'=>$this->input->post('urut')
		);
		$this->db->insert('jadwal_pelayanan_footer', $data);
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Jadwal Berhasil diTambah');
      	redirect('/footer');
		
	}
	function ubah($id){
		$data['judul'] = 'footer';
		$data['konten'] = 'admin-web/footer/ubah_footer';
		$data['dt']=$this->Footer_m->get_dt($id);
		$data['id'] = $id;
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}
	function update($id){
		$data = array(
			'nama'=>$this->input->post('nama'),
			'jadwal'=>$this->input->post('jadwal'),
			'urut'=>$this->input->post('urut')
		);
		$this->db->where('id', $id);
		if($this->db->update('jadwal_pelayanan_footer', $data)){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Jadwal Berhasil diUbah');
      		redirect('/footer');
		}
	}


	function hapus($id){
		$dt =$this->Footer_m->get_dt($id);

			$this->db->where('id', $id);
			if($this->db->delete('jadwal_pelayanan_footer')){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Jadwal Berhasil diHapus');
      		redirect('/footer');
		}
	}
}