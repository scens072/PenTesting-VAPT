<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Dokter_m');
		$this->load->model('Spesialis_m');
        // 
	}
	public function index()
	{
		$data['judul'] = 'dokter';
		$data['list'] =$this->Dokter_m->get_dt();
		$data['konten'] = 'admin-web/dokter/list_dokter';
		$this->load->view('admin', $data);
	}

	public function tambah(){
		$data['judul'] = 'dokter';
		$data['spesialis'] =$this->Spesialis_m->get_dt();
		$data['konten'] = 'admin-web/dokter/tambah_dokter';
		$this->load->view('admin', $data);
	}

	public function save(){
		$spesialis = $this->input->post('spesialis');
		$spesialis = implode($spesialis, ',');

		$config['upload_path']          = 'images/upload/dokter/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$file_name = $this->generateRandomString().$_FILES['foto']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('foto')) # form input field attribute
		{
		    # Upload Failed
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
			redirect('dokter/tambah');
		}else{
			$foto = 'images/upload/dokter/'.$file_name;
			$data = array(
				'nama_dokter'=>$this->input->post('nama_dokter'),	
				'id_spesialis'=>$spesialis,
				'foto'=>$foto,
				'keterangan'=>$this->input->post('keterangan'),
				'isi'=>$this->input->post('isi')
			);
			$this->db->insert('dokter', $data);
			$id =  $this->db->insert_id();
			$pagi = array(
				'id_dokter'=>$id,
				'waktu'=>'Pagi',
				'senin'=>$this->input->post('senin1').' '.$this->input->post('senin2'),
				'selasa'=>$this->input->post('selasa1').' '.$this->input->post('selasa2'),
				'rabu'=>$this->input->post('rabu1').' '.$this->input->post('rabu2'),
				'kamis'=>$this->input->post('kamis1').' '.$this->input->post('kamis2'),
				'jumat'=>$this->input->post('jumat1').' '.$this->input->post('jumat2'),
				'sabtu'=>$this->input->post('sabtu1').' '.$this->input->post('sabtu2'),
			);
			$this->db->insert('jadwal_dokter', $pagi);
			$sore = array(
				'id_dokter'=>$id,
				'waktu'=>'Sore',
				'senin'=>$this->input->post('senin11').' '.$this->input->post('senin22'),
				'selasa'=>$this->input->post('selasa11').' '.$this->input->post('selasa22'),
				'rabu'=>$this->input->post('rabu11').' '.$this->input->post('rabu22'),
				'kamis'=>$this->input->post('kamis11').' '.$this->input->post('kamis22'),
				'jumat'=>$this->input->post('jumat11').' '.$this->input->post('jumat22'),
				'sabtu'=>$this->input->post('sabtu11').' '.$this->input->post('sabtu22'),
			);
			$this->db->insert('jadwal_dokter', $sore);
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diTambah');
			redirect('/dokter');

		}

	}
	public function ubah($id){
		$data['judul'] = 'dokter';
		$data['spesialis'] =$this->Spesialis_m->get_dt();
		$dt = $this->Dokter_m->get_dt($id);
		$data['dt'] = $dt;
		$data['id_spesialis']= explode(',', $dt->id_spesialis);
		$dt = $this->Dokter_m->get_jadwaldokter($id,'Pagi');
		$senin = explode(' ', $dt->senin);
		$selasa = explode(' ', $dt->selasa);
		$rabu = explode(' ', $dt->rabu);
		$kamis = explode(' ', $dt->kamis);
		$jumat = explode(' ', $dt->jumat);
		$sabtu = explode(' ', $dt->sabtu);
		$data['senin1']= array_key_exists(0, $senin)?$senin[0]:'';
		$data['senin2']= array_key_exists(1, $senin)?$senin[1]:'';
		$data['selasa1']= array_key_exists(0, $selasa)?$selasa[0]:'';
		$data['selasa2']= array_key_exists(1, $selasa)?$selasa[1]:'';
		$data['rabu1']= array_key_exists(0, $rabu)?$rabu[0]:'';
		$data['rabu2']= array_key_exists(1, $rabu)?$rabu[1]:'';
		$data['kamis1']= array_key_exists(0, $kamis)?$kamis[0]:'';
		$data['kamis2']= array_key_exists(1, $kamis)?$kamis[1]:'';
		$data['jumat1']= array_key_exists(0, $jumat)?$jumat[0]:'';
		$data['jumat2']= array_key_exists(1, $jumat)?$jumat[1]:'';
		$data['sabtu1']= array_key_exists(0, $sabtu)?$sabtu[0]:'';
		$data['sabtu2']= array_key_exists(1, $sabtu)?$sabtu[1]:'';

		$dt = $this->Dokter_m->get_jadwaldokter($id,'Sore');
		$senin = explode(' ', $dt->senin);
		$selasa = explode(' ', $dt->selasa);
		$rabu = explode(' ', $dt->rabu);
		$kamis = explode(' ', $dt->kamis);
		$jumat = explode(' ', $dt->jumat);
		$sabtu = explode(' ', $dt->sabtu);
		$data['senin11']= array_key_exists(0, $senin)?$senin[0]:'';
		$data['senin22']= array_key_exists(1, $senin)?$senin[1]:'';
		$data['selasa11']= array_key_exists(0, $selasa)?$selasa[0]:'';
		$data['selasa22']= array_key_exists(1, $selasa)?$selasa[1]:'';
		$data['rabu11']= array_key_exists(0, $rabu)?$rabu[0]:'';
		$data['rabu22']= array_key_exists(1, $rabu)?$rabu[1]:'';
		$data['kamis11']= array_key_exists(0, $kamis)?$kamis[0]:'';
		$data['kamis22']= array_key_exists(1, $kamis)?$kamis[1]:'';
		$data['jumat11']= array_key_exists(0, $jumat)?$jumat[0]:'';
		$data['jumat22']= array_key_exists(1, $jumat)?$jumat[1]:'';
		$data['sabtu11']= array_key_exists(0, $sabtu)?$sabtu[0]:'';
		$data['sabtu22']= array_key_exists(1, $sabtu)?$sabtu[1]:'';		

		$data['konten'] = 'admin-web/dokter/ubah_dokter';
		$this->load->view('admin', $data);
	}

	public function update($id){
		$spesialis = $this->input->post('spesialis');
		$spesialis = implode($spesialis, ',');

		$config['upload_path']          = 'images/upload/dokter/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$file_name = $this->generateRandomString().$_FILES['foto']['name'];
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($_FILES['foto']['name']!='' && !$this->upload->do_upload('foto')) # form input field attribute
		{
		    # Upload Failed
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
			redirect('dokter/ubah/'.$id);
		}else{
			$dt = $dt = $this->Dokter_m->get_dt($id);
			if($_FILES['foto']['name']!=''){
				unlink($dt->foto);
				$foto = 'images/upload/dokter/'.$file_name;
			}else{
				$foto = $dt->foto;
			}
			
			
			
			$data = array(
				'nama_dokter'=>$this->input->post('nama_dokter'),
				'id_spesialis'=>$spesialis,
				'foto'=>$foto,
				'keterangan'=>$this->input->post('keterangan'),
				'isi'=>$this->input->post('isi')
			);
			$this->db->where('id', $id);
			$this->db->update('dokter', $data);

			$pagi = array(
				'senin'=>$this->input->post('senin1').' '.$this->input->post('senin2'),
				'selasa'=>$this->input->post('selasa1').' '.$this->input->post('selasa2'),
				'rabu'=>$this->input->post('rabu1').' '.$this->input->post('rabu2'),
				'kamis'=>$this->input->post('kamis1').' '.$this->input->post('kamis2'),
				'jumat'=>$this->input->post('jumat1').' '.$this->input->post('jumat2'),
				'sabtu'=>$this->input->post('sabtu1').' '.$this->input->post('sabtu2'),
			); 

			$this->db->where('id_dokter', $id);
			$this->db->where('waktu', 'Pagi');
			$this->db->update('jadwal_dokter', $pagi);


			$sore = array(
				'senin'=>$this->input->post('senin11').' '.$this->input->post('senin22'),
				'selasa'=>$this->input->post('selasa11').' '.$this->input->post('selasa2'),
				'rabu'=>$this->input->post('rabu11').' '.$this->input->post('rabu22'),
				'kamis'=>$this->input->post('kamis11').' '.$this->input->post('kamis22'),
				'jumat'=>$this->input->post('jumat11').' '.$this->input->post('jumat22'),
				'sabtu'=>$this->input->post('sabtu11').' '.$this->input->post('sabtu22'),
			); 

			$this->db->where('id_dokter', $id);
			$this->db->where('waktu', 'Sore');
			$this->db->update('jadwal_dokter', $sore);

			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diUbah');
			redirect('/dokter');
		}
	}

	function hapus($id){
		$dt = $dt = $this->Dokter_m->get_dt($id);
		unlink($dt->foto);
		$this->db->where('id_dokter', $id);
		$this->db->delete('jadwal_dokter');

		$this->db->where('id', $id);
		if($this->db->delete('dokter')){
			$this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diHapus');
			redirect('/dokter');
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