<?php
class Admin_m extends CI_Model
{
  public function get_dtby($tabel,$kolom,$param)
  {
  	$this->db->select('*');
    $this->db->from($tabel);
    $this->db->where($kolom, $param);
    return $this->db->get()->row();
  }

  public function get_dtopsionubahback(){
  	$this->db->select('*');
    $this->db->from('setting');
    $this->db->where('tipe !=',0);
    return $this->db->get()->result();
  }
  function get_listimage(){
    $this->db->select('*');
    $this->db->from('image');
    $this->db->where('kelompok', 'slider');

    $this->db->order_by('id', 'DESC');
    return $this->db->get()->result();
  }
  function get_dtimage($id=''){
    $this->db->select('*');
    $this->db->from('image');
    if($id!=''){
      $this->db->where('id', $id);
      return $this->db->get()->row();
    }else{
      $this->db->order_by('id', 'DESC');
      return $this->db->get()->result();
    }
    
  }

  function get_count_pameran_v(){
   return $this->db->query("SELECT COUNT(kd_pameran) AS count
    FROM pameran_virtual
    WHERE status = 'BERLANGSUNG'
    ")->row();
 }

}