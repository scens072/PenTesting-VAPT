<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_m');
		$this->load->model('Tentang_mata_m');
		$this->load->model('Tentang_kami_m');
		$this->load->model('Publikasi_m');
		$this->load->model('Berita_m');
		$this->load->model('Dokter_m');
		$this->load->model('Pameran_virtual_m');
		$this->load->model('Footer_m');
	}

	public function index(){
		$data['btentang_mata'] = $this->Admin_m->get_dtby('setting','option','gambar_depan');
		$data['bkirim_pertanyaan'] = $this->Admin_m->get_dtby('setting','option','kirim_pertanyaan');
		$data['bcari_dokter'] = $this->Admin_m->get_dtby('setting','option','cari_dokter');
		$data['bdaftar_online'] = $this->Admin_m->get_dtby('setting','option','daftar_online');
		$data['bhubungi_kami'] = $this->Admin_m->get_dtby('setting','option','hubungi_kami');
		$data['bvideo'] = $this->Admin_m->get_dtby('setting','option','video_depan');
		$data['bbuat_janji'] = $this->Admin_m->get_dtby('setting','option','buat_janji');
		$data['bbuat_janji_icon'] = $this->Admin_m->get_dtby('setting','option','buat_janji_icon');
		$data['bfind_doctor'] = $this->Admin_m->get_dtby('setting','option','find_doctor');
		$data['tentang_mata']=$this->Tentang_mata_m->get_dt(1);
		$data['menuju_rsmu']=$this->Tentang_kami_m->get_dtmenuju();
		$data['publikasi']=$this->Publikasi_m->get_dtlimit(20);
		$data['berita']=$this->Berita_m->get_dtlimit(20);
		$data['dokter']=$this->Dokter_m->get_dt();
		$data['slider']=$this->Admin_m->get_listimage();
		$data['pameran_virtual']=$this->Pameran_virtual_m->get_data_pameran_v();
		$data['count_pv']= $this->Admin_m->get_count_pameran_v();
		$data['judul'] = 'beranda';
		$data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
		$data['info_footer'] = $this->Footer_m->get_info_footer();
		$data['menu_utama'] = $this->Footer_m->get_menu_utama();
		$data['menu_tmbh'] = $this->Footer_m->get_menu_tambahan();
		$data['submenu_tmbh'] = $this->Footer_m->get_submenu_tambahan();
		$this->load->view('welcome',$data);
	}
	
}

?>
