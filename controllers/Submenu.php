<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Submenu_m');
        $this->load->model('Footer_m');
        // 
    }

	public function index(){
		$data['judul'] = 'submenu';
		$data['list']=$this->Submenu_m->get_dtsubmenu();
		$data['konten'] = 'admin-web/submenu/list_submenu';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
		$this->load->view('admin', $data);
	}

    public function tambah(){
        $data['judul'] = 'submenu';
        $data['menu'] =$this->Submenu_m->get_dtmenu();
        $data['konten'] = 'admin-web/submenu/tambah_submenu';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
        $this->load->view('admin', $data);
    }
    public function save(){
        $config['upload_path']          = 'images/upload/submenu/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $file_name = $this->generateRandomString().$_FILES['url_gambar']['name'];
        $config['file_name'] = $file_name;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('url_gambar')) # form input field attribute
        {
            # Upload Failed
            // $this->session->set_flashdata('pesan', $this->upload->display_errors());
            // redirect('/submenu');
             $image = '';// 'images/upload/submenu/'.$file_name;
            $data= array(
                'id_menu'=>$this->input->post('id_menu'),
                'header'=>$this->input->post('header'),
                'keterangan'=>$this->input->post('keterangan'),
                'isi'=>$this->input->post('isi'),
                'url_gambar'=>$image,
                // 'tanggal'=>date('Y-m-d H:i:s')
            );
            if($this->db->insert('tbl_submenu_tambah', $data)){
                $this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTAMBAH ke SUBMENU tanpa Gambar');
                redirect('/submenu');
            }
        }else{
            $image = 'images/upload/submenu/'.$file_name;
            $data= array(
                'id_menu'=>$this->input->post('id_menu'),
                'header'=>$this->input->post('header'),
                'keterangan'=>$this->input->post('keterangan'),
                'isi'=>$this->input->post('isi'),
                'url_gambar'=>$image,
                // 'tanggal'=>date('Y-m-d H:i:s')
            );
            if($this->db->insert('tbl_submenu_tambah', $data)){
                $this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTAMBAH ke SUBMENU');
                redirect('/submenu');
            }

        }
    }
    public function ubah($id){
        $data['judul'] = 'submenu';
        $data['dt'] =$this->Submenu_m->get_dt($id);
        $data['menu'] =$this->Submenu_m->get_dtmenu();
        $data['konten'] = 'admin-web/submenu/ubah_submenu';
        $data['jadwal_footer'] = $this->Footer_m->get_jadwal_footer();
        $data['info_footer'] = $this->Footer_m->get_info_footer();
        $this->load->view('admin', $data);
    }
    function update($id){

            $config['upload_path']          = 'images/upload/submenu/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $file_name = $this->generateRandomString().$_FILES['url_gambar']['name'];
            $config['file_name'] = $file_name;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($_FILES['url_gambar']['name']!='' && !$this->upload->do_upload('url_gambar')) # form input field attribute
            {
                # Upload Failed
                // $this->session->set_flashdata('pesan', $this->upload->display_errors());
                // redirect('submenu/ubah/'.$id);
                $data= array(
                    'id_menu'=>$this->input->post('id_menu'),
                    'header'=>$this->input->post('header'),
                    'keterangan'=>$this->input->post('keterangan'),
                    'isi'=>$this->input->post('isi'),
                    // 'url_gambar'=>$image
                );
                $this->db->where('id', $id);
                if($this->db->update('tbl_submenu_tambah', $data)){
                    $this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah Tanpa Gambar');
                    redirect('/submenu');
                }
            }else{
                $dt = $this->Submenu_m->get_dt($id);
                if($_FILES['url_gambar']['name']!=''){
                    unlink($dt->image);
                    $image = 'images/upload/submenu/'.$file_name;
                }else{
                    $image = $dt->image;
                }
                $data= array(
                    'id_menu'=>$this->input->post('id_menu'),
                    'header'=>$this->input->post('header'),
                    'keterangan'=>$this->input->post('keterangan'),
                    'isi'=>$this->input->post('isi'),
                    'url_gambar'=>$image
                );
                $this->db->where('id', $id);
                if($this->db->update('tbl_submenu_tambah', $data)){
                    $this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
                    redirect('/submenu');
                }
            }

    }
    function hapus($id){
        $dt = $this->Submenu_m->get_dt($id);
        unlink($dt->image);
        $this->db->where('id', $id);
        if($this->db->delete('tbl_submenu_tambah')){
        $this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
        redirect('/submenu');
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