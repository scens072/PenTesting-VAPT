<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Form_pendaftaran_online extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Publikasi_m');
        $this->load->model('Berita_m');
        $this->load->model('Tentang_mata_m');
        $this->load->model('Admin_m');
        $this->load->model('Tentang_kami_m');
        $this->load->model('Tentang_mata_kita_m');
        $this->load->model('Jadwal_pelayanan_m');
        $this->load->model('Pelayanan_m');
        $this->load->model('Spesialis_m');
        $this->load->model('Dokter_m');
        $this->load->model('Pelayanan_dokter_m');
        $this->load->model('Karya_ilmiah_m');
        $this->load->model('Mitra_m');
        $this->load->model('Kelas_rwi_m');
        $this->load->model('Pendaftaran_m');
        $this->load->model('Pm_m');
        $this->load->model('Fasilitas_rs_m');
        $this->load->model('Pameran_virtual_m');
        $this->load->model('Faq_rs_m');
        $this->load->model('Footer_m');
        // $this->load->model('Daftar_online_m');
        // $this->rsmu = $this->load->database('rsmu', TRUE);
    }
    function index(){
        $data['judul'] = 'pendaftaran';
        $data['konten'] = 'konten-web/form_pendaftaran';
        $data['jenis_kelamin']= $this->Pendaftaran_m->get_jenis_kelamin();
        $data['penjamin']= $this->Pendaftaran_m->get_penjamin();
        $data['poli']= $this->Pendaftaran_m->get_unit();
        $data['jadwal_footer'] = '';// $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = '';// $this->Footer_m->get_info_footer();
        $data['menu_tmbh'] = '';// $this->Footer_m->get_menu_tambahan();
        $data['submenu_tmbh'] = '';// $this->Footer_m->get_submenu_tambahan();
        $data['menu_utama'] = $this->Footer_m->get_menu_utama();
        $this->load->view('konten_form_pendaftaran',$data);
    }

    function dtparamedis(){
        $unit=$_POST['unit'];
        $dtpara = $this->Pendaftaran_m->get_dokter($unit);
        echo json_encode($dtpara);
    }
    
    function dtpasien(){
        $rm=$_POST['rm'];
        $dtrm = $this->Pendaftaran_m->get_pasien($rm);
        echo json_encode($dtrm);
    }

    function savedaftar(){
        $jenis=$_POST['jenis'];
        $rm=$_POST['rm'];
        $nama=$_POST['nama'];
        $jkel=$_POST['jkel'];
        $tmplahir=$_POST['tmplahir'];
        $tgllahir=$_POST['tgllahir'];
        $alamat=$_POST['alamat'];
        $no_hp=$_POST['no_hp'];
        $unit=$_POST['unit'];
        $dokter=$_POST['dokter'];
        $penjamin=$_POST['penjamin'];
        $tgl=$_POST['tgl'];
        if($jenis=='lama'){
            $data = $this->Pendaftaran_m->daftar($jenis,$rm,$nama,$jkel,$tmplahir,$tgllahir,$alamat,$no_hp,$unit,$dokter,$penjamin,$tgl);
        }else if($jenis=='baru'){
            $rm = $this->Pendaftaran_m->msimpangetmedrecbaru();
            $new = $this->Pendaftaran_m->daftarnew($jenis,$rm,$nama,$jkel,$tmplahir,$tgllahir,$alamat,$no_hp,$unit,$dokter,$penjamin,$tgl);
            if($new == 'sukses'){
                $data = $this->Pendaftaran_m->daftar($jenis,$rm,$nama,$jkel,$tmplahir,$tgllahir,$alamat,$no_hp,$unit,$dokter,$penjamin,$tgl);
            }else{
                $data = 'Pendaftaran Gagal !! Mohon Coba Lagi !!';
            }
        }
        echo json_encode($data);
    }
}
