<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {
    function __construct()
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
        $this->load->model('Pm_m');
        $this->load->model('Fasilitas_rs_m');
        $this->load->model('Pameran_virtual_m');
        $this->load->model('Faq_rs_m');
        // $this->load->model('Daftar_online_m');
        // $this->rsmu = $this->load->database('rsmu', TRUE);
    }
    function publikasi_detail($id){
        $data['judul'] = 'publikasi_detail';
        $data['konten'] = 'konten-web/publikasi_detail';
        $data['dt']= $this->Publikasi_m->get_dt($id);
        $data['list_data']=$this->Publikasi_m->get_dt();
        $data['id']=$id;
        $dt = $data['list_data'];
        $page =  ceil(sizeof($dt)/4) <=5?ceil(sizeof($dt)/4) : 5;
        $data['page']=$page;
        $this->load->view('konten',$data);
    }

    function pameran_virtual_detail($id){
        $data['judul'] = 'pameran_virtual_detail';
        $data['konten'] = 'konten-web/pameran_virtual_detail';
        $data['dt']= $this->Pameran_virtual_m->get_dt($id);
        $data['list_data']=$this->Pameran_virtual_m->get_dt_list();
        $data['id']=$id;
        $dt = $data['list_data'];
        $this->load->view('konten',$data);
    }

    function faq_rs(){
        $data['judul'] = 'faq_rs';
        $data['konten'] = 'konten-web/faq_rs';
        $data['data']= $this->Faq_rs_m->get_header_konten();
        $data['header_konten'] = $this->Faq_rs_m->get_header_konten();
        $data['list_data']=$this->Faq_rs_m->get_dt_list();
        $dt = $data['list_data'];
        $this->load->view('konten',$data);
    }

    function berita_detail($id){
        $data['judul'] = 'berita_detail';
        $data['konten'] = 'konten-web/berita_detail';
        $data['dt']= $this->Berita_m->get_dt($id);
        $data['list_data']=$this->Berita_m->get_dt();
        $data['id']=$id;
        $dt = $data['list_data'];
        $page =  ceil(sizeof($dt)/4) <=5?ceil(sizeof($dt)/4) : 5;
        $data['page']=$page;
        $this->load->view('konten',$data);
    }

    function dokter_detail($id){
        $data['judul'] = 'dokter_detail';
        $data['konten'] = 'konten-web/dokter_detail';
        $data['dt']= $this->Dokter_m->get_dt($id);
        $data['detail_jadwal']= $this->Dokter_m->get_jadwaldokter_detail($id);
        $data['list_data']=$this->Dokter_m->get_dt();
        $data['id']=$id;
        $dt = $data['list_data'];
        $page =  ceil(sizeof($dt)/4) <=5?ceil(sizeof($dt)/4) : 5;
        $data['page']=$page;
        $this->load->view('konten',$data);
    }

    function pm_detail($id){
        $data['judul'] = 'pm';
        $data['konten'] = 'konten-web/pm_detail';
        $data['dt']= $this->Pm_m->get_dt($id);
        $data['list_data']=$this->Pm_m->get_dt();
        $data['id']=$id;
        $data['image']=$this->Pm_m->get_listimage($id);
        $dt = $data['list_data'];
        $page =  ceil(sizeof($dt)/4) <=5?ceil(sizeof($dt)/4) : 5;
        $data['page']=$page;
        $this->load->view('konten',$data);
    }
    function tentang_mata(){
        $data['judul'] = 'beranda';
        $data['konten'] = 'konten-web/tentang_mata';
        $data['tentang_mata']= $this->Tentang_mata_m->get_dt(1);
        $data['btentang_mata'] = $this->Admin_m->get_dtby('setting','option','tentang_mata');
        
        $this->load->view('konten',$data);
    }
    function tentang_kami($id=1){
        $data['judul'] = 'tentang_kami';
        $data['konten'] = 'konten-web/tentang_kami';
        $data['dt']= $this->Tentang_kami_m->get_dt($id);
        $data['image']=$this->Tentang_kami_m->get_listimage($id);
        $data['header_konten'] = $this->Tentang_kami_m->get_header_konten();
        $data['indikator']=$this->Tentang_kami_m->get_dtindikator();
        $this->load->view('konten',$data);
    }

    function tentang_mata_kita($id=1){
        $data['judul'] = 'tentang_mata_kita';
        $data['konten'] = 'konten-web/tentang_mata_kita';
        $data['dt']= $this->Tentang_mata_kita_m->get_dt($id);
        $data['image']=$this->Tentang_mata_kita_m->get_listimage($id);
        $data['header_konten'] = $this->Tentang_mata_kita_m->get_header_konten();
        // $data['menuju']=sizeof($this->Tentang_kami_m->get_dtmenuju())>0?$this->Tentang_kami_m->get_dtmenuju()->id:0;
        // $data['indikator']=sizeof($this->Tentang_kami_m->get_dtindikator())>0?$this->Tentang_kami_m->get_dtindikator()->id:0;
        
        $this->load->view('konten',$data);
    }
    function pelayanan_dokter($id=1){
        $data['judul'] = 'pelayanan_dokter';
        $data['konten'] = 'konten-web/pelayanan_dokter';
        $data['dt']= $this->Pelayanan_dokter_m->get_dt($id);
        $data['image']=$this->Pelayanan_dokter_m->get_listimage($id);
        $data['header_konten'] = $this->Pelayanan_dokter_m->get_header_konten();
        
        $this->load->view('konten',$data);
    }
    function pelayanan($judul='pelayanan_rsmu'){
        $data['judul'] = $judul;
        if($judul=='pelayanan_rsmu'){
            $data['konten'] = 'konten-web/pelayanan_rsmu';
            $data['jadwal']= $this->Jadwal_pelayanan_m->get_dt();
            $data['dt']= $this->Pelayanan_m->get_dt();
        }else if($judul=='cari_dokter'){
            $data['spesialis']= $this->Spesialis_m->get_dt();
            $data['jadwal']= $this->Dokter_m->get_alljadwaldokter();
            $data['konten'] = 'konten-web/cari_dokter';
        }
        else if($judul=='peraturan'){
            $data['tata_tertib']= $this->Pelayanan_m->get_dt_peraturan($judul);
            $data['konten'] = 'konten-web/peraturan';
        }else if($judul=='kewajiban_pasien'){
            $data['kewajiban']= $this->Pelayanan_m->get_dt_peraturan($judul);
            $data['konten'] = 'konten-web/kewajiban_pasien';
        }else if($judul=='menuju_rsmu'){
            $data['kewajiban']= $this->Pelayanan_m->get_dt_peraturan($judul);
            $data['konten'] = 'konten-web/menuju_rsmu';
        }
        else{
            $data['konten'] = 'konten-web/pelayanan';
        }    
        $this->load->view('konten',$data);
    }
    function ulasan($id=1){
        $data['judul'] = 'ulasan';
        $data['konten'] = 'konten-web/ulasan';
        
        $this->load->view('konten',$data);
    }
    

    function karya_ilmiah(){
        $data['judul'] = 'karya_ilmiah';
        $data['konten'] = 'konten-web/karya_ilmiah';
        $data['dt']= $this->Karya_ilmiah_m->get_dt();
        $data['header_konten'] = $this->Tentang_kami_m->get_header_konten();
        $this->load->view('konten',$data);
    }

    function berita_terkini(){
        $data['judul'] = 'berita_terkini';
        $data['konten'] = 'konten-web/berita_terkini';
        $data['data']= $this->Berita_m->get_header_konten();
        $data['header_konten'] = $this->Berita_m->get_header_konten();
        $data['list_data']=$this->Berita_m->get_header_konten();
        // $data['id']=$id;
        $this->load->view('konten',$data);
    }

    function kelas_rwi(){
        $data['judul'] = 'kelas_rwi';
        $data['konten'] = 'konten-web/kelas_rwi';
        $data['data']= $this->Kelas_rwi_m->get_header_konten();
        $data['header_konten'] = $this->Kelas_rwi_m->get_header_konten();
        $data['list_data']=$this->Kelas_rwi_m->get_header_konten();
        // $data['id']=$id;
        $dt = $data['list_data'];
        $page =  ceil(sizeof($dt)/12) <=5?ceil(sizeof($dt)/12) : 5;
        $data['page']=$page;
        $this->load->view('konten',$data);
    }

    function penunjang_medis(){
        $data['judul'] = 'pm';
        $data['konten'] = 'konten-web/penunjang_medis';
        $data['data']= $this->Pm_m->get_header_konten();
        $data['header_konten'] = $this->Pm_m->get_header_konten();
        $data['list_data']=$this->Pm_m->get_header_konten();
        // $data['id']=$id;
        $dt = $data['list_data'];
        $page =  ceil(sizeof($dt)/5) <=5?ceil(sizeof($dt)/5) : 5;
        $data['page']=$page;
        $this->load->view('konten',$data);
    }

    function fasilitas_rs(){
        $data['judul'] = 'fasilitas_rs';
        $data['konten'] = 'konten-web/fasilitas_rs';
        $data['data']= $this->Fasilitas_rs_m->get_header_konten();
        $data['header_konten'] = $this->Fasilitas_rs_m->get_header_konten();
        $data['list_data']=$this->Fasilitas_rs_m->get_header_konten();
        // $data['id']=$id;
        $dt = $data['list_data'];
        $page =  ceil(sizeof($dt)/5) <=5?ceil(sizeof($dt)/5) : 5;
        $data['page']=$page;
        $this->load->view('konten',$data);
    }

    function mitra(){
        $data['judul'] = 'mitra';
        $data['konten'] = 'konten-web/mitra';
        $data['data']= $this->Mitra_m->get_header_konten();
        $data['header_konten'] = $this->Mitra_m->get_header_konten();
        $data['list_data']=$this->Mitra_m->get_header_konten();
        // $data['id']=$id;
        $dt = $data['list_data'];
        $page =  ceil(sizeof($dt)/12) <=5?ceil(sizeof($dt)/12) : 5;
        $data['page']=$page;
        $this->load->view('konten',$data);
    }

    function publikasi(){
        $data['judul'] = 'publikasi';
        $data['konten'] = 'konten-web/publikasi';
        $data['data']= $this->Publikasi_m->get_header_konten();
        $data['header_konten'] = $this->Publikasi_m->get_header_konten();
        $data['list_data']=$this->Publikasi_m->get_header_konten();
        // $data['id']=$id;
        $dt = $data['list_data'];
        $page =  ceil(sizeof($dt)/12) <=5?ceil(sizeof($dt)/12) : 5;
        $data['page']=$page;
        $this->load->view('konten',$data);
    }

    function save_ulasan(){
        require APPPATH.'third_party/Exception.php';
        require APPPATH.'third_party/PHPMailer.php';
        require APPPATH.'third_party/SMTP.php';

        $dt = $this->db->query('SELECT * from 
            (SELECT `value` smtp FROM setting WHERE `option` = "smtp" ) AS smtp,
            (SELECT `value` port_smtp FROM setting port_smtp WHERE `option` = "port_smtp" ) AS port_smtp,
            (SELECT `value` email_rs FROM setting email_rs WHERE `option` = "email_rs" ) AS email_rs,
            (SELECT `value` password_email_rs FROM setting password_email_rs WHERE `option` = "password_email_rs" ) AS password_email_rs')->row();

        // PHPMailer object
        $response = false;
        // $mail = new PHPMailer();
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        // SMTP configuration
        $mail->isSMTP();
                    $mail->Host     = 'mail.rsmataundaan.co.id'; //sesuaikan sesuai nama domain hosting/server yang digunakan
                    $mail->SMTPAuth = true;
                    $mail->Username = $dt->email_rs; // user email
                    $mail->Password = $dt->password_email_rs; // password email
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port     = 465;
                    
                    $name = $this->input->post('nama'); 
                    $subject ='via kontak web an. '.$name;
                    $txt = $this->input->post('ulasan'); 
                    $email = $this->input->post('email'); 
                    
                    $mail->setFrom($email, $name); // user email
                    $mail->addReplyTo('pemasaran@rsmataundaan.co.id', ''); //user email
                    
                    // Add a recipient
                    $mail->addAddress($dt->email_rs); //email tujuan pengiriman email
                    
                    // Email subject
                    $mail->Subject = $subject; //subject email
                    
                    // Set email format to HTML
                    $mail->isHTML(true);
                    
                    // Email body content
                    $mailContent = "&lt;h1>SMTP Codeigniterr&lt;/h1>
                        &lt;p>Laporan email SMTP Codeigniter.&lt;/p>"; // isi email
                        $mail->Body = $mailContent;
                        
                    // Send email
                        if(!$mail->send()){
                            $message= " kirim gagal ";
                        }else{
                         $message= " kirim berhasil ";
                     }

                     $data= array(
                        'nama'=>$this->input->post('nama'),
                        'email'=>$this->input->post('email'),
                        'ulasan'=>$this->input->post('ulasan'),
                        'tanggal'=>date('Y-m-d h:i:s')
                        
                    );
                     if($this->db->insert('ulasan', $data)){
                //KIRIM KE EMAIL RSUD

                        $this->session->set_flashdata('pesan', '<strong>Berhasil!</strong>Data Berhasil di simpan. Terima Kasih.');
                        redirect('/konten/ulasan');
                    }
                    
                }

    // function save_ulasan(){
    //     require_once(APPPATH.'../mailer/class.phpmailer.php');
    //     require_once(APPPATH.'../mailer/class.smtp.php');
    //     require_once(APPPATH.'../mailer/fungsi.php');

    //   $dt = $this->db->query('SELECT * from 
    //     (SELECT `value` smtp FROM setting WHERE `option` = "smtp" ) AS smtp,
    //     (SELECT `value` port_smtp FROM setting port_smtp WHERE `option` = "port_smtp" ) AS port_smtp,
    //     (SELECT `value` email_rs FROM setting email_rs WHERE `option` = "email_rs" ) AS email_rs,
    //     (SELECT `value` password_email_rs FROM setting password_email_rs WHERE `option` = "password_email_rs" ) AS password_email_rs')->row();

    //     $smtp = $dt->smtp;
    //     $smtp_port = $dt->port_smtp;
    //     $to = $dt->email_rs;
    //     $password =$dt->password_email_rs;
    //     $message="";

    //     $name = $this->input->post('nama'); 
    //     $subject ='via kontak web an. '.$name;
    //     $txt = $this->input->post('ulasan'); 
    //     $email = $this->input->post('email'); 
    //     if($name!='' && $txt!=''){
    //         $mail = new PHPMailer;
    //         $toName = 'RSMU';
    //         $from = $email;
    //         $fromName = $name;
    //         $html = $txt;
    //         if (!sendEmail($mail,$smtp,$smtp_port,$to,$toName,$from,$fromName,$subject,$html,$password)){
    //              $message= " kirim gagal ";
    //          // $this->session->set_flashdata('pesan', '<strong>Gagal!</strong> Periksa kembali data Anda 2');
    //          //            redirect('welcome#kontak'); 
    //         }else{
    //              $message= " kirim berhasil ";
    //         // $this->session->set_flashdata('pesan', '<strong>Berhasil!</strong> Data Berhasil diKirim');
    //         //             redirect('welcome#kontak');
    //         } 
                
    //     }else{
    //              $message= " kirim gagal ";
    //         // $this->session->set_flashdata('pesan', '<strong>Gagal!</strong> Periksa kembali data Anda 1');
    //         //         redirect('welcome#kontak');
    //     }


    //     $data= array(
    //             'nama'=>$this->input->post('nama'),
    //             'email'=>$this->input->post('email'),
    //             'ulasan'=>$this->input->post('ulasan'),
    //             'tanggal'=>date('Y-m-d h:i:s')
                
    //         );
    //         if($this->db->insert('ulasan', $data)){
    //             //KIRIM KE EMAIL RSUD

    //             $this->session->set_flashdata('pesan', '<strong>Berhasil!</strong>Data Berhasil di simpan. Terima Kasih.');
    //             redirect('/konten/ulasan');
    //         }
    // }
            }