<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_m');
        // 
    }
    public function index()
	{
		
		$data['judul'] = 'editor';
		$data['konten'] = 'admin-web/editor';
		$this->load->view('admin', $data);
	}
	public function edit_slider(){
		$data['judul'] = 'edit_slider';
		$data['dt_option']=$this->Admin_m->get_dtopsionubahback();
		$data['konten'] = 'admin-web/slider/list_tambah_image';
		$data['list_data']=$this->Admin_m->get_listimage();
		$dt = $data['list_data'];
		$page =  ceil(sizeof($dt)/4) <=5?ceil(sizeof($dt)/4) : 5;
		$data['page']=$page;
		$this->load->view('admin', $data);
	}
	public function add_image_slider(){
		$data['judul'] = 'edit_slider';
		// $data['dt'] =$this->Admin_m->get_dt($id);
		$data['konten'] = 'admin-web/slider/add_image';
		$this->load->view('admin', $data);
	}
	public function save_image_slider(){
		$config['upload_path']          = 'images/upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $file_name = $this->generateRandomString().$_FILES['image']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('image')) # form input field attribute
		{
		    # Upload Failed
		    $this->session->set_flashdata('pesan', $this->upload->display_errors());
		    redirect('/admin/add_image_slider');
		}else{
			$image = 'images/upload/'.$file_name;
			$data= array(
				'keterangan'=>$this->input->post('keterangan'),
				'image'=>$image,
				'kelompok'=>'slider',
				
			);
			if($this->db->insert('image', $data)){
				$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil ditambah');
	      		redirect('/admin/edit_slider');
			}

		}
	}

	public function ubah_image_slider($id){
		$data['judul'] = 'pelayanan';
		$data['data'] =$this->Admin_m->get_dtimage($id);
		$data['konten'] = 'admin-web/slider/ubah_image';
		$this->load->view('admin', $data);
	}
	public function update_image_slider($id){
		$config['upload_path']          = 'images/upload/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $file_name = $this->generateRandomString().$_FILES['image']['name'];
			$config['file_name'] = $file_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($_FILES['image']['name']!='' && !$this->upload->do_upload('image')) # form input field attribute
			{
			    # Upload Failed
			    $this->session->set_flashdata('pesan', $this->upload->display_errors());
			    redirect('admin/ubah_image_slider/'.$id);
			}else{
				$dt = $this->Admin_m->get_dtimage($id);
			    if($_FILES['image']['name']!=''){
					unlink($dt->image);
					$image = 'images/upload/'.$file_name;
				}else{
					$image = $dt->image;
				}
				$data= array(
					'keterangan'=>$this->input->post('keterangan'),
					'image'=>$image
				);
				$this->db->where('id', $id);
				if($this->db->update('image', $data)){
					$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
		      		redirect('/admin/edit_slider');
				}
			}
	}
	public function hapus_image_slider($id){
		$dt = $this->Admin_m->get_dtimage($id);
		unlink($dt->image);
		$this->db->where('id', $id);
		if($this->db->delete('image')){
		$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
  		redirect('/admin/edit_slider');
		}
	}

	public function edit_background(){
		$data['judul'] = 'edit_background';
		$data['dt_option']=$this->Admin_m->get_dtopsionubahback();
		$data['konten'] = 'admin-web/edit_background';
		$this->load->view('admin', $data);
	}
	public function save_background(){
		$option = $this->input->post('option');
		$path = $_FILES['value']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);

		if($ext=='mp4'){
			$config['upload_path'] = 'images/upload'; # check path is correct
			// $config['max_size'] = '102400';
			$config['allowed_types'] = 'mp4'; # add video extenstion on here
			$config['overwrite'] = FALSE;
			$config['remove_spaces'] = TRUE;
			$file_name = $this->generateRandomString().$_FILES['value']['name'];
			$config['file_name'] = $file_name;
		}else{
			$config['upload_path']          = 'images/upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            // $config['max_size']             = 100;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $file_name = $this->generateRandomString().$_FILES['value']['name'];
			$config['file_name'] = $file_name;
		}
		

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($_FILES['value']['name']!=='' && !$this->upload->do_upload('value')) # form input field attribute
		{
		    # Upload Failed
		    $this->session->set_flashdata('pesan', $this->upload->display_errors());
		    redirect('admin/edit_background');
		}
		else
		{
		    # Upload Successfull
		    $dt = $this->Admin_m->get_dtby('setting','option',$option);
		    if($_FILES['value']['name']!==''){
		    	unlink($dt->value);
		    	$url = 'images/upload/'.$file_name;
		    }else{
		    	$url = $dt->value;
		    }
		    
		   	$data= array(
			'value'=>$url,
			'tipe'=>($ext=='mp4'?2:1)
		);
		$this->db->where('option', $option);
		$this->db->update('setting', $data);

		    $this->session->set_flashdata('pesan', 'Berhasil simpan');
		    redirect('admin/edit_background');
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

	public function setting_email(){

		$data['judul'] = 'setting_email';
		$data['konten'] = 'admin-web/setting_email';

		$dt = $this->db->query('SELECT * from 
		(SELECT `value` smtp FROM setting WHERE `option` = "smtp" ) AS smtp,
		(SELECT `value` port_smtp FROM setting port_smtp WHERE `option` = "port_smtp" ) AS port_smtp,
		(SELECT `value` email_rs FROM setting email_rs WHERE `option` = "email_rs" ) AS email_rs,
		(SELECT `value` password_email_rs FROM setting password_email_rs WHERE `option` = "password_email_rs" ) AS password_email_rs')->row();

		$data['smtp']= $dt->smtp;
		$data['port_smtp']= $dt->port_smtp;
		$data['email_rs']= $dt->email_rs;
		$data['password_email_rs']= $dt->password_email_rs;
		$this->load->view('admin', $data);
	}
	public function save_setting_email(){


		$this->db->where('option', 'smtp');
		$this->db->update('setting', array('value' => $this->input->post('smtp')));

		$this->db->where('option', 'port_smtp');
		$this->db->update('setting', array('value' => $this->input->post('port_smtp')));

		$this->db->where('option', 'email_rs');
		$this->db->update('setting', array('value' => $this->input->post('email_rs')));

		$this->db->where('option', 'password_email_rs');
		$this->db->update('setting',array('value' => $this->input->post('password_email_rs')));



		$this->session->set_flashdata('pesan', 'Berhasil simpan');
		    redirect('admin/setting_email');
	}
}