<?php
class Daftar_online_m extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->rsmu = $this->load->database('rsmu', TRUE);

  }

  function mcek_rekam_medis($medical_record)
  {
    $result = $this->rsmu->query("SELECT no_medicalrecord, nama_pasien, alamat, tanggal_lahir FROM pasien WHERE no_medicalrecord = '{$medical_record}'");
    return $result->result();
  }

  function mkd_pesan(){
    date_default_timezone_set('Asia/Jakarta');
    $date = date('dmY');
    $hasil=$this->rsmu->query("SELECT MAX(CAST(split_part(kd_pesan,'-',2) AS INTEGER)) AS nomor_pesan
      FROM reservasi
      WHERE split_part(kd_pesan,'-',1) = '{$date}'");
    if ($hasil->num_rows() > 0) {
     $cek_kd_pesan=$this->rsmu->query("SELECT MAX(CAST(split_part(kd_pesan,'-',2) AS INTEGER)) AS nomor_pesan
      FROM reservasi
      WHERE split_part(kd_pesan,'-',1) = '{$date}'")->row();
     $kd_pesan_new = $cek_kd_pesan->nomor_pesan;
     $kd_pesan = $kd_pesan_new+1;
     return $kd_pesan;
   }else{
    $kd_pesan = '1';
    return $kd_pesan;
  }
}

function mwaktu_datang($tanggal_daftar, $id_kel_pasien, $kd_detkelpenjamin_new){
  $waktu_new = '06:00:00';
  $hasil=$this->rsmu->query("SELECT perkiraan_kedatangan
    FROM reservasi
    WHERE CAST(perkiraan_kedatangan AS DATE) = '{$tanggal_daftar}'
    AND id_kel_pasien = '{$id_kel_pasien}'
    AND kd_detkelpenjamin = '{$kd_detkelpenjamin_new}'");
  if ($hasil->num_rows() > 0) {
    $cek_waktu_new=$this->rsmu->query("SELECT COUNT(no_medicalrecord) as jumlah_waktu
      FROM reservasi
      WHERE CAST(perkiraan_kedatangan AS DATE) = '{$tanggal_daftar}'
      AND id_kel_pasien = '{$id_kel_pasien}'
      AND kd_detkelpenjamin = '{$kd_detkelpenjamin_new}'
      AND CAST(perkiraan_kedatangan AS TIME) = (SELECT MAX(CAST(perkiraan_kedatangan AS TIME))
      FROM reservasi
      WHERE CAST(perkiraan_kedatangan AS DATE) = '{$tanggal_daftar}'
      AND id_kel_pasien = '{$id_kel_pasien}'
      AND kd_detkelpenjamin = '{$kd_detkelpenjamin_new}')")->row();
    $jumlah_waktu = $cek_waktu_new->jumlah_waktu;
    if ($jumlah_waktu >= '5') {
      $cek_waku_datang = $this->rsmu->query("SELECT (MAX(CAST(perkiraan_kedatangan AS TIME)) + INTERVAL '10 minute') as waktu
        FROM reservasi
        WHERE CAST(perkiraan_kedatangan AS DATE) = '{$tanggal_daftar}'
        AND id_kel_pasien = '{$id_kel_pasien}'
        AND kd_detkelpenjamin = '{$kd_detkelpenjamin_new}'")->row();
      $waktu_datang = $cek_waku_datang->waktu;
      return $waktu_datang;
    }else{
      $cek_waku_datang = $this->rsmu->query("SELECT MAX(CAST(perkiraan_kedatangan AS TIME)) as waktu
        FROM reservasi
        WHERE CAST(perkiraan_kedatangan AS DATE) = '{$tanggal_daftar}'
        AND id_kel_pasien = '{$id_kel_pasien}'
        AND kd_detkelpenjamin = '{$kd_detkelpenjamin_new}'")->row();
      $waktu_datang = $cek_waku_datang->waktu;
      return $waktu_datang;
    }

  }else{
    $waktu_datang = $waktu_new;
    return $waktu_datang;
  }
}

function mno_antrian($online, $offline, $id_kel_pasien, $kd_detkelpenjamin_new, $tanggal_daftar){
  $cek_no_antrian = $this->rsmu->query("SELECT MAX(no_antrian) AS no_antrian
    FROM reservasi
    WHERE CAST(tgl_pesan  AS DATE) = '{$tanggal_daftar}'
    AND id_kel_pasien = '{$id_kel_pasien}'
    AND kd_detkelpenjamin = '{$kd_detkelpenjamin_new}'");
  if ($cek_no_antrian->num_rows() > 0) {
    $no_antrian_new = $this->rsmu->query("SELECT MAX(no_antrian) AS no_antrian
      FROM reservasi
      WHERE CAST(tgl_pesan  AS DATE) = '{$tanggal_daftar}'
      AND id_kel_pasien = '{$id_kel_pasien}'
      AND kd_detkelpenjamin = '{$kd_detkelpenjamin_new}'")->row();
    $no_antrian = $no_antrian_new->no_antrian;
    if($no_antrian < $online){
      $no_antrian = $no_antrian+1;
      return $no_antrian;
      // echo 'Sebelum 30';
    }else if($no_antrian >= $online && $no_antrian <= ($online+$offline)){
      $no_antrian = ($online + $offline) + 1;
      return $no_antrian;
      // echo '31-40';
    }else if ($no_antrian > ($online + $offline) && $no_antrian < ((2*$online) + $offline)) {
      $no_antrian = $no_antrian + 1;
      return $no_antrian;
      // echo '41-70';
    }else if($no_antrian >= ((2*$online) + $offline) && $no_antrian < ((2*$online) + (2*$offline)) ){
      $no_antrian = ((2*$online) + (2*$offline)) + 1;
      return $no_antrian;
      // echo '71-80';
    }else if($no_antrian >= ((2*$online) + (2*$offline)) && $no_antrian < ((3*$online) + (2*$offline)) ){
      $no_antrian = $no_antrian + 1;
      return $no_antrian;
      // echo '81-110';
    }else if($no_antrian >= ((3*$online) + (2*$offline)) && $no_antrian < ((3*$online) + (3*$offline)) ){
      $no_antrian = ((3*$online) + (3*$offline)) + 1;
      return $no_antrian;
      // echo '111-120';
    }else if($no_antrian >= ((3*$online) + (3*$offline)) && $no_antrian < ((4*$online) + (3*$offline)) ){
      $no_antrian = $no_antrian + 1;
      return $no_antrian;
      // echo '121-150';
    }else if($no_antrian >= ((4*$online) + (3*$offline)) && $no_antrian < ((4*$online) + (4*$offline)) ){
      $no_antrian = ((4*$online) + (4*$offline)) + 1;
      return $no_antrian;
      // echo '151-160';
    }else if($no_antrian >= ((4*$online) + (4*$offline)) && $no_antrian < ((5*$online) + (4*$offline)) ){
      $no_antrian = $no_antrian + 1;
      return $no_antrian;
      // echo '161-190';
    }else if($no_antrian >= ((5*$online) + (4*$offline)) && $no_antrian < ((5*$online) + (5*$offline)) ){
      $no_antrian = ((5*$online) + (5*$offline)) + 1;
      // echo '191-200';
    }else if($no_antrian >= ((5*$online) + (5*$offline)) && $no_antrian < ((6*$online) + (5*$offline)) ){
      $no_antrian = $no_antrian + 1;
      return $no_antrian;
      // echo '201-230';
    }else if($no_antrian >= ((6*$online) + (5*$offline)) && $no_antrian < ((6*$online) + (6*$offline)) ){
      $no_antrian = ((6*$online) + (6*$offline)) + 1;
      return $no_antrian;
      // echo '231-240';
    }else if($no_antrian >= ((6*$online) + (6*$offline)) && $no_antrian < ((7*$online) + (6*$offline)) ){
      $no_antrian =  $no_antrian + 1;
      // echo '241-270';
    }else if($no_antrian >= ((7*$online) + (6*$offline)) && $no_antrian < ((7*$online) + (7*$offline)) ){
      $no_antrian =  ((7*$online) + (7*$offline)) + 1;
      return $no_antrian;
      // echo '271-280';
    }else if($no_antrian >= ((7*$online) + (7*$offline)) && $no_antrian < ((8*$online) + (7*$offline)) ){
      $no_antrian =  $no_antrian + 1;
      return $no_antrian;
      // echo '281-310';
    }else if($no_antrian >= ((8*$online) + (7*$offline)) && $no_antrian < ((8*$online) + (8*$offline)) ){
      $no_antrian =  ((8*$online) + (8*$offline)) + 1;
      return $no_antrian;
      // echo '311-320';
    }else if($no_antrian >= ((8*$online) + (8*$offline)) && $no_antrian < ((9*$online) + (8*$offline)) ){
      $no_antrian =  $no_antrian + 1;
      return $no_antrian;
      // echo '321-350';
    }else if($no_antrian >= ((9*$online) + (8*$offline)) && $no_antrian < ((9*$online) + (9*$offline)) ){
      $no_antrian =  ((9*$online) + (9*$offline)) + 1;
      return $no_antrian;
      // echo '351-360';
    }else if($no_antrian >= ((9*$online) + (9*$offline)) && $no_antrian < ((10*$online) + (9*$offline)) ){
      $no_antrian =  $no_antrian + 1;
      return $no_antrian;
      // echo '361-390';
    }else if($no_antrian >= ((10*$online) + (9*$offline)) && $no_antrian < ((10*$online) + (10*$offline)) ){
      $no_antrian =  ((10*$online) + (10*$offline)) + 1;
      return $no_antrian;
      // echo '391-400';
    }else if($no_antrian >= ((10*$online) + (10*$offline)) && $no_antrian < ((11*$online) + (10*$offline)) ){
      $no_antrian =  $no_antrian + 1;
      return $no_antrian;
      // echo '401-430';
    }else if($no_antrian >= ((11*$online) + (10*$offline)) && $no_antrian < ((11*$online) + (11*$offline)) ){
      $no_antrian =  ((11*$online) + (11*$offline)) + 1;
      return $no_antrian;
      // echo '431-440';
    }else if($no_antrian >= ((11*$online) + (11*$offline)) && $no_antrian < ((12*$online) + (11*$offline)) ){
      $no_antrian =  $no_antrian + 1;
      return $no_antrian;
      // echo '441-470';
    }else if($no_antrian >= ((12*$online) + (11*$offline)) && $no_antrian < ((12*$online) + (12*$offline)) ){
      $no_antrian =  ((12*$online) + (12*$offline)) + 1;
      return $no_antrian;
      // echo '471-480';
    }else if($no_antrian >= ((12*$online) + (12*$offline)) && $no_antrian < ((13*$online) + (12*$offline)) ){
      $no_antrian =  $no_antrian + 1;
      return $no_antrian;
      // echo '481-510';
    }else if($no_antrian >= ((13*$online) + (12*$offline)) && $no_antrian < ((13*$online) + (13*$offline)) ){
      $no_antrian =  ((13*$online) + (13*$offline)) + 1;
      return $no_antrian;
      // echo '511-520';
    }
  }else{
   $no_antrian = '1';
   return $no_antrian;
 }

}


}