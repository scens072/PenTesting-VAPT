<?php
class Dokter_m extends CI_Model
{
  public function get_dt($id='')
  {
    $filter='';
    if($id!=''){
      $filter .=" and d.id = {$id}";
    }
    $result =$this->db->query("SELECT d.*,GROUP_CONCAT(s.nama_spesialis separator ', ') spesialis FROM dokter d
      LEFT JOIN spesialis s on FIND_IN_SET(s.id,d.id_spesialis) >0 where 1=1 $filter GROUP   BY d.id ORDER BY d.id DESC");
    if($id!=''){
      return $result->row();
    }else{
      return $result->result();
    }


  }
  public function get_jadwaldokter($id_dokter,$waktu){
    $this->db->select('*');
    $this->db->from('jadwal_dokter');
    $this->db->where('waktu', $waktu);
    $this->db->where('id_dokter', $id_dokter);
    return $this->db->get()->row();
  }

  public function get_jadwaldokter_detail($id_dokter){
    $result =$this->db->query("SELECT
      j.id,
      j.id_dokter,
      j.waktu,
      REPLACE (j.senin, ' ', ' - ') AS senin,
      REPLACE (j.selasa, ' ', ' - ') AS selasa,
      REPLACE (j.rabu, ' ', ' - ') AS rabu,
      REPLACE (j.kamis, ' ', ' - ') AS kamis,
      REPLACE (j.jumat, ' ', ' - ') AS jumat,
      REPLACE (j.sabtu, ' ', ' - ') AS sabtu
      FROM
      jadwal_dokter j
      WHERE
      j.id_dokter = '$id_dokter'");
    return $result->result();
  }

  public function get_alljadwaldokter(){
    $result =$this->db->query("SELECT d.nama_dokter,GROUP_CONCAT(s.nama_spesialis separator ', ') spesialis,
      j.id_dokter,
      j.waktu,
      REPLACE(j.senin, ' ', ' - ') as senin,
      REPLACE(j.selasa, ' ', ' - ') as selasa,
      REPLACE(j.rabu, ' ', ' - ') as rabu,
      REPLACE(j.kamis, ' ', ' - ') as kamis,
      REPLACE(j.jumat, ' ', ' - ') as jumat,
      REPLACE(j.sabtu, ' ', ' - ') as sabtu
      FROM dokter d
      LEFT JOIN jadwal_dokter j on j.id_dokter = d.id
      LEFT JOIN spesialis s on FIND_IN_SET(s.id,d.id_spesialis) >0
      GROUP   BY d.id,j.id
      ORDER BY d.id,j.id");
    return $result->result();
  }

}
