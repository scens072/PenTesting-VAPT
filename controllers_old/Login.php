<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Login_m');
        // 
    }


	public function index()
	{
		$this->session->sess_destroy();
		
		$data['judul'] = 'masuk';
		$data['konten'] = 'login';
		$data['count_pv']= $this->Login_m->get_count_pameran_v();
		$this->load->view('welcome', $data);
	}
	public function masuk(){

		$username =$this->input->post('username');
		$password =$this->input->post('password');

		$data = $this->Login_m->get_login($username,$password);
		if($data){
			 $session_data = array(
		        'id' => $data->id,
		        'username' => $data->username,
		        'nama' => $data->nama,
		      );
		      $this->session->set_userdata($session_data);
		      redirect('/admin');
		}else{
			$this->session->set_flashdata('pesan', '<strong>Gagal!</strong> Username/Password salah');
      		redirect('/login');
		}
		$data['judul'] = 'masuk';
		$data['konten'] = '';
		$this->load->view('admin', $data);
	}
	public function keluar(){
		$this->session->sess_destroy();
    	redirect('/welcome');
	}
}
